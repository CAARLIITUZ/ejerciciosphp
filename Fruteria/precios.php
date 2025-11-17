<?php
// Creo un array asociativo que contiene los precios de cada fruta
$precios = [];
$precios["Platanos"] = 3.1;  // Precio de los plátanos
$precios["Limones"] = 1.5;   // Precio de los limones
$precios["Naranjas"] = 2.5;  // Precio de las naranjas
$precios["Manzanas"] = 2.5;  // Precio de las manzanas
$precios["Kiwis"] = 4.5;     // Precio de los kiwis

// Función que genera dinámicamente las opciones <option> para un <select> HTML
function generaOpciones(): string {

    global $precios; // Accede al array $precios definido fuera de la función

    $resu = ""; // Variable donde se concatenarán las opciones

    // Recorro cada fruta en el array de precios
    foreach ($precios as $fruta => $precio) {
        // Concatena una opción HTML por cada fruta
        // value='$fruta' será el valor que se enviará al enviar el formulario
        $resu .= "<option value='$fruta'>" . $fruta . "</option> \n";
    }

    // Devuelve todas las opciones generadas como un string
    return $resu;
}
