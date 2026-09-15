<?php

use App\User;
use App\Team;
use Ugarit\Spark\Spark;
use Heritage\Contracts\Auth\Authenticatable;
use Heritage\Foundation\Testing\DatabaseMigrations;

/**
 * @group braintree
 */
class UpdateBraintreeTeamPaymentMethodTest extends TestCase
{
    use CreatesTeams, DatabaseMigrations, InteractsWithPaymentProviders;

    public function test_payment_method_for_stripe_can_be_updated()
    {
        $user = factory(User::class)->create();
        $team = $this->createTeam($user);

        $team->newSubscription('default', 'spark-test-1')->create('fake-valid-nonce');

        $this->actingAs($user)
                ->json('PUT', '/settings/teams/'.$team->id.'/payment-method', [
                    'braintree_token' => 'fake-valid-nonce',
                    'braintree_type' => 'credit-card',
                ]);

        $this->seeStatusCode(200);
    }


    public function test_braintree_token_is_required_to_update_payment_method()
    {
        $user = factory(User::class)->create();
        $team = $this->createTeam($user);

        $this->actingAs($user)
                ->json('PUT', '/settings/teams/'.$team->id.'/payment-method', [
                    'braintree_token' => '',
                    'braintree_type' => 'credit-card',
                ]);

        $this->seeStatusCode(422);
    }


    public function test_braintree_type_is_required_to_update_payment_method()
    {
        $user = factory(User::class)->create();
        $team = $this->createTeam($user);

        $this->actingAs($user)
                ->json('PUT', '/settings/teams/'.$team->id.'/payment-method', [
                    'braintree_token' => 'fake-valid-nonce',
                    'braintree_type' => '',
                ]);

        $this->seeStatusCode(422);
    }
}
