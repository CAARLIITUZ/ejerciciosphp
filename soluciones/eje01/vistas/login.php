<!DOCTYPE html>
<!-- Indica que el documento es HTML5 -->

<html lang="es">
<!-- Documento HTML en español -->

<head>
    <!-- Información para el navegador -->

    <meta charset="UTF-8">
    <!-- Permite usar acentos, ñ y caracteres especiales -->

    <title>Acceso Clientes</title>
    <!-- Título de la pestaña del navegador -->

    <style>
        /* Estilos CSS de la página */

        body {
            font-family: sans-serif;          /* Tipo de letra */
            background: #f4f4f9;              /* Color de fondo */
            display: flex;                    /* Usa Flexbox */
            justify-content: center;          /* Centra horizontalmente */
            height: 100vh;                    /* Altura completa de la pantalla */
            align-items: center;              /* Centra verticalmente */
        }

        .card {
            background: white;                /* Fondo blanco */
            padding: 2rem;                    /* Espacio interior */
            border-radius: 8px;               /* Bordes redondeados */
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); /* Sombra */
        }

        input {
            display: block;                   /* Cada input en su propia línea */
            margin: 10px 0;                   /* Separación vertical */
            padding: 8px;                     /* Espacio interior */
            width: 100%;                      /* Ocupa todo el ancho */
        }

        button {
            background: #6c5ce7;              /* Color del botón */
            color: white;                     /* Texto blanco */
            border: none;                     /* Sin borde */
            padding: 10px;                    /* Espacio interior */
            width: 100%;                      /* Ancho completo */
            cursor: pointer;                  /* Mano al pasar el ratón */
        }

        .error {
            color: red;                       /* Texto rojo */
            font-size: 0.9em;                 /* Tamaño más pequeño */
        }
    </style>
</head>

<body>
    <!-- Contenido visible -->

    <div class="card">
        <!-- Tarjeta que contiene el formulario -->

        <h2>
            &#128176; GANA O PIERDE
        </h2>
        <!-- Título con un icono (emoji de dinero) -->

        <!-- Código PHP para mostrar un mensaje de error si existe -->
        <?= isset($msg) ? "<p class='error'>$msg</p>" : '' ?>
        <!--
            Si la variable $msg existe:
                muestra el mensaje en rojo
            Si no existe:
                no muestra nada
        -->

        <!-- Formulario de acceso -->
        <form method="POST">
            <!--
                method="POST" indica que los datos se envían de forma oculta
                hacia el mismo archivo (index.php)
            -->

            <!-- Campo para introducir el DNI -->
            <input
                type="text"
                name="dni"
                placeholder="DNI Cliente"
                required
            >
            <!-- required obliga a rellenar el campo -->

            <!-- Campo para introducir la contraseña -->
            <input
                type="password"
                name="clave"
                placeholder="Contraseña"
                required
            >

            <!-- Texto informativo -->
            <label>Puntos a jugar:</label>

            <!-- Campo para introducir los puntos iniciales -->
            <input
                type="text"
                name="puntos"
                value="10"
                required
            >
            <!-- value="10" pone 10 puntos por defecto -->

            <!-- Botón para enviar el formulario -->
            <button type="submit">
                Entrar
            </button>
        </form>
    </div>
</body>
</html>
