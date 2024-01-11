<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUEGUILANDIA</title>
    <link rel="stylesheet" href="../asset/css/vistaCarrito.css">
</head>

<body>
    <h1>Carrito de: <?php echo ($_SESSION['user']['email']); ?></h1>
    <a href="home">Volver atras</a>
    <main>
        <table>
            <caption>Resumen de compra</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalCompra = 0;
                $user=$_SESSION['user']['id'];

                if (!isset($_SESSION['carrito'][$user])) {
                    echo "Carrito vacío";
                } else {
                    foreach ($_SESSION['carrito'][$user] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value['id_juguete']; ?></td>
                            <td><?php echo $value['nombre']; ?></td>
                            <td><?php echo $value['descripcion']; ?></td>
                            <td><?php echo $value['precio']; ?></td>
                            <td><?php echo $value['cantidad']; ?></td>
                            <td><?php echo $value['precio_total']; ?></td>
                            <td><a href="destroy-compras?id=<?php echo $value['id_juguete']; ?>">Eliminar</a></td>
                        </tr>

                    <?php
                        $totalCompra = $totalCompra + $value['precio_total'];
                    }
                    ?>
                    <tr>
                        <td colspan="7">Precio total: <?php echo $totalCompra ?></td>
                    </tr>
                    <tr>
                        <!-- Generar el historial de productos:
                        Accede al carrito del usuario actual en la sesión. Extrae la columna 'id_juguete' del array y obtiene un arra con los IDS de los juguetes del carrito.
                        Con el implode convierte el array en cadena de texto, separando los IDS por comas. -->
                    <td colspan="7"><a href="historial-productos?ids=<?php echo implode(',', array_column($_SESSION['carrito'][$user], 'id_juguete')); ?>">Pagar</a></td>
                    </tr>

                <?php

                }
                ?>

            </tbody>
        </table>
    </main>
</body>

</html>
