<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Models\User;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order, User $user, $discount, $shippingCost)
    {
        $this->order = $order;
        $this->user = $user;
        $this->discount = $discount;
        $this->shippingCost = $shippingCost; 
    }

    public function build()
    {
        return $this->subject('Order Confirmation - Astonic Sports')
                    ->view('emails.order-confirmation')
                    ->with([
                        'order' => $this->order,
                        'user' => $this->user,
                        'discount' => $this->discount, 
                        'shippingCost' => $this->shippingCost,
                    ]);
    }

}
