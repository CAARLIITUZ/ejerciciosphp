<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="default.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="container">
      <div id="header">
        <h1>
          TABLA DE MULTIPLICAR
        </h1>
      </div>

      <div id="content">
        
        <table>
          <?php
            $num_random = random_int(1,10);
          ?>
          <tr> 
            <th>Tabla del <?= $num_random  ?>  </th>
            <th></th>
          </tr>
          
          <?php
            for($i =1; $i <=10; $i++){
              $resultado = 0;
              $resultado = $num_random * $i;
              echo "<tr><td>$num_random x $i = </td><td>$resultado</td></tr>";
            }
          ?>

        </table>       
    </div>
   </div>
<hr>
<?php show_source(__FILE__); ?>
<hr>
  </body>
</html>
