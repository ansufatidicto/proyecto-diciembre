<?php

function mostrarVideojocs() {
    // Llegeix el fitxer JSON
    $dades = json_decode(file_get_contents('games.json'), true);

    // Mostra els videojocs en una taula amb disseny atractiu
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
}
// Inclou la teva pàgina HTML amb el disseny
include('menu.html');
mostrarVideojocs();

?>
