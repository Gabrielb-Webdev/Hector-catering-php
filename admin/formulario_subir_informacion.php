<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Subir Información</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
<form action="procesar_formulario.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
    </div>
    <div>
        <label for="descripcion_corta">Descripción Corta:</label>
        <textarea id="descripcion_corta" name="descripcion_corta" rows="4" required></textarea>
    </div>
    <div>
        <label for="descripcion_larga">Descripción Larga:</label>
        <textarea id="descripcion_larga" name="descripcion_larga" rows="8" required></textarea>
    </div>
    <div>
        <label for="imagen_carousel">Imagen Carousel:</label>
        <input type="file" id="imagen_carousel" name="imagen_carousel" accept="image/*" required>
    </div>
    <div>
        <label for="icono">Icono:</label>
        <input type="file" id="icono" name="icono" accept="image/*" required>
    </div>
    <div>
        <label for="imagen_detalle">Imagen Detalle:</label>
        <input type="file" id="imagen_detalle" name="imagen_detalle" accept="image/*">
    </div>
    <div>
        <label for="detail_titulo">Título de Detalle:</label>
        <input type="text" id="detail_titulo" name="detail_titulo">
    </div>
    <div>
        <button type="submit">Subir Información</button>
    </div>
</form>
</body>
</html>
