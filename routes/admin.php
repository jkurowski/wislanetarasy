<?php
use Illuminate\Support\Facades\Route;

// Inbox
Route::group([
    'namespace' => 'Admin\Inbox',
    'prefix' => '/admin/inbox',
    'as' => 'admin.inbox.',
    'middleware' => 'auth'], function () {

        Route::get(
            '/',
            'IndexController@index'
        )->name('index');

        Route::get(
            '/admin/inbox/message/{id}',
            'IndexController@show'
        )->name('show');
    });

// kCMS
Route::group([
    'namespace' => 'Admin',
    'prefix'=>'/admin',
    'as' => 'admin.',
    'middleware' => 'auth'], function () {

        Route::get('/', function () {
            return redirect('admin/dashboard');
        });

    // Slider
        Route::post('slider/set', 'Slider\IndexController@sort')->name('slider.sort');
        Route::post('gallery/set', 'Gallery\IndexController@sort')->name('gallery.sort');
        Route::post('image/set', 'Gallery\ImageController@sort')->name('image.sort');

    // Gallery
        Route::get('ajaxGetGalleries', 'Gallery\IndexController@ajaxGetGalleries')->name('ajaxGetGalleries');

        Route::resources([
        'slider' => 'Slider\IndexController',
        'section' => 'Section\IndexController',
        'user' => 'User\IndexController',
        'role' => 'Role\IndexController',
        'logs' => 'Log\IndexController',
        'greylist' => 'Greylist\IndexController',
        'gallery' => 'Gallery\IndexController',
        'image' => 'Gallery\ImageController',
        'map' => 'Map\IndexController'
        ]);

    // RODO
        Route::group(['prefix' => '/rodo', 'as' => 'rodo.'], function () {

            Route::resources([
            'rules' => 'Rodo\RulesController',
            'settings' => 'Rodo\SettingsController',
            'clients' => 'Rodo\ClientController'
            ]);
        });

    // Dashboard
        Route::group(['prefix'=>'/dashboard', 'as' => 'dashboard.'], function () {

            Route::resources([
            'seo' => 'Dashboard\SeoController',
            'social' => 'Dashboard\SocialController'
            ]);
        });
    });
Route::get('{uri}', 'Front\IndexController@index')->where('uri', '([A-Za-z0-9\-\/]+)');
