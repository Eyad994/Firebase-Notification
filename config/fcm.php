<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAADOvHPf0:APA91bHf7Qmbj0UMxFSCJ3mip_3fTLEdDsJaI2UCcYQwd4lW8NByeNtwUY77swUquvOGZviAx7UulsQ_xcJmkpilNvHDMoZa_WYJnT1ECaqPtfuJbRY4IsWV4KBZBY1k2zur8WSD2Q3Y'),
        'sender_id' => env('FCM_SENDER_ID', '55495310845'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
