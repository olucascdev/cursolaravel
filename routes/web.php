<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::any('/any', function(){
    return "Permite todo tipo de acesso http(get,post,delete,put)";
});

Route::match(['get','post'], '/match', function(){
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id}/{cat}', function($id, $cat){
    return "O id do produto é:".$id."<br>"."A categoria é:".$cat;
});

Route::redirect('/sobre', '/empresa');

Route::view('/empresa','/empresa');

Route::get('/holynews', function(){
    return view('news');
})->name('noticias');

Route::get('/thenovidades', function(){
    return redirect()->route('noticias');
});



Route::prefix('admin')->group(function(){
    Route::get('dashboard', function () {
        return 'dashboard';
    });

    Route::get('users', function () {
        return 'users';
    });

    Route::get('clientes', function () {
        return 'clientes';
    });
});
