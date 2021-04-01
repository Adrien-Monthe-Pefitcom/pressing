<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categories\Categories;
use App\Http\Livewire\MpnClient\MpnClient;
use App\Http\Livewire\MpnClient\Client_order;
use App\Http\Livewire\Order\Mpn_Order;
use App\Http\Livewire\Categories\Categoryposts;
use App\Http\Livewire\MpnCloths\MpnCloths;
use App\Http\Livewire\Posts\Posts;
use App\Http\Livewire\Posts\Post as p;
use App\Http\Livewire\Tags\Tagposts;
use App\Http\Livewire\Tags\Tags;

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

const SANCTUM = "auth:sanctum";

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([SANCTUM, 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware([SANCTUM, 'verified'])->get('/dashboard/order', function () {
    return view('order');
})->name('dashboard-order');

Route::middleware([SANCTUM, 'verified'])->get('/dashboard/client', function () {
    return view('client');
})->name('dashboard-client');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/cloth', function () {
    return view('cloth');
})->name('dashboard-cloth');

Route::get('dashboard/categories', Categories::class)->name('categories');

Route::get('dashboard/clients', MpnClient::class)->name('clients');

Route::get('dashboard/orders', Mpn_Order::class)->name('orders');

Route::get('dashboard/cloths', MpnCloths::class)->name('cloths');

Route::get('dashboard/categories/{id}/posts', Categoryposts::class);
Route::get('dashboard/clients/{id}/orders', Client_order::class);

Route::get('dashboard/posts', Posts::class)->name('posts');
Route::get('dashboard/posts/{id}', p::class);

Route::get('dashboard/tags', Tags::class)->name('tags');
Route::get('dashboard/tags/{id}/posts', Tagposts::class);
