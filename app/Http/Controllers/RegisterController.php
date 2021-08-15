<?php

/*app/Http/Controllers/RegisterController.php*/

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create'); // send to resources/views/register/create.blade.php
    }

    public function store()
    {
        /*return request()->all(); // Test*/

        $attributes = request()->validate([ // Create the user
            'login' => 'required|unique:users,login|min:3|max:255',
            'nickname' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:3|max:255',
            'phone' => 'required|unique:users,phone|',
        ]);

        // dd('success validation succeeded');
        // Dump and Die: Permet d'afficher du texte à l'écran et de terminer l'exécution du programme.
    
        $attributes['password'] = bcrypt($attributes['password']); //Hash password

        User::create($attributes);

        return redirect('/');
    
    }
}
