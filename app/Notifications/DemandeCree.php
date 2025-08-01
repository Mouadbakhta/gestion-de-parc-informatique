<?php
namespace App\Notifications;

use App\Models\Demande;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DemandeCree extends Notification
{
    use Queueable;

    public $demande;

    public function __construct(Demande $demande)
    {
        $this->demande = $demande;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle Demande d\'Équipement')
            ->line('Une nouvelle demande a été soumise.')
            ->line('Par : ' . $this->demande->user->name)
            ->line('Équipement : ' . $this->demande->equipement->nom)
            ->line('Motif : ' . $this->demande->motif)
            ->action('Voir les demandes', url('/admin/demandes'))
            ->line('Merci.');
    }
}
?>