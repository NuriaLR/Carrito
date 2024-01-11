<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EDITAR</title>
  <link rel="stylesheet" href="../asset/css/edit.css">

</head>

<body>
  <main>
    <?php
         foreach ($juguete as $key => $value) {
            $nombre = $value['nombre'];
            $descripcion = $value['descripcion'];
            $precio = $value['precio'];
            $edad_recomendada = $value['edad_recomendada'];
            $stock = $value['stock'];
            $ean = $value['ean'];
         }
    ?>
    <form method="post" action="update-producto?id=<?php echo $id; ?>">
          <label for="nombre">Nombre</label>
          <input type="text" value="<?php echo $nombre; ?>" id="nombre" name="nombre" /><br />
          <label for="descripcion">Descripción</label>
          <input type="text" value="<?php echo $descripcion; ?>" id="descripcion" name="descripcion" /><br />
          <label for="precio">Precio</label>
          <input type="number" step="0.01" value="<?php echo $precio; ?>" id="precio" name="precio" /><br />
          <label for="edad_recomendada">Edad recomendada</label>
          <input type="number" value="<?php echo $edad_recomendada; ?>" id="edad_recomendada" name="edad_recomendada" /><br />
          <label for="stock">Stock</label>
          <input type="number" value="<?php echo $stock; ?>" id="stock" name="stock" /><br />
          <label for="ean">EAN</label>
          <input type="number" value="<?php echo $ean; ?>" id="ean" name="ean" /><br />      </select>
      <br />
      <button id="enviar">Actualizar</button>
    </form>
  </main>
</body>

</html>