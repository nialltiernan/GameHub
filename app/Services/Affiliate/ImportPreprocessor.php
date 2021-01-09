<?php
declare(strict_types=1);

namespace App\Services\Affiliate;

use App\Console\Commands\ImportAffiliateLinks as Console;
use Illuminate\Support\Facades\Storage;

class ImportPreprocessor
{
    private const NEWLINES_IN_MIDDLE_OF_LINE_PATTERN = "((?<!\"No\"|\"Yes\"|\"MOBILE OPTIMIZED\")\n)";

    private Console $console;

    public function __construct(Console $console)
    {
        $this->console = $console;
    }

    public function execute()
    {
        $this->console->info('==== Preprocessing CSV ====');

        $contents = file_get_contents(config('affiliate.csv_file_path'));
        $contents = preg_replace(self::NEWLINES_IN_MIDDLE_OF_LINE_PATTERN, '', $contents);

        Storage::put('affiliate/' . config('affiliate.csv_filename'), $contents);
    }
}
