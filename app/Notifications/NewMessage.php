<?php

namespace App\Notifications;

use App\Channels\Messages\TextMessage;
use App\Channels\SmsChannel;
use App\chat ;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMessage extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     * @param Message $message
     */
    public function __construct(User $user, Message $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', SmsChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("✅پاسخ به پیام شما در باهم")
            ->greeting("سلام {$this->user->last_name}!")
            ->line("برای شما یک پیام جدید در باهم ارسال شده است . لطفا وارد سایت شده و پیام خود را مشاهده کنید")
            ->action('مشاهده درخواست', route("dashboard.customer.support"));
    }

    /**
     * Get the text representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return TextMessage
     */
    public function toText($notifiable)
    {
        return (new TextMessage())
            ->line("سلام")
            ->line("پاسخ پیام شما در پلتفرم باهم داده شد");
    }
}
