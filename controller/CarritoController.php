<?php

require_once 'controller/Controller.php';

class CarritoController{
    public static function index(){
        include 'views/private/carrito/vistaCarrito.php';
    }

    public static function create(){
        
        if (isset($_POST['cantidad']) && is_array($_POST['cantidad'])) {
            foreach ($_POST['cantidad'] as $id => $cantidad) {
    
                // Añadir al carrito solo si la cantidad es mayor que cero
                if ($cantidad > 0) {
                    // Obtener los detalles del producto
                    $producto = new Juguete();
                    $producto = $producto->findById($id)->fetchAll();
    
                    foreach ($producto as $value) {
                        $id_juguete = $value['id_juguete'];
                        $nombre = $value['nombre'];
                        $descripcion = $value['descripcion'];
                        $edad_recomendada = $value['edad_recomendada'];
                        $precio = $value['precio'];
                        $ean = $value['ean'];
                        $stock = $value['stock'];
                    }
                    $user=$_SESSION['user']['id'];
                    // Verificar si el carrito de usuario ya existe
                    if (!isset($_SESSION['carrito'][$user])) {
                        $_SESSION['carrito'][$user] = array();
                    }
    
                    // Extraer los id de los juguetes en una columna
                    $jugueteExistente = array_column($_SESSION['carrito'][$user], 'id_juguete');
    
                    // Comprobar que no existe el id en la columna de juguetes existentes
                    if (!in_array($id_juguete, $jugueteExistente)) {
    
                        $_SESSION['carrito'][$user][] = [
                            'id_juguete' => $id_juguete,
                            'nombre' => $nombre,
                            'descripcion' => $descripcion,
                            'edad_recomendada' => $edad_recomendada,
                            'precio' => $precio,
                            'ean' => $ean,
                            'stock' => $stock,
                            'cantidad' => $cantidad,
                            'precio_total' => $precio * $cantidad,
                        ];
                    } else {
                        // Actualizar la cantidad y precio total si el producto ya existe en el carrito
                        foreach ($_SESSION['carrito'][$user] as &$item) {
                            if ($item['id_juguete'] == $id_juguete) {
                                $item['cantidad'] += $cantidad;
                                $item['precio_total'] = $item['precio'] * $item['cantidad'];
                            }
                        }
                    }
                }
            }
        }
    
        include 'views/private/carrito/vistaCarrito.php';
    }
    

    public static function destroy($id){
        $id=$_GET['id'];
        $idUser=$_SESSION['user']['id'];

        foreach ($_SESSION['carrito'][$idUser] as $key => $value) {
            if($value['id_juguete'] == $id){
                unset($_SESSION['carrito'][$idUser][$key]);
            }
        }

        include 'views/private/carrito/vistaCarrito.php';
    }
}


?>
