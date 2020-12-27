<?php
require_once "models/proveedor.php";

class ProveedorController{

    public function list(){
        require_once "views/proveedor/header.php";
      
        //DECLARAMOS LAS VARIABLES DE LA PAGINACION 
        //E INICIALIZAMOS CON VALORES PRIMARIOS PREDETERMINADOS
        $pag = 1;
        $registros_por_paginas = 3;
        $registros_totales = 0;
        $ultimo_registro = 0; 

        if(isset($_GET["pag"])){
            $pag = $_GET["pag"];    
        }        
        $ultimo_registro = ($pag - 1) * $registros_por_paginas;

        $proveedor = new Proveedor();
        $proveedores = $proveedor->getAll($registros_por_paginas, $ultimo_registro);
        $registros_totales = $proveedor->getCountAll()->registros_totales; // obtengo el conteo total de todos los registro de la tabla
        require_once "views/proveedor/list.php";        
    }

    public function register(){
        require_once "views/proveedor/header.php";
        $proveedor = new proveedor();
       //var_dump($_SESSION["form"]);
        //repobla los datos en caso de que el formulario haya arrojado un error
        if(isset($_SESSION["form"]) && $_SESSION["form"] != null){
            $proveedor->setNombre($_SESSION["form"]["nombre"]);
            $proveedor->setResponsable($_SESSION["form"]["responsable"]);
            $proveedor->setTelefono($_SESSION["form"]["telefono"]);
            $proveedor->setEmail($_SESSION["form"]["email"]);
            $proveedor->setDireccion($_SESSION["form"]["direccion"]);
            $_SESSION["form"] = null;
        }
        
        require_once "views/proveedor/register.php";
    }

    public function save(){
       
        if(isset($_POST)){
            $nombre = isset($_POST['nombre'])? trim($_POST['nombre']): false;
            $responsable = isset($_POST['responsable'])? trim($_POST['responsable']): false;
            $telefono = isset($_POST['telefono'])? trim($_POST['telefono']): false;
            $email = isset($_POST['email'])? trim($_POST['email']): false;
            $direccion = isset($_POST['direccion'])? trim($_POST['direccion']): false;
          

            //Array para almacenar Los Errores
            $errores = array();
            $form = array();
            $form['nombre'] = $nombre;
            $form['responsable'] = $responsable;
            $form['telefono'] = $telefono;
            $form['email'] = $email;
            $form['direccion'] = $direccion;
                        
            if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
                $errores['nombre'] = "El formato de nombre no es correcto";
            }

            if(empty($responsable) || is_numeric($responsable) || preg_match("/[0-9]/", $responsable)){
                $errores['responsable'] = "El formato de responsable no es correcto";
            }

            if(empty($telefono) || !is_numeric($telefono) || !preg_match("/[0-9]/", $telefono)){ 
                $errores['telefono'] = "El formato de telefono no es correcto";  
            }  

            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                $errores['email'] = "El formato del email  no es correcto";
            }

            if(empty($direccion) || is_numeric($direccion) || preg_match("/[0-9]/", $direccion)){
                $errores['direccion'] = "El formato de direccion no es correcto";
            }

            // anexa los datos de empresa al objeto para guardar
            $proveedor = new proveedor();
            $proveedor->setNombre($nombre);
            $proveedor->setResponsable($responsable);
            $proveedor->setTelefono($telefono);
            $proveedor->setEmail($email);
            $proveedor->setDireccion($direccion);
            
            if(count($errores)==0){

                //Guardar
                $save = $proveedor->save();
                
                if($save){
                    $_SESSION["register"] = "complete";                    
                    header("location:".base_url."proveedor/register");
                }else{
                    $_SESSION["register"] = "failed"; // Muestra, Error de Sessiones (Bostra)
                    $_SESSION["form"] = $form;
                    header("Location:".base_url. "proveedor/register");
                }
            }else{                
                $_SESSION["errores"]= $errores; // Muestra , Validaciones del Formulario
                $_SESSION["form"] = $form;
                header("location: ".base_url. "proveedor/register");
            }
        
        }
          
    }

    public function select(){
        require_once 'views/proveedor/header.php'; 
        $edit = true; 
        $proveedor = new proveedor(); 
            if(isset($_SESSION["form"]) && $_SESSION["form"] != null){  // Seteo Cuando Hay un Error y Repoblar
            $form = $_SESSION["form"];
            $proveedor->setId($_GET["id"]);        
            $proveedor->setNombre($form["nombre"]);
            $proveedor->setResponsable($form["responsable"]);
            $proveedor->setTelefono($form["telefono"]);
            $proveedor->setEmail($form["email"]);
            $proveedor->setDireccion($form["direccion"]);
            $_SESSION["form"]=null;
            }else{
            $proveedor->setId($_GET["id"]);
            $pro = $proveedor->getOneById(); // Consulta; con el Id Setiado para Repoblar            
            $proveedor->setId($pro->id);
            $proveedor->setNombre($pro->nombre);
            $proveedor->setResponsable($pro->responsable);
            $proveedor->setTelefono($pro->telefono);
            $proveedor->setEmail($pro->email);
            $proveedor->setDireccion($pro->direccion);
            }            
        require_once "views/proveedor/register.php";
    }  

    public function edit(){

        if(isset($_POST)){
        
            $id = isset($_POST['id'])? trim($_POST['id']): false;
            $nombre = isset($_POST['nombre'])? trim($_POST['nombre']): false;
            $responsable = isset($_POST['responsable'])? trim($_POST['responsable']): false;
            $telefono = isset($_POST['telefono'])? trim($_POST['telefono']): false;
            $email = isset($_POST['email'])? trim($_POST['email']): false;
            $direccion = isset($_POST['direccion'])? trim($_POST['direccion']): false;
          

            //Array para almacenar Los Errores
            $errores = array();
            $form = array();
            $form['nombre'] = $nombre;
            $form['responsable'] = $responsable;
            $form['telefono'] = $telefono;
            $form['email'] = $email;
            $form['direccion'] = $direccion;
                        
            if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
                $errores['nombre'] = "El formato de nombre no es correcto";
            }

            if(empty($responsable) || is_numeric($responsable) || preg_match("/[0-9]/", $responsable)){
                $errores['responsable'] = "El formato de responsable no es correcto";
            }

            if(empty($telefono) || !is_numeric($telefono) || !preg_match("/[0-9]/", $telefono)){ 
                $errores['telefono'] = "El formato de telefono no es correcto";  
            }  

            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                $errores['email'] = "El formato del email  no es correcto";
            }

            if(empty($direccion) || is_numeric($direccion) || preg_match("/[0-9]/", $direccion)){
                $errores['direccion'] = "El formato de direccion no es correcto";
            }

            
            //Anexa los datos de empresa al objeto
            $proveedor = new proveedor();
            $proveedor->setId($id);
            $proveedor->setNombre($nombre);
            $proveedor->setResponsable($responsable);
            $proveedor->setTelefono($telefono);
            $proveedor->setEmail($email);
            $proveedor->setDireccion($direccion);

                if(count($errores)==0) {
                    
                    //Editar
                    $edit = $proveedor->edit();

                    if($edit){
                        $_SESSION["register"] = "complete";
                        $_SESSION["mensaje"] = "Registro actualizado con exito!";                                                                                         
                        header("location:".base_url.'proveedor/list');
                    }else{
                        $_SESSION["register"] = "failed";  
                        $_SESSION["mensaje"] = "Registro fallido";                                             
                        $_SESSION["form"] = $form; 
                        header("Location:".base_url."proveedor/select&id=". $id);
                    }
                }else{
                    $_SESSION["errores"] = $errores;
                    $_SESSION["form"] = $form;
                    $_SESSION["register"] = "failed"; 
                    $_SESSION["mensaje"] = "Registro fallido";                   
                    header("location:" .base_url. "proveedor/select&id=". $id);
                }   

        }  
    } 

    public function remove(){
        require_once "views/proveedor/header.php";
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $title = "ELIMINAR REGISTRO";
            $action = "ELIMINAR";
        require_once 'views/proveedor/delete.php';
        require_once "views/proveedor/list.php";
        }
    }

    public function delete(){
        if(isset($_GET["id"])){
            $proveedor = new Proveedor();
            $proveedor->setId($_GET["id"]);
            $proveedor->delete();
            
            $_SESSION["register"] = "complete";
            $_SESSION["mensaje"] = "Registro eliminado con exito!";
        }
        header('Location:'.base_url.'proveedor/list');

    }




}

        
    
    



?>