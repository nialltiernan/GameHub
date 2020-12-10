<?php
declare(strict_types=1);

namespace App\Services\Affiliate;

class FranchiseLinkRetriever
{

    private const CSV_COLUMN_INDEX_NAME = 3;
    private const CSV_COLUMN_INDEX_LINK = 11;

    public function execute(string $franchise): ?string
    {
        $mapping = $this->getNameToLinkMappingFromCsv();
        $mappingKeys = array_keys($mapping);

        return $this->getLinkForFranchise($mapping, $mappingKeys, $franchise);
    }

    private function getNameToLinkMappingFromCsv(): array
    {
        $csv = array_map('str_getcsv', file(config('affiliate.link_csv_path')));

        $mapping = [];
        foreach ($csv as $data) {
            $mapping[$data[self::CSV_COLUMN_INDEX_NAME]] = $data[self::CSV_COLUMN_INDEX_LINK];
        }

        return $mapping;
    }

    private function getLinkForFranchise($mapping, $mappingKeys, $brand): ?string
    {
        foreach ($mappingKeys as $key) {
            if ($this->doesKeyContainTitle(strtolower($key), $brand)) {
                return $mapping[$key];
            }
        }
        return null;
    }

    private function doesKeyContainTitle($key, $title): bool
    {
        return strpos($key, $title) !== false;
    }
}
