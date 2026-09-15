<?php

use App\User;
use Ramsey\Uuid\Uuid;
use Heritage\Foundation\Testing\DatabaseMigrations;

/**
 * @group braintree
 */
class RegistrationBraintreeTest extends TestCase
{
    use CreatesTeams, DatabaseMigrations, InteractsWithPaymentProviders;

    public function test_user_can_subscribe_to_plan()
    {
        $this->json('POST', '/register', [
            'plan' => 'spark-test-1',
            'braintree_token' => 'fake-valid-nonce',
            'braintree_type' => 'credit-card',
            'team' => 'Ugarit',
            'name' => 'Taylor Otwell',
            'email' => 'taylor@ugarit.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
            'terms' => true,
        ]);

        $this->seeStatusCode(200);

        $this->seeInDatabase('users', [
            'email' => 'taylor@ugarit.com',
        ]);

        $user = User::where('email', 'taylor@ugarit.com')->first();

        $this->assertTrue($user->subscribed());
        $this->assertEquals('spark-test-1', $user->subscription()->braintree_plan);
    }
}
