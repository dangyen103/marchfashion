<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        $order_id = str_pad($this->order->id, 8, '0', STR_PAD_LEFT);
        if ($this->order->cancel_status == 0) {
            if ($this->order->status == 0) {
                return $this->subject("March Fashion đã nhận đơn hàng #$order_id")
                ->from('contact.marchfashion@gmail.com', 'March Fashion')
                ->view('mails.checkout-completed')->with([
                    'order' => $this->order
                ]);
            }
            if ($this->order->status == 1) {
                return $this->subject("Xác nhận đơn hàng #$order_id")
                ->from('contact.marchfashion@gmail.com', 'March Fashion')
                ->view('mails.confirm-order')->with([
                    'order' => $this->order
                ]);
            }
            elseif ($this->order->status == 2) {
                return $this->subject("Đơn hàng #$order_id đang trên đường vận chuyển")
                ->from('contact.marchfashion@gmail.com', 'March Fashion')
                ->view('mails.packing-completed')->with([
                    'order' => $this->order
                ]);
            }
            elseif ($this->order->status == 3) {
                return $this->subject("Đơn hàng #$order_id đã được giao thành công")
                ->from('contact.marchfashion@gmail.com', 'March Fashion')
                ->view('mails.shipping-completed')->with([
                    'order' => $this->order
                ]);
            }
        }
        else {
            return $this->subject("Đơn hàng #$order_id đã bị hủy trên hệ thống")
                ->from('contact.marchfashion@gmail.com', 'March Fashion')
                ->view('mails.order-canceled')->with([
                    'order' => $this->order
                ]);
        }
    }
}
