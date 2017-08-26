<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    function index() {
        $user = Auth::user();
        return view('index', [
            'user' => $user,
            'emails' => Auth::check() ? $user->emails()->get()->all() : null
        ]);
    }
}