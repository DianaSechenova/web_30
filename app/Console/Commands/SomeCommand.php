<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SomeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:someCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'all kinds of command';

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
        echo 'Some command test' . PHP_EOL;
        $this->info('This is info command');
        $this->error('This is error command');
        $this->line('This is line command');

    }
}
