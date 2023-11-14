<?php

use Illuminate\Http\Request ;
// use GuzzleHttp\Psr7\Request;
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

Route::get('/', function () {
    return view('listings');
});
 /*
Route::get('/hello', function() {
    return  response("<h1>Hello world</h1>", 200)
    ->header('Content-type', 'text/plain')
    ->header('foo', 'bar');
});


Route::get('/post/{id}', function($id) {
   
    return response('Post' .$id);
})->where('id', '[0-9]+') ;
// Routerga faqat number orqali kirsa bo'ladi

Route::get('/search', function(Request $request){
 return $request->name . '' . $request->city;
});   
\ */


// Route::get('/', function() {
//     return view('listing', [
//         'heading' => "Latest Listing ",
//         'listing' => [
//             [
//                 'id' => 1,
//                 'title' => "List one",
//                 'Description' => 'lorem',
//             ]
//         ]
//             ]);
// });

