<?php

use App\Http\Controllers\Backend\Blog\CategoryController;
use App\Http\Controllers\Backend\Blog\PostController;
use App\Http\Controllers\Backend\Blog\TagController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FormController;
use App\Http\Controllers\Backend\FormSubmissionController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\RedirectController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

// Blog related routes

// Categories route
Route::resource('categories', CategoryController::class);
// Tags route
Route::resource('tags', TagController::class);

// Posts route
Route::get('preview/{slug}',[PostController::class,'postPreview'])->name('post-preview');
Route::resource('posts', PostController::class);

//===== Pages route =========//
Route::get('preview/p/{slug}',[PageController::class,'pagePreview'])->name('page-preview');
Route::resource('pages', PageController::class);


// File manager route
Route::get('file-manager', [DashboardController::class, 'getFileManager'])->name('file-manager');

// Redirects route
Route::resource('redirects', RedirectController::class);

//====== Form Routes ======//
Route::resource('forms', FormController::class)->only(['index','create','store','edit','update','destroy']);
//===== Form Submissions =====//
Route::resource('form-submission', FormSubmissionController::class)->only(['index','store','destroy']);
