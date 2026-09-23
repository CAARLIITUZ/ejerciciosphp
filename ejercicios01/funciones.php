<?php
function sumar (int $valor1, int $valor2){
        return $valor1+$valor2;
    }
    function sumar2 (int $valor1, int $valor2, int & $resu){ // OJO!! RECUERDA QUE CUANDO PASAS UN PARAMETRO A UNA FUNCION
        $resu= $valor1+$valor2;                              // PASAS UNA COPIA POR VALOR, PERO SI QUEREMOS MODIFICAR
    }                                                        // ESE DATO POR REFERENCIA SE AÑADE EL SIMBOLO &

?>