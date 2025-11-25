<?php

class BiciElectrica {
   // private $id; // Identificador de la bicicleta (entero)
   // private $coordx; // Coordenada X (entero)
   // private $coordy; // Coordenada Y (entero)
   // private $bateria; // Carga de la batería en tanto por ciento (entero)
   // private $operativa; // Estado de la bicicleta (true = operativa, false = no disponible)
            
    // Constructor de la clase. Recibe los valores iniciales de todos los atributos.
    // Se usa la sintaxis moderna de PHP para declarar y asignar propiedades privadas.
    function __construct(private $id, private $coordx, private $coordy, 
                private $bateria, private $operativa )
     {

    }

    // Métodos mágicos getter y setter.
    // __get se ejecuta cuando se intenta acceder a una propiedad privada.
    function __get($name)
    {
        // Comprueba si la propiedad existe dentro del objeto.
        if (property_exists($this,$name)){
            return $this -> $name; // Retorna el valor de la propiedad solicitada.
        }
    }

    // __set se ejecuta cuando se intenta asignar valor a una propiedad privada.
    function __set($name, $value) {
        // Comprueba si la propiedad existe antes de asignarle un valor.
        if (property_exists($this, $name)) {
            $this-> $name = $value; // Asigna el nuevo valor a la propiedad.
        }
    }

    // Método mágico __toString: devuelve una representación textual del objeto.
    // En este caso, muestra el id y el nivel de batería separados por ":"
    function __toString()
    {
        return $this->id . ":" . $this->bateria;
    }

    // distancia(x,y)
    // Calcula la distancia entre las coordenadas pasadas como parámetro ($x, $y)
    // y las coordenadas actuales de la bicicleta ($coordx, $coordy)
    // Utiliza la fórmula de distancia euclidiana.
    function distancia($x, $y) {
        $disx = $x - $this-> coordx; // Diferencia en X
        $disy = $y - $this-> coordy; // Diferencia en Y

        // Calcula la raíz cuadrada de la suma de cuadrados de las diferencias.
        // Devuelve el resultado convertido a entero.
        return (int) sqrt(($disx*$disx) + ($disy*$disy));
    }
}

?>
