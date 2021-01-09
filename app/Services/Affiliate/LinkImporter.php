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
    private const COLUMN_INDEX_LINK_NAME = 3;
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
                $linkName = $row[self::COLUMN_INDEX_LINK_NAME];
                $keywords = $row[self::COLUMN_INDEX_KEYWORDS];
                $linkType = $row[self::COLUMN_INDEX_LINK_TYPE];
                $html = $row[self::COLUMN_INDEX_HTML];
                $url = $row[self::COLUMN_INDEX_URL];
                $promotionStart = $row[self::COLUMN_INDEX_PROMOTION_START];
                $promotionEnd = $row[self::COLUMN_INDEX_PROMOTION_END];

                $this->console->info('Importing link: ' . $linkId);

                AffiliateLink::create([
                    'link_id' => $linkId,
                    'affiliate_id' => Affiliate::whereName($affiliateName)->get()->first()->id,
                    'name' => $linkName,
                    'keywords' => explode(', ', $keywords),
                    'type' => AffiliateLinkTypes::getLinkType($linkType),
                    'url' => $url,
                    'image' => $this->getImageProperties($html),
                    'promotion' => $this->getPromotion($promotionStart, $promotionEnd),
                ]);

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

    /**
     * @param string $html
     * @return array|null
     * @throws \App\Exceptions\CouldNotGetShapeException
     */
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

    private function getPromotion(string $startDateString, string $endDateString): ?array
    {
        if (empty($endDateString)) {
            return null;
        }

        $start = $startDateString ? Carbon::createFromFormat('d-M-Y', $startDateString) : Carbon::now();
        $end = Carbon::createFromFormat('d-M-Y', $endDateString);
        return ['start' => $start->format('Y-m-d H:i:s'), 'end' => $end->format('Y-m-d H:i:s')];
    }

    private function deactivateAnyLinksNotInImport()
    {
        return AffiliateLink::whereNotIn('link_id', $this->importedLinkIds)->update(['is_active' => false]);
    }
}
