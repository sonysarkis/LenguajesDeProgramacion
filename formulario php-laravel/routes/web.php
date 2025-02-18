<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

#Podemos agrupar por controlador de la siguiente manera
Route::controller(PostsController::class)->group(function(){
    Route::get('/posts',"index")->name('posts.index');


    #mostrar la pagina con formulario para crear un nuevo articulo
    Route::get('/posts/create', "create")->name('posts.create');
    #mostrar un post en especifico
    Route::get('/posts/{post}', "show")->name('posts.show');
    #Ruta para almacenar lo que llenemos en form dentro de la base de datos
    Route::post('/posts', "store")->name('posts.store'); 
    #Ruta para mostrar el formulario de edicion
    Route::get('/posts/{id}/edit', "edit");
    #Ruta que reciba datos y los actualice en BD
    Route::patch('/posts/{id}', "update");
    #Ruta que maneja la eliminacion de articulo
    Route::delete('/posts/{id}', "destroy");
});

#Definimos un array del controlador al que estamos haciendo referencia y como segundo parametro el metodo que estamos llamando 



Route::get('/test',function(){
    return 'OTRA RUTA';
});

