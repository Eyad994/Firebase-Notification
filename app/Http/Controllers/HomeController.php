<?php

namespace App\Http\Controllers;

use App\Notification;
use App\User;
use FCM;

class HomeController extends Controller
{
    public function sendNotification()
    {

        $noti = new Notification();
        $token = 'f2MT6-y3izc:APA91bFTcohWG_Oibf1TM5UGYIUSPICI-unF94tfoP5urOT-cYt4UTgCENeazHeCmhF647SRMaBwKaf5XW77pVYiV4luYP4fQYlIegbn3W0j5WWhkfp6tsPG18ehBjnmneUnJXCMD1ua';
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
                'f2MT6-y3izc:APA91bFTcohWG_Oibf1TM5UGYIUSPICI-unF94tfoP5urOT-cYt4UTgCENeazHeCmhF647SRMaBwKaf5XW77pVYiV4luYP4fQYlIegbn3W0j5WWhkfp6tsPG18ehBjnmneUnJXCMD1ua',
                'f2MT6-y3izc:APA91bFTcohWG_Oibf1TM5UGYIUSPICI-unF94tfoP5urOT-cYt4UTgCENeazHeCmhF647SRMaBwKaf5XW77pVYiV4luYP4fQYlIegbn3W0j5WWhkfp6tsPG18ehBjnmneUnJXCMD1ua',
                'f2MT6-y3izc:APA91bFTcohWG_Oibf1TM5UGYIUSPICI-unF94tfoP5urOT-cYt4UTgCENeazHeCmhF647SRMaBwKaf5XW77pVYiV4luYP4fQYlIegbn3W0j5WWhkfp6tsPG18ehBjnmneUnJXCMD1ua',
                'f2MT6-y3izc:APA91bFTcohWG_Oibf1TM5UGYIUSPICI-unF94tfoP5urOT-cYt4UTgCENeazHeCmhF647SRMaBwKaf5XW77pVYiV4luYP4fQYlIegbn3W0j5WWhkfp6tsPG18ehBjnmneUnJXCMD1ua',
                'f2MT6-y3izc:APA91bFTcohWG_Oibf1TM5UGYIUSPICI-unF94tfoP5urOT-cYt4UTgCENeazHeCmhF647SRMaBwKaf5XW77pVYiV4luYP4fQYlIegbn3W0j5WWhkfp6tsPG18ehBjnmneUnJXCMD1ua',
            ]
        ];
        $notification->toMultiDevice($user, 'title', 'body', null, null);
    }

}
