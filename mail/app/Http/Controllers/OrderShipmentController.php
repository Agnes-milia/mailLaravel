<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderShipmentController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        // Ship the order...
        Mail::to($request->user())
        /* ->cc($moreUsers)
        ->bcc($evenMoreUsers) */
        ->send(new OrderShipped($order));

    }
}
