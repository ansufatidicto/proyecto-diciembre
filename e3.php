<?php
// Cargar y decodificar datos del archivo JSON
$dades = json_decode(file_get_contents('games.json'), true);

// Tu función para asignar códigos a los videojuegos
function generarCodiUnic() {
     static $id = 1; // Utilizamos una variable estática para mantener el valor entre llamadas
    return  $id++; // Devolvemos el ID con el valor actual de $id y luego lo incrementamos
}

function asignar_codi(&$data) {
    $id = 1; // Inicializar el identificador
    foreach ($data as &$videojoc) {
        $videojoc['id'] = generarCodiUnic(); // Asignar un nuevo código único
        $id++; // Incrementar el id para el próximo juego
    }
}

asignar_codi($dades); // Llamar a la función y pasar el array de datos

// Sobreescribir el archivo JSON con los nuevos datos


file_put_contents('games.json', json_encode($dades, JSON_PRETTY_PRINT));

// Mostrar los datos en una tabla si es necesario
echo "<br>";
echo "<table border='1'>";

foreach ($dades as $videojoc) {
    echo "<tr>";
    foreach ($videojoc as $nombreCampo => $dato) {
        echo "<td>$nombreCampo: $dato</td>";
    }
    echo "</tr>";
}

echo "</table>";
echo "<br>";


/*
function generarCodiUnic() {
     $codi = 'id' . uniqid();
    return $codi;
}

*/
?>



