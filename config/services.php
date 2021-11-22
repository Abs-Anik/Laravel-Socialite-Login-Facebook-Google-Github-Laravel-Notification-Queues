<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => 'your facebook client_id',
        'client_secret' => 'your facebook client_secret',
        'redirect' => 'http://localhost:82/ajaxBlog/facebook/callback',
    ],

    'google' => [
        'client_id' => 'your google client_id',
        'client_secret' => 'your google client_secret',
        'redirect' => 'http://localhost:82/ajaxBlog/google/callback',
    ],

    'github' => [
        'client_id' => 'your github client_id',
        'client_secret' => 'your github client_secret',
        'redirect' => 'http://localhost:82/ajaxBlog/github/callback',
    ],

];
