<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SenderController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('sender', [
            'emails' => Auth::check() ? $user->emails()->get()->all() : null
        ]);
    }

    public function send(Request $request){
        dd($request->all());

        return true;
    }
}
