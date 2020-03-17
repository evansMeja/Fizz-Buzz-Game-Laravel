<?php
use Illuminate\Support\Facades\Route;
Use App\User;
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

Route::get('/logout', function () {
    Auth::logout();
	return redirect('/login');
});

Route::get('/rules', function () {
    return view('pages.rules');
	
});

Route::get('/play', function () {
	$user = User::find(auth()->user()->id);
    return view('pages.play')->with('user',$user);
});

Route::get('/resetscores', function(){
	$user = User::find(auth()->user()->id);
	$user->user_high_score = 0;
	$user->save();
	return redirect('/play')->with('success', 'Scores were Reset Game Reset');
});

Route::get('/updatescores/{id}/{score}', function($id, $score){
	$user = User::find(auth()->user()->id);
	if($user->user_high_score < $score){
		$user->user_high_score = $score;
		$user->save();
		return redirect('/play')->with('success', 'New Target Achieved');
	}else{
		return redirect('/play')->with('success', 'Game Over');
	}
});

Route::get('/bestplayers', function(){
    $users = User::all();
	return view('pages.bestplayers')->with('users',$users);
});


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');