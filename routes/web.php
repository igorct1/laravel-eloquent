<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/select', function(){ 
    // $users = User::all(); -- retornar todos os usuarios
    // $users = User::where('id', 1)->get(); -- retornar usuario cujo id é = 1
    // $users = User::where('id', 10)->first();
    // $user = User::first(); -- primeiro usuario do banco
    // $user = User::find(10); -- usuario com id = 10
    // $user = User::findOrFail( request('id') ); -- conceito de API pegando id dinamico via url
    // $user = User::where('name', request('name'))->firstOrFail();
    // $user = User::firstWhere('name', request('name'));
    // return $user;
});


Route::get('/', function () {
    return view('welcome');
});
