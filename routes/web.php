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

Route::get('/create-issues','App\Http\Controllers\CompanyController@create')->name('show-create-issues');
Route::post('/create-issues','App\Http\Controllers\CompanyController@store')->name('create-issues');

// Download Route
Route::get('download/{filename}', function($filename)
{
       // Check if file exists in app/storage/file folder
       $file_path = storage_path() .'/app/'. $filename;
       if (file_exists($file_path))
       {
           // Send Download
           return Response::download($file_path, $filename, [
               'Content-Length: '. filesize($file_path)
           ]);
       }
       else
       {
           // Error
           exit('Requested file does not exist on our server!');
       }
})
->where('filename', '[A-Za-z0-9\-\_\.]+')->name('download-issue');

Route::get('/list-issue','App\Http\Controllers\CompanyController@listIssues')->name('issues-list');