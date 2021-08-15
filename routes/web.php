<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Models\Ad;
use App\Models\DisplayAds;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ForgotPassword;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::view('/', 'homepage', [
	'ads' => Ad::with('category', 'user')->paginate(10),
	'categories' => Category::all(), 
])->name('home');

Route::get('/test', function() {
	$ads = Ad::with('category')->paginate(10);
	foreach($ads as $ad)
		ddd($ad->category->name);

	
});


Route::prefix('users')->group(function() {

	Route::get('/signin', [SessionsController::class, 'create'])
		->name('signin')
		->middleware('guest');

	Route::post('/signin', [SessionsController::class, 'store'])
		->name('signin')
		->middleware('guest');

	Route::post('/logout', [SessionsController::class, 'destroy'])
		->name('logout')
		->middleware('auth');

	Route::view('/account', 'users.show')->name('account')->middleware('auth');

	Route::post('{id}', [UserController::class, 'update']);

	Route::get('/manager', function() {
		$headers = [
			'Id',
			'Login',
			'Nickname',
			'Admin'
		];
		$users= User::all('id', 'login', 'nickname', 'is_admin');

		return view('users.manager', [
			'headers' => $headers,
			'users'	  => $users
		]);
	})->name('users.manager')->middleware('isAdmin');

	Route::get('{id}/delete', [UserController::class, 'delete']);

});

Route::get('/categories/manager', function() {
	$headers = [
		'Id',
		'Name',
		'Description'
	];
	$categories= Category::all('id', 'name', 'description');

	return view('categories.manager', [
		'headers' 	=> $headers,
		'rows'		=> $categories
	]);
})->name('categories.manager')->middleware('isAdmin');

Route::get('/ads/manager', function() {
	$headers = [
		'Id',
		'Title',
		'Price'
	];
	$ads= Ad::all('id', 'title', 'price');

	return view('ads.manager', [
		'headers' 	=> $headers,
		'ads'		=> $ads
	]);
})->name('ads.manager')->middleware('isAdmin');

Route::resource('categories',CategoriesController::class);
Route::resource('ads',AdsController::class);
Route::resource('users',UserController::class);
Route::resource('search',SearchController::class);
Route::get('/forget_password',[ForgotPassword::class,'getForgetpassword']);
Route::post('/reset_password',[ForgotPassword::class,'postForgetpassword']);
Route::get('/get_password/{token}',[ForgotPassword::class,'getResetPassword'])->name('getResetPassword');
Route::post('/get_password/{token}',[ForgotPassword::class,'getNewPassword'])->name('getNewPassword');