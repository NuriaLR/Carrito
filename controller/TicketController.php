<?php

require_once 'model/Ticket.php';

class TicketController{

    public static function index(){
        $email=$_SESSION['user']['email'];
        $ticket = new Ticket();
        $ticket = $ticket->findByEmail($email)->fetchAll();
        include 'views/private/ventas/historial.php';
    }

    public static function indexAdmin(){
        $ticket = new Ticket();
        $ticket = $ticket->findAll()->fetchAll();
        include 'views/private/ventas/ventas.php';
    }

    public static function create(){
        // Verifica si se han pasado IDS en la URL
        if (isset($_GET['ids'])) {
            // Recupera los IDs de la URL y los convierte en un array
            $ids = explode(',', $_GET['ids']);
    
            // Itera sobre los IDs y realiza la lógica para cada uno
            foreach ($ids as $idProducto) {
                // Obtener producto
                $juguete = new Juguete;
                $producto = $juguete->findById($idProducto)->fetchAll();
    
                // Obtener el ID del usuario desde la sesión
                $user = $_SESSION['user']['id'];
    
                // Itera sobre los productos en el carrito del usuario actual
                foreach ($_SESSION['carrito'][$user] as $key => $value) {
                    // Encuentra el producto correspondiente en el carrito
                    if ($value['id_juguete'] == $idProducto) {
                        $cantidad = $value['cantidad'];
                        $precio_total = $value['precio_total'];
                    }
                }
                $email = $_SESSION['user']['email'];

                foreach ($producto as $value) {
                    $id_juguete = $value['id_juguete'];
                    $nombre = $value['nombre'];
                    $edad_recomendada = $value['edad_recomendada'];
                    $precio = $value['precio'];
                    $ean = $value['ean'];
                }
                    
                // Almacena los datos en la tabla 'vendidos'
                $datos = [
                    'id_juguete' => $id_juguete,
                    'nombre' => $nombre,
                    'edad_recomendada' => $edad_recomendada,
                    'precio' => $precio,
                    'ean' => $ean,
                    'cantidad' => $cantidad,
                    'precio_total' => $precio_total,
                    'email' => $email,
                ];
                $ticket = new Ticket();
                $ticket->store($datos);
    
                // Elimina el producto del carrito del usuario actual
                foreach ($_SESSION['carrito'][$user] as $key => $value) {
                    if($value['id_juguete'] == $idProducto){
                        unset($_SESSION['carrito'][$user][$key]);
                    }
                }
            }
    
            header('Location: mis-compras');
        }
    }
    
}

?>
