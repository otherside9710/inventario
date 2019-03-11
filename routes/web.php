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

    //SECCCIONES
    Route::get('/secciones', 'SeccionesController@index')->name('sections');
    Route::get('/secciones/contenido/{id}', 'SeccionesController@getContentById')->name('section.getcontent');
    Route::post('/secciones/contenido/actualizar', 'SeccionesController@update')->name('section.update');
    //END SECCIONES

    //NOTICIAS
    Route::get('/noticias', 'NoticiasController@index')->name('notices');
    Route::get('/noticias/editar/{id}', 'NoticiasController@edit')->name('notice.edit');
    Route::get('/noticias/eliminar/{id}', 'NoticiasController@delete')->name('notice.delete');
    Route::get('/noticias/agregar', 'NoticiasController@add')->name('notice.add');
    Route::post('/noticias/guardar', 'NoticiasController@save')->name('notice.save');
    Route::post('/noticias/actualizar', 'NoticiasController@update')->name('notice.update');
    //END NOTICIAS

    //TEAM
    Route::get('/equipo', 'TeamController@index')->name('team');
    Route::get('/equipo/editar/{id}', 'TeamController@edit')->name('team.edit');
    Route::get('/equipo/eliminar/{id}', 'TeamController@delete')->name('team.delete');
    Route::post('/equipo/actualizar', 'TeamController@update')->name('team.update');
    Route::get('/equipo/agregar', 'TeamController@add')->name('team.add');
    Route::post('/equipo/guardar', 'TeamController@save')->name('team.save');
    //END TEAM
});
