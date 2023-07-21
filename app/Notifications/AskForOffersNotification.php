<?php

namespace App\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Users;
use App\Http\inventory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class AskForOffersNotification extends Notification
{

    use Queueable;
    private $inventory;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($inventory)
    {
        $this->inventory =$inventory;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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

    public function toDatabase($notifiable )
    {
        return [

        //    'data'=>$this->inventory,
            'id'=>$this->inventory,
            'title'=>'this is a new Ask For Quotation/selling please, confirm',
            'user_id'=>Auth::user()->id,
            'user'=>Auth::user()->name,
           // 'Companies_id'=>Auth::user()->id,

           // 'Company_name'=>Auth::user()->Company_name,


        ];

    }
    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */


    /* public function prunable(): Builder
     {
         return static::whereNotNull('read_at')
             ->where('read_at', '<=', now()->subWeek());
     }*/
    /**
 * Prepare the model for pruning.
 *
 * @return void
 */



}
