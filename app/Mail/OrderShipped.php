<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@mysite.com')
            ->subject('Order Shipped')
            ->view('emails.order.shipped')
            ->with([
                'orderId' => 1,
                'orderName' => 'Pessoa',
                'orderPrice' => 190.2,
            ])
            ->attachFromStorage('invoices/doc01.jpeg');
    }
}
