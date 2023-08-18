<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    
    return view('posts',[
        'posts' => Post::latest('published_at')->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {

    //Find a post by its slug and pass it to a view called "post"
    
    return view('post',[
        'post'=> $post
    ]);

});

Route::get('categories/{category:slug}', function(Category $category){

    // Show all the posts for a particular Category
    return view('posts',[
        'posts' => $category->posts
    ]);
});

Route::get('authors/{author:username}', function(User $author){
    
    // Show all the posts for a User
    return view('posts',[
        'posts' => $author->posts
    ]);
});