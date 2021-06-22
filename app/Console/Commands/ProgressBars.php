<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProgressBars extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:progressBars';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command executes progress bar';

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
        $users = [['Name'=>'Diana', 'Email'=>'Some@mail.com'],
            ['Name'=>'Diana', 'Email'=>'Alex@mail.com'],
            ['Name'=>'Diana', 'Email'=>'Alex@mail.com'],
            ['Name'=>'Diana', 'Email'=>'Alex@mail.com'],
            ['Name'=>'Diana', 'Email'=>'Alex@mail.com'],
            ['Name'=>'Diana', 'Email'=>'Alex@mail.com'],
            ['Name'=>'Diana', 'Email'=>'Alex@mail.com']];

        $bar = $this->output->createProgressBar(count($users));

        $bar->start();

        foreach ($users as $user) {

            $bar->advance();
            sleep(1);
        }

        $bar->finish();
    }
}
