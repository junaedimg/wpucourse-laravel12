<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    // $posts = Post::with('author')->with('category')->latest()->get();
    // dump(request()->all());

    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->get();
    // if (request('serach')) $posts->where('title', 'like', '%' . request('serach') . '%');
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{posts:slug}', function (Post $posts) {
    return view('post', ['title' => 'Single Post', 'post' => $posts]);
});

// Route::get('/author/{user:username}', function (User $user) {
//     // $posts = $user->posts->load('category', 'author');
//     return view('posts', ['title' => count($user->posts) . ' Artikel By ' . $user->name, 'posts' => $user->posts]);
// });

// // ! catatan : route ini sebenarnya bisa pakai view posts, tapi untuk belajar aja coba dipisahkan viewnya
// Route::get('/category/{category:slug}', function (Category $category) {
//     return view('category', ['title' => 'Category : ' . $category->name, 'posts' => $category->posts]);
// });

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
