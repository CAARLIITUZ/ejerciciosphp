<html>
<head>
<meta charset="UTF-8"> <!-- Codificación UTF-8 para permitir tildes, caracteres especiales y emojis -->
<link href="estilo.css" rel="stylesheet" type="text/css" /> <!-- Enlace al archivo CSS externo con los estilos -->
<title>LA FRUTERIA - Realizar Compra</title> <!-- Título que se muestra en la pestaña del navegador -->
</head>

<body>

<H1>🍊🍊 La Frutería del siglo XXI 🍎🍎</H1> <!-- Título principal de la página -->

<div class="container"> <!-- Contenedor principal para centrar contenido y aplicar estilos -->

    <div class="compra-detalle">
        <!-- Muestra mensajes como confirmaciones o errores del proceso de compra -->
        <?= $compraRealizada ?> 
        <!-- Esto imprime el contenido de la variable PHP $compraRealizada -->
    </div>

    <div class="mensaje-principal">
        <!-- Muestra un mensaje con el nombre del cliente guardado en la sesión -->
        REALICE SU COMPRA, <?= htmlspecialchars($_SESSION['cliente']) ?>
        <!-- htmlspecialchars evita que el usuario pueda inyectar código malicioso -->
    </div>
    
    <!-- Formulario donde el usuario añade o gestiona su compra -->
    <form method="post"> <!-- Envía datos mediante POST para mayor seguridad -->

        <label for="fruta">Selecciona la fruta:</label>
        
        <select name="fruta" id="fruta"> <!-- Lista desplegable con las frutas disponibles -->
            <!-- Opciones manuales (comentadas):
            <option value="Platanos">Plátanos 🍌</option>
            <option value="Naranjas">Naranjas 🍊</option>
            <option value="Limones">Limones 🍋</option>
            <option value="Manzanas">Manzanas 🍎</option>
            -->
            
            <!-- Llamada a una función PHP que genera dinámicamente las opciones -->
            <?= generaOpciones() ?>
        </select><br>

        <label for="cantidad">Cantidad (unidades/kg):</label>
        <!-- Campo numérico para elegir la cantidad -->
        <input name="cantidad" id="cantidad" type="number" value="1" min="1" max="10" size="4">

        <!-- Bloque con botones distribuidos equitativamente -->
        <div style="display: flex; justify-content: space-around; width: 100%;">
            <!-- Botón para añadir la compra actual -->
            <input type="submit" name="accion" value=" Anotar ">	

            <!-- Botón para cancelar la compra actual -->
            <input type="submit" name="accion" value=" Anular ">	

            <!-- Botón para finalizar la compra -->
            <input type="submit" name="accion" value=" Terminar ">	
        </div>
    </form>
</div>

</body>
</html>
