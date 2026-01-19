<?php
// Inicia o reanuda una sesión para poder usar variables de sesión
session_start();

// Incluye el archivo funciones.php una sola vez (aunque se intente incluir más veces)
include_once 'funciones.php';

// Comprueba si existe la cookie llamada 'jugaste'
if (isset($_COOKIE['jugaste'])) {

      // Si existe la cookie, se incluye una vista que bloquea el acceso
      include_once 'vistas/bloqueocookie.php';

      // Detiene la ejecución del script para que no siga cargando más código
      exit();
}

// Comprueba si existe la variable de sesión 'dni' (usuario logueado)
if (isset($_SESSION['dni'])) {

    // Comprueba si se ha enviado un parámetro 'orden' por la URL (GET)
    if (isset($_GET['orden'])) {

        // Si el valor de 'orden' es 'salir'
        if ($_GET['orden'] == 'salir') {

            // Crea una cookie llamada 'jugaste' que dura 10 minutos
            setcookie('jugaste','si',time()+10*60);

            // Guarda los puntos del usuario llamando a una función
            anotarPuntos($_SESSION['dni'], $_SESSION['puntos']);

            // Destruye la sesión (cierra sesión)
            session_destroy();

            // Carga la vista del login
            include 'vistas/login.php';

            // Detiene la ejecución del script
            exit();
        }

        // Si la orden es 'continuar' y los puntos son mayores que 0
        if ($_GET['orden'] == 'continuar' && $_SESSION['puntos'] > 0) {

            // Suma o resta un número aleatorio entre -50 y 50 a los puntos
            $_SESSION['puntos'] += random_int(-50, 50);

            // Si los puntos bajan a 0 o menos
            if ($_SESSION['puntos'] <= 0) {

                // Se asignan los puntos a 0
                $_SESSION['puntos'] = 0;
            }
        }
    }

    // Muestra la vista donde se ven los puntos del usuario
    include 'vistas/puntos.php';
}

// Si la petición es GET y NO hay sesión iniciada
if ($_SERVER['REQUEST_METHOD'] == "GET" && !isset($_SESSION['dni'])) {

        // Muestra el formulario de login
        include 'vistas/login.php';
}

// Si la petición es POST (envío del formulario)
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Guarda el DNI enviado por el formulario
    $dni = $_POST['dni'];

    // Guarda la clave enviada por el formulario
    $clave = $_POST['clave'];

    // Guarda los puntos enviados por el formulario
    $puntos = $_POST['puntos'];

    // Comprueba si los puntos son un número
    if (is_numeric($puntos)) {

        // Comprueba si el usuario es válido llamando a la función validarCliente
        if (validarCliente($dni, $clave)) {

            // Guarda el DNI en la sesión
            $_SESSION['dni'] = $dni;

            // Guarda los puntos en la sesión
            $_SESSION['puntos'] = $puntos;

            // Muestra la vista de puntos
            include 'vistas/puntos.php';

        } else {

            // Mensaje de error si el usuario o contraseña son incorrectos
            $msg = " Nombre y contraseña incorrectos";

            // Vuelve a mostrar el login con el mensaje de error
            include "vistas/login.php";
        }

    } else {

        // Mensaje de error si los puntos no son numéricos
        $msg = " Los puntos debe ser un valor númerico";

        // Vuelve a mostrar el login con el mensaje de error
        include "vistas/login.php";
    }
}


