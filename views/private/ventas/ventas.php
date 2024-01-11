<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPRAS</title>
    <link rel="stylesheet" href="../asset/css/ventas.css">
</head>
<body>
    <h1>PEDIDO INTERNO</h1>
    <table>
            <thead>
                <tr>
                    <th>ID compra</th>
                    <th>ID producto</th>
                    <th>Nombre</th>                    
                    <th>Precio</th>
                    <th>Edad recomendada</th>
                    <th>EAN</th>
                    <th>Email</th>
                    <th>Fecha de Compra</th>
                    <th>Precio total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ticket as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value['id_venta'] . '</td>';
                    echo '<td>' . $value['id_juguete'] . '</td>';
                    echo '<td>' . $value['nombre'] . '</td>';
                    echo '<td>' . $value['precio'] . '</td>';
                    echo '<td>' . $value['edad_recomendada'] . '</td>';
                    echo '<td>' . $value['ean'] . '</td>';
                    echo '<td>' . $value['email'] . '</td>';
                    echo '<td>' . $value['fecha_venta'] . '</td>';
                    echo '<td>' . $value['precio_total'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
</body>
</html>