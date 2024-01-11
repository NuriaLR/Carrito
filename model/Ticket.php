<?php
require_once 'db/Database.php';

class Ticket{

    private $nombre;
    private $precio;
    private $ean;
    private $cantidad;
    private $precioTotal;


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
     * Get the value of ean
     */
    public function getEan() {
        return $this->ean;
    }

    /**
     * Set the value of $ean
     */
    public function setEan($ean){
        $this->ean = $ean;
        return $this;
    }

    /**
     * Get the value of cantidad
     */
    public function getCantidad() {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     */
    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
        return $this;
    }

    /**
     * Get the value of precioTotal
     */
    public function getPrecioTotal() {
        return $this->precioTotal;
    }

    /**
     * Set the value of precioTotal
     */
    public function setPrecioTotal($precioTotal){
        $this->precioTotal = $precioTotal;
        return $this;
    }

  


    public function findAll() : PDOStatement
    {
        $db = Database::conectar();
        $query = "SELECT * FROM vendidos";
        $result = $db->query($query);
        $db = Database::desconectar();
        return $result;
    }



    public function findByEmail($email){

        $query = "SELECT * FROM vendidos WHERE email ='$email'";
        $db = Database::conectar();
        $user = $db->query($query);
        $db = Database::desconectar();
        return $user;
    }

    public function store($datos){
        $query = "INSERT INTO vendidos (".implode(",",array_keys($datos)).") VALUES ('".implode("','",array_values($datos))."')";

       
        $db = Database::conectar();
        $db->exec($query);
        $db = Database::desconectar();
    }
    
}


?> 