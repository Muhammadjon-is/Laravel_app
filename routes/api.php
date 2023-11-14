<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get(('/posts', function) {
//     return response()->json([
//         'posts' => [
//             [
//                 'title'=> "Postf"
//             ]
//         ]
//             ]);
// });

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



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
