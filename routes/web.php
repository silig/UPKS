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
//halaman tampilan didepan
Route::get('/', 'Site\TerasController@index')->name('teras');
Route::get('/kontak', 'Site\TerasController@kontak')->name('kontak');
Route::get('/kerjasama', 'Site\TerasController@kerjasama')->name('kerjasama');
Route::get('/pengelola', 'Site\TerasController@pengelola')->name('pengelola');
Route::get('/pengumuman', 'Site\TerasController@pengumuman')->name('pengumuman');
Route::get('/profil', 'Site\TerasController@profil')->name('profil');
Route::get('/berita', 'Site\TerasController@berita')->name('berita');
Route::get('/panduan', 'Site\TerasController@panduan')->name('panduan');
Route::get('/show/{id}', 'Halaman\BeritaController@show')->name('show');
Route::get('/post', 'Site\TerasController@post')->name('post');


Auth::routes([
  'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);	

Route::get('/home', 'HomeController@index');
Route::get('/product/{slug}', 'Site\ProductController@index');


Route::group(['prefix' => config('adminlte.dashboard_url'), 'middleware' => 'auth'], function () {
	
	Route::get('/', 'Admin\DashboardController@index');

	Route::get('/profile', 'Auth\ProfileController@index');
	Route::any('/change-password', 'Auth\ProfileController@changePassword');

	Route::group(['prefix' => 'users'], function () {
		Route::get('/', 'Admin\UsersController@index')->middleware('can:view-users');
		Route::any('/create', 'Admin\UsersController@create')->middleware('can:create-users');
	    Route::any('/{id}/edit', 'Admin\UsersController@edit')->middleware('can:edit-users');
	    Route::get('/{id}/delete', 'Admin\UsersController@delete')->middleware('can:delete-users');
	});

	Route::group(['prefix' => 'roles'], function () {
		Route::get('/', 'Admin\RolesController@index')->middleware('can:view-roles');
		Route::any('/create', 'Admin\RolesController@create')->middleware('can:create-roles');
	    Route::any('/{id}/edit', 'Admin\RolesController@edit')->middleware('can:edit-roles');
	    Route::get('/{id}/delete', 'Admin\RolesController@delete')->middleware('can:delete-roles');
	});

	Route::group(['prefix' => 'permissions'], function () {
		Route::get('/', 'Admin\PermissionsController@index')->middleware('can:view-permissions');
		Route::any('/create', 'Admin\PermissionsController@create')->middleware('can:create-permissions');
	    Route::any('/{id}/edit', 'Admin\PermissionsController@edit')->middleware('can:edit-permissions');
	    Route::get('/{id}/delete', 'Admin\PermissionsController@delete')->middleware('can:delete-permissions');
	});

	Route::group(['prefix' => 'menus'], function () {
		Route::get('/', 'Admin\MenusController@index')->middleware('can:view-menus');
		Route::any('/create', 'Admin\MenusController@create')->middleware('can:create-menus');
	    Route::any('/{id}/edit', 'Admin\MenusController@edit')->middleware('can:edit-menus');
	    Route::get('/{id}/delete', 'Admin\MenusController@delete')->middleware('can:delete-menus');
	});

	Route::group(['prefix' => 'kontak'], function () {
		route::get('/', 'Halaman\KontakController@index')->middleware('can:view-kontak')->name('kontak.index');
		route::post('/add', 'Halaman\KontakController@store')->middleware('can:create-kontak')->name('kontak.store');
		route::post('/{id}/update', 'Halaman\KontakController@update')->middleware('can:update-kontak')->name('kontak.update');
	});

	Route::group(['prefix' => 'profil'], function () {
		route::get('/', 'Halaman\ProfilController@index')->middleware('can:view-profil')->name('profil.index');
		route::post('/save', 'Halaman\ProfilController@simpan')->middleware('can:create-profil')->name('profil.store');
		route::post('/simpan', 'Halaman\ProfilController@simpanservice')->middleware('can:create-profil')->name('profil.service');
		route::post('/update', 'Halaman\ProfilController@updateservice')->middleware('can:create-profil')->name('profil.update');
		route::get('/{id}/hapusservice', 'Halaman\ProfilController@hapusservice')->middleware('can:view-profil')->name('profil.hapusservice');
	});

	Route::group(['prefix' => 'pengelola'], function () {
		route::get('/', 'Halaman\PengelolaController@index')->middleware('can:view-pengelola')->name('pengelola.index');
		route::any('/create', 'Halaman\PengelolaController@create')->middleware('can:create-pengelola')->name('pengelola.create');
		route::post('/store', 'Halaman\PengelolaController@store')->middleware('can:create-pengelola')->name('pengelola.store');
		route::post('/update', 'Halaman\PengelolaController@update')->middleware('can:update-pengelola')->name('pengelola.update');
		route::get('/{id}/delete', 'Halaman\PengelolaController@delete')->middleware('can:delete-pengelola')->name('pengelola.delete');
	});

	Route::group(['prefix' => 'panduan'], function () {
		route::get('/', 'Halaman\PanduanController@index')->middleware('can:view-panduan')->name('panduan.index');
		route::post('/save', 'Halaman\PanduanController@simpan')->middleware('can:create-panduan')->name('panduan.simpan');
		route::any('/update', 'Halaman\PanduanController@update')->middleware('can:create-panduan')->name('panduan.update');
		route::get('/getpanduan', 'Halaman\PanduanController@find')->middleware('can:view-panduan')->name('panduan.find');
		route::get('/delete/{id}', 'Halaman\PanduanController@delete')->middleware('can:create-panduan')->name('panduan.delete');
	});

	Route::group(['prefix' => 'pengumuman'], function () {
		route::get('/', 'Halaman\PengumumanController@index')->middleware('can:view-pengumuman')->name('pengumuman.index');
		route::post('/save', 'Halaman\PengumumanController@simpan')->middleware('can:create-pengumuman')->name('pengumuman.simpan');
		route::any('/update', 'Halaman\PengumumanController@update')->middleware('can:create-pengumuman')->name('pengumuman.update');
		route::get('/delete/{id}', 'Halaman\PengumumanController@delete')->middleware('can:create-pengumuman')->name('pengumuman.delete');
		route::get('/getpengumuman', 'Halaman\PengumumanController@find')->middleware('can:view-pengumuman')->name('pengumuman.find');
	});

	Route::group(['prefix' => 'berita'], function () {
		route::get('/', 'Halaman\BeritaController@index')->middleware('can:view-berita')->name('berita.index');
		route::any('/create', 'Halaman\BeritaController@create')->middleware('can:view-berita')->name('berita.create');
		route::post('/post', 'Halaman\BeritaController@store')->middleware('can:create-berita')->name('berita.store');
		route::get('/{id}/edit', 'Halaman\BeritaController@edit')->middleware('can:create-berita')->name('berita.edit');
		route::post('/update', 'Halaman\BeritaController@update')->middleware('can:create-berita')->name('berita.update');
		route::get('/{id}/delete', 'Halaman\BeritaController@delete')->middleware('can:delete-berita')->name('berita.delete');
		// Route::get('/show/{id}', 'Halaman\BeritaController@show')->name('show');
	});


});
