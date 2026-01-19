<!DOCTYPE html>
<!-- Indica que el documento es HTML5 -->

<html lang="es">
<!-- Etiqueta raíz del documento HTML
     lang="es" indica que el idioma es español -->

<head>
    <!-- Contiene información para el navegador, no visible -->

    <meta charset="UTF-8">
    <!-- Define la codificación de caracteres (acentos, ñ, etc.) -->

    <title>Mis Puntos</title>
    <!-- Título que aparece en la pestaña del navegador -->

    <style>
        /* Estilos CSS aplicados a la página */

        body {
            font-family: sans-serif;      /* Tipo de letra */
            text-align: center;           /* Centra el texto */
            padding-top: 50px;            /* Espacio superior */
        }

        .box {
            border: 2px solid #6c5ce7;    /* Borde morado */
            display: inline-block;        /* Ajusta el tamaño al contenido */
            padding: 20px;                /* Espacio interior */
            border-radius: 10px;          /* Bordes redondeados */
        }

        button {
            background: #6c5ce7;          /* Color de fondo */
            color: white;                 /* Color del texto */
            border: none;                 /* Sin borde */
            padding: 10px;                /* Espacio interior */
            width: 100%;                  /* Botón ocupa todo el ancho */
            cursor: pointer;              /* Cambia el cursor al pasar */
        }
    </style>
</head>

<body>
    <!-- Contenido visible de la página -->

    <div class="box">
        <!-- Caja que contiene toda la información -->

        <h1>
            Bienvenido,
            <!-- Muestra el DNI guardado en la sesión -->
            <?= $_SESSION['dni'] ?>
        </h1>

        <p>
            Tienes
            <strong>
                <!-- Muestra los puntos guardados en la sesión -->
                <?= $_SESSION['puntos'] ?>
            </strong>
            puntos acumulados.
        </p>

        <!-- Código PHP para comprobar si el usuario tiene puntos -->
        <?php if ($_SESSION['puntos'] > 0 ) : ?>

            <!-- Botón para seguir jugando -->
            <!-- Al pulsar, envía por GET la orden "continuar" -->
            <button onclick="window.location.href='index.php?orden=continuar'">
                Apostar
            </button>

        <?php else : ?>
            <!-- Mensaje que se muestra si no hay puntos -->
            <p>No tiene puntos para apostar</p>

        <?php endif ?>
        <!-- Fin del condicional PHP -->

        <p></p>
        <!-- Párrafo vacío para separar elementos -->

        <!-- Botón para salir del juego -->
        <!-- Envía por GET la orden "salir" -->
        <button onclick="window.location.href='index.php?orden=salir'">
            Salir
        </button>

    </div>
</body>
</html>
