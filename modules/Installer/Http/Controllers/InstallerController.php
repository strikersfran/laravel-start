<?php

namespace Modules\Installer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class InstallerController extends Controller
{
    private $envPath;// = base_path('.env');
    private $envExamplePath;// = base_path('.env.example');
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('installer::index');
    }

    /*Paso para verificar los requerimientos del servidor*/
    
    public function requerimientos(){
        
        $requirements =config('installer.requirements');
        
        $formData[] = [
            'label' => 'Requiere la Versión de PHP '.$requirements['php_version'],
            'check' => $this->checkPhpVersion($requirements['php_version'])
        ];
        
        foreach ($requirements['php_extensions'] as $ext) {
            $formData[] = [
                'label' => 'Extensión de PHP Enable: '.$ext,
                'check' => $this->checkPhpExtensionEnabled($ext),
            ];
        }
        
        return view('installer::requerimientos', compact('formData'));
    }
    /*Paso para verificar los permisos de las carpetas*/
    
    public function permisos(){
        
        $permisos =config('installer.folder_permissions');
        
        foreach ($permisos as $path => $perm) {
            $formData[] = [
                'label' => 'Carpeta '.$path.' Permiso: '.$perm,
                'check' => $this->checkFolderPermission($path,$perm)
            ];
        }
        
        return view('installer::permisos', compact('formData'));
    }

    /*Paso para configurar los parametros de la base de datos*/
    
    public function database(Request $request){
        
        if($request){

        }
        
        return view('installer::database');
    }
    
    /*Paso para modificar las variables de entorno*/
    public function environment() {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
        
        $envConfig = $this->getEnvContent();
        
        return view('installer::environment', compact('envConfig'));
    }    
    
    /*Para obtener el contenido del archivo .env o .evnv.example*/
    public function getEnvContent()
    {
        if (!file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else {
                touch($this->envPath);
            }
        }

        return file_get_contents($this->envPath);
    }
    
    /*Para verificar las extensiones de php*/
    protected function checkPhpExtensionEnabled($ext)
    {
        return extension_loaded($ext);
    }
    
    /*Para verificar la version de php*/
    protected function checkPhpVersion($requiredPhpVersion)
    {
        $currentPhpVersion = phpVersion();
        
        return version_compare($requiredPhpVersion, $currentPhpVersion, '<=');
    }
    
    /*Para verificar los permisos de las carpetas*/
    protected function checkFolderPermission($path, $perm)
    {
        return substr(sprintf('%o', fileperms(base_path($path))), -3) >= $perm;
    }
}
