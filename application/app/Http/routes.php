<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

///////////////////////////////////////// BACKEND ROUTE /////////////////////////////////////////
Route::get('/admin', function () {
  return view('backend/pages/login');
})->name('login.pages');

Route::get('backend/dashboard', 'DashboardController@index')->name('dashboard');

// =======================================================================================================================
//Informasi Profile
Route::post('admin/store-profile', 'BeritaProfileController@store')->name('profile.store');
Route::get('admin/publish-profile/{id}', 'BeritaProfileController@flagpublish')->name('profile.flagpublish');
Route::get('admin/edit-profile/{id}', 'BeritaProfileController@edit')->name('profile.edit');
Route::post('admin/update-profile/{id}', 'BeritaProfileController@update')->name('profile.update');
Route::get('admin/delete-profile/{id}', 'BeritaProfileController@delete')->name('profile.delete');
Route::get('admin/lihat-profile', 'BeritaProfileController@lihat')->name('profile.lihat');
Route::get('admin/tambah-profile', 'BeritaProfileController@tambah')->name('profile.tambah');
//Informasi Profile kategori
Route::get('admin/lihat-kategori-profile', 'KategoriProfileController@lihatkategori')->name('profile.kategori.lihat');
Route::post('admin/store-kategori-profile', 'KategoriProfileController@store')->name('profile.kategori.store');
Route::post('admin/edit-kategori-profile', 'KategoriProfileController@edit')->name('profile.kategori.edit');
Route::get('admin/bind-kategori-profile/{id}', 'KategoriProfileController@bind')->name('profile.kategori.bind');
Route::get('admin/delete-kategori-profile/{id}', 'KategoriProfileController@delete')->name('profile.kategori.delete');
Route::get('admin/change-status-kategori-profile/{id}', 'KategoriProfileController@changeflag')->name('profile.kategori.changeflag');
// =======================================================================================================================


// =======================================================================================================================
//Management Akun
Route::get('admin/kelola-akun', 'AkunController@index')->name('akun.kelola');
Route::post('admin/store-akun', 'AkunController@store')->name('akun.store');
Route::post('admin/update-akun', 'AkunController@update')->name('akun.update');
Route::get('admin/delete-akun/{id}', 'AkunController@delete')->name('akun.delete');
Route::get('admin/bind-akun/{id}', 'AkunController@bind')->name('akun.bind');
Route::get('email-activation/{code}', 'AkunController@emailActivation');
Route::post('set-password', 'AkunController@setPassword')->name('setpassword');
Route::get('logout-process', 'AkunController@logoutProcess')->name('logout');
Route::post('login-process', 'AkunController@loginProcess')->name('login');
// =======================================================================================================================


// =======================================================================================================================
//Features
Route::get('admin/kelola-features', 'FeaturesController@index')->name('features.index');
Route::post('admin/store-features', 'FeaturesController@store')->name('features.store');
Route::get('admin/delete-features/{id}', 'FeaturesController@delete')->name('features.delete');
Route::post('admin/edit-features', 'FeaturesController@edit')->name('features.edit');
Route::get('admin/publish-features/{id}', 'FeaturesController@publish')->name('features.publish');
Route::get('admin/bind-features/{id}', 'FeaturesController@bind')->name('features.bind');
// =======================================================================================================================

// =======================================================================================================================
//Services
Route::get('admin/kelola-services', 'ServicesController@index')->name('services.index');
Route::post('admin/store-services', 'ServicesController@store')->name('services.store');
Route::get('admin/delete-services/{id}', 'ServicesController@delete')->name('services.delete');
Route::post('admin/edit-services', 'ServicesController@edit')->name('services.edit');
Route::get('admin/publish-services/{id}', 'ServicesController@publish')->name('services.publish');
Route::get('admin/bind-services/{id}', 'ServicesController@bind')->name('services.bind');
// =======================================================================================================================


// =======================================================================================================================
//Client
Route::get('admin/lihat-client', 'ClientController@lihat')->name('client.lihat');
Route::get('admin/tambah-client', 'ClientController@tambah')->name('client.tambah');
Route::post('admin/store-client', 'ClientController@store')->name('client.store');
Route::get('admin/edit-client/{id}', 'ClientController@edit')->name('client.edit');
Route::post('admin/update-client', 'ClientController@update')->name('client.update');
Route::get('admin/publish-client/{id}', 'ClientController@flagpublish')->name('client.flagpublish');
Route::get('admin/delete-client/{id}', 'ClientController@delete')->name('client.delete');
// =======================================================================================================================


// =======================================================================================================================
//Slider
Route::get('admin/kelola-slider', 'SliderController@index')->name('slider.index');
Route::post('admin/store-slider', 'SliderController@store')->name('slider.store');
Route::get('admin/delete-slider/{id}', 'SliderController@delete')->name('slider.delete');
Route::post('admin/edit-slider', 'SliderController@edit')->name('slider.edit');
Route::get('admin/publish-slider/{id}', 'SliderController@publish')->name('slider.publish');
Route::get('admin/bind-slider/{id}', 'SliderController@bind')->name('slider.bind');
// =======================================================================================================================


// =======================================================================================================================
//Galeri
Route::get('admin/kelola-galeri', 'GalleryController@index')->name('galeri.index');
Route::post('admin/store-galeri', 'GalleryController@store')->name('galeri.store');
Route::get('admin/delete-galeri/{id}', 'GalleryController@delete')->name('galeri.delete');
Route::post('admin/edit-galeri', 'GalleryController@edit')->name('galeri.edit');
Route::get('admin/publish-galeri/{id}', 'GalleryController@publish')->name('galeri.publish');
Route::get('admin/bind-galeri/{id}', 'GalleryController@bind')->name('galeri.bind');
// =======================================================================================================================


// =======================================================================================================================
//Video
Route::get('admin/kelola-video', 'VideoController@index')->name('video.index');
Route::post('admin/store-video', 'VideoController@store')->name('video.store');
Route::get('admin/delete-video/{id}', 'VideoController@delete')->name('video.delete');
Route::post('admin/edit-video', 'VideoController@edit')->name('video.edit');
Route::get('admin/publish-video/{id}', 'VideoController@publish')->name('video.publish');
Route::get('admin/bind-video/{id}', 'VideoController@bind')->name('video.bind');
// =======================================================================================================================


// =======================================================================================================================
//Profile
Route::get('admin/kelola-profile', 'UserProfileController@index')->name('profile.index');
Route::post('admin/edit-profile', 'UserProfileController@edit')->name('edit.profile.edit');
Route::get('admin/berita-user/{id}', 'UserProfileController@berita')->name('berita.user');
Route::post('admin/change-password', 'UserProfileController@changePassword')->name('change.password.user');
// =======================================================================================================================

////////////////////////////////////// END OF BACKEND ROUTE //////////////////////////////////////


///////////////////////////////////////// FRONTEND ROUTE /////////////////////////////////////////
