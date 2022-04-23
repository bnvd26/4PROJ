<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CsvReader extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csv-reader:{type} {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Extract/Read csv file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if($this->argument('type') == 'export-column') {
            dd('ok');
        }

        return 0;
    }
}
