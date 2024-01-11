<?php 
require_once 'controller/Controller.php';
require_once 'model/Juguete.php';

class JugueteController implements Controller{

    public static function index(){

        /*CREA OBJETO JUGUETE
        * LE MANDO AL MODELO DE JUGUETE A BUSCARLO TODOS CON FINDALL Y LE DOY FORMATO DE ARRAY
        DESPUES LE MANDO AL INDEX CON REQUIRE
        */

        /**
       * Para hacer la primera insercion
       */
      //$db= Database::conectar();
      //var_dump("Conectado");
      //Database::iniciarTablas($db);

        $juguete= new Juguete();
        $juguete= $juguete->findAll()->fetchAll();
        require 'views/private/admin/vistaAdmin.php'; 
    }

    # Funcion abstracta create que muestra un formulario para agregar un elemento
    public static function create(){

        require 'views/private/admin/create.php';
    }

    # Funcion abstracta save que inserta en la BD los elementos recogidos del formulario
    public static function save(){

        $datos = array();
        if (isset($_POST['nombre']) && !empty($_POST['nombre'])) {
           $datos['nombre'] = $_POST['nombre'];
        }
        if (isset($_POST['descripcion']) && !empty($_POST['descripcion'])) {
           $datos['descripcion'] = $_POST['descripcion'];
        }
        if (isset($_POST['edad_recomendada']) && !empty($_POST['edad_recomendada'])) {
           $datos['edad_recomendada'] = $_POST['edad_recomendada'];
        }
        if (isset($_POST['precio']) && !empty($_POST['precio'])) {
         $datos['precio'] = $_POST['precio'];
         }
         if (isset($_POST['ean']) && !empty($_POST['ean'])) {
            $datos['ean'] = $_POST['ean'];
         }
        if (isset($_POST['stock']) && !empty($_POST['stock'])) {
           $datos['stock'] = $_POST['stock'];
        }
       
       
        //Envio al modelo
  
        $juguete = new Juguete();
        $juguete->store($datos);
  
        header('Location: juguetes');

    }

    # Funcion abstracta edit que recibe un $id de un elemento y muestra un formulario con su datos
    public static function edit($id){

        $id = $_GET['id'];
        $juguete = new Juguete;
        $juguete = $juguete->findById($id)->fetchAll();
        require 'views/private/admin/edit.php';
    }

    # Funcion abstracta update que recibe un $id de un elemento y actualiza su contenido
    public static function update($id){

      $id= $_GET['id'];
      $juguete = new Juguete();
      $juguete->updateById($id);
      header('Location: juguetes');
    }

    # Function abstracta destroy que recibe un $id de un elemento y lo elimina de la BD
    public static function destroy($id){
      
      $id= $_GET['id'];
      $juguete = new Juguete();
      $juguete->destroyById($id);
      header('Location: juguetes');
    }

}



?>