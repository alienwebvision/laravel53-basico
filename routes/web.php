<?php
Route::get('/painel/produtos/tests', 'Painel\ProdutoController@tests');

Route::resource('/painel/produtos', 'Painel\ProdutoController');

Route::group(['namespace' => 'Site'], function () {


    Route::get('/categoria/{id}', 'SiteController@categoria')->middleware('auth');
    Route::get('/categoria/{id?}', 'SiteController@categoriaOp');

    Route::get('/contact', 'SiteController@contact');

    Route::get('/', 'SiteController@index');


});
