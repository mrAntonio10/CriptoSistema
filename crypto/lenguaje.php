<?php
/*
        Materia: Seguridad Informática _ UPB SCZ
        Nombre: Marco Antonio Roca Montenegro
        Código: 55995
*/



// Abecedario conocido
 $a1 = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
//Abecedario que me ayude a codificar
 $a2 = ["MI","JU","FA","SO","AY","QE","MA","KE","XD","TR","AL","PA","ZU","DO","FE","IO","NA","IS","OO","AN","EU","OL","IM","VU","UX","PL"];
    //Key obtenida
   $k=$_POST['key'];
   //Mensaje obtenido
   $m=$_POST['m1'];
   //controlador de enc/desenc
   $control=$_POST['s'];
//ARAY VACÍO LENGUAJE+LLAVE
$ap=[];






/*
    Documentación obtenida en:
    https://codigosdeprogramacion.com/2019/07/11/quitar-acentos-y-tildes-en-php/
*/

function eliminar_acentos(&$cadena){
        
        //Reemplazamos la A y a
        $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
        array('Ñ', 'ñ', 'Ç', 'ç'),
        array('N', 'n', 'C', 'c'),
        $cadena
        );
        
        return $cadena;
    }


//funcion crypt mensaje
   //array en blanco para mostrar resultado
function cr1($a1,$a2,$k){
    GLOBAL $ap;
        $d=$k;
   //contador para el segundo vocabulario
        $c=0;

    //Bucle for para iterar en un array de resultado
            for($i=$d;$i<=25;$i++){
       
            $ap[$a1[$i]] = $a2[$c];
            $c++;
    //Fin del blucle
            }
        //If para consultar si faltan letras
         if($d>(-1)){
        //Inicio for para seguir iterando
                for($i=0;$i<($d);$i++){
                        $ap[$a1[$i]] = $a2[$c];
                     $c++;
        //Fin del blucle for
                     }
    //Fin if
        
            }
    

    
//fin function
};



/*
    Documentacion obtenida en:
    https://www.delftstack.com/es/howto/php/remove-special-characters-from-string-php/
*/
function remove_sp_chr(&$str)
{
      $str = str_replace(
        array('!', '"', '$', '%', '&', '/', '(', ')','_',':','¨','ª','º','|','@','~','¬','#','·','?','='),
        '',
        $str);
    return $str;
}
//fin del remove

//Inicio funcion fase_encryp
function fase_encryp(&$mensaje,$ap,$a1){
   
    $LL="";

    //Método el cual realiza la encriptación
    for($i=0;$i<strlen($mensaje);$i++){
            if($mensaje[$i]===" "){
                $LL=$LL."**".$ap[$a1[rand(0,25)]];
            }
                else{
                    $L=array_search(strtoupper($mensaje[$i]),array_flip($ap));
                    $LL=$LL.$L.$ap[$a1[rand(0,25)]];
                     }    
    }
    //HAGO UN FLIP
    $mensaje= strrev($LL);
    return ($mensaje);
//Fin funcion fase_encryp
}


//Inicio fase desencryp
function fase_desec(&$mensaje,$ap){
        $arr= str_split($mensaje,2);
        echo "<br>";
        $arr2=[];
        $LL="";
   //contadores
        $i=1;
         $O=0;
        do{
                $arr2[$O]= $arr[$i];
                $i+=2;
                $O++;
        } while($i<count($arr));
    //Método el cual realiza la encriptación
            for($i=0;$i<count($arr2);$i++){
                if(strrev($arr2[$i])==="**"){
                    $LL=$LL." ";
                }
                else{
                    $L=array_search(strrev($arr2[$i]),($ap));
                    $LL=$LL.$L;
                }
            }
    echo "<br>";
    //Vuelvo a hacer el flip para obtener el mensaje original
    $mensaje= strrev($LL);
    return $mensaje;
//Fin function desen
}



?>