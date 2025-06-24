<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;

class OrderStatusUpdate extends Notification
{
    use Queueable;

    public $orderNumber;
    public $status;
    public $customerName;
    public $orderItems;

    /**
     * Create a new notification instance.
     */
    public function __construct($orderNumber, $status, $customerName, $orderItems)
    {
        $this->orderNumber = $orderNumber;
        $this->status = $status;
        $this->customerName = $customerName;
        $this->orderItems = $orderItems;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $statusText = [
            'in progress' => 'Em Processamento',
            'On the way' => 'A Caminho',
            'Delivered' => 'Entregue'
        ];

        $subject = 'Atualização do Pedido #' . $this->orderNumber . ' - ' . ($statusText[$this->status] ?? $this->status);

        return (new MailMessage)
            ->subject($subject)
            ->view('emails.order-status-update', [
                'orderNumber' => $this->orderNumber,
                'status' => $this->status,
                'customerName' => $this->customerName,
                'orderItems' => $this->orderItems
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'order_number' => $this->orderNumber,
            'status' => $this->status,
            'customer_name' => $this->customerName,
        ];
    }
} 