<?php

use App\Good;
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
    $goods = Good::orderBy('name', 'asc')->get();

    return view('viewall', [
      'goods' => $goods
    ]);
});
