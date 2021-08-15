<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
	public function destroy() {
		auth()->logout();

		return redirect('/')->with('flashMessage', 'Goodbye');
	}

	public function create() {
		return view('users.signin');
	}

	public function store() {

		$attributes = request()->validate([
			'email' => ['required', 'email', Rule::exists('users', 'email')],
			'password' => ['required']
		]);

		$remember_me = isset(request()->remember_me) && request()->remember_me == "on" ? true : false;

		if ( ! auth()->attempt($attributes, false) ) {
			throw ValidationException::withMessages([
				'email' => 'Your provided credentials does not exists'
			]);
		}


		session()->regenerate();

		return redirect('/')->with('flashMessage', 'Welcome back '. auth()->user()->login);
	}
}
