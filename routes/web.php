<?php

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

use App\Http\Controllers\ConfigurationsController;
use App\Http\Controllers\AuthenticationsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsCategoriesController;
use App\Helpers\Helper;



Route::get('/login', function () { return view('admin.login'); });
Route::post('/login', [AuthenticationsController::class, 'login'])->name('login');

Route::prefix('/admin')->middleware(['auth', 'perm'])->group(function(){
    Route::get('/', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('settings', [ConfigurationsController::class, 'settings'])->name('admin.settings');
    Route::post('settings', [ConfigurationsController::class, 'updateSettings'])->name('admin.settings.post');
    Route::get('settings/users', [ConfigurationsController::class, 'users'])->name('admin.settings.users');

    Route::get('newsletter', [ContactsController::class, 'newsletter'])->name('admin.newsletter.index');
    Route::delete('newsletter/{id}', [ContactsController::class, 'newsletterDelete'])->name('admin.newsletter.delete');
    Route::get('newsletter/exportar', [ContactsController::class, 'newsletterExport'])->name('admin.newsletter.export');

    Route::get('contatos', [ContactsController::class, 'contact'])->name('admin.contact.index');
    Route::delete('contato/{id}', [ContactsController::class, 'contactDelete'])->name('admin.contact.delete');
    Route::get('contatos/exportar', [ContactsController::class, 'contactExport'])->name('admin.contact.export');

    Route::get('/logout', [AuthenticationsController::class, 'logout'])->name('logout');

    Route::get('/profile', [UserController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [UserController::class, 'update'])->name('admin.profile.update');
    Route::post('/profile/password', [UserController::class, 'updatePassword'])->name('admin.profile.updatePassword');

    Route::post('/user', [UserController::class, 'insert'])->name('admin.user.insert');

    Route::post('/image', [UserController::class, 'image'])->name('admin.profile.image');

    Route::get('posts', [PostController::class, 'index'])->name('admin.posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts/post', [PostController::class, 'post'])->name('admin.posts.post');
    Route::get('/posts/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::post('/posts/update', [PostController::class, 'update'])->name('admin.posts.update');

    Route::get('/categories', [PostsCategoriesController::class, 'index'])->name('admin.postsCategories.index');
    Route::get('/categories/create', [PostsCategoriesController::class, 'create'])->name('admin.postsCategories.categories.create');
    Route::post('/categories/create', [PostsCategoriesController::class, 'post'])->name('admin.postsCategories.categories.post');
    Route::get('/categories/edit', [PostsCategoriesController::class, 'edit'])->name('admin.postsCategories.categories.edit');


    Route::get('/changeStatus/{table}/{id}', [Helper::class, 'changeStatus']);
    Route::delete('/deleteSwal/{table}/{id}', [Helper::class, 'deleteSwal']);
});


Route::get('/', [HomeController::class, 'index'])->name('index');


// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('admin.pages.error.404');
})->where('page','.*');
