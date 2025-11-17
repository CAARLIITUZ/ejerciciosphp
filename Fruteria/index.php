<?php
// Incluye el archivo donde está el array de precios de las frutas
require_once "precios.php";

// Inicia o continúa la sesión
session_start();

/*
 Manejo de la sesión:
 - 'cliente'  → nombre del cliente
 - 'pedidos'  → array asociativo donde la clave es la fruta y el valor es la cantidad
*/


// Si llega un nombre de cliente por GET y aún no hay cliente en la sesión:
// crea un nuevo cliente y una tabla de pedidos vacía
if (isset($_GET['cliente']) && !isset($_SESSION['cliente']) ) {
    $_SESSION['cliente'] = $_GET['cliente'];   // Guardamos el nombre del cliente
    $_SESSION['pedidos'] = [];                 // Inicializamos array vacío para los pedidos
}


// Si NO hay cliente definido en la sesión todavía,
// mostramos la página de bienvenida y paramos la ejecución
if (!isset($_SESSION['cliente'])) {
    require_once 'bienvenida.php'; // Muestra formulario para introducir el nombre
    exit();                        // Termina aquí el script
}


// Si se ha enviado un formulario con una acción...
if (isset($_POST["accion"])) {

    $fruta = $_POST["fruta"];       // Fruta elegida por el cliente
    $cantidad = $_POST["cantidad"]; // Cantidad seleccionada

    switch ($_POST["accion"]) {

        case " Anotar ":
            // Añadir o sumar la cantidad al pedido existente
            if (isset($_SESSION['pedidos'][$fruta])) {
                $_SESSION['pedidos'][$fruta] += $cantidad;
            } else {
                $_SESSION['pedidos'][$fruta] = $cantidad;
            }
            break;

        case " Anular ":
            // Elimina esta fruta de los pedidos
            unset($_SESSION['pedidos'][$fruta]);
            break;

        case " Terminar ":
            // Genera el mensaje final de compra con tabla e importes
            $compraRealizada = htmlTablaPedidosImportes($precios);

            // Muestra la página de despedida
            require_once 'despedida.php';

            // Destruye la sesión para volver a estado inicial
            session_destroy();

            exit(); // Finaliza aquí la ejecución del script
            break;
    }
}


// Calcula la tabla con importes para mostrarla en la página de compra
$compraRealizada = htmlTablaPedidosImportes($precios);

// Carga la página principal de compra
require_once 'compra.php';


/* -------------------------------------------------------
   FUNCIONES AUXILIARES
--------------------------------------------------------*/

// Genera una tabla HTML simple con fruta y cantidad
function htmlTablaPedidos(): string
{
    $msg = "";
    $msg .= "<table>";

    foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
        $msg .= "<tr><td> $fruta : $cantidad </td></tr>";
    }

    $msg .= "</table>";
    return $msg;
}


// Genera una tabla HTML con fruta, precio, cantidad e importes
function htmlTablaPedidosImportes($precios): string
{
    $msg = "";
    $importeTotal = 0;

    $msg .= "<table>";
    $msg .= "<th> Fruta </th><th> Cantidad x Importe </th><th> Subtotal </th>";

    foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {

        $precio = $precios[$fruta];     // Precio unitario de la fruta
        $importe = $precio * $cantidad; // Subtotal de esta fruta

        $importeTotal += $importe;      // Acumula al total

        // Fila de la tabla
        $msg .= "<tr>";
        $msg .= "<td> $fruta </td>";
        $msg .= "<td> $precio x $cantidad </td>";
        $msg .= "<td> $importe </td>";
        $msg .= "</tr>";
    }

    // Fila final con el importe total
    $msg .= "<tr><td colspan=2><b> Importe total :</b></td><td> $importeTotal </td></tr>";
    $msg .= "</table>";

    return $msg;
}
