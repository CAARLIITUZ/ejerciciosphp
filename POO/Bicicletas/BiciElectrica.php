<?php

class BiciElectrica {
   // private $id; // Identificador de la bicicleta (entero)
    //private $coordx; // Coordenada X (entero)
    //private $coordy; // Coordenada Y (entero)
    //private $bateria; // Carga de la batería en tanto por ciento (entero)
  //private $operativa; // Estado de la bicleta ( true operativa- false no disponible)
            
  
    function __construct(private $id, private $coordx, private $coordy, 
                private $bateria, private $operativa )
     {


    }
  //setter y getter mediante métodos mágicos
    function __get($name)
    {
        if (property_exists($this,$name)){
            return $this -> $name;
        }
    }

    function __set($name, $value) {
        if (property_exists($this, $name)) {
            $this-> $name = $value;
        }
    }
    //__ToString el id de la bicicleta y el estado de la batería.
    function __toString()
    {
        return $this->id . ":" . $this->bateria;
    }
//•	distancia(x,y)  - Devuelve la distancia entre las coordenadas pasadas como parámetro y las coordenados del 
//la bicicleta aplicando la formula anterior.
    function distancia($x, $y) {
        $disx = $x - $this-> coordx;
        $disy = $y - $this-> coordy;
return (int) sqrt(($disx*$disx) + ($disy*$disy));    }
    }

    ?>