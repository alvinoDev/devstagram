<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //Change request
        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request, [
            'name' => ['required', 'max:24'],
            'username' => ['required', 'unique:users', 'min:3', 'max:24'],
            'email' => ['required', 'unique:users', 'email', 'max:60'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) //Agregue el Has pero sin eso igual encripta la contraseña, PORQUE?
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        //Another way to autenticate
        //auth()->attempt($request->only('email', 'password'));

        //redirect
        //return redirect()->route('posts.index'); //Ruta original del video, el segundo parametro de auth lo agrege yo tomando encuenta el loginController.
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
