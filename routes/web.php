<?php

use App\Good;
use App\User;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

  return view('wrp.viewall', [
    'goods' => $goods
  ]);
});

Route::post('/good/add', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
    'quantity' => 'required',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  $good = new Good;
  $good->name = $request->name;
  $good->quantity = $request->quantity;
  $good->save();

  $log = new Log;
  $log->goods_id = $good->id;
  $log->user_id = Auth::id();
  $log->action = "create";
  $log->quantity = $good->quantity;
  $log->save();

  return redirect('/');
})->middleware('auth');

Route::post('/good/delete', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'id' => 'required',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  Good::findOrFail($request->id)->delete();

  return redirect('/');
})->middleware('auth');

Route::get('/good/{id}', function ($id) {
  $good = Good::findOrFail($id);
  $log = Log::where('goods_id', $id)->get();
  foreach($log as $entry) {
    $entry->user_name = User::find($entry->user_id)->name;
  }

  return view('wrp.viewgood', [
    'good' => $good,
    'log' => $log
  ]);
});

Route::post('/stock', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'id' => 'required',
    'quantity' => 'required',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  $good = Good::findOrFail($request->id);
  $good->quantity = $request->quantity;
  $good->save();

  return redirect('/');
})->middleware('auth');

Route::get('/add', function () {
  return view('wrp.addgood');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
