<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"> <!-- Define la codificación UTF-8 para permitir caracteres especiales y emojis -->
<link href="estilo.css" rel="stylesheet" type="text/css" /> <!-- Enlaza la hoja de estilos externa -->
<title>LA FRUTERIA - Despedida</title> <!-- Título que se verá en la pestaña del navegador -->

</head>
<body>

<!-- Título principal de la página -->
<H1>🍊🍊 La Frutería del siglo XXI 🍎🍎</H1> 

<div class="container"> <!-- Contenedor que agrupa el contenido y centra los elementos -->

    <div class="compra-detalle">
        <!-- Muestra el resumen final o mensaje generado en PHP sobre la compra -->
        <?= $compraRealizada ?>
        <!-- El uso de <interrogacion imprime directamente el contenido de la variable -->
    </div>
    
    <!-- Mensaje final de despedida al cliente -->
    <div class="mensaje-principal">¡Muchas gracias por su pedido! Vuelva pronto 💚</div>
    
    <!-- Botón para iniciar de nuevo el proceso -->
    <input type="button" value=" NUEVO CLIENTE " 
           onclick="location.href='<?=$_SERVER['PHP_SELF'];?>'">
    <!--
        onclick redirige al usuario a la misma página (PHP_SELF), 
        lo que reinicia el flujo y permite comenzar con un nuevo cliente.
    -->
</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilo.css" rel="stylesheet" type="text/css" />
<title>LA FRUTERIA - Despedida</title>


</head>
<body>
<H1>🍊🍊 La Frutería del siglo XXI 🍎🍎</H1> 

<div class="container">
    <div class="compra-detalle">
        <?= $compraRealizada ?>
    </div>
    
    <div class="mensaje-principal">¡Muchas gracias por su pedido! Vuelva pronto 💚</div>
    
    <input type="button" value=" NUEVO CLIENTE " onclick="location.href='<?=$_SERVER['PHP_SELF'];?>'" >
</div>
</body>
</html>