<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class BuildAccount extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'account:new {email} {password} {name=Anon}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build an account because public registration is disabled.';

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
     * @return mixed
     */
    public function handle()
    {
        User::create([
            'name'     => $this->argument('name'),
            'email'    => $this->argument('email'),
            'password' => bcrypt($this->argument('password')),
        ]);

        $this->info('User created.');
    }
}
