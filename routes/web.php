<?php

use App\Http\Livewire\FrontCartItem;
use App\Http\Livewire\FrontHome;
use App\Http\Livewire\FrontSpecial;
use App\Http\Livewire\FrontTemplate;
use App\Http\Livewire\FrontTemplateByCategory;
use App\Http\Livewire\FrontTemplateBySubCategory;
use App\Http\Livewire\FrontTemplateByTag;
use App\Http\Livewire\FrontTemplateDetail;
use App\Http\Livewire\FrontTemplatePreview;
use App\Http\Livewire\FrontUnique;
use Illuminate\Support\Facades\Route;

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

Route::get('/', FrontHome::class)->name('home');
Route::get('/template', FrontTemplate::class)->name('template');
Route::get('/special', FrontSpecial::class)->name('special');
Route::get('/unique', FrontUnique::class)->name('unique');
Route::get('/category/{category_slug}', FrontTemplateByCategory::class)->name('template.by.category');
Route::get('/subcategory/{subcategory_slug}', FrontTemplateBySubCategory::class)->name('template.by.subcategory');
Route::get('/tag/{tag_slug}', FrontTemplateByTag::class)->name('template.by.tag');
Route::get('/template/{template_slug}', FrontTemplateDetail::class)->name('template.detail');
Route::get('/preview/{template_slug}', FrontTemplatePreview::class)->name('template.preview');
Route::get('/cart', FrontCartItem::class)->name('template.cart');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
