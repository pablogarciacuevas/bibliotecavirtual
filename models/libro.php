<?php

class libro{

    private $id;
    private $codigo;
    private $precio;
    private $ejemplares;
    private $ubicacion;
    private $resumen;
    private $titulo;
    private $autor;
    private $pais;
    private $anio;
    private $editorial;
    private $edicion;
    private $imagen;
    private $pdf;
    private $descargable;
    private $empresa;
    private $categoria;
    private $proveedor; 
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

    public function getTitulo(){
        return $this->titulo;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getPais(){
        return $this->pais;
    }

    public function getAnio(){
        return $this->anio;
    }

    public function getEditorial(){
        return $this->editorial;
    }

    public function getEdicion(){
        return $this->edicion;
    }

    public function getEmpresa(){
        return $this->empresa;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function getProveedor(){
        return $this->proveedor;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function getEjemplares(){
        return $this->ejemplares;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }

    public function getResumen(){
        return $this->resumen;
    }

    public function getImagen(){
        return $this->imagen;
    }

    public function getPdf(){
        return $this->pdf;
    }

    public function getDescargable(){
        return $this->descargable;
    }

    ////SETTERS////
    public function setId($id){
        $this->id = $id;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }

    public function setAutor($autor){
        $this->autor = $autor;
    }

    public function setPais($pais){
        $this->pais = $pais;
    }

    public function setAnio($anio){
        $this->anio = $anio;
    }

    public function setEditorial($editorial){
        $this->editorial = $editorial;
    }

    public function setEdicion($edicion){
        $this->edicion = $edicion;
    }

    public function setEmpresa($empresa){
        $this->empresa = $empresa;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function setProveedor($proveedor){
        $this->proveedor = $proveedor;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }
    
    public function setEjemplares($ejemplares){
        $this->ejemplares = $ejemplares;
    }

    public function setUbicacion($ubicacion){
        $this->ubicacion = $ubicacion;
    }

    public function setResumen($resumen){
        $this->resumen = $resumen;
    }

    public function setImagen($imagen){
        $this->imagen = $imagen;
    }

    public function setPdf($pdf){
        $this->pdf = $pdf;
    }

    public function setDescargable($descargable){
        $this->descargable = $descargable;
    }

    //// TOSTRING //// 
    public function tostring(){
        return "id: " . $this->id
        . "codigo: " . $this->codigo
        . "precio: " .  $this->precio
        . "ejemplares: " . $this->ejemplares
        . "ubicacion: " . $this->ubicacion
        . "resumen: " . $this->resumen
        . "titulo: " . $this->titulo
        . "autor: " . $this->autor
        . "pais: " . $this->pais
        . "anio: " . $this->anio
        . "editorial: " . $this->editorial
        . "edicion: " . $this->edicion
        . "imagen: " . $this->imagen
        . "pdf: " . $this->pdf
        . "descargable: " . $this->descargable
        . "empresa: " . $this->empresa
        . "categoria: " . $this->categoria
        . "proveedor: " . $this->proveedor;
    }

    //// CODIGO SQL
    public function save(){        
        $result = false;
        $sql = "INSERT INTO libro(codigo, 
                                  precio,
                                  ejemplares, 
                                  ubicacion,
                                  resumen,
                                  titulo,
                                  autor,
                                  pais,
                                  anio, 
                                  editorial,
                                  edicion,
                                  url_imagen,
                                  url_pdf,
                                  descargable,
                                  id_empresa,
                                  id_categoria,
                                  id_proveedor)";

        $sql.= "VALUES ('{$this->codigo}',
                        '{$this->precio}',
                        '{$this->ejemplares}',
                        '{$this->ubicacion}',
                        '{$this->resumen}',
                        '{$this->titulo}',
                        '{$this->autor}',
                        '{$this->pais}',
                        '{$this->anio}',
                        '{$this->editorial}',
                        '{$this->edicion}',
                        '{$this->imagen}',
                        '{$this->pdf}',
                         {$this->descargable},
                         {$this->empresa},
                         {$this->categoria},
                         {$this->proveedor})"; 

        $save = $this->db->query($sql);
    /* echo $sql;
      echo "</br>";
      echo $this->db->error;
      die(); */

        if($save){
            $result=true;
        }
        return $result;
     
    }

    public function getAll(){
        $sql = "SELECT * FROM libro";
        $libro = $this->db->query($sql);
        return $libro;
    }

    public function getAllbyId(){
        $sql = "SELECT * FROM libro where id={$this->id}";
        $libro = $this->db->query($sql);
        return $libro->fetch_object();
    }
    
    public function getAllByLimit($registros_por_paginas, $ultimo_registro){        
        $sql = "SELECT * FROM libro LIMIT $ultimo_registro, $registros_por_paginas;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }

    public function getAllByCategoriesWithLimit($registros_por_paginas, $ultimo_registro){        
        $sql = "SELECT * FROM libro WHERE id_categoria={$this->categoria} LIMIT $ultimo_registro, $registros_por_paginas;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }

    public function getCountAll(){
        $sql = "SELECT count(id) as 'registros_totales' FROM libro";
        $registros_totales = $this->db->query($sql);
        return $registros_totales->fetch_object();
    }

    public function getAllByIdCategoria(){
        $sql = "SELECT * FROM libro where id_categoria={$this->categoria}";            
        $libro = $this->db->query($sql);        
        
        return $libro;
    }

}

?>