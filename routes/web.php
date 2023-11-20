<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
use Database\Factories\ListingFactory;

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


// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing  



// All listing 
Route::get('/', [ListingController::class, 'index']);




// Show create Form

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');


// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');


// Single Listing
Route::get('listings/{listing}', [ListingController::class, 'show']);


// show Register/create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// create new user
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);





















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
