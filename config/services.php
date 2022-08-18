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
        'client_id' => '630145361712979', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '1948e7de63739280c04ba5a608b94001', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://127.0.0.1:8000/facebook/callback/'
    ],

    'google' => [
        'client_id' => '170829079985-alk1ksouu129pd8mv5jkca8v2tvvcar0.apps.googleusercontent.com', //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM Google DEVELOPER ACCOUNT
        'redirect' => 'https://127.0.0.1:8000/google/callback/'
    ],

];
