<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web', 'prefix' => 'installer', 'namespace' => 'Modules\Installer\Http\Controllers'], function()
{
    Route::get('/', 'InstallerController@index');   
    Route::get('requerimientos', 'InstallerController@requerimientos');
    Route::get('permisos', 'InstallerController@permisos');    
    Route::get('database', 'InstallerController@database');
    Route::post('dbsave', 'InstallerController@dbsave');
    Route::get('email', 'InstallerController@email');
    Route::post('emailsave', 'InstallerController@emailsave');
    Route::get('migration', 'InstallerController@migration');
    Route::get('environment','InstallerController@environment');
    Route::post('environment/save','InstallerController@environmentSave');
    
    /*Route::get('database', [
        'as' => 'database',
        'uses' => 'DatabaseController@database'
    ]);

    Route::get('final', [
        'as' => 'final',
        'uses' => 'FinalController@finish'
    ]);*/
});
