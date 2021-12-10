<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $user = User::all();
        $future_timestamp = strtotime("+4 month");
        $data = date('Y-m-d', $future_timestamp);
        $now = time();
        // foreach ($user as $u) {
        foreach ($user as $u) {
            // $diffInDays = $user->deadline_date->diff(Carbon::now())->days;
            $dataNow = strtotime($now);
            $deadline = strtotime($data);
            $dl = round(($deadline - $dataNow) / 86400);
            $user->notify('Harap lapor ' . $dl . ' ');
            // $user->notify("Your deadline is in $diffInDays day!");
        }


        // }
    }
}
