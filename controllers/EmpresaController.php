<?php
require_once "models/empresa.php";

class EmpresaController{

    public function list(){
        require_once "views/empresa/header.php";

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
           
        $empresa = new empresa();
        $empresas = $empresa->getAll($registros_por_paginas, $ultimo_registro);
        $registros_totales = $empresa->getCountAll()->registros_totales; // obtengo el conteo total de todos los registro de la tabla
        // $registros_totales = $registros_totales->registros_totales; 
        // comente para simplificar el codigo añadi la ultima parte (->registros_totales) 
        // ver arriba linea 23.        
        require_once "views/empresa/list.php";
    }

    public function register(){
        require_once "views/empresa/header.php";

        $empresa = new Empresa();
        
        //repobla los datos en caso de que el formulario haya arrojado un error
        if(isset($_SESSION["form"]) && $_SESSION["form"] != null){
            $empresa->setCodigo($_SESSION["form"]["codigo"]);
            $empresa->setNombre($_SESSION["form"]["nombre"]);
            $empresa->setTelefono($_SESSION["form"]["telefono"]);
            $empresa->setEmail($_SESSION["form"]["email"]);
            $empresa->setDireccion($_SESSION["form"]["direccion"]);
            $empresa->setDirector($_SESSION["form"]["director"]);
            $empresa->setSimboloMoneda($_SESSION["form"]["moneda"]);
            $empresa->setAnio($_SESSION["form"]["year"]);
            $_SESSION["form"] = null;
        }

        require_once "views/empresa/register.php";
    }

    public function save(){
        
        if(isset($_POST)){

            //Captura la informacion que llega por post
            $codigo = isset($_POST['codigo'])? trim($_POST['codigo']): false;
            $nombre = isset($_POST['nombre'])? trim($_POST['nombre']): false;
            $telefono = isset($_POST['telefono'])? trim($_POST['telefono']): false;
            $email = isset($_POST['email'])? trim($_POST['email']): false;
            $direccion = isset($_POST['direccion'])? trim($_POST['direccion']): false;
            $director = isset($_POST['director'])? trim($_POST['director']): false;
            $moneda = isset($_POST['moneda'])? trim($_POST['moneda']): false;
            $year = isset($_POST['year'])? trim($_POST['year']): false;

            // ARRAY PARA ALMACENAR LOS ERRORES
            $errores = array();
            $form = array();
            $form["codigo"] = $codigo;
            $form["nombre"] = $nombre;
            $form["telefono"] = $telefono;
            $form["email"] = $email;
            $form["direccion"] = $direccion;
            $form["director"] = $director;
            $form["moneda"] = $moneda;
            $form["year"] = $year;

            //VALIDAR DATOS
            if(empty($codigo) || !is_numeric($codigo) || !preg_match("/[0-9]/",$codigo)){
                $errores['codigo'] = "El formato codigo no es correcto";
            }

            if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
                $errores['nombre'] = "El formato de nombre no es correcto";
            }

            if(empty($telefono) || !is_numeric($telefono) || !preg_match("/[0-9]/", $telefono)){ 
                $errores['telefono'] = "El formato de telefono no es correcto";  
            }

            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                $errores['email'] = "El formato del email  no es correcto";
            }

            if(empty($direccion)){
                $errores['direccion'] = "El direccion no debe de estar vacio";
            }

            if(empty($director)){
                $errores['director'] = "El directorio no debe de estar vacio";   
            }

            if(empty($moneda) || preg_match("/[0-9]/", $moneda)){
                $errores['moneda'] = "El Formato de la moneda no es correcto";
            }

            if(empty($year) ||  !is_numeric($year)){
                $errores['year'] = "El Formato de la Año no es correcto"; 
            }

            //Anexa los datos de empresa al objeto para guardar
            $empresa = new empresa();
            $empresa->setCodigo($codigo);
            $empresa->setNombre($nombre);
            $empresa->setTelefono($telefono);
            $empresa->setEmail($email);
            $empresa->setDireccion($direccion);
            $empresa->setDirector($director);
            $empresa->setSimboloMoneda($moneda);
            $empresa->setAnio($year);

            if(count($errores)==0){

                //Guardar
               $save =  $empresa->save();
               if($save){
                    $_SESSION["register"] = "complete";
                    $_SESSION["mensaje"] = "Registro guardado con exito!";
                header("Location:".base_url.'empresa/register'); 
                }else{
                    $_SESSION["register"] = "failed";
                    $_SESSION["form"] = $form;
                    header("Location:".base_url."empresa/register");
                }           
            }else{
                $_SESSION["errores"]= $errores;
                $_SESSION["form"] = $form;
                header("location: " . base_url . "empresa/register");
            }

        }
    }

    public function select(){
        require_once 'views/empresa/header.php';

        $edit = true;

        if(isset($_GET["id"])){
            $empresa = new empresa();

            if(isset($_SESSION["form"]) && $_SESSION["form"] != null){ //Si hay Algun Error Repoblas.
                $form=$_SESSION["form"];
                $empresa->setId($_GET["id"]);
                $empresa->setCodigo($form["codigo"]);
                $empresa->setNombre($form["nombre"]);
                $empresa->setTelefono($form["telefono"]);
                $empresa->setEmail($form["email"]);
                $empresa->setDireccion($form["direccion"]);
                $empresa->setDirector($form["director"]);
                $empresa->setSimboloMoneda($form["moneda"]);
                $empresa->setAnio($form["year"]);
                $_SESSION["form"]=null;
            }else { // Y cuando no Haya Error, Pues Con el GET[id] Repoblas Con La Finalidad de Hacer la Consulta.
                $empresa->setId($_GET["id"]);
                $emp = $empresa->getOneById(); // Consulta Con el Id Setiado

                $empresa->setCodigo($emp->codigo);
                $empresa->setNombre($emp->nombre);
                $empresa->setTelefono($emp->telefono);
                $empresa->setEmail($emp->email);
                $empresa->setDireccion($emp->direccion);
                $empresa->setDirector($emp->director);
                $empresa->setSimboloMoneda($emp->simbolo_moneda);
                $empresa->setAnio($emp->anio);

            }
        }

        require_once 'views/empresa/register.php';
    }


    public function edit(){

        if(isset($_POST)){

            $id = isset($_POST['id'])? trim($_POST['id']): false;
            $codigo = isset($_POST['codigo'])? trim($_POST['codigo']): false;
            $nombre = isset($_POST['nombre'])? trim($_POST['nombre']): false;
            $telefono = isset($_POST['telefono'])? trim($_POST['telefono']): false;
            $email = isset($_POST['email'])? trim($_POST['email']): false;
            $direccion = isset($_POST['direccion'])? trim($_POST['direccion']): false;
            $director = isset($_POST['director'])? trim($_POST['director']): false;
            $moneda = isset($_POST['moneda'])? trim($_POST['moneda']): false;
            $year = isset($_POST['year'])? trim($_POST['year']): false;  


            // ARRAY PARA ALMACENAR LOS ERRORES
            $errores = array();
            // ARRAY PARA REPOBLAR
            $form = array();
            $form["codigo"] = $codigo;
            $form["nombre"] = $nombre;
            $form["telefono"] = $telefono;
            $form["email"] = $email;
            $form["direccion"] = $direccion;
            $form["director"] = $director;
            $form["moneda"] = $moneda;
            $form["year"] = $year;

            // VALIDAR DATOS
            if(empty($codigo) || !is_numeric($codigo) || !preg_match("/[0-9]/",$codigo)){
                $errores['codigo'] = "El formato codigo no es correcto";
            }

            if(empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)){
                $errores['nombre'] = "El formato de nombre no es correcto";
            }

            if(empty($telefono) || !is_numeric($telefono) || !preg_match("/[0-9]/", $telefono)){ 
                $errores['telefono'] = "El formato de telefono no es correcto";  
            }

            if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                $errores['email'] = "El formato del email  no es correcto";
            }

            if(empty($direccion)){
                $errores['direccion'] = "El direccion no debe de estar vacio";
            }

            if(empty($director)){
                $errores['director'] = "El directorio no debe de estar vacio";   
            }

            if(empty($moneda) || preg_match("/[0-9]/", $moneda)){
                $errores['moneda'] = "El Formato de la moneda no es correcto";
            }

            if(empty($year) ||  !is_numeric($year)){
                $errores['year'] = "El Formato de la Año no es correcto"; 
            }
                         
            //Anexa los datos de empresa al objeto
            $empresa = new empresa();
            $empresa->setId($id);
            $empresa->setCodigo($codigo);
            $empresa->setNombre($nombre);
            $empresa->setTelefono($telefono);
            $empresa->setEmail($email);
            $empresa->setDireccion($direccion);
            $empresa->setDirector($director);
            $empresa->setSimboloMoneda($moneda);
            $empresa->setAnio($year);
                   
                if(count($errores)==0) {
                   
                    //Editar
                $edit = $empresa->edit();                    
                    if($edit){
                        $_SESSION["register"] = "complete";
                        $_SESSION["mensaje"] = "Empresa Actualizada con exito";
                        header("location:".base_url.'empresa/list');
                    }else{
                        $_SESSION["register"] = "failed";
                        $_SESSION["mensaje"] = "Registro fallido";
                        $_SESSION["form"] = $form; 
                        header("Location:".base_url."empresa/select&id=". $id);
                    }
                }else{
                    $_SESSION["errores"] = $errores;
                    $_SESSION["form"] = $form;
                    $_SESSION["register"] = "failed";
                    $_SESSION["mensaje"] = "Registro fallido";
                    header("location:" .base_url. "empresa/select&id=". $id);
                }                
        }

    }

    public function remove(){
        $title = "ELIMINAR REGISTRO";
        require_once "views/empresa/header.php";
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $title = "ELIMINAR REGISTRO";
            $action = "ELIMINAR";
            require_once 'views/empresa/delete.php';
        }

        $pag = 1;
        $registros_por_paginas = 5;
        $registros_totales = 0;
        $ultimo_registro = 0; 

        if(isset($_GET["pag"])){
            $pag = $_GET["pag"];
        }

        $ultimo_registro = ($pag - 1) * $registros_por_paginas;

        $empresa = new Empresa();
        $empresas = $empresa->getAll($registros_por_paginas,$ultimo_registro);
        $registros_totales = $empresa->getCountAll()->registros_totales;
        require_once "views/empresa/list.php";
    }

    public function delete(){
        if(isset($_GET["id"])){
            $empresa = new Empresa();
            $empresa->setId($_GET["id"]);
            $empresa->delete();
            
            $_SESSION["register"] = "complete";
            $_SESSION["mensaje"] = "Registro eliminado con exito!";
        }
        header('Location:'.base_url.'empresa/list');
    }

}




?>
