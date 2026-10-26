<?php
if (isset($_COOKIE["nombre"])){
    setcookie("nombre", "Carlos Garcia", time()-60);
    print "<p>Su nombre es $_COOKIE[nombre]</p>\n";


}else{
    setcookie("nombre", "Carlos Garcia", time()+120);
    print "<p>No se su nombre</p>\n";

}



?>