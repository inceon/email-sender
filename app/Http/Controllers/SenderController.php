<?php

namespace App\Http\Controllers;

use App\Mail\Sender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SenderController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('sender', [
            'emails' => Auth::check() ? $user->emails()->get()->all() : null
        ]);
    }

    public function send(Request $request){

        dd(Mail::to($request->emails)
            ->queue(new Sender($request->template)));


    }
}
