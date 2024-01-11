
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIO</title>
    <link rel="stylesheet" href="../asset/css/vistaUser.css">
</head>

<body>
    <main>
        <h1>JUEGOLANDIA</h1>
        <p>Bienvenido: <?php echo $_SESSION['user']['email']; ?></p>
        <br>
        <a href="logout">Cerrar Sesión</a>
        <a href="ver-carrito">Ir al Carrito</a>
        <a href="mis-compras">Tu Historial</a>

        <form action="comprar-producto" method="post" role="form">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Edad recomendada</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($juguete as $key => $value) : ?>
                        <tr>
                            <td><?php echo $value['nombre']; ?></td>
                            <td><?php echo $value['descripcion']; ?></td>
                            <td><?php echo $value['edad_recomendada']; ?></td>
                            <td><?php echo $value['precio']; ?></td>
                            <td>
                                <label for="cantidad_<?php echo $value['id_juguete']; ?>">Cantidad:</label>
                                <input type="number" name="cantidad[<?php echo $value['id_juguete']; ?>]" min="1">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <button type="submit">Añadir al Carrito</button>
        </form>
    </main>
</body>

</html>
