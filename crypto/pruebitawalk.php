<html>
        <head><title> .: Echo :. </title></head>
        <body align="center" bgcolor="#DAE05C">

<?php
/*
        Materia: Seguridad Informática _ UPB SCZ
        Nombre: Marco Antonio Roca Montenegro
        Código: 55995
*/
include_once("lenguaje.php");
     
                cr1($a1,$a2,$k);
                remove_sp_chr($m);
                eliminar_acentos($m);
                 if($control!=='desencriptar'){
        echo "<h1>";
        echo "Mensaje encriptado: Les será dificil descifrarlo<br> <br> ";
        echo "</h1>";
        echo "copia el mensaje que se encuentra dentor de las \"\" ";
        echo"<h2>";
        echo "<textarea name=\"textarea\" rows=\"10\" cols=\"70\" style=\"color: blue; ; font-size: 20px\" readonly=\"readonly\"> ";
         echo "\"".fase_encryp($m,$ap,$a1)."\"";      
        echo "</textarea>";
        echo"</h2>";
        echo "<br>";




        echo "<img src=\"https://media.giphy.com/media/l2QDNXWxkwPrwwRMI/giphy.gif\" width=\"300\" height=\"300\">";
            }
            else{
                //fase si escoge descifrar :D
                ECHO "<H2 style=\"color: blue\">";
              fase_desec($m,$ap);
              echo "<br>";
              echo "Mensaje:  ".$m;
              echo "</h2>";
              echo "<br>";
              echo "<img src='https://media.giphy.com/media/jzHFPlw89eTqU/giphy.gif'>";
}
        echo "</body>";
echo "</html>";

?>
