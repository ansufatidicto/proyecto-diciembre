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



function eliminar_por_fecha($fecha_inicio, $fecha_fin, &$data) {
    $videojuegos_eliminar = [];

    foreach ($data as $key => $videojoc) {
        $fecha_videojuego = strtotime($videojoc['Llançament']);
        $fecha_inicio = strtotime($fecha_inicio);
        $fecha_fin = strtotime($fecha_fin);

        if ($fecha_videojuego >= $fecha_inicio && $fecha_videojuego <= $fecha_fin) {
            $videojuegos_eliminar[] = $key;
        }
    }

    foreach ($videojuegos_eliminar as $key) {
        unset($data[$key]);
    }
    
    file_put_contents('games_filtered.json', json_encode($data, JSON_PRETTY_PRINT));
}

eliminar_por_fecha('2017-01-01', '2020-12-31', $dades);

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

// Resto del código...

/*
function generarCodiUnic() {
     $codi = 'id' . uniqid();
    return $codi;
}
*/

?>