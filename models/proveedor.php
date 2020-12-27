<?php

class Proveedor{

private $id;
private $nombre;
private $responsable;
private $telefono;
private $email;
private $direccion;
private $db;

///CONSTRUCTOR///
public function  __construct(){
    $this->db = Database::connect();
}

//// GETTER ////
public function getId(){
    return $this->id;
}

public function getNombre(){
    return $this->nombre;
}

public function getResponsable(){
    return $this->responsable;
}

public function getTelefono(){
    return $this->telefono;
}

public function getEmail(){
    return $this->email;
}

public function getDireccion(){
    return $this->direccion;
}


//// SETTER ////
public function setId($id){
    $this->id = $id;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}

public function setResponsable($responsable){
   $this->responsable = $responsable;
}

public function setTelefono($telefono){
    $this->telefono = $telefono;
}

public function setEmail($email){
    $this->email = $email;
}

public function setDireccion($direccion){
    $this->direccion = $direccion;
}

    //// TOSTRING //// 
    public function toString(){
        return 'Id:' . $this->id  
                . ', nombre:' . $this->nombre
                . ', responsable:' . $this->responsable
                . ', telefono:' . $this->telefono
                . ', email:' . $this->email
                . ', direccion:' . $this->direccion;        
            }

    public function getOneById(){
        $sql = "SELECT * FROM proveedor WHERE id ='{$this->id}'";
        $id = $this->db->query($sql);
        return $id->fetch_object();
    }
    public function getAll($registros_por_paginas, $ultimo_registro){ 
        $sql = "SELECT * FROM proveedor LIMIT $ultimo_registro, $registros_por_paginas;"; 
        $proveedor = $this->db->query($sql);
        return $proveedor;        
    }

    public function getAllForSelect(){
        $sql = "SELECT * FROM proveedor";
        $proveedores = $this->db->query($sql);
        return $proveedores;
    }

    public function getCountAll(){
        $sql = "SELECT count(id) as 'registros_totales' FROM proveedor";
        $registros_totales = $this->db->query($sql);
        return $registros_totales->fetch_object();
    }

    public function save(){
        $result=false;
        $sql = "INSERT INTO proveedor(nombre, responsable, telefono, email, direccion) "  
        . "VALUES('{$this->nombre}', '{$this->responsable}', '{$this->telefono}', '{$this->email}', '{$this->direccion}')"; 
        $save = $this->db->query($sql); 
        
        if($save){
            $result=true;
        }

        return $result;
    }

    public function edit(){

        $result=false;
        $sql="UPDATE proveedor SET "  
        . "nombre='{$this->nombre}', "
        . "responsable='{$this->responsable}', "
        . "telefono='{$this->telefono}', "
        . "email='{$this->email}', " 
        . "direccion='{$this->direccion}' "
        .  "WHERE id='{$this->id}' "; 
        $save=$this->db->query($sql);

        if($save){
            $result=true;
        }

        return $result;
        
    }

    public function delete(){
        $result=false;
        $sql = "DELETE FROM proveedor WHERE id= '{$this->id}'";
        $delete=$this->db->query($sql);
        if($delete){
            $result=true;
        }
        return $result;
    }

}