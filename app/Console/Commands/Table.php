<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Table extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command executes table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $headers= ['Name','Number'];
        $users = [
            ['Name'=>'Diana', 'Number'=>'+380935225849'],
            ['Name'=>'Alex', 'Number'=>'+380976545399'],
            ['Name'=>'Oleg', 'Number'=>'+380976545399']
        ];
        $this->table($headers, $users);
    }
}
