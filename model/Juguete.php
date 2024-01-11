<?php

require_once 'db/Database.php';
require_once 'model/Model.php';

class Juguete implements Model
{

    private $nombre;
    private $descripcion;
    private $edad_recomendada;
    private $precio;
    private $ean;
    private $stock;

    public function __construct(){}


    /**
     * Get the value of nombre
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion() {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
        return $this;
    }

      /**
     * Get the value of edad_recomendada
     */
    public function getEdadRecomendada() {
        return $this->edad_recomendada;
    }

    /**
     * Set the value of edad_recomendada
     */
    public function setEdadRecomendada($edad_recomendada) {
        $this->edad_recomendada = $edad_recomendada;
        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio() {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio($precio) {
        $this->precio = $precio;
        return $this;
    }

    /**
     * Get the value of edad
     */
    public function getEan() {
        return $this->ean;
    }

    /**
     * Set the value of ean
     */
    public function setEan($ean) {
        $this->ean = $ean;
        return $this;
    }
    /**
     * Get the value of stock
     */
    public function getStock() {
        return $this->stock;
    }

    /**
     * Set the value of stock
     */
    public function setStock($stock) {
        $this->stock = $stock;
        return $this;
    }

    /**
     * PARA EL ADMINISTADOR muestra todo 
     */
    public function findAll() : PDOStatement
    {
        /**
         * RECOGE LOS JUGUETES Y LOS MANDA A LA BASE DE DATOS
         * 1. Me conecto a la base de datos.
         * 2. Realizo la query
         * 3. Me desconecto de la base de datos.
         * 4. Devuelvo la query
         */
        $db = Database::conectar();
        $query = "SELECT * FROM juguetes";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
     /**
     * Funcion para buscar todos los productos en usuario
     * PARA USUARIOS      */

    public function findComprarJuguetes() : PDOStatement
    {
        /**
         * 1. Me conecto a la base de datos.
         * 2. Realizo la query
         * 3. Me desconecto de la base de datos.
         * 4. Devuelvo la query
         */
        $db = Database::conectar();
        $query = "SELECT * FROM juguetes WHERE stock > 0";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }
  
    public function findById($id)
    {
        $db = Database::conectar();
        $query = "SELECT * FROM juguetes WHERE id_juguete=$id";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }

    public function store($datos)
    {
       $query= "INSERT INTO juguetes (".implode(",",array_keys($datos)).")VALUES ('".implode("','",array_values($datos))."')";
       $db = Database::conectar();
       $db-> exec($query);
       $db = Database::desconectar();
    }

    public function updateById($id){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $edad_recomendada = $_POST['edad_recomendada'];
        $precio = $_POST['precio'];
        $ean = $_POST['ean'];
        $stock = $_POST['stock'];

            $db= Database::conectar(); //Conexion BD
            $query = "
            UPDATE juguetes
            SET nombre = '$nombre',
                descripcion = '$descripcion',
                edad_recomendada = '$edad_recomendada',
                precio = '$precio',
                ean = '$ean',
                stock = '$stock'
            WHERE id_juguete = $id;
        ";
            $db->query($query);
            $db = Database::desconectar();

    }


    // public function updateCompraById($id){
    //     $db = Database::conectar();
    //     $query = "UPDATE ticket SET resumen_compra = (SELECT SUM(precio_total) FROM carrito)";
    //     $result = $db->exec($query);
    //     $db = Database::desconectar();
    // }
    

    public function destroyById($id):void
    {
        $db= Database::conectar(); //Conexion BD
        $query = "DELETE FROM juguetes WHERE id_juguete =$id";
        $db->exec($query);
        $db = Database::desconectar();
    }


}


?>