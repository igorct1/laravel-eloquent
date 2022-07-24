<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/where', function (User $user) {
    // User $user = $user = new User;
    // $users = $user->get(); -- todos usuarios
    // $users = $user->where('email', 'schamberger.jewell@example.org')->first();
    $filter = 'a';
    // $users = $user->where('name', 'LIKE', "%{$filter}%")->get();
    // $users = $user->where('name', 'LIKE', "%{$filter}%")
    //                 ->orWhere('email', 'howell.strosin@example.net')
    //                 ->get();
    $users = $user->where('name', 'LIKE', "%{$filter}%")
                    ->orWhere( function ($query) use ($filter){
                        $query->where('name', '<>', 'Carlos');
                        $query->where('name', '=', $filter);
                    })
                    ->toSql();
    return $users;
});

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
