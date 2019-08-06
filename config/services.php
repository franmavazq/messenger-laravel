<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'firebase' => [
        'api_key' => 'AIzaSyCTqclB-lNgl0tLqTNZXFWba-RM669b2B4', //  used for JS integration
        'auth_domain' => 'turistainfo-77007.firebaseapp.com', // used for JS integration
        'database_url' => 'https://turistainfo-77007.firebaseio.com',
        'secret' => 'cIfJ1qTuheuUaYbG6ZJpZB1RmrATenUIbzRMzWtO',
        'storage_bucket' => 'turistainfo-77007.appspot.com', // used for JS integration
    ],

];
