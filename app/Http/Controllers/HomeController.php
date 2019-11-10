<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use FCM;

class HomeController extends Controller
{
    public function sendNotification()
    {
        $todayReserves = Notification::where('date', date('Y-m-d'))->get(['time', 'date']);
        $u = User::where('id','>', 1)->get(['email', 'name']);

        dd($u);
        // get all rows that the column date = today
        // then check if the current time = time
        // after that send notification

        /*Notification::create([
            'time' => '7:13',
            'date' => '2019-11-12'
        ]);*/

        $todayTimes = Notification::where('date', date('Y-m-d'))->pluck('time');

        $now = Notification::where('id', 6)->pluck('time')[0];

        foreach($todayTimes as $t){

            if ($t == $now) // date("g:iA", strtotime(now()));
            {
                echo $t;
            }

        }

        /*$time = Notification::where('id', 8)->pluck('time')[0];
        $time2 = Notification::where('id', 6)->pluck('time')[0];
        $date = Notification::where('id', 1)->pluck('date')[0];
        $x = $date.' '. $time;

        dd( $time2);

        $timeStamp = Notification::where('id', 1)->pluck('created_at')[0];
        dd( date("g:iA", strtotime($timeStamp)) == date("g:iA", strtotime($time2)));

        if ( date("g:iA", strtotime($time)) == date("g:iA", strtotime($time2)))
        echo "y";
        else echo 'no';

        dd("x");*/


        $noti = new Notification();
        $token = 'coSYTXVthR0:APA91bGfJN1_FViYa2SlUIUbnAdN5nATsiKMdUyfKDtc0cL-abg0NhPSqdUOZg3Ih2v2vx-pbaDFe2Xl0xC9pCv40nHq47eNn7jIen6PMTktMFY3XhkQrCzXeJdyQgL8GzvRRSeUEBP8';
        $noti->toSingleDevice($token, 'title', 'body', null, null);
    }

    public function sendNotificationToMultiple()
    {
        /*$u = User::all();
        dd($u->pluck('device_token')->toArray());*/

        $notification = new Notification();
        $token = '*********************';
        $user = [
            'device_token' => [
                'coSYTXVthR0:APA91bGfJN1_FViYa2SlUIUbnAdN5nATsiKMdUyfKDtc0cL-abg0NhPSqdUOZg3Ih2v2vx-pbaDFe2Xl0xC9pCv40nHq47eNn7jIen6PMTktMFY3XhkQrCzXeJdyQgL8GzvRRSeUEBP8',
                'd5ESUZWqd40:APA91bF33wy7c3AuxFB8qf_T5VN6Lo62du6L9z-eqj-MW_gtRaHdLvxJHyLFnRawAjED11E8IC5oqv5VOLLDBs60eqAbTgPBkByWWf6WMHf7I3jHERSoJs18yf1FDFBkZdWsRAxQAwvd',
                'coSYTXVthR0:APA91bGfJN1_FViYa2SlUIUbnAdN5nATsiKMdUyfKDtc0cL-abg0NhPSqdUOZg3Ih2v2vx-pbaDFe2Xl0xC9pCv40nHq47eNn7jIen6PMTktMFY3XhkQrCzXeJdyQgL8GzvRRSeUEBP8',
                'coSYTXVthR0:APA91bGfJN1_FViYa2SlUIUbnAdN5nATsiKMdUyfKDtc0cL-abg0NhPSqdUOZg3Ih2v2vx-pbaDFe2Xl0xC9pCv40nHq47eNn7jIen6PMTktMFY3XhkQrCzXeJdyQgL8GzvRRSeUEBP8',
            ]
        ];
        $notification->toMultiDevice($user, 'title', 'body', null, null);
    }

    public function fire()
    {
        return view('firebaseview');
    }

    public function sendAcceptNotification()
    {
        /**
         * @param $providerId, $userId || $id of reservation table and then we can get the provider and user from the reservation row.
         *
         * $userToken = User::where('id', $userId)->pluck('device_token')[0];
         * $providerName = User::where('id', $providerId)->pluck('name')[0];
         * $notification = new Notification;
         * $notification ->toSingleDevice($userToken, 'Congratulations!', $providerName . ' has accept your reserve', null, null);
         */
    }

    public function sendDeclineNotification()
    {
        /**
         * @param $providerId, $userId || $id of reservation and then we can get the provider and user from the reservation row.
         *
         * $userToken = User::where('id', $userId)->pluck('device_token')[0];
         * $providerName = User::where('id', $providerId)->pluck('name')[0];
         * $notification = new Notification;
         * $notification ->toSingleDevice($userToken, 'We Apologize!', $providerName . ' has declined your reserve', null, null);
         */
    }

    public function messageToAllUsers()
    {
        /**
         * $tokens = User::where('device_token', '!=', null)->get(['device_token']);
         *
         * $notification->sendTo($tokens, 'Discount!', 'Make your first reservation free!');
         */
    }

}
