<?php

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
    return view('welcome');
});
Route::resource('books', 'BookController');
Route::get('books/{id}/delete','BookController@destroy');

/* 
 * Sample test route
 */
//Route::get('/', function () {
//    return view('welcome');
//})->name('home');
//Route::prefix('generate')->group(function(){
//    Route::get('/password/{length}', function(int $length = 8){
//       echo (empty($length) && $length > 0) ? 'Invalid password length' : bin2hex(openssl_random_pseudo_bytes( ceil( $length/2)) ); 
//    });
//    Route::get('/login/{surname?}/{name?}', function(string $surname = '', string $name = ''){
//        echo (empty($name) || empty($surname)) ? 'Empty values "surname" or/both "name"' : 'Your login is: '. strtoupper(rand(10,0).$surname.$name);
//    });
//});
//Route::redirect('/password-random', '/generate/password/20', 301);
