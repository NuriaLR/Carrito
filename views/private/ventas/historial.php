<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUGIETILANDIA</title>
    <link rel="stylesheet" href="../asset/css/historial.css">
</head>
<body>
    <h1>PEDIDO <?php echo $_SESSION['user']['email']; ?> </h1>
    <table>
        <thead>
            <tr>
                <th>ID compra</th>
                <th>Email</th>
                <th>Nombre</th>                    
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Precio Total</th>
                <th>Fecha de compra</th>
            </tr>
        </thead>
        <tbody>
        <?php
                foreach ($ticket as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value['id_venta'] . '</td>';
                    echo '<td>' . $value['email'] . '</td>';
                    echo '<td>' . $value['nombre'] . '</td>';
                    echo '<td>' . $value['precio'] . '</td>';
                    echo '<td>' . $value['cantidad'] . '</td>';
                    echo '<td>' . $value['precio_total'] . '</td>';
                    echo '<td>' . $value['fecha_venta'] . '</td>';

                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</body>
</html>
