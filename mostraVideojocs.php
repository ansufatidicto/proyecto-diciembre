<?php
function mostrarVideojocs() {
    // Llegeix el fitxer JSON
    $dades = json_decode(file_get_contents('dades.json'), true);

    // Mostra els videojocs en una taula amb disseny atractiu
    echo "<table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Desenvolupador</th>
                    <th>Data de Llançament</th>
                    <!-- Altres capçaleres -->
                </tr>
            </thead>
            <tbody>";

    foreach ($dades as $videojoc) {
        echo "<tr>
                <td>{$videojoc['nom']}</td>
                <td>{$videojoc['desenvolupador']}</td>
                <td>{$videojoc['data_llancament']}</td>
                <!-- Altres cel·les amb dades dels videojocs -->
              </tr>";
              
    }

    echo "</tbody>
        </table>";
}
// Inclou la teva pàgina HTML amb el disseny
include('menu.html');

?>
