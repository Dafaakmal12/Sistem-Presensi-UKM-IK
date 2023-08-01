<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Agenda;


class AgendaInfo extends Notification
{
    use Queueable;

    protected $agenda;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Agenda $agenda)
    {
        $this->agenda = $agenda;
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
            ->line('Informasi Agenda')
            ->line('Nama Agenda: ' . $this->agenda->nama)
            ->line('Tanggal: ' . $this->agenda->dateTime->format('d-m-Y'))
            ->line('Waktu presensi: ' . $this->agenda->startTime->format('H:i') . ' - ' . $this->agenda->endTime->format('H:i') . ' WIB')
            ->action('Lihat Agenda', url('/user/agenda'))
            ->line('Terima kasih telah menggunakan aplikasi kami!');
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
            'agenda_id' => $this->agenda->id,
        ];
    }
}
