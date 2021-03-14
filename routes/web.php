<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Models\Post;

use App\Http\Controllers\BlogController;

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
})->name('welcome');

Route::get('/user', function () {
    return view('user');
})->name('user');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/class', function () {
    return view('class');
})->name('class');

Route::get('post/create', function () {
    DB::table('posts')->insert([
        'title' => 'Nurbolat Kadylbekov',
        'body' => "lab4",
    ]);
});

Route::get('/post', function () {
    $post = Post::find(1);
    return $post;
});

Route::get('blog/index',[BlogController::class, 'index']); 
Route::get('blog/create',function () {
return view('post.create');
});

Route::post('blog/create',[BlogController::class, 'store'])-> name('add-post');

Route::get('post/{id}',[BlogController::class, 'get_post']);

    







