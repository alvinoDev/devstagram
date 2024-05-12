<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('changePassword.index');
    }

    public function store(Request $request) {

        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with('message-changepass', 'Incorrect credentials.');
        } else {
            $user = User::find(auth()->user()->id);

            $user->password = Hash::make($request->password) ?? auth()->user()->password;
            $user->save();
        }

        return redirect()->route('posts.index', $user->username);
    }
}
