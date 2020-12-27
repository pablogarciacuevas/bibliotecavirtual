<?php

class Utils{

    public static function seleccionarImagen($imagen){
        if(is_null($imagen) || empty(trim($imagen))) 
            $imagen = 'assets/book/book-default.png';
            
        return $imagen;
    }

    public static function subirImagen($imagen){
        $nombreImagen = $imagen["imagen"]["name"];
        $nombreTemporalImagen = $imagen["imagen"]["tmp_name"];
        $rutaEnvio = "uploads/imagenes/" . $nombreImagen;
        move_uploaded_file($nombreTemporalImagen,$rutaEnvio);
    }

    public static function rutaImagen($imagen){
        $nombreImagen = $imagen["imagen"]["name"];
        $rutaEnvio = "uploads/imagenes/" . $nombreImagen;
        return $rutaEnvio;
    }


    public static function subirArchivo($archivo){
        $nombreArchivo = $archivo["pdf"]["name"];       
        $nombreTemporalArchivo = $archivo["pdf"]["tmp_name"];        
        $rutaEnvio = "uploads/pdf/" . $nombreArchivo;
        move_uploaded_file($nombreTemporalArchivo,$rutaEnvio);
    }

    public static function rutaPdf($archivo){
        $nombrePdf = $archivo["pdf"]["name"];
        $rutaEnvio = "uploads/pdf/" . $nombrePdf;
        return $rutaEnvio;
    }

    public static function mostrarError($errores,$campo){
        $alerta='';
        
        if(isset($errores[$campo]) && !empty($campo)){
            $alerta = "<div class='valid_form'>" . $errores[$campo] ."</div>";
        }
        
        return $alerta;
    }

    public static function borrarErrores(){
        $_SESSION["errores"]= null;
        $_SESSION["register"]= null;
        $_SESSION["mensaje"]= null;
        // session_unset($_SESSION["errores"]);
    }

    public static function verificarSiExisteLaSession(){
        if($_SESSION["identity"]==null){
            header("location:".base_url."usuario/login");
        }
    }

    public static function paginar($registros_por_paginas,$registros_totales,$pagina_actual,$controlado_lista){
        //Una funcion para paginar las listas 
        $html = "<li></li>";
        $paginas = $registros_totales/$registros_por_paginas;
        $paginas = ceil($paginas);     
       
        if($paginas>1){
            //ANTERIOR
            if($pagina_actual==1){
                $html="<li class='disabled'><a href='#'>«</a></li>";                                
            }else{
                $html="<li><a href='". base_url . $controlado_lista ."&pag=". ($pagina_actual-1) . "'>«</a></li>";
            }
            
            for ($i=1; $i <= $paginas; $i++) {                  
                if($pagina_actual==$i){
                    $html.="<li class='active'><a href='". base_url . $controlado_lista ."&pag=".$i."'>".$i."</a></li>";
                }else{
                    $html.="<li><a href='". base_url . $controlado_lista ."&pag=".$i."'>".$i."</a></li>";                                                                               
                }
            }
            
            //SIGUIENTE
            if($pagina_actual==$paginas){
                //Si la Pagina Actual es Estrictamente Igual al Final que es Resultado de la Division y el Ceil. Redondedo
                $html.="<li class='disabled'><a href='#'>»</a></li>";
            }else{
                $html.="<li><a href='". base_url . $controlado_lista ."&pag=". ($pagina_actual+1) . "'>»</a></li>";
            }
        }

        return $html;
    }


    public static function pag($registros_por_paginas,$registros_totales,$pagina_actual,$controlador_accion){
        $html = "<li></li>";
        $paginas = $registros_totales/$registros_por_paginas;
        // Redondeo
        $paginas = ceil($paginas); 

        if($paginas>1){

            //ANTERIOR
            if($pagina_actual==1){
                $html="<li class='disabled'><a href='#'>«</a></li>";
            }else{
                $html="<li><a href='". base_url . $controlador_accion ."&pag=". ($pagina_actual-1) . "'>«</a></li>";
            }

            //CENTRAL
            for ($i=1; $i <= $paginas; $i++) {                  
                if($pagina_actual==$i){
                    $html.="<li class='active'><a href='". base_url . $controlador_accion ."&pag=".$i."'>".$i."</a></li>";
                }else{
                    $html.="<li><a href='". base_url . $controlador_accion ."&pag=".$i."'>".$i."</a></li>";                                                                               
                }
            }

            //SIGUIENTE
            if($pagina_actual==$paginas){
                //Si la Pagina Actual es Estrictamente Igual al Final que es Resultado de la Division y el Ceil. Redondedo
                $html.="<li class='disabled'><a href='#'>»</a></li>";
            }else{
                $html.="<li><a href='". base_url . $controlador_accion ."&pag=". ($pagina_actual+1) . "'>»</a></li>";
            }
        }

        return $html;
    }
}

?>