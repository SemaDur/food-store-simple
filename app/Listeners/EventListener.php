<?php

namespace App\Listeners;

use App\Events\onAddOrderEvent;
use App\Product;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(onAddOrderEvent $event)
    {
        $text = 'New orders from user: ' . Auth::user()->full_name . "\r\n\r\n";
        $cost = 0;


        foreach ($event->products as $id) {
            $text .='Product: ' . Product::find($id)->name .
                '. Costs: ' . (Product::find($id)->price). "\r\n";

            $cost += Product::find($id)->price;
        }
        $text .= "\r\nTotal cost: " . $cost;

        Mail::raw($text, function($message)
        {
            $message->subject('Received a new order!');
            $message->from(Auth::user()->email, Auth::user()->name);
            $message->to(env('MAIL_ADMIN_ADDRESS'));
        });
    }
}
