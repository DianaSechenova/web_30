<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSubscriptionController extends Controller
{
    public function __invoke(Request $request){
     $mail = new \App\Mail\UserSubscription($request>info('mail'));
     SendEmail::dispatch($mail)->onQueue('emails');
    }
}
