<?php

return [
    'csv_filename' => env('AFFILIATE_LINK_CSV_FILENAME', 'links.csv'),
    'csv_file_path' => storage_path('app/affiliate') . '/' . env('AFFILIATE_LINK_CSV_FILENAME', 'links.csv'),
];
