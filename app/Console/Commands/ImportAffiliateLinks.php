<?php

namespace App\Console\Commands;

use App\Models\AffiliateLink;
use App\Services\Affiliate\ImportPreprocessor;
use App\Services\Affiliate\LinkImporter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class ImportAffiliateLinks extends Command
{

    protected $signature = 'affiliate-links:import {--delete-all}';
    protected $description = 'Import affiliate links from CSV';

    private LinkImporter $importer;
    private ImportPreprocessor $preprocessor;

    public function __construct()
    {
        parent::__construct();
        $this->preprocessor = new ImportPreprocessor($this);
        $this->importer = new LinkImporter($this);
    }

    public function handle(): int
    {
        $this->info('==== Affiliate Link Importer ====');

        if ($this->option('delete-all')) {
            if (App::environment('production') && $this->isAborted()) {
                $this->info('Aborted, phew');
                return 0;
            }
            $this->info('==== Deleting all links ====');
            AffiliateLink::truncate();
        }

        $this->preprocessor->execute();
        $this->importer->execute();

        $this->info('==== Finished ====');
        return 0;
    }

    /**
     * @return bool
     */
    private function isAborted(): bool
    {
        return !$this->confirm('!!!!! You are in production, do you really want to delete all the links? !!!!!');
    }
}
