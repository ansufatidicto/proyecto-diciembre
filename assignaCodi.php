<?php
function assignarCodi() {
    // Llegeix el fitxer JSON
    $dades = json_decode(file_get_contents('dades.json'), true);

    // Assigna codis als videojocs
    foreach ($dades['videojocs'] as &$videojoc) {
        if (!isset($videojoc['codi'])) {
            $videojoc['codi'] = generarCodiUnic();
        }
    }

    // Sobreescriu el fitxer JSON
    file_put_contents('dades.json', json_encode($dades, JSON_PRETTY_PRINT));
}

function generarCodiUnic() {
       // Genera un código único basado en la fecha y hora actual
       $codi = 'id' . uniqid(); // Puedes cambiar 'JUEGO_' por el prefijo que prefieras
       return $codi;

}

echo "<br>";

echo "<table>
<thead>
    <tr>
        <th>Nom</th>
        <th>Desenvolupador</th>
        <th>Llançament</th>
        <!-- Altres capçaleres -->
    </tr>
</thead>
<tbody>";

foreach ($dades as $videojoc) {
echo "<tr>
    <td>{$videojoc['Nom']}</td>
    <td>{$videojoc['Desenvolupador']}</td>
    <td>{$videojoc['Llançament']}</td>
    <!-- Altres cel·les amb dades dels videojocs -->
  </tr>";
  
}

echo "</tbody>
</table>";

// Redirigeix a la pàgina principal
header('Location: menu.html');
include("menu.html");
include("dades.json");
exit();
?>
