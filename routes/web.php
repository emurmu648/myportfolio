<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'emurmuController@index');


/*Frontend routes*/
Route::get('/', 'emurmuController@index')->name('/');



/*Admin routes*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/*About routes*/
Route::get('/add-about-info', 'Admin\AboutController@addAbout')->name('about.add');
Route::post('/create-about-info', 'Admin\AboutController@createAbout')->name('about.create');
Route::get('/manage-about-info', 'Admin\AboutController@manageAbout')->name('about.manage');
Route::get('/edit-about-info/{id}', 'Admin\AboutController@editAbout')->name('about.edit');
Route::post('/update-about-info', 'Admin\AboutController@updateAbout')->name('about.update');
Route::post('/delete-about-info/{id}', 'Admin\AboutController@deleteAbout')->name('about.delete');



/*Services routes*/
Route::get('/add-services-info', 'Admin\ServicesController@addServices')->name('services.add');
Route::post('/create-services-info', 'Admin\ServicesController@createServices')->name('services.create');
Route::get('/manage-services-info', 'Admin\ServicesController@manageServices')->name('services.manage');
Route::get('/edit-services-info/{id}', 'Admin\ServicesController@editServices')->name('services.edit');
Route::post('/update-services-info', 'Admin\ServicesController@updateServices')->name('services.update');
Route::post('/delete-services-info/{id}', 'Admin\ServicesController@deleteServices')->name('services.delete');



/*Project routes*/
Route::get('/add-project-info', 'Admin\ProjectController@addProject')->name('project.add');
Route::post('/create-project-info', 'Admin\ProjectController@createProject')->name('project.create');
Route::get('/manage-project-info', 'Admin\ProjectController@manageProject')->name('project.manage');
Route::get('/edit-project-info/{id}', 'Admin\ProjectController@editProject')->name('project.edit');
Route::post('/update-project-info', 'Admin\ProjectController@updateProject')->name('project.update');
Route::post('/delete-project-info/{id}', 'Admin\ProjectController@deleteProject')->name('project.delete');



/*Project routes*/
Route::post('/send-contact-info', 'Admin\ContactController@sendContact')->name('contact.send');
Route::get('/view-contact-info', 'Admin\ContactController@viewContact')->name('contact.view');
Route::post('/delete-contact-info/{id}', 'Admin\ContactController@deleteContact')->name('contact.delete');
Route::get('/view-contact-details/{id}', 'Admin\ContactController@viewContactDetails')->name('contact.details');
