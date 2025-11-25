<?php
session_start(); // Necesario para usar variables de sesión (token, etc.)

define('CUENTAFICHERO', 'misaldo.txt'); // Archivo donde se guarda el saldo del usuario

// ------------------------------------------------------------
// 1. COMPROBACIÓN DEL TOKEN DE SESIÓN
// ------------------------------------------------------------

// Si NO existe el token en la sesión → acceso ilegal
if (!isset($_SESSION['token'])) {

    // Redirige de vuelta a acceso.php con mensaje de error
    header('Location: acceso.php?msg=Error+de+acceso 1');
    exit();

} else {

    // Si existe el token, mensaje y redirección informativa
    $msg = "Token definido";
    header('Location: acceso.php?msg=Token+correcto');
}

// ------------------------------------------------------------
// 2. EVITAR ATAQUES: COMPROBAR QUE EL TOKEN ENVIADO COINCIDE
// ------------------------------------------------------------
if( $_SESSION['token'] != $_POST['token']){
    $msg = "Error de acceso";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

// ------------------------------------------------------------
// 3. LEER EL SALDO DESDE EL ARCHIVO
// ------------------------------------------------------------
$saldo = file_get_contents(CUENTAFICHERO);

// ------------------------------------------------------------
// 4. OPCIÓN: VER SALDO
// ------------------------------------------------------------
if($_POST['Orden'] == 'Ver saldo'){
 
    // Formatea el número con coma decimal
    $msg = "Su saldo actual es " . number_format($saldo,2,',','.');

    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

// ------------------------------------------------------------
// 5. VALIDACIÓN DEL IMPORTE
// ------------------------------------------------------------
if (
    empty($_POST['importe']) ||          // Campo vacío
    !is_numeric($_POST['importe']) ||    // No numérico
    $_POST['importe'] <= 0               // Cantidad negativa o cero
){
    $msg ="Importe Erróneo o importe menor de 0 ";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

// Ya validado → guardamos el importe
$importe = $_POST['importe'];

// ------------------------------------------------------------
// 6. OPCIÓN: INGRESO
// ------------------------------------------------------------
if ( $_POST['Orden'] == 'Ingreso'){

    // Suma el importe al saldo actual
    $saldo = $saldo + $importe;

    // Guarda el nuevo saldo en el archivo
    file_put_contents(CUENTAFICHERO,$saldo);

    $msg = "Operacion realizada";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}

// ------------------------------------------------------------
// 7. OPCIÓN: REINTEGRO (RETIRADA DE DINERO)
// ------------------------------------------------------------

if ( $_POST['Orden'] == 'Reintegro'){

   // Solo se permite si el saldo es suficiente
   if($importe <= $saldo) {

        $saldo = $saldo - $importe;
        file_put_contents(CUENTAFICHERO,$saldo);

   } else {

        // No hay saldo suficiente
        $msg ="ERROR, el saldo es menor que el reintegro";
   }

    // Siempre muestra este mensaje después
    $msg = "Operacion realizada";
    header("Location: acceso.php?msg=".urlencode($msg));
    exit();
}
