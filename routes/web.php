<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\SubscriberController;
use App\Http\Middleware\RuleCheck;
use Illuminate\Support\Facades\Route;



Route::get('/', [InviteController::class, 'home'])->name('home');



Route::get('/articles', [InviteController::class, 'home_articles'])->name('articles');
Route::get('/magazines', [InviteController::class, 'home_magazines'])->name('magazines');
#dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/tableau_de_bord',[InviteController::class, 'tableau_de_bord'] )->name('dashboard');
    Route::post('/update_name',[InviteController::class, 'update_name'] )->name('update_name');
});

#articles et magazine
Route::get('/get_article/{id}', [InviteController::class, 'get_article'])->name('get_article');
Route::get('/get_magazine/{id}', [InviteController::class, 'get_magazine'])->name('get_magazine');

Route::post('/add_commentaire_article', [InviteController::class, 'add_commentaire_article'])->name('add_commentaire_article');
Route::post('/add_review', [InviteController::class, 'add_review'])->name('add_review');


#abonné tableeau de bord
Route::middleware([RuleCheck::class.':Subscriber'])->group(function () {
    Route::get('/get_themes',[SubscriberController::class, 'get_themes'] )->name('get_themes');
    Route::post('/follow_themes',[SubscriberController::class, 'follow_themes'] )->name('follow_themes');
    Route::delete('/unfollow_themes',[SubscriberController::class, 'unfollow_themes'] )->name('unfollow_themes');

    Route::get('/article_creation',[SubscriberController::class, 'article_creation'] )->name('article_creation');
    Route::post('/create_article',[SubscriberController::class, 'create_article'] )->name('create_article');

    Route::get('/get_articles',[SubscriberController::class, 'get_articles'] )->name('get_articles');

    Route::get('/get_history',[SubscriberController::class, 'get_history'] )->name('get_history');
    Route::delete('/delete_history',[SubscriberController::class, 'delete_history'] )->name('delete_history');
});

#admin tableeau de bord
Route::middleware([RuleCheck::class.':Admin'])->group(function () {
    Route::get('/admin_stats', [AdminController::class, 'admin_stats'])->name('admin_stats');

    Route::get('/magazine_creation',[AdminController::class, 'magazine_creation'] )->name('magazine_creation');
    Route::post('/create_magazine',[AdminController::class, 'create_magazine'] )->name('create_magazine');

    Route::get('/get_subs',[AdminController::class, 'get_subs'] )->name('get_subs');
    Route::delete('/delete_subs',[AdminController::class, 'delete_subs'] )->name('delete_subs');

    Route::get('/verify_users',[AdminController::class, 'verify_users'] )->name('verify_users');
    Route::post('/accept_user',[AdminController::class, 'accept_user'] )->name('accept_user');


    Route::get('/get_respo',[AdminController::class, 'get_respo'] )->name('get_respo');
    Route::post('/modify_respo',[AdminController::class, 'modify_respo'] )->name('modify_respo');

    Route::get('/get_magazines',[AdminController::class, 'get_magazines'] )->name('get_magazines');
    Route::post('/modify_magazines',[AdminController::class, 'modify_magazines'] )->name('modify_magazines');
});

#responsable dahsboard
Route::middleware([RuleCheck::class.':Responsable'])->group(function () {
    Route::get('/respo_stats', [ResponsableController::class, 'respo_stats'])->name('respo_stats');

    Route::get('/get_theme_subs', [ResponsableController::class, 'get_theme_subs'])->name('get_theme_subs');
    Route::delete('/delete_theme_subs/{userId}', [ResponsableController::class, 'delete_theme_subs'])->name('delete_theme_subs');

    Route::get('/get_theme_articles', [ResponsableController::class, 'get_theme_articles'])->name('get_theme_articles');
    Route::post('/update_theme_articles/{id}', [ResponsableController::class, 'update_theme_articles'])->name('update_theme_articles');

    Route::get('/get_rec_articles', [ResponsableController::class, 'get_rec_articles'])->name('get_rec_articles');
    Route::post('/rec_articles/{id}', [ResponsableController::class, 'rec_articles'])->name('rec_articles');
});


#auth routes
require __DIR__.'/auth.php';


