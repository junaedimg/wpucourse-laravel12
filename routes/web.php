<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostDashboardController;



Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/posts', function () {
    // $posts = Post::with('author')->with('category')->latest()->get();
    // dump(request()->all());

    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(10)->appends(request()->all());
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get(
//     '/dashboard',
//     [PostDashboardController::class, 'index']
// )->middleware(['auth', 'verified'])->name('dashboard');

// Route::get(
//     '/dashboard/create',
//     [PostDashboardController::class, 'create']
// )->middleware(['auth', 'verified'])->name('dashboard');

// Route::delete(
//     '/dashboard/{post:slug}',
//     [PostDashboardController::class, 'destroy']
// )->middleware(['auth', 'verified'])->name('dashboard');


// Route::post(
//     '/dashboard',
//     [PostDashboardController::class, 'store']
// )->middleware(['auth', 'verified'])->name('dashboard');

// Route::get(
//     '/dashboard/{post:slug}',
//     [PostDashboardController::class, 'show']
// )->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get(
        '/dashboard',
        [PostDashboardController::class, 'index']
    )->name('dashboard');

    Route::get(
        '/dashboard/create',
        [PostDashboardController::class, 'create']
    );

    Route::delete(
        '/dashboard/{post:slug}',
        [PostDashboardController::class, 'destroy']
    );

    Route::get(
        '/dashboard/{post:slug}/edit',
        [PostDashboardController::class, 'edit']
    );

    Route::post(
        '/dashboard',
        [PostDashboardController::class, 'store']
    );

    Route::patch(
        '/dashboard/{post:slug}',
        [PostDashboardController::class, 'update']
    );

    Route::get(
        '/dashboard/{post:slug}',
        [PostDashboardController::class, 'show']
    );
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
