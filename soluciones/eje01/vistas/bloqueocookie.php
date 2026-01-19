<!DOCTYPE html>
<!-- Indica que el documento es HTML5 -->

<html lang="es">
<!-- Documento HTML en español -->

<head>
    <!-- Información para el navegador -->

    <meta charset="UTF-8">
    <!-- Permite usar acentos, ñ y caracteres especiales -->

    <title>Acceso Clientes Bloqueado</title>
    <!-- Título de la pestaña -->

    <style>
        /* Estilos CSS de la página */

        body {
            font-family: sans-serif;          /* Tipo de letra */
            background: #f4f4f9;              /* Color de fondo */
            display: flex;                    /* Flexbox para centrar */
            justify-content: center;          /* Centra horizontalmente */
            height: 100vh;                    /* Altura de toda la ventana */
            align-items: center;              /* Centra verticalmente */
        }

        .card {
            background: white;                /* Fondo blanco */
            padding: 2rem;                    /* Espacio interior */
            border-radius: 8px;               /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); /* Sombra */
        }

        input {
            display: block;                   /* Cada input en su línea */
            margin: 10px 0;                   /* Separación vertical */
            padding: 8px;                     /* Espacio interior */
            width: 100%;                      /* Ancho completo */
        }

        button {
            background: #6c5ce7;              /* Color de botón */
            color: white;                     /* Texto blanco */
            border: none;                     /* Sin borde */
            padding: 10px;                    /* Espacio interior */
            width: 100%;                      /* Ancho completo */
            cursor: pointer;                  /* Mano al pasar ratón */
        }

        .error {
            color: red;                       /* Texto rojo */
            font-size: 0.9em;                 /* Tamaño más pequeño */
            align-content: center;            /* Centra contenido */
        }
    </style>
</head>

<body>
    <!-- Contenido visible -->

    <div class="card">
        <!-- Tarjeta que contiene el mensaje de bloqueo -->

        <h2>
            &#128176; GANA O PIERDE
        </h2>
        <!-- Título con emoji de dinero -->

        <!-- Mensaje de error fijo -->
        <p class='error'>Acceso bloqueado</p>

        <!-- Texto adicional explicando el bloqueo -->
        <p>Volver a intentar en unos minutos</p>

        <!-- Botón para recargar la página -->
        <button onclick="window.location.href='index.php'">
            Recargar
        </button>
    </div>
</body>
</html>
