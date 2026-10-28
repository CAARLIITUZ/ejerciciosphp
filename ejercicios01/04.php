<html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 04 - Genera 666</title>
</head>

<body>
    <h1>Ejercicio 4</h1>

    <?php
        $cont_seis=0;
        $cont_numeros=0;
        $tiempoInicio= microtime(true);
        while($cont_seis<3){

            $num_random = random_int(1,10);
            $cont_numeros++;
            if ($num_random != 6){
                $cont_seis =0;
            }

            if($num_random ==6){
                $cont_seis++;
            }

        }
        $tiempoFinal= microtime(true);
        $tiempoResultado = $tiempoFinal - $tiempoInicio;
        $tiempoFormateado = number_format($tiempoResultado, 3, ".", ",");


        echo "Han salido tres 6 seguidos tras generar ".$cont_numeros. " numeros en ".$tiempoFormateado;

    ?>

    <hr>
    <?php show_source(__FILE__); ?>
    <hr>
</body>

</html>