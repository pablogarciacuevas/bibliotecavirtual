<?php 

function controller_autoload($classname){
    require_once 'controllers/'.$classname.".php";
}

spl_autoload_register('controller_autoload');

?>