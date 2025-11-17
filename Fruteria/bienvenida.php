<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> <!-- Indica que la página usará codificación UTF-8 (permite acentos, emojis, etc.) -->
<link href="estilo.css" rel="stylesheet" type="text/css" /> <!-- Enlaza el archivo CSS externo con los estilos -->
<title>LA FRUTERIA</title> <!-- Título que aparece en la pestaña del navegador -->
</head>

<body>

<H1>🍊🍊 La Frutería del siglo XXI 🍎🍎</H1>  <!-- Título principal visible en la página -->

<div class="container"> <!-- Contenedor principal para centrar y dar estilo al contenido -->
    
    <div class="mensaje-principal">BIENVENIDO A NUESTRA FRUTERÍA</div> <!-- Mensaje destacado de bienvenida -->

    <!-- Formulario que enviará datos usando el método GET -->
    <form method="get">
        
        <!-- Etiqueta asociada al campo de texto del cliente -->
        <label for="cliente">Introduzca su nombre de cliente:</label>

        <!-- Campo de texto donde el usuario introduce su nombre -->
        <input name="cliente" type="text" id="cliente" placeholder="Ej: Juan Pérez" required>

        <!-- Botón para enviar el formulario -->
        <input type="submit" value=" Empezar Compra ">

    </form>

</div>

</body>
</html>
