<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::all();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function edit($id) {

        $user = User::find($id);

        return view('admin.user_edit', [
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/admin/users');
    }
}
