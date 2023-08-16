<?php
function quitarCircunstancias($cadena) {
    $circunstancias = array(
        'á' => 'a',
        'é' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ú' => 'u',
        'Á' => 'A',
        'É' => 'E',
        'Í' => 'I',
        'Ó' => 'O',
        'Ú' => 'U',
        '?' => '',
        '¿' => '',
        '!' => '',
        '¡' => '',
        // Agrega más caracteres acentuados y sus correspondientes sin acento si es necesario
    );

    // Reemplazamos los caracteres acentuados por sus equivalentes sin acento
    $cadena = strtr($cadena, $circunstancias);

    return $cadena;
}

function esPalindromo($cadena) {
    $count = null;
    $pattern =  ['á', 'é', 'í', 'ó', 'ú'];
    $replacement = ['a','e', 'i', 'o', 'u'];
    // Eliminamos espacios y convertimos todo a minúsculas para evitar problemas de mayúsculas/minúsculas
    $cadena = str_replace(' ', '', strtolower($cadena));
    $cadena = quitarCircunstancias($cadena);
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
    if (strlen($_POST['cadena'])>1)
    if (esPalindromo($_POST['cadena'])) {
        echo "La cadena: '".$_POST['cadena']."' es un palíndromo.";
    } else {
        echo "La cadena: '  ".$_POST['cadena']."' NO es un palíndromo.";
    }
    else
       echo "debe insertar una cadena de 2 o más caracteres";
}

