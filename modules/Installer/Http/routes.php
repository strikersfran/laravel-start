<?php

Route::group(['middleware' => 'web', 'prefix' => 'installer', 'namespace' => 'Modules\Installer\Http\Controllers'], function()
{
    Route::get('/', 'InstallerController@index');
});
