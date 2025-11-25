<?php
session_start(); 
// Inicia o continúa la sesión para poder usar variables de sesión

// Genero un token único para firmar el formulario
// uniqid(mt_rand(), true) → genera un ID único con aleatoriedad extra
// md5() → lo convierte en un hash hexadecimal
$_SESSION["token"] = md5(uniqid(mt_rand(), true));
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>MiniBank</title>
</head>
<body>
<?php
// Si la página recibe un mensaje por GET, lo mostramos
// Esto se usa para mostrar el resultado de operaciones (ingreso, reintegro, saldo)
if (isset($_GET['msg'])) echo "RESULTADO:". $_GET['msg']."<br>";
?>
<!-- Formulario para realizar operaciones bancarias -->
<form action="ejercicio01.php" method="POST">

    <!-- Campo para que el usuario indique la cantidad a operar -->
    Importe de la operación: <input name="importe" type="number" focus><br>

    <!-- Token oculto que se envía para validar la sesión y evitar CSRF -->
    <input type="hidden" name="token" value="<?= $_SESSION["token"]?>">

    <!-- Botones de acción: cada uno envía un valor distinto en "Orden" -->
    <input type="submit" name="Orden" value="Ingreso">
    <input type="submit" name="Orden" value="Reintegro">
    <input type="submit" name="Orden" value="Ver saldo">
</form>
</body>
</html>
