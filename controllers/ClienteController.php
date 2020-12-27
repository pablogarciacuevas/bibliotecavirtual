<?php

require_once 'models/usuario.php';

class ClienteController{

    public function list(){
        require_once 'views/cliente/header.php';

        //DECLARAMOS LAS VARIABLES DE LA PAGINACION 
        //E INICIALIZAMOS CON VALORES PRIMARIOS PREDETERMINADOS
        $pag = 1;
        $registros_por_paginas = 5;
        $registros_totales = 0;
        $ultimo_registro = 0; 

        if(isset($_GET["pag"])){
            $pag = $_GET["pag"];
        }
        $ultimo_registro = ($pag - 1) * $registros_por_paginas;

        $usuario = new Usuario();
        $usuarios= $usuario->getAll('user',$registros_por_paginas, $ultimo_registro);
        $registros_totales = $usuario->getCountAll('user')->registros_totales; // obtengo el conteo total de todos los registro de la tabla
        // $registros_totales = $registros_totales->registros_totales; 
        // comente para simplificar el codigo añadi la ultima parte (->registros_totales) 
        // ver arriba linea 23. 
        require_once 'views/cliente/list.php';
    }

    public function search(){
        require_once 'views/cliente/header.php';
        require_once 'views/cliente/search.php';

        //DECLARAMOS LAS VARIABLES DE LA PAGINACION 
        //E INICIALIZAMOS CON VALORES PRIMARIOS PREDETERMINADOS
        $pag = 1;
        $registros_por_paginas = 5;
        $registros_totales = 0;
        $ultimo_registro = 0; 

        if(isset($_GET["pag"])){
            $pag = $_GET["pag"];
        }
        $ultimo_registro = ($pag - 1) * $registros_por_paginas;

        $usuario = new Usuario();
        $usuarios= $usuario->getAll('user',$registros_por_paginas, $ultimo_registro);
        $registros_totales = $usuario->getCountAll('user')->registros_totales; // obtengo el conteo total de todos los registro de la tabla
        // $registros_totales = $registros_totales->registros_totales; 
        // comente para simplificar el codigo añadi la ultima parte (->registros_totales) 
        // ver arriba linea 23. 

        require_once 'views/cliente/list.php';
    }

    public function searching(){
        require_once 'views/cliente/header.php';

        //DECLARAMOS LAS VARIABLES DE LA PAGINACION 
        //E INICIALIZAMOS CON VALORES PRIMARIOS PREDETERMINADOS
        $pag = 1;
        $registros_por_paginas = 5;
        $registros_totales = 0;
        $ultimo_registro = 0; 

        if(isset($_GET["pag"])){
            $pag = $_GET["pag"];
        }
        $ultimo_registro = ($pag - 1) * $registros_por_paginas;

        $usuario = new Usuario();
        $usuarios= $usuario->getAll('user',$registros_por_paginas, $ultimo_registro);
        $registros_totales = $usuario->getCountAll('user')->registros_totales; // obtengo el conteo total de todos los registro de la tabla
        // $registros_totales = $registros_totales->registros_totales; 
        // comente para simplificar el codigo añadi la ultima parte (->registros_totales) 
        // ver arriba linea 23. 
        if(isset($_POST['search'])){
            $search=trim($_POST["search"]);
       
            $usuarios = $usuario->getByAll('user',$search);
            require_once 'views/cliente/searching.php';
        }
        require_once 'views/cliente/list.php';
    }

    public function register(){
        require_once 'views/cliente/header.php';

        $usuario = new Usuario();
        if(isset($_SESSION["form"]) && $_SESSION["form"] != null){
            $form=$_SESSION["form"];
            $usuario->setNumeroDocumento($form["dni"]);
            $usuario->setOcupacion($form["ocupacion"]);
            $usuario->setNombre($form["nombre"]);
            $usuario->setApellidos($form["apellido"]);
            $usuario->setTelefono($form["telefono"]);
            $usuario->setDireccion($form["direccion"]);
            $usuario->setUsername($form["user"]);
            $usuario->setEmail($form["email"]);
            $usuario->setSexo($form["sexo"]);
            $_SESSION["form"]=null;
        }

        require_once 'views/cliente/register.php';
    }

    public function save(){
        if($_POST){
            $dni = isset($_POST["dni"]) ? $_POST["dni"] : false;
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
            $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : false;
            $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : false;
            $ocupacion = isset($_POST["ocupacion"]) ? $_POST["ocupacion"] : false;
            $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : false;
            $user = isset($_POST["usuario"]) ? $_POST["usuario"] : false;
            $password1 = isset($_POST["password1"]) ? $_POST["password1"] : false;
            $password2 = isset($_POST["password2"]) ? $_POST["password2"] : false;
            $email = isset($_POST["email"]) ? $_POST["email"] : false;
            $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : false;

            //declaro arrays que posteriormente sera una variables de session
            $errores = array();
            $form = array();
            $form["dni"] = $dni;
            $form["nombre"] = $nombre;
            $form["apellido"] = $apellido;
            $form["telefono"] = $telefono;
            $form["ocupacion"] = $ocupacion;
            $form["direccion"] = $direccion;
            $form["email"] = $email;
            $form["user"] = $user;
            $form["sexo"] = $sexo;

            if(empty(trim($dni)) || !is_numeric($dni) || !preg_match("/[0-9]/",$dni)){
                $errores["dni"] = "El formato de dni no es el correcto";
            } 

            if(empty(trim($nombre)) || is_numeric($nombre) || preg_match("/[0-9]/",$nombre)){
                $errores["nombre"] = "El formato de dni no es el correcto";
            } 

            if(empty(trim($apellido)) || is_numeric($apellido) || preg_match("/[0-9]/",$apellido)){
                $errores["apellido"] = "El formato de apellido no es el correcto";
            }

            if(empty(trim($telefono)) || !is_numeric($telefono) || !preg_match("/[0-9]/", $telefono)){
                $errores["telefono"] = "El formato de telefono no es el correcto";
            }

            if(empty(trim($ocupacion)) || is_numeric($ocupacion) || preg_match("/[0-9]/",$ocupacion)){
                $errores["ocupacion"] = "El formato de ocupacion no es el correcto";
            }

            if(empty(trim($direccion))){
                $errores["direccion"] = "El formato de direccion no es el correcto";
            }

            if(empty(trim($email)) || !filter_var($email, FILTER_VALIDATE_EMAIL) ){
                $errores["email"] = "El formato de email no es el correcto";
            }

            if(empty(trim($user))){
                $errores["usuario"] = "Debe completar usuario";
            }

            if(empty($password1)){
                $errores["password1"] = "Debe completar password";
            }

            if($password1 != $password2){
                $errores["password2"] = "Debe repetir la misma contraseña";
            }
            
            //anexa los datos de usuario al objeto
            $usuario = new Usuario();
            $usuario->setNumeroDocumento($dni);
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellido);
            $usuario->setTelefono($telefono);
            $usuario->setDireccion($direccion);
            $usuario->setUsername($user);
            $usuario->setPassword($password1);
            $usuario->setEmail($email);
            $usuario->setSexo($sexo);
            $usuario->setOcupacion($ocupacion);
            $usuario->setPrivilegio(3);
            if($usuario->getByDocument()->num_rows > 0){
                $errores["dni"]="El dni/cedula ya existe en la base de datos";
            }else if ($usuario->getByEmail()->num_rows > 0){
                $errores["email"]="El email ya existe en la base de datos";
            }else if ($usuario->getByUsername()->num_rows > 0){
                $errores["usuario"]="El usuario ya existe en la base de datos";
            }

            if(count($errores) == 0){
                //EJECUTAR EL REGISTRO DE CLIENTES
                $save = $usuario->save('user');

                if($save){
                    $_SESSION["register"]="complete";
                    $_SESSION["mensaje"]= "Registro guardado con exito!";
                    header("Location:".base_url.'cliente/list'); 
                }else{
                    $_SESSION["register"]="failed";
                    $_SESSION["form"]=$form;
                    header("Location:". base_url. "cliente/register");
                }
            }else{
                $_SESSION["errores"] = $errores;
                $_SESSION["form"]=$form;
                header("Location:". base_url. "cliente/register");
            }
        }
    }

    public function cancel(){
        require_once 'views/cliente/header.php';

        //DECLARAMOS LAS VARIABLES DE LA PAGINACION 
        //E INICIALIZAMOS CON VALORES PRIMARIOS PREDETERMINADOS
        $pag = 1;
        $registros_por_paginas = 5;
        $registros_totales = 0;
        $ultimo_registro = 0; 

        if(isset($_GET["pag"])){
            $pag = $_GET["pag"];
        }
        $ultimo_registro = ($pag - 1) * $registros_por_paginas;

        $usuario = new Usuario();
        $usuarios= $usuario->getAll('user',$registros_por_paginas, $ultimo_registro);
        $registros_totales = $usuario->getCountAll('user')->registros_totales; // obtengo el conteo total de todos los registro de la tabla
        // $registros_totales = $registros_totales->registros_totales; 
        // comente para simplificar el codigo añadi la ultima parte (->registros_totales) 
        // ver arriba linea 23. 

        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $title = "ANULAR USUARIO";
            $action = "ANULAR";
            require_once 'views/cliente/delete.php';
        }

        require_once 'views/cliente/list.php';
    }

    public function canceling(){
        require_once 'views/cliente/header.php';

        if(isset($_GET["id"])){
            $usuario = new Usuario();
            $usuario->setId($_GET["id"]);
            $usuario->cancel();
            
            $_SESSION["register"] = "complete";
            $_SESSION["mensaje"] = "Registro anulado con exito!";
        }

        header('Location:'.base_url.'cliente/list');
    }

    public function select(){
        require_once 'views/cliente/header.php';

        $edit = true;

        if(isset($_GET["id"])){
            $usuario = new Usuario();

            if(isset($_SESSION["form"]) && $_SESSION["form"] != null){
                $form=$_SESSION["form"];
                $usuario->setId($_GET["id"]);
                $usuario->setNumeroDocumento($form["dni"]);
                $usuario->setNombre($form["nombre"]);
                $usuario->setApellidos($form["apellido"]);
                $usuario->setTelefono($form["telefono"]);
                $usuario->setDireccion($form["direccion"]);
                $usuario->setUsername($form["user"]);
                $usuario->setEmail($form["email"]);
                $usuario->setSexo($form["sexo"]);
                $usuario->setOcupacion($form["ocupacion"]);
                $_SESSION["form"]=null;
            }else{
                $usuario->setId($_GET["id"]);
                $user = $usuario->getOneById();
                $usuario->setNumeroDocumento($user->numeroDocumento);
                $usuario->setNombre($user->nombre);
                $usuario->setApellidos($user->apellidos);
                $usuario->setTelefono($user->telefono);
                $usuario->setDireccion($user->direccion);
                $usuario->setUsername($user->username);
                $usuario->setEmail($user->email);
                $usuario->setSexo($user->sexo);
                $usuario->setOcupacion($user->ocupacion);
            }
        }

        require_once 'views/cliente/register.php';
    }

    public function edit(){

        if(isset($_POST)){
            //Recibo los datos
            $editarPassword = false;

            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $dni = isset($_POST["dni"]) ? $_POST["dni"] : false;
            $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
            $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : false;
            $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : false;
            $ocupacion = isset($_POST["ocupacion"]) ? $_POST["ocupacion"] : false;
            $direccion = isset($_POST["direccion"]) ? $_POST["direccion"] : false;
            $user = isset($_POST["usuario"]) ? $_POST["usuario"] : false;
            $password1 = isset($_POST["password1"]) ? $_POST["password1"] : false;
            $password2 = isset($_POST["password2"]) ? $_POST["password2"] : false;
            $email = isset($_POST["email"]) ? $_POST["email"] : false;
            $sexo = isset($_POST["sexo"]) ? $_POST["sexo"] : false;

            //declaro arrays que posteriormente sera una variables de session
            $errores = array();
            $form = array();
            $form["dni"] = $dni;
            $form["nombre"] = $nombre;
            $form["apellido"] = $apellido;
            $form["telefono"] = $telefono;
            $form["ocupacion"] = $ocupacion;
            $form["direccion"] = $direccion;
            $form["email"] = $email;
            $form["user"] = $user;
            $form["sexo"] = $sexo;

            //Validar los datos
            if(empty(trim($dni)) || !is_numeric($dni) || !preg_match("/[0-9]/",$dni)){
                $errores["dni"] = "El formato de dni no es el correcto";
            }

            if(empty(trim($nombre)) || is_numeric($nombre) || preg_match("/[0-9]/",$nombre)){
                $errores["nombre"] = "El formato de nombre no es el correcto";
            }

            if(empty(trim($apellido)) || is_numeric($apellido) || preg_match("/[0-9]/",$apellido)){
                $errores["apellido"] = "El formato de apellido no es el correcto";
            }

            if(empty(trim($telefono)) || !is_numeric($telefono) || !preg_match("/[0-9]/", $telefono)){
                $errores["telefono"] = "El formato de telefono no es el correcto";
            }

            if(empty(trim($ocupacion)) || is_numeric($ocupacion) || preg_match("/[0-9]/",$ocupacion)){
                $errores["ocupacion"] = "El formato de ocupacion no es el correcto";
            }

            if(empty(trim($direccion))){
                $errores["direccion"] = "El formato de direccion no es el correcto";
            }

            if(empty(trim($email)) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
                $errores["email"] = "El formato email no es el correcto";
            }

            if(empty(trim($user))){
                $errores["usuario"] = "Debe completar usuario";
            }

            if(!empty($password1)){
                if($password1 != $password2){
                    $errores["password2"] = "Debe repetir la misma contraseña";
                }
                $editarPassword=true;
            }

            if(isset($id)){
                //anexa los datos de usuario al objeto
                $usuario = new Usuario();
                $usuario->setId($id);
                $usuario->setNumeroDocumento($dni);
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellido);
                $usuario->setTelefono($telefono);
                $usuario->setDireccion($direccion);
                $usuario->setUsername($user);
                $usuario->setPassword($password1);
                $usuario->setEmail($email);
                $usuario->setSexo($sexo);
                $usuario->setOcupacion($ocupacion);
                $usuario->setPrivilegio(3);
                if($usuario->getByDocument()->num_rows > 0){
                    $errores["dni"]="El dni/cedula ya existe en la base de datos";
                }else if ($usuario->getByEmail()->num_rows > 0){
                    $errores["email"]="El email ya existe en la base de datos";
                }else if ($usuario->getByUsername()->num_rows > 0){
                    $errores["usuario"]="El usuario ya existe en la base de datos";
                }

                if(count($errores)==0){
                    
                    $edit = $usuario->edit($editarPassword);

                    if($edit){
                        $_SESSION["register"] = "complete";
                        $_SESSION["mensaje"] = "Registro actualizado con exito!";
                        header("Location:".base_url.'cliente/list'); 
                    }else{
                        $_SESSION["register"] = "failed";
                        $_SESSION["form"] = $form;
                        header("Location:".base_url."cliente/select&id=". $id);
                    }
                }else{
                    $_SESSION["errores"] = $errores;
                    $_SESSION["register"] = "failed";
                    header("Location:".base_url."cliente/select&id=". $id);
                }
            }else{
                $_SESSION["register"] = "failed";
                header("Location:".base_url."cliente/list");
            }
        }
    }

    public function remove(){
        require_once 'views/cliente/header.php';

        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $title = "ELIMINAR USUARIO";
            $action = "ELIMINAR";
            require_once 'views/cliente/delete.php';
        }

        //DECLARAMOS LAS VARIABLES DE LA PAGINACION 
        //E INICIALIZAMOS CON VALORES PRIMARIOS PREDETERMINADOS
        $pag = 1;
        $registros_por_paginas = 5;
        $registros_totales = 0;
        $ultimo_registro = 0; 

        if(isset($_GET["pag"])){
            $pag = $_GET["pag"];
        }
        $ultimo_registro = ($pag - 1) * $registros_por_paginas;

        $usuario = new Usuario();
        $usuarios= $usuario->getAll('user',$registros_por_paginas, $ultimo_registro);
        $registros_totales = $usuario->getCountAll('user')->registros_totales; // obtengo el conteo total de todos los registro de la tabla
        // $registros_totales = $registros_totales->registros_totales; 
        // comente para simplificar el codigo añadi la ultima parte (->registros_totales) 
        // ver arriba linea 23. 

        require_once 'views/cliente/list.php';
    }

    public function delete(){
        require_once 'views/cliente/header.php';
        $usuario = new Usuario();

        if(isset($_GET["id"])){
            $usuario = new Usuario();
            $usuario->setId($_GET["id"]);
            $usuario->delete();
            
            $_SESSION["register"] = "complete";
            $_SESSION["mensaje"] = "Registro eliminado con exito!";
        }
        header('Location:'.base_url.'cliente/list');
    }   
}

?>