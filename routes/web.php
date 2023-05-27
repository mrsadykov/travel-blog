<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Category as Category;
use App\Http\Controllers\Admin\Tag as Tag;
use App\Http\Controllers\Admin\Post as Post;
use App\Http\Controllers\Admin\User as User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controllers\Main\IndexController::class, '__invoke']);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [Controllers\Admin\Main\IndexController::class, '__invoke'])->name('admin.index');

    // категории
    Route::prefix('categories')->group(function () {
        // categories list
        Route::get('/', [Category\IndexController::class, '__invoke'])->name('admin.category.index');
        // crud
        // category create
        // создание категории
        Route::get('/create', [Category\CreateController::class, '__invoke'])->name('admin.category.create');
        // category create
        // отправка данных с формы, создание категории
        Route::post('/', [Category\StoreController::class, '__invoke'])->name('admin.category.store');
        // category show
        // просмотр категории
        Route::get('/{category}', [Category\ShowController::class, '__invoke'])->name('admin.category.show');
        // редактирование категории
        // category edit
        Route::get('/{category}/edit', [Category\EditController::class, '__invoke'])->name('admin.category.edit');
        // category update
        // отправка данных с формы, создание категории
        Route::patch('/{category}', [Category\UpdateController::class, '__invoke'])->name('admin.category.update');

        // удаление
        Route::delete('/{category}', [Category\DeleteController::class, '__invoke'])->name('admin.category.delete');
    });

    Route::prefix('tags')->group(function() {
        // tags list
        Route::get('/', [Tag\IndexController::class, '__invoke'])->name('admin.tag.index');
        // реализация crud для тегов
        // создание тега
        Route::get('/create', [Tag\CreateController::class, '__invoke'])->name('admin.tag.create');
        // отправка данных для создания
        Route::post('/', [Tag\StoreController::class, '__invoke'])->name('admin.tag.store');

        // просмотр тега
        Route::get('/{tag}', [Tag\ShowController::class, '__invoke'])->name('admin.tag.show');

        // редактирование тега
        Route::get('{tag}/edit', [Tag\EditController::class, '__invoke'])->name('admin.tag.edit');

        // обновление тега
        Route::patch('/{tag}', [Tag\UpdateController::class, '__invoke'])->name('admin.tag.update');

        // удаление тега
        Route::delete('/{tag}', [Tag\DeleteController::class, '__invoke'])->name('admin.tag.delete');
    });

    Route::prefix('posts')->group(function() {
        // posts list
        Route::get('/', [Post\IndexController::class, '__invoke'])->name('admin.post.index');
        // реализация crud для постов
        // создание поста
        Route::get('/create', [Post\CreateController::class, '__invoke'])->name('admin.post.create');
        // отправка данных для создания
        Route::post('/', [Post\StoreController::class, '__invoke'])->name('admin.post.store');

        // редактирование поста
        Route::get('{post}/edit', [Post\EditController::class, '__invoke'])->name('admin.post.edit');

        // обновление поста
        Route::patch('/{post}', [Post\UpdateController::class, '__invoke'])->name('admin.post.update');

        // удаление поста
        Route::delete('/{post}', [Post\DeleteController::class, '__invoke'])->name('admin.post.delete');
    });

    // пользователи
    Route::prefix('users')->group(function () {
        // categories list
        Route::get('/', [User\IndexController::class, '__invoke'])->name('admin.user.index');
        // crud
        // user create
        // создание категории
        Route::get('/create', [User\CreateController::class, '__invoke'])->name('admin.user.create');
        // user create
        // отправка данных с формы, создание категории
        Route::post('/', [User\StoreController::class, '__invoke'])->name('admin.user.store');
        // user show
        // просмотр категории
        Route::get('/{user}', [User\ShowController::class, '__invoke'])->name('admin.user.show');
        // редактирование категории
        // user edit
        Route::get('/{user}/edit', [User\EditController::class, '__invoke'])->name('admin.user.edit');
        // user update
        // отправка данных с формы, создание категории
        Route::patch('/{user}', [User\UpdateController::class, '__invoke'])->name('admin.user.update');

        // удаление
        Route::delete('/{user}', [User\DeleteController::class, '__invoke'])->name('admin.user.delete');
    });
    // auth - первым аргументом - это подключение middleware авторизации
});

Auth::routes();
//Auth::routegets();
