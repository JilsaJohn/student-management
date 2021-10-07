<?php  

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
    return view('welcome');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
/*student list and create,edit,update,delete actions*/
Route::resource('studentlist','App\Http\Controllers\StudentController');
Route::get('/student','App\Http\Controllers\StudentController@index');
Route::get('/show/{id}','App\Http\Controllers\StudentController@show');
Route::get('/create','App\Http\Controllers\StudentController@create');
/*student mark list and create,edit,update,delete actions*/
Route::get('/studentmarks','App\Http\Controllers\StudentController@studentmarks');
Route::post('/addstudentmarks','App\Http\Controllers\StudentController@addstudentmarks');
Route::get('/marklist','App\Http\Controllers\StudentController@marklist');
Route::get('/markedit/{id}','App\Http\Controllers\StudentController@markedit');
Route::get('/markupdate/{id}','App\Http\Controllers\StudentController@markupdate');
Route::get('/markdelete/{id}','App\Http\Controllers\StudentController@markdelete');