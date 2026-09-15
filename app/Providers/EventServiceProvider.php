<?php

namespace App\Providers;

use Heritage\Contracts\Events\Dispatcher as DispatcherContract;
use Heritage\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // User Related Events...
        'Ugarit\Spark\Events\Auth\UserRegistered' => [
            'Ugarit\Spark\Listeners\Subscription\CreateTrialEndingNotification',
        ],

        'Ugarit\Spark\Events\Subscription\UserSubscribed' => [
            'Ugarit\Spark\Listeners\Subscription\UpdateActiveSubscription',
            'Ugarit\Spark\Listeners\Subscription\UpdateTrialEndingDate',
        ],

        'Ugarit\Spark\Events\Profile\ContactInformationUpdated' => [
            'Ugarit\Spark\Listeners\Profile\UpdateContactInformationOnStripe',
        ],

        'Ugarit\Spark\Events\PaymentMethod\VatIdUpdated' => [
            'Ugarit\Spark\Listeners\Subscription\UpdateTaxPercentageOnStripe',
        ],

        'Ugarit\Spark\Events\PaymentMethod\BillingAddressUpdated' => [
            'Ugarit\Spark\Listeners\Subscription\UpdateTaxPercentageOnStripe',
        ],

        'Ugarit\Spark\Events\Subscription\SubscriptionUpdated' => [
            'Ugarit\Spark\Listeners\Subscription\UpdateActiveSubscription',
        ],

        'Ugarit\Spark\Events\Subscription\SubscriptionCancelled' => [
            'Ugarit\Spark\Listeners\Subscription\UpdateActiveSubscription',
        ],

        // Team Related Events...
        'Ugarit\Spark\Events\Teams\TeamCreated' => [
            'Ugarit\Spark\Listeners\Teams\Subscription\CreateTrialEndingNotification',
        ],

        'Ugarit\Spark\Events\Teams\Subscription\TeamSubscribed' => [
            'Ugarit\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
            'Ugarit\Spark\Listeners\Teams\Subscription\UpdateTrialEndingDate',
        ],

        'Ugarit\Spark\Events\Teams\Subscription\SubscriptionUpdated' => [
            'Ugarit\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
        ],

        'Ugarit\Spark\Events\Teams\Subscription\SubscriptionCancelled' => [
            'Ugarit\Spark\Listeners\Teams\Subscription\UpdateActiveSubscription',
        ],

        'Ugarit\Spark\Events\Teams\UserInvitedToTeam' => [
            'Ugarit\Spark\Listeners\Teams\CreateInvitationNotification',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Heritage\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
