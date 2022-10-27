<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewAuthorPost extends Notification
{
    use Queueable;

    public $post_data;
    

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post_data)
    {
        $this->post_data = $post_data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello, Admin!')
            ->subject('Submit New Post')
            ->line('New Post By: '.$this->post_data->posts_author)
            ->line('Post Title: '.$this->post_data->posts_title)
            ->line('Post Description: '.$this->post_data->posts_description)
            ->action('Notification Action', url('/admin/dashboard'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
