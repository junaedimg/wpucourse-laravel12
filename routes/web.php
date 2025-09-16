<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    $posts = Post::all();
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{postss:slug}', function (Post $postss) {
    return view('post', ['title' => 'Single Post', 'post' => $postss]);
});

Route::get('/author/{user}', function (User $user) {
    return view('posts', ['title' => 'Artikel By ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
