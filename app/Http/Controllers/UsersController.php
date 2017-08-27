<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    protected function validator(array $data, $user)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'roles' => 'required'
        ]);
    }

    public function index() {
        $users = User::all();

        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function edit($id) {

        $user = User::find($id);
        $roles = Role::all();

        return view('admin.user_edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, $user) {

        $user = User::find($user);

        $this->validator($request->all(), $user)->validate();

        $user->update($request->all());
        $user->save();

        // remove all role and set new
        $user->roles()->detach();

        foreach($request->roles as $role) {
            $user->roles()->attach(
                    Role::where('name', $role)->first()
                );
        }

        return redirect('/admin/users');

    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/admin/users');
    }
}
