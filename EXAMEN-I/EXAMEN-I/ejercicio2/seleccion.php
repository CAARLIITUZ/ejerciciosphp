<?php
session_start(); 
// Inicia o continúa la sesión para poder almacenar y recuperar datos del usuario

// ------------------------------------------------------------
// INICIALIZACIÓN DE VARIABLES DE SESIÓN
// ------------------------------------------------------------
// Si no existe el nombre en sesión, se asigna un valor por defecto
if(!isset($_SESSION['nombre'])){
    $_SESSION['nombre'] = "Parguela";
}

// Si no existe el array de lenguajes en sesión, se inicializa vacío
if(!isset($_SESSION['lenguajes'])){
    $_SESSION['lenguajes'] = [];
}

// ------------------------------------------------------------
// ACTUALIZAR VARIABLES DE SESIÓN CON DATOS DEL FORMULARIO
// ------------------------------------------------------------
// Si el formulario envía un nombre, se guarda en sesión
if (isset($_POST['nombre'])){
    $_SESSION['nombre'] = $_POST['nombre'];
}

// Si el formulario envía lenguajes seleccionados, se guardan en sesión
if (isset($_POST['lenguajes'])){
    $_SESSION['lenguajes'] = $_POST['lenguajes'];
}

// ------------------------------------------------------------
// GUARDAR EN VARIABLES LO QUE HAY EN SESIÓN PARA USO POSTERIOR
// ------------------------------------------------------------
$nombre  = $_SESSION['nombre'];
$lenguajes = $_SESSION['lenguajes'];

// ------------------------------------------------------------
// FUNCIÓN AUXILIAR PARA MARCAR OPCIONES SELECCIONADAS
// ------------------------------------------------------------
function estalenguaje($lenguaje) : bool {
    global $lenguajes;
    // Devuelve true si el lenguaje está en el array de lenguajes seleccionados
    return in_array($lenguaje, $lenguajes);
}

// ------------------------------------------------------------
// Muestra por pantalla el array de lenguajes seleccionado (depuración)
// ------------------------------------------------------------
echo "<pre>";
print_r($_SESSION['lenguajes']);
echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Selección de personal</title>
</head>
<body>
<h2> Datos de candidato: Paso 2º </h2>

<!-- Formulario para actualizar nombre y lenguajes -->
<form  action="seleccion.php" method="POST">
<fieldset>
<legend>Datos Profesionales </legend>

<!-- Campo para nombre -->
Nombre : <input type="text" name="nombre" value = "<?= $nombre ?>" >  </br>

<!-- Lista de selección múltiple de lenguajes de programación -->
Lenguajes de programación:<br>
<select name="lenguajes[]" multiple="multiple" size=6>
     <option value="Java" <?= estalenguaje('Java')? "selected = 'selected'" : " " ?> >Java</option>    
     <option value="Javascript"  <?= estalenguaje('Javascript')? "selected = 'selected'" : " " ?> >Javascript</option>
     <option value="Php"  <?= estalenguaje('Php')? "selected = 'selected'" : " " ?> >Php</option>
     <option value="Python"  <?= estalenguaje('Python')? "selected = 'selected'" : " " ?> >Python</option>
     <option value="Perl"  <?= estalenguaje('Perl')? "selected = 'selected'" : " " ?> >Perl</option>
     <option value="C#"  <?= estalenguaje('C#')? "selected = 'selected'" : " " ?>>C#</option>
</select><br>

<!-- Botón de envío -->
<input type="submit" value="Enviar">
</fieldset>
</form>
</body>
</html>
