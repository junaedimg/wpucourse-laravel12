<?php

use App\Models\Category;
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

Route::get('/posts/{posts:slug}', function (Post $posts) {
    return view('post', ['title' => 'Single Post', 'post' => $posts]);
});

Route::get('/author/{user:username}', function (User $user) {
    return view('posts', ['title' => count($user->posts) . ' Artikel By ' . $user->name, 'posts' => $user->posts]);
});

// ! catatan : route ini sebenarnya bisa pakai view posts, tapi untuk belajar aja coba dipisahkan viewnya
Route::get('/category/{category:slug}', function (Category $category) {
    return view('category', ['title' => 'Category : ' . $category->name, 'posts' => $category->posts]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
