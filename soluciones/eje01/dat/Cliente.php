<?php 

// Definición de la clase Cliente
class Cliente {

    // Constructor de la clase: se ejecuta al crear un objeto Cliente
    // Recibe 4 parámetros: dni, nombre, clavehash y puntos
    // La sintaxis "private $var" declara la propiedad y la hace privada (solo accesible desde la clase)
    function __construct(private $dni, private $nombre, private $clavehash, private $puntos) {
        // Aquí no hace nada más, solo guarda los valores en las propiedades privadas
    }

    // Método mágico __get: se llama cuando se intenta leer una propiedad privada
    function __get($name) {
        // Comprueba si la propiedad existe en la clase
        if (property_exists($this, $name)) {
            // Devuelve el valor de la propiedad
            return $this->$name;
        }
    }

    // Método mágico __set: se llama cuando se intenta asignar un valor a una propiedad privada
    function __set($name, $value) {
        // Comprueba si la propiedad existe en la clase
        if (property_exists($this, $name)) {
            // Asigna el valor a la propiedad
            return $this->$name = $value;
        }
    }

}
