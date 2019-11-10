<?php

namespace App\Console\Commands;

use App\Notification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

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
     * @return mixed
     */
    public function handle()
    {
        \Log::info("Cron time is: ".date("g:iA", strtotime(now())));

        $todayTimes = Notification::where('date', date('Y-m-d'))->pluck('time');
        $noti = new Notification();

        foreach ($todayTimes as $time){
            Log::notice("Time is: ". $time);
            /*$token = 'coSYTXVthR0:APA91bGfJN1_FViYa2SlUIUbnAdN5nATsiKMdUyfKDtc0cL-abg0NhPSqdUOZg3Ih2v2vx-pbaDFe2Xl0xC9pCv40nHq47eNn7jIen6PMTktMFY3XhkQrCzXeJdyQgL8GzvRRSeUEBP8';
            $noti->toSingleDevice($token, 'Your reserve is almost ', 'body', null, null);*/
            if (date("g:iA", strtotime($time)) == date("g:iA", strtotime(now()))){
                \Log::info("Time true when : ".$time);
            }
        }
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */

        $this->info('Demo:Cron Cummand Run successfully!');
    }
}
