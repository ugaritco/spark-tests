<?php

namespace App\Http;

use Heritage\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Heritage\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Heritage\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Heritage\Session\Middleware\StartSession::class,
            \Heritage\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Heritage\Routing\Middleware\SubstituteBindings::class,
            \Ugarit\Spark\Http\Middleware\CreateFreshApiToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Heritage\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'dev' => \Ugarit\Spark\Http\Middleware\VerifyUserIsDeveloper::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'hasTeam' => \Ugarit\Spark\Http\Middleware\VerifyUserHasTeam::class,
        'throttle' => \Heritage\Routing\Middleware\ThrottleRequests::class,
        'subscribed' => \Ugarit\Spark\Http\Middleware\VerifyUserIsSubscribed::class,
        'teamSubscribed' => \Ugarit\Spark\Http\Middleware\VerifyTeamIsSubscribed::class,
    ];
}
