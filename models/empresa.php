<?php

class Empresa{

    private $id;
    private $codigo;
    private $nombre;
    private $telefono;
    private $email;
    private $direccion;
    private $director;
    private $simbolo_moneda;
    private $anio;
    private $id_usuario;
    private $db;

    ////CONSTRUCT////
    public function __construct(){
        $this->db = Database::connect();
    }

    ////GETTERS////
    public function getId(){
        return $this->id;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function getNombre(){
        return $this->nombre;
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

    public function getDirector(){
        return $this->director;
    }

    public function getSimboloMoneda(){
        return $this->simbolo_moneda;
    }

    public function getAnio(){
        return $this->anio;
    }

    public function getIdUsuario(){
        return $this->id_usuario;
    } 

    ////SETTERS////
    public function setId($id){
        $this->id = $id;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
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

    public function setDirector($director){
        $this->director = $director;
    }

    public function setSimboloMoneda($simbolo_moneda){
        $this->simbolo_moneda = $simbolo_moneda;
    }

    public function setAnio($anio){
        $this->anio = $anio;
    }

    public function setIdUsuario($id_usuario){
        $this->id_usuario = $id_usuario;
    } 

    //// TOSTRING //// 
    public function tostring(){
        return "id: " . $this->id
        . "codigo: " . $this->codigo
        . "nombre: " .  $this->nombre
        . "telefono: " . $this->telefono
        . "email: " . $this->email
        . "direccion: " . $this->direccion
        . "simbolo_moneda: " . $this->simbolo_moneda
        . "anio: " . $this->anio
        . "id_usuario: " . $this->id_usuario
        . "director: " . $this->director;
    }


    //CODIGO SQL

    public function getByCodigo(){
        $sql ="SELECT * FROM empresa WHERE codigo='{$this->codigo}'";
        $codigo =$this->db->query($sql);
        return $codigo; 
    }

    public function getByNombre(){
        $sql ="SELECT * FROM empresa WHERE nombre='{$this->nombre}'";
        $nombre =$this->db->query($sql);
        return $nombre; 
    }   
 
    public function getByEmail(){
        $sql ="SELECT * FROM empresa WHERE email='{$this->email}'";
        $email =$this->db->query($sql);
        return $email; 
    }  
    
    public function getOneById(){
        $sql = "SELECT * FROM empresa WHERE id ='{$this->id}'";
        $id = $this->db->query($sql);
        return $id->fetch_object();
    }

    public function getAll($registros_por_paginas, $ultimo_registro){
        //$sql = "SELECT * FROM empresa WHERE id > $ultimo_registro ORDER BY id ASC LIMIT $registros_por_paginas";
        $sql = "SELECT * FROM empresa LIMIT $ultimo_registro, $registros_por_paginas;";
        $empresa = $this->db->query($sql);
        return $empresa;
    }

    public function getAllForSelect(){
        $sql = "SELECT * FROM empresa";
        $empresa = $this->db->query($sql);
        return $empresa;
    }

    public function getCountAll(){
        $sql = "SELECT count(id) as 'registros_totales' FROM empresa";
        $registros_totales = $this->db->query($sql);
        return $registros_totales->fetch_object();
    }

    public function save(){
        $result=false;
        $sql = "INSERT INTO empresa(codigo, nombre, telefono, email, direccion, simbolo_moneda, anio, director)"  
        . "VALUES('{$this->codigo}', '{$this->nombre}', '{$this->telefono}', '{$this->email}', '{$this->direccion}', '{$this->simbolo_moneda}', '{$this->anio}', '{$this->director}')"; 
        $save = $this->db->query($sql); 

        if($save){
            $result=true;
        }

        return $result;
   
    }

    public function edit(){

        $result=false;
        $sql="UPDATE empresa SET "  
        . "codigo='{$this->codigo}', "
        . "nombre='{$this->nombre}', "
        . "telefono='{$this->telefono}', "
        . "email='{$this->email}', " 
        . "direccion='{$this->direccion}', "
        . "simbolo_moneda='{$this->simbolo_moneda}', "
        . "anio='{$this->anio}', "
        . "director='{$this->director}' "
        .  "WHERE id='{$this->id}' "; 

        $save=$this->db->query($sql);

        if($save){
            $result=true;
        }

        return $result;
        
    }
    
    public function delete(){
        $result=false;
        $sql = "DELETE FROM empresa WHERE id= '{$this->id}'";
        $delete=$this->db->query($sql);
        if($delete){
            $result=true;
        }
        return $result;
    }
}

?>