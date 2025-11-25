<?php
session_start();  // Inicia o continúa la sesión

// ------------------------------------------------------------
// GESTIÓN DE VISITAS MEDIANTE COOKIE
// ------------------------------------------------------------
$visitas = 1;  // Valor por defecto

// Si existe la cookie, recupero el número de visitas
if ( isset( $_COOKIE['visitascasino'])){
    $visitas = $_COOKIE['visitascasino'];
}

// Mensaje que se mostrará según el resultado de la apuesta
$msg = "";

// ------------------------------------------------------------
// ENTRADA INICIAL AL CASINO
// ------------------------------------------------------------
// Si NO existe el saldo disponible en la sesión,
// significa que el jugador aún no ha entrado o acaba de empezar.
if (! isset($_SESSION['disponible'])) {

    // Si todavía no indicó dinero inicial → mostrar formulario de bienvenida
    if ( empty($_POST['cantidadini'])) {
        require_once "form_bienvenida.php";

    } else {
        // Si introdujo la cantidad inicial, la guardo en la sesión
        $_SESSION['disponible'] = $_POST['cantidadini'];

        // Muestro el formulario para empezar a apostar
        require_once "form_apuesta.php";
    }

    // Evito que siga ejecutando más código después de mostrar formulario
    exit();
}

// ------------------------------------------------------------
// SI EL USUARIO HA REALIZADO UNA APUESTA
// ------------------------------------------------------------
if (isset($_POST["apostar"])) {

    // Valido que la cantidad sea numérica y mayor que cero
    if ( is_numeric ($_POST["cantidad"]) and  $_POST["cantidad"] > 0 ) {

        // Procesa la apuesta y genera el mensaje de resultado
        $msg = procesarApuesta($_POST["cantidad"], $_SESSION['disponible'], $_POST['apuesta']);

    } else {
        // Si la cantidad no es válida
        $msg = " El valor ". $_POST["cantidad"]." no es correcto.";
    }
}

// ------------------------------------------------------------
// SI ABANDONA EL CASINO O SE QUEDA SIN DINERO
// ------------------------------------------------------------
if (isset($_POST["dejar"]) || ($_SESSION["disponible"] == 0) ) {

    // Incremento contador de visitas
    $visitas++;

    // Guardo la cookie con validez de un mes
    setcookie("visitascasino", $visitas, time()+ 30 * 24 * 3600);

    // Muestro página de despedida
    require_once "despedida.php";

    // Elimino la sesión
    session_destroy();

    exit();
}

// ------------------------------------------------------------
// SI PUEDE SEGUIR APOSTANDO → SE MUESTRA EL FORMULARIO DE APUESTA
// ------------------------------------------------------------
require_once  "form_apuesta.php";
?>


<?php
/**
 * ------------------------------------------------------------
 * FUNCIÓN AUXILIAR PARA PROCESAR UNA APUESTA
 * ------------------------------------------------------------
 * @param int $valorapuesta → cantidad apostada
 * @param int &$saldodisponible → saldo actual del jugador (referencia)
 * @param string $apuesta → elección del jugador: PAR o IMPAR
 * @return string → mensaje resultado de la jugada
 */
function procesarApuesta(int $valorapuesta, int & $saldodisponible, string $apuesta): String {

    $msgresultado = "";

    // Verifica si tiene suficiente saldo
    if ($valorapuesta > $saldodisponible ) {

        $msgresultado .= "Error: no dispone de  $valorapuesta euros disponibles. ";

    } else {

        // Genera un número aleatorio entre 1 y 100
        // Si es par → resultado = PAR, si es impar → IMPAR
        $resultado = (random_int(1, 100) % 2 == 0) ? "PAR" : "IMPAR";

        $msgresultado .= " RESULTADO DE LA APUESTA : " . $resultado;

        // Si ganó
        if ($apuesta == $resultado) {
            $msgresultado .= " GANASTE <br>";
            $saldodisponible  += $valorapuesta;

        } else { // Si perdió
            $msgresultado .=" PERDISTE <br>";
            $saldodisponible  -= $valorapuesta;
        }
    }

    return $msgresultado;
}
