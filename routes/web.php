<?php

use \Illuminate\Support\Facades\Auth;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        if (isset(\Illuminate\Support\Facades\Auth::user()->id)) {
            return redirect()->route('home');
        } else {
            return view('auth.login');
        }
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/productos', 'ProductosController@index')->name('productos');

    Route::match(['get', 'post'], '/producto/agregar',
        [
            'as' => 'producto.add',
            'uses' => 'ProductosController@add'
        ]
    );

    Route::match(['get', 'post'], '/producto/editar',
        [
            'as' => 'producto.edit',
            'uses' => 'ProductosController@edit'
        ]
    );

    Route::get('/editar/{id}', 'ProductosController@editView')->name('editView');
    Route::post('/producto/actualizar', 'ProductosController@update')->name('update');

    Route::post('/producto/eliminar/{id}', 'ProductosController@delete')->name('producto.delete');

    Route::match(['get', 'post'], '/producto/salida',
        [
            'as' => 'producto.exit',
            'uses' => 'ProductosController@exit'
        ]
    );

    Route::post('/producto/vender/{id}', 'ProductosController@buy')->name('producto.buy');

    Route::get('/admin/logs', 'AdminController@index')->name('admin.logs');

    Route::get('/admin/registrar/usuario', 'AdminController@users')->name('admin.users');

    Route::post('/registrar/usuario', 'RegistroController@create')->name('admin.register');

});
