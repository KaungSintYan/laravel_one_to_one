<?php

use App\Address;
use App\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insertuser', function () {
    $user = User::create([
        'name'=>'Ross Geller',
        'email'=> 'ross@gmail.com',
        'password'=>'678910',
    ]);
    return $user;
});

Route::get('/addaddress',function(){
    $user = User::find(1);
    $address = new Address([
        'name'=>'yangon'
    ]);
    $user->addresses()->save($address);
    return 'Address data add successfully!';
});

Route::get('/readaddress',function(){
    $user = User::find(1);
    $getaddress = $user->addresses;
    return $getaddress;
});

Route::get('/updateaddress',function(){
    $user = User::find(1);
    $address = Address::where('user_id',$user->id)->first();
    $address->name = 'Mandalay';
    $address->save();
    return 'Update Successfully!';
});

Route::get('/deleteaddress',function(){
    $user = User::find(1);
    $address = Address::where('user_id',$user->id)->first();
    $address->delete();
    return 'Delete Successfully!';
});
