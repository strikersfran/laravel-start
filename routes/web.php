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

/*Esta ruta es para permitir vincular los assets desde la ubicacion dentro del modulo y no desde public
 * con la intencion de evitar hacer php artisan module:publish <Module> cada vez que hagamos cambio en los assets
 * al vincular los assets en las view debemos hacerlo de la siguiente manera Module::asset('<modulo>:assets/js/<file>.js')
 * esto garantizará que estamos vinculando el assets correcto
 * */
use Illuminate\Support\Facades\Route;

Route::get('modules/{module}/assets/{type}/{file}', [ function ($module, $type, $file) {
    //dd('hola');
    $module = ucfirst($module);
    
    $path = base_path("modules/$module/Resources/assets/$type/$file");
    
    if($type == 'js'){
        return response()->file($path, array('Content-Type' => 'application/javascript'));
    }else{
        return response()->file($path, array('Content-Type' => 'text/css'));
    } 
    
    return response()->json([$path], 404);
}]);