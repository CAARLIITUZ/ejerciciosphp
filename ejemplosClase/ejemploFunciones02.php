<?php
/*
Ejemplo básico de funciones 

*/

function suma ( int $num1, int $num2):int {

$resu = $num1 + $num2;
return $resu;

}

function resta ( int $num1, int $num2):int {

$resu = $num1 - $num2;
return $resu;

}

/*
 Método que tiene con parámetro el nombre de una función
*/
function operar ( int $num1, int $num2, callable $metodo):int{
   $resu = $metodo ($num1,$num2);

   return $resu;
   
}




function sumapos ( array $t): int {
   $resu = 0;
   foreach ( $t as $valor ){
      if ( $valor > 0){
          $resu += $valor;
      }
   }
 return $resu;

}
/**
 *  SI modifico el array tiene que ser pasado por referencia &
 * 
 */
function sumaposceros ( array & $t): int {
   $resu = 0;
   foreach ($t as $key => $valor){
      if ( $valor > 0){
          $resu += $valor;
      } else {
         unset($t[$key]);
      }
   }
 return $resu;

}



$valores = [3,5,-5,-60,6,0,-1,8];
$valores2 = [3,5,-5,-60,6,0,-1,8,32,5];

echo " Suma de positivos = ". sumaposceros($valores);
print_r($valores);


echo " Operar -> suma :". operar(10,20,'suma')."\n";
echo " Operar -> resta :". operar(10,20,'resta')."\n";

$datos = [ 8293 => ["Pepe,34"],["Juan",23], ["Ana",45] ];

function compedad (array $v1, array $v2) : int{
// un comparador siempre tiene que devolver un entero
   return ( $v1[1] - $v2[1]);
}


uasort($datos,'compedad');

print_r($datos);