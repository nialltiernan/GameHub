<?php
declare(strict_types=1);

namespace App\Services\Affiliate;

class CsvLoader
{
    public static function execute(): array
    {
        return array_map('str_getcsv', file(config('affiliate.csv_file_path')));
    }
}
