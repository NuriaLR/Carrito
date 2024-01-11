<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CREAR JUGUETE</title>
    <link rel="stylesheet" href="../asset/css/create.css">
  </head>
  <body>
    <main>
      <form method="post" action="save">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" /><br />
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" /><br />
        <label for="precio">Precio</label>
        <input type="number" step="0.01"  id="precio" name="precio" /><br />
        <label for="edad_recomendada">Edad recomendada</label>
        <input type="number" id="edad_recomendada" name="edad_recomendada" /><br />
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="stock" /><br />
        <label for="ean">EAN</label>
        <input type="number" id="ean" name="ean" /><br />
        </select>
        <br />
        <button id="enviar">Enviar</button>
      </form>
    </main>
  </body>
</html>
