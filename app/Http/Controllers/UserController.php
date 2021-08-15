<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Notifications\WelcomeEmailNotification;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$attributes = request()->validate([
			'login' => ['required', 'min:3', 'max:255', Rule::unique('users', 'login')],
			'email' => ['required', 'email', Rule::unique('users', 'email')],
			'password' => ['required', 'confirmed', Password::defaults(), 'same:password_confirmation'],
			'nickname' => ['required', 'min:3', 'max:255'],
			'phoneNumber' => ['required', 'numeric', Rule::unique('users', 'phoneNumber')]
		]);

		$remember_me = isset($request->remember_me) ? true : false;

        $user = User::create($attributes);

		auth()->login($user, $remember_me);

        $user->notify(new WelcomeEmailNotification);

		session()->flash('flashMessage', 'Your account has been created');

		return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('users.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit', ['user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		request()->validate([
			'login' => ['required', 'min:3', 'max:255'],
			'email' => ['required', 'email'],
			'nickname' => ['required', 'min:3', 'max:255'],
			'phoneNumber' => ['required', 'numeric'],
		]);

		$user = User::find($id);
		$user->login = request()->login;
		$user->email = request()->email;
		$user->nickname = request()->nickname;
		$user->phoneNumber = request()->phoneNumber;
		$user->is_admin = request()->is_admin ? true : false;
		$user->save();

		return redirect('/users/manager');
    }

	/**
	 * Ask for confirmation before delete
	 */
	public function delete($id) {
        return view('users.delete', ['user' => User::find($id)]);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		if ($user = User::findOrFail($id)) {
			session()->flash('flashMessage', $user->login.' has been erased');
			$user->delete();
		} else {
			session()->flash('flashMessage', 'User unknown');
		}
   	    	return redirect(route('users.manager'));
    }
}
