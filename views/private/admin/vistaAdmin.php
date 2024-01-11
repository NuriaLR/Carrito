<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista admin</title>
    <link rel="stylesheet" href="../asset/css/vistaAdmin.css">
</head>

<body>
    <main>
        <h1>JUGUETES</h1>
        <a href="logout">Cerrar Sesion</a>
        <a href="create">Crear juguete</a>
        <a href="comprados">Ver Comprados</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>                    
                    <th>Descripción</th>
                    <th>Edad recomendada</th>
                    <th>Precio</th>
                    <th>EAN</th>
                    <th>Stock</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                         foreach ($juguete as $key => $value) {
                             echo '<tr>';
                             echo '<td>' . $value['id_juguete'] . '</td>';
                             echo '<td>' . $value['nombre'] . '</td>';
                             echo '<td>' . $value['descripcion'] . '</td>';
                             echo '<td>' . $value['edad_recomendada'] . '</td>';
                             echo '<td>' . $value['precio'] . '</td>';            
                             echo '<td>' . $value['ean'] . '</td>';
                             echo '<td>' . $value['stock'] . '</td>';
                             echo '<td>
                             <a href="edit-producto?id=' . $value['id_juguete'] . '" class="edit-button">Editar</a>
                             <a href="destroy-producto?id=' . $value['id_juguete'] . '" class="delete-button">Eliminar</a>
                 </td>';
                             echo '</tr>';
                }     ?>
            </tbody>
        </table>
    </main>
</body>

</html>