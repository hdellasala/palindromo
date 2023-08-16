<?php

function esPalindromo($cadena) {
    $count = null;
    $pattern =  ['á', 'é', 'í', 'ó', 'ú'];
    $replacement = ['a','e', 'i', 'o', 'u'];
    // Eliminamos espacios y convertimos todo a minúsculas para evitar problemas de mayúsculas/minúsculas
    $cadena = str_replace(' ', '', strtolower($cadena));
    preg_replace($pattern,$replacement,$cadena);
        

    // Obtenemos la longitud de la cadena
    $longitud = strlen($cadena);
    // Verificamos si la cadena es un palíndromo
    for ($i = 0; $i < $longitud / 2; $i++) {
        if ($cadena[$i] != $cadena[$longitud - $i - 1]) {
            return false;
        }
    }

    return true;
}


if (isset($_POST['cadena'])) {
    if (esPalindromo($_POST['cadena'])) {
        echo "La cadena ".$_POST['cadena']." es un palíndromo.";
    } else {
        echo "La cadena ".$_POST['cadena']." NO es un palíndromo.";
    }
}

