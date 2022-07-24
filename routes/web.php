<?php

use App\Models\{
    User,
    Post
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/insert2', function (Post $post, Request $request) {
    $post = Post::create($request->all());
    $posts = $post->get();
    return $posts;
});
Route::get('/insert', function (Post $post) {
    $post->user_id = 1;
    $post->title = 'titulo';
    $post->body = 'body';
    $post->date = now();
    $post->save();
    $posts = $post->get();

    return $posts;
});


Route::get('/orderby', function (User $user) {
    // ordenar pelo id de forma default - menor pro maior
    // $users = $user->orderBy('id')->get();
    //decrescente
    // $users = $user->orderBy('id', 'desc')->get();

    $users = $user->orderBy('name', 'asc')->get();
    return $users;
});
Route::get('/pagination', function (User $user) {
    $filter = request('filter');
    $totalPage = request('paginate', 10);
    $users = $user->where('name', 'LIKE', "%{$filter}%")->paginate($totalPage);
    return $users;
});
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
