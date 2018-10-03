<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TelatPengembalian;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
        Mail::send(['text' => 'welcome'],['name','Harits'], function($message){
            $message->to('rietzche.elucidator@gmail.com', 'To Rietzche')->subject('Test Mail');
            $message->from('rietzche.elucidator@gmail.com', 'Rietzche');
        });
    }
}
