<?php
declare(strict_types=1);

namespace App\Services\Affiliate;

use App\Console\Commands\ImportAffiliateLinks as Console;
use App\Enums\AffiliateLinkTypes;
use App\Enums\BannerShapes;
use App\Models\Affiliate;
use App\Models\AffiliateLink;
use Illuminate\Support\Carbon;

class LinkImporter
{
    private const IMAGE_PROPERTIES_PATTERN = "(<img src=\"(https?:\/\/.*)\" width=\"(\d*)\" height=\"(\d*)\")";
    private const COLUMN_INDEX_AFFILIATE_NAME = 0;
    private const COLUMN_INDEX_LINK_ID = 2;
    private const COLUMN_INDEX_KEYWORDS = 5;
    private const COLUMN_INDEX_LINK_TYPE = 6;
    private const COLUMN_INDEX_HTML = 10;
    private const COLUMN_INDEX_URL = 12;
    private const COLUMN_INDEX_PROMOTION_START = 15;
    private const COLUMN_INDEX_PROMOTION_END = 16;
    private const COLUMN_INDEX_RELATIONSHIP_STATUS = 19;

    private Console $console;
    private array $importedLinkIds = [];

    public function __construct(Console $console)
    {
        $this->console = $console;
    }

    public function execute()
    {
        $csv = $this->loadCsv();

        array_shift($csv);

        foreach ($csv as $row) {
            try {
                if ($row[self::COLUMN_INDEX_RELATIONSHIP_STATUS] !== 'Active') {
                    $this->console->info('Inactive links found, skipping...');
                    continue;
                }

                if (in_array($row[self::COLUMN_INDEX_LINK_ID], $this->importedLinkIds)) {
                    continue;
                }

                $affiliateName = $row[self::COLUMN_INDEX_AFFILIATE_NAME];
                $linkId = $row[self::COLUMN_INDEX_LINK_ID];
                $keywords = $row[self::COLUMN_INDEX_KEYWORDS];
                $linkType = $row[self::COLUMN_INDEX_LINK_TYPE];
                $html = $row[self::COLUMN_INDEX_HTML];
                $url = $row[self::COLUMN_INDEX_URL];
                $promotionStart = $row[self::COLUMN_INDEX_PROMOTION_START];
                $promotionEnd = $row[self::COLUMN_INDEX_PROMOTION_END];

                $this->console->info('Importing link: ' . $linkId);

                $keywords = explode(', ', strtolower($keywords));
                $promotion = $this->getPromotion($promotionStart, $promotionEnd);

                AffiliateLink::updateOrCreate(
                    [
                        'link_id' => $linkId
                    ],[
                        'affiliate_id' => Affiliate::whereName($affiliateName)->get()->first()->id,
                        'keywords' => $keywords !== [''] ? $keywords : null,
                        'type' => AffiliateLinkTypes::getLinkType($linkType),
                        'url' => $url,
                        'image' => $this->getImageProperties($html),
                        'promotion_start' => $promotion['start'],
                        'promotion_end' => $promotion['end'],
                    ]
                );

                $this->importedLinkIds[] = (int) $row[self::COLUMN_INDEX_LINK_ID];
            } catch (\Exception $exception) {
                $this->console->error('Exception: ' . $exception->getMessage());
            }
        }
        $this->deactivateAnyLinksNotInImport();
    }

    private function loadCsv(): array
    {
        return array_map('str_getcsv', file(config('affiliate.csv_file_path')));
    }

    private function getImageProperties(string $html): ?array
    {
        $matches = [];
        if (preg_match(self::IMAGE_PROPERTIES_PATTERN, $html, $matches)) {
            return [
                'url' => $matches[1],
                'width' => $matches[2],
                'height' => $matches[3],
                'shape' => BannerShapes::getShape((int) $matches[2], (int) $matches[3]),
            ];
        }
        return null;
    }

    private function getPromotion(string $start, string $end): array
    {
        if ($end === '') {
            return ['start' => null, 'end' => null];
        }

        if ($start === '') {
            $start = Carbon::now();
        }

        return ['start' => $start, 'end' => $end];
    }

    private function deactivateAnyLinksNotInImport()
    {
        return AffiliateLink::whereNotIn('link_id', $this->importedLinkIds)->update(['is_active' => false]);
    }
}
