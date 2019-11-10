<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAADOvHPf0:APA91bELvRKhsrgC0MIy9x2bFW5Bxk4PNBJeG92ZHvXHopFw2CporLI6iy457oVinKqaMvicd9QPI-8bFWDZiqcLLwzKFr3_k_r4KMzTraQT2hR6kBSNYSaDeTeu2TZ9qMuONIQyvYWI'),
        'sender_id' => env('FCM_SENDER_ID', '55495310845'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
