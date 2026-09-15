<?php

use App\User;
use Heritage\Notifications\Notification;
use Ugarit\Spark\Notifications\SparkChannel;
use Ugarit\Spark\Notifications\SparkNotification;
use Heritage\Foundation\Testing\DatabaseMigrations;

class NotificationsTest extends TestCase
{
    use DatabaseMigrations;

    public function test_notification_can_be_created()
    {
        $from = factory(User::class)->create();
        $user = factory(User::class)->create();

        $message = (new SparkNotification)
            ->action('Click', 'url.com')
            ->icon('fa-icon')
            ->from($from)
            ->body('Hello');

        $user->notify(new TestNotificationStub($message));

        $this->seeInDatabase('notifications', [
            'user_id' => $user->id,
            'created_by' => $from->id,
            'icon' => 'fa-icon',
            'body' => 'Hello',
            'action_text' => 'Click',
            'action_url' => 'url.com',
        ]);
    }

    public function test_notification_can_be_created_with_body_only()
    {
        $user = factory(User::class)->create();

        $message = new SparkNotification('Hello');

        $user->notify(new TestNotificationStub($message));

        $this->seeInDatabase('notifications', [
            'user_id' => $user->id,
            'created_by' => null,
            'icon' => 'fa-bell',
            'body' => 'Hello',
            'action_text' => null,
            'action_url' => null,
        ]);
    }
}

class TestNotificationStub extends Notification
{
    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return [SparkChannel::class];
    }

    public function toSpark($notifiable)
    {
        return $this->message;
    }
}
