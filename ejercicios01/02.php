<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $n1 = random_int(1,9);
    $x=1;
    for($x==0;$x<=$n1;$x++) {
        for($i=0;$i<$x;$i++){
            if($x%2!=0){
                 echo '<span style=" color: red;">'. $x.'</span>';
            }else{
                echo '<span style=" color: blue;">'. $x.'</span>';
            }
    }
    echo "</br>";
    }
    
    ?>
    
</body>
</html>