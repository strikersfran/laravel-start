<?php

namespace Modules\Installer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Redirect;
use Artisan;
use Exception;

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
    
    public function database(){                

        $input=[];

        $abrir = fopen(base_path('.env'),'r+');
        $contenido = fread($abrir,filesize(base_path('.env')));
        fclose($abrir);

        $contenido = explode("\r\n",$contenido);
        //dd($contenido);
        for($i=0;$i<count($contenido);$i++) {
            if(strpos($contenido[$i],'DB_CONNECTION')!==false){                
                $input['tipodb']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'DB_PORT')!==false){
                $input['portdb']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'DB_DATABASE')!==false){
                $input['namedb']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'DB_USERNAME')!==false){
                $input['userdb']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'DB_PASSWORD')!==false){
                $input['passdb']=explode('=',$contenido[$i])[1];
            }
        }
        
        //dd($input);
        return view('installer::database')->with($input);
    }
    public function dbsave(Request $request){
        
        $rules = [
            'tipodb'      => 'required',
            'portdb'      => 'required',
            'userdb'=>'required',
            //'passdb' =>'required',
            'namedb' =>'required'
        ];

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $abrir = fopen(base_path('.env'),'r+');
        $contenido = fread($abrir,filesize(base_path('.env')));
        fclose($abrir);

        $contenido = explode("\r\n",$contenido);
        //dd($contenido);
        for($i=0;$i<count($contenido);$i++) {
            if(strpos($contenido[$i],'DB_CONNECTION')!==false){
                $contenido[$i]='DB_CONNECTION='.$request->tipodb;
            }
            if(strpos($contenido[$i],'DB_PORT')!==false){
                $contenido[$i]='DB_PORT='.$request->portdb;
            }
            if(strpos($contenido[$i],'DB_DATABASE')!==false){
                $contenido[$i]='DB_DATABASE='.$request->namedb;
            }
            if(strpos($contenido[$i],'DB_USERNAME')!==false){
                $contenido[$i]='DB_USERNAME='.$request->userdb;
            }
            if(strpos($contenido[$i],'DB_PASSWORD')!==false){
                $contenido[$i]='DB_PASSWORD='.$request->passdb;
            }
        }

        //print_r($contenido);

        // Unir archivo
        $contenido = implode("\r\n",$contenido);

        // Guardar Archivo
        $abrir = fopen(base_path('.env'),'w');
        fwrite($abrir,$contenido);
        fclose($abrir);        
        
        return redirect('installer/email');
    }

    /*Paso para configurar los parametros para el envio de email*/
    
    public function email(){                

        $input=[];

        $abrir = fopen(base_path('.env'),'r+');
        $contenido = fread($abrir,filesize(base_path('.env')));
        fclose($abrir);

        $contenido = explode("\r\n",$contenido);
        //dd($contenido);
        for($i=0;$i<count($contenido);$i++) {
            if(strpos($contenido[$i],'MAIL_DRIVER')!==false){                
                $input['emaildriver']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'MAIL_HOST')!==false){
                $input['emailhost']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'MAIL_PORT')!==false){
                $input['emailport']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'MAIL_USERNAME')!==false){
                $input['emailuser']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'MAIL_PASSWORD')!==false){
                $input['emailpass']=explode('=',$contenido[$i])[1];
            }
            if(strpos($contenido[$i],'MAIL_ENCRYPTION')!==false){
                $input['emailen']=explode('=',$contenido[$i])[1];
            }
        }
        
        //dd($input);
        return view('installer::email')->with($input);
    }
    public function emailsave(Request $request){
        
        if($request->emaildriver=='log'){
            $rules = [
                'emaildriver'      => 'required'
            ];
        }
        else{
            $rules = [
                'emaildriver'      => 'required',
                'emailhost'      => 'required',
                'emailport'=>'required',
                'emailuser' =>'required',
                'emailpass' =>'required',
                'emailen' =>'required'
            ];
        }

        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }

        $abrir = fopen(base_path('.env'),'r+');
        $contenido = fread($abrir,filesize(base_path('.env')));
        fclose($abrir);

        $contenido = explode("\r\n",$contenido);
        //dd($contenido);
        for($i=0;$i<count($contenido);$i++) {
            if(strpos($contenido[$i],'MAIL_DRIVER')!==false){                
                $contenido[$i]='MAIL_DRIVER='.$request->emaildriver;
            }
            if(strpos($contenido[$i],'MAIL_HOST')!==false){
                $contenido[$i]='MAIL_HOST='.$request->emailhost;
            }
            if(strpos($contenido[$i],'MAIL_PORT')!==false){
                $contenido[$i]='MAIL_PORT='.$request->emailport;
            }
            if(strpos($contenido[$i],'MAIL_USERNAME')!==false){
                $contenido[$i]='MAIL_USERNAME='.$request->emailuser;
            }
            if(strpos($contenido[$i],'MAIL_PASSWORD')!==false){
                $contenido[$i]='MAIL_PASSWORD='.$request->emailpass;
            }
            if(strpos($contenido[$i],'MAIL_ENCRYPTION')!==false){
                $contenido[$i]='MAIL_ENCRYPTION='.$request->emailen;
            }
        }

        //print_r($contenido);

        // Unir archivo
        $contenido = implode("\r\n",$contenido);

        // Guardar Archivo
        $abrir = fopen(base_path('.env'),'w');
        fwrite($abrir,$contenido);
        fclose($abrir);        
        
        return redirect('installer/migration');
    }
    
    
    /*Paso para modificar las variables de entorno*/
    public function environment() {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
        
        $envConfig = $this->getEnvContent();
        
        return view('installer::environment', compact('envConfig'));
    }  

    /*Para realizar las migracion*/

    public function migration(){

        try{            
            Artisan::call('module:migrate');
            Artisan::call('module:seed');
        }catch(Exception $e){
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('error',$e->getMessage());
            return view('installer::migration')->withErrors($errors);
        }

        return view('installer::migration');

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
