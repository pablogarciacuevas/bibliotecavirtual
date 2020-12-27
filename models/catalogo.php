<?php

class Catalogo{
    private $id;
    private $id_categoria;
    private $id_libro;
    private $db;

    ///CONSTRUCTOR///
    public function __construct(){
        $this->db = Database::connect();
    }

    //// GETTER ////
    public function getId(){
        return $this->id;
    }

    public function getId_Categoria(){
        return $this->id_categoria;
    }

    public function getId_Libro(){
        return $this->id_libro;
    }

    //// SETTER ////
    public function setId($id){
        $this->id = $id;
    }

    public function setId_Categoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }

    public function setId_Libro($id_libro){
        $this->id_libro = $id_libro;
    }

    //// TOSTRING //// 
    public function toString(){
        return 'Id:' . $this->id  
        . ', id_categoria:' . $this->id_categoria
        . ', Id_libro:'. $this->id_Libro;
    }

    //CODIGO SQL 
    public function getAll(){
        $sql = "SELECT * FROM catalogo c "
        . "INNER JOIN categoria cat on cat.id=c.id_categoria "
        . "INNER JOIN libro l on l.id = c.id_libro "
        . "INNER JOIN libro_info linf on linf.id_libro = l.id ";
        $catalogos = $this->db->query($sql);     
        return $catalogos;
    }

    public function getOne(){
        $sql = "SELECT c.*, cat.id as 'idCategoria', cat.nombre as 'categoria' "
        . "FROM catalogo c "
        . "INNER JOIN categoria cat on cat.id=c.id_categoria "
        . "WHERE c.id={$this->id}";
        $catalogo = $this->db->query($sql);
        return $catalogo->fetch_object();
    }

    public function save(){
        $result = false;
        $sql = "INSERT INTO catalogo(id_categoria,id_libro) "
        . " VALUES ('{$this->id_categoria}','{$this->id_libro}')";
        $save = $this->db->query($sql);
        
        if($save){
            $result = true;
        }

        return $result;
    }

    public function update(){
        $result = false;
        $sql = "UPDATE catalogo SET id_categoria='{$this->id_categoria}', id_libro='{$this->id_libro}'";
        $save = $this->db->query($sql);
        
        if($save){
            $result = true;
        }

        return $result;
    }

}

?>
