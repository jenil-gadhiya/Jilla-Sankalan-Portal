<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\EmailTemplate;
use Illuminate\Support\HtmlString;

class PasswordReset extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     public function __construct($data)
     {
         $this->token=$data['token'];
         $this->email=$data['email'];
         $this->first_name=$data['first_name'];
         $this->user_name=$data['user_name'];
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
        $email_subject = 'Account created on {SITE_NAME}';
        $email_body = '<table> <tbody> <tr> <td colspan="">Hello {FIRST_NAME},<br /> <br /> Your account is created on {SITE_NAME}, you can set your password using below link.</td> </tr>  <tr> <td>&nbsp;</td> </tr> <tr> <td>Please <a href="{SITE_LOGIN_URL}">click here</a> to set your password.</td> </tr> </tbody> </table>';
        
    //    $email_format= EmailTemplate::find(1);
       $link = url( "/password/reset/" . $this->token."?email=".$this->email);
       $replacement = array(
        '{FIRST_NAME}' => $this->first_name,
        '{USER_NAME}' => $this->user_name,
        '{SITE_LOGIN_URL}' =>$link ,
        '{SITE_NAME}' =>config('Site.site_name'),
        '{SITE_URL}' => url('/'),
        );
        $email_body = str_replace(array_keys($replacement), array_values($replacement),$email_body);
        $email_subject = str_replace(array_keys($replacement), array_values($replacement),$email_subject);
        // dd($email_body);
        return (new MailMessage)
                ->subject($email_subject)
                ->line(new HtmlString($email_body));
                //->action('Set Password', $link);
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