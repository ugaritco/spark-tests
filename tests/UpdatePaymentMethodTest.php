<?php

use App\User;
use Ugarit\Spark\Spark;
use Heritage\Contracts\Auth\Authenticatable;
use Ugarit\Spark\Services\Stripe as StripeService;
use Heritage\Foundation\Testing\DatabaseMigrations;

/**
 * @group stripe
 */
class UpdatePaymentMethodTest extends TestCase
{
    use DatabaseMigrations, InteractsWithPaymentProviders;

    public function test_payment_method_for_stripe_can_be_updated()
    {
        $user = $this->createSubscribedUser('spark-test-1');

        $this->actingAs($user)
                ->json('PUT', '/settings/payment-method', [
                    'stripe_token' => $this->getStripeToken(),
                ]);

        $this->seeStatusCode(200);
    }


    public function test_stripe_token_is_required_to_update_payment_method()
    {
        $user = Mockery::mock(Authenticatable::class);

        $user->shouldReceive('updateCard')->never();

        $this->actingAs($user)
                ->json('PUT', '/settings/payment-method', [
                    'stripe_token' => '',
                ]);

        $this->seeStatusCode(422);
    }
}
