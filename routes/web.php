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

Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('admin.login');
});

Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout');

Route::group([
    'prefix'=>'admin',
    'middleware'=>'isAdmin'
],function($route){
    //dashboard
    Route::get('/dashboard', 'admin\DashboardController@index')->name('dashboard');

    // category
    Route::get('/category', 'admin\CategoryController@index')->name('category');
    Route::get('/addCategory', 'admin\CategoryController@addCategory');
    Route::post('/saveCategory/{id?}', 'admin\CategoryController@saveCategory');
    Route::get('/deleteCategory/{id?}', 'admin\CategoryController@deleteCategory');
    Route::get('/editCategory/{id?}', 'admin\CategoryController@edit_category_form');

    // Product
    Route::get('product', 'admin\ProductController@index')->name('product');
    Route::get('addProduct', 'admin\ProductController@create');
    Route::post('saveProduct', 'admin\ProductController@store');

    // member
    Route::get('members', 'admin\MembersController@index')->name('members');  
    Route::post('saveMember/{id?}', 'admin\MembersController@saveMember');
    Route::get('editMember/{id?}', 'admin\MembersController@edit_member_form');
    Route::get('deleteMember/{id?}', 'admin\MembersController@delete_member');

    // Project
    Route::get('projects', 'admin\ProjectsController@index')->name('projects');
    Route::post('saveProject', 'admin\ProjectsController@saveProject');
});

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('admin/categories', 'CategoryController@cateoryForm')->name('categories');

// Practice Controller
Route::get('/design', 'HomeController@design')->name('design');










/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This is the basic web.php middleware syntax
|
--------------------------------------Start--------------------------------------


Route::middleware(['first', 'second'])->group(function () {
    Route::get('/', function () {
        // Uses first & second Middleware
    });

    Route::get('user/profile', function () {
        // Uses first & second Middleware
    });
});


--------------------------------------End--------------------------------------
*/


