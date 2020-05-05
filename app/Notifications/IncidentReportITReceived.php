<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\IncidentReport;
use Illuminate\Support\HtmlString;
use App\ITAsset;
use App\Staff;

class IncidentReportITReceived extends Notification
{
    use Queueable;

    protected $incidentReport;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(IncidentReport $incidentReport)
    {
        $this->incidentReport = $incidentReport;
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
        $ticket_no = $this->incidentReport->ticket_no;
        $incident_category = $this->incidentReport->incident_category;
        $root_cause = $this->incidentReport->root_cause;
        $staff = Staff::find($this->incidentReport->staff_id);
        $handle_by = Staff::find($this->incidentReport->handle_by);
        $computer = ITAsset::find($this->incidentReport->asset_id);
        return (new MailMessage)
            ->greeting("Case #{$ticket_no} - {$incident_category}")
            ->line("Hello {$handle_by->full_name}, ")
            ->line("You are receiving the report and the ticket no are #{$ticket_no} for your references.")
            ->line(new HtmlString('<strong>Details:<strong>'))
            ->line("------------------------------------")
            ->line(new HtmlString("Ticket No : <strong>{$ticket_no}<strong>"))
            ->line(new HtmlString("Computer Name : <strong>{$computer->computer_name}<strong>"))
            ->line(new HtmlString("Category : <strong>{$incident_category}<strong>"))
            ->line(new HtmlString("Root Cause: <strong>{$root_cause}<strong>"))
            ->line(new HtmlString("Issue By : <strong>{$staff->full_name}<strong>"))
            ->line("------------------------------------")
            ->line('Please kindly update the status if the report already fixed. Thank you');
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
