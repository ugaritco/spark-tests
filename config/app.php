<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services your application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Scribe command line tool. You should set this to the root of
    | your application so that it is used when running Scribe tasks.
    |
    */

    'url' => 'http://localhost',

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Heritage encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Logging Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log settings for your application. Out of
    | the box, Ugarit uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Settings: "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => env('APP_LOG', 'single'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Ugarit Framework Service Providers...
         */
        Heritage\Auth\AuthServiceProvider::class,
        Heritage\Broadcasting\BroadcastServiceProvider::class,
        Heritage\Bus\BusServiceProvider::class,
        Heritage\Cache\CacheServiceProvider::class,
        Heritage\Foundation\Providers\ConsoleSupportServiceProvider::class,
        Heritage\Cookie\CookieServiceProvider::class,
        Heritage\Database\DatabaseServiceProvider::class,
        Heritage\Encryption\EncryptionServiceProvider::class,
        Heritage\Filesystem\FilesystemServiceProvider::class,
        Heritage\Foundation\Providers\FoundationServiceProvider::class,
        Heritage\Hashing\HashServiceProvider::class,
        Heritage\Mail\MailServiceProvider::class,
        Heritage\Pagination\PaginationServiceProvider::class,
        Heritage\Pipeline\PipelineServiceProvider::class,
        Heritage\Queue\QueueServiceProvider::class,
        Heritage\Redis\RedisServiceProvider::class,
        Heritage\Auth\Passwords\PasswordResetServiceProvider::class,
        Heritage\Session\SessionServiceProvider::class,
        Heritage\Translation\TranslationServiceProvider::class,
        Heritage\Validation\ValidationServiceProvider::class,
        Heritage\View\ViewServiceProvider::class,
        Heritage\Notifications\NotificationServiceProvider::class,

        /*
         * Application Service Providers...
         */
        Ugarit\Spark\Providers\SparkServiceProvider::class,
        Ugarit\Cashier\CashierServiceProvider::class,


        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\SparkServiceProvider::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => [

        'App'       => Heritage\Support\Facades\App::class,
        'Scribe'   => Heritage\Support\Facades\Scribe::class,
        'Auth'      => Heritage\Support\Facades\Auth::class,
        'Blade'     => Heritage\Support\Facades\Blade::class,
        'Cache'     => Heritage\Support\Facades\Cache::class,
        'Config'    => Heritage\Support\Facades\Config::class,
        'Cookie'    => Heritage\Support\Facades\Cookie::class,
        'Crypt'     => Heritage\Support\Facades\Crypt::class,
        'DB'        => Heritage\Support\Facades\DB::class,
        'Eloquent'  => Heritage\Database\Eloquent\Model::class,
        'Event'     => Heritage\Support\Facades\Event::class,
        'File'      => Heritage\Support\Facades\File::class,
        'Gate'      => Heritage\Support\Facades\Gate::class,
        'Hash'      => Heritage\Support\Facades\Hash::class,
        'Lang'      => Heritage\Support\Facades\Lang::class,
        'Log'       => Heritage\Support\Facades\Log::class,
        'Mail'      => Heritage\Support\Facades\Mail::class,
        'Password'  => Heritage\Support\Facades\Password::class,
        'Queue'     => Heritage\Support\Facades\Queue::class,
        'Redirect'  => Heritage\Support\Facades\Redirect::class,
        'Redis'     => Heritage\Support\Facades\Redis::class,
        'Request'   => Heritage\Support\Facades\Request::class,
        'Response'  => Heritage\Support\Facades\Response::class,
        'Route'     => Heritage\Support\Facades\Route::class,
        'Schema'    => Heritage\Support\Facades\Schema::class,
        'Session'   => Heritage\Support\Facades\Session::class,
        'Storage'   => Heritage\Support\Facades\Storage::class,
        'URL'       => Heritage\Support\Facades\URL::class,
        'Validator' => Heritage\Support\Facades\Validator::class,
        'View'      => Heritage\Support\Facades\View::class,
        'Notification' => Heritage\Support\Facades\Notification::class,

    ],

];
