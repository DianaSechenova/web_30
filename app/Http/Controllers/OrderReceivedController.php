<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderReceivedController extends Controller
{
    public function __invoke($id){
        $order = Order::find($id);
        if (\Auth::user()->email == $order->email){
            return view('order_received', ['order'=>$order]);

        }else{
            return view('404');
        }
    }
}
