<?php

class Categoria{

    private $id;
    private $nombre;
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

    //// SETTER ////
    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre =$nombre;
    }

    //// TOSTRING //// 
    public function toString(){
        return 'Id:' . $this->id  
        . ', nombre:' . $this->nombre;
               
    }

    //CODIGO SQL 
    public function getById(){
        $sql = "SELECT * FROM categoria WHERE id='{$this->id}';";
        $id = $this->db->query($sql);
        return $id->fetch_object();
    }

    public function getByNombre(){
        $sql = "SELECT * FROM categoria WHERE nombre='{$this->getNombre()}' and id<>'{$this->id}';";
        $categoria = $this->db->query($sql);
        return $categoria;
    }

    public function getAll($registros_por_paginas, $ultimo_registro){
        //$sql = "SELECT * FROM categoria WHERE id > $ultimo_registro ORDER BY id ASC LIMIT $registros_por_paginas";
        $sql = "SELECT * FROM categoria LIMIT $ultimo_registro, $registros_por_paginas;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }

    public function getAllForSelect(){
        $sql = "SELECT * FROM categoria";
        $categorias = $this->db->query($sql);
        return $categorias;
    }

    public function getCountAll(){
        $sql = "SELECT count(id) as 'registros_totales' FROM categoria";
        $registros_totales = $this->db->query($sql);
        return $registros_totales->fetch_object();
    }

    public function getAllByIdLimit(){
        $sql = "SELECT * FROM libro where id_categoria={$this->id};";
        $libro = $this->db->query($sql);
        return $libro;
    }

    public function save(){
        $result=false;
        $sql = "INSERT INTO categoria(nombre) VALUES('{$this->nombre}')";
        $save = $this->db->query($sql);

        if($save){
            $result=true;
        }

        return $result;
    }

    public function edit(){

        $result=false;

        $sql="UPDATE categoria SET "          
        . "nombre='{$this->nombre}' " 
        . "WHERE id='{$this->id}' ";     
        $edit=$this->db->query($sql);

        if($edit){
            $result=true;
        }

        return $result;
    }

    public function delete(){
        $result=false;
        $sql = "DELETE FROM categoria WHERE id= '{$this->id}'";
        $delete=$this->db->query($sql);
        if($delete){
            $result=true;
        }
        return $result;
    }

}

?>