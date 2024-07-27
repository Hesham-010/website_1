<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TransferDataCommand extends Command
{
    protected $signature = 'data:transfer {source} {destination}';
    protected $description = 'Transfer data from one database to another';

    public function handle()
    {
        $source = $this->argument('source');
        $destination = $this->argument('destination');

        $this->info("Transferring data from {$source} to {$destination}");

        $data = DB::connection($source)->table('users')->get();

        foreach ($data as $record) {
            DB::connection($destination)->table('users')->insert((array) $record);
        }
        
        DB::connection($source)->table('users')->delete();

        $this->info('Data transfer completed successfully');
    }
}