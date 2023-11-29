
<?php
include('carrega_json');
include('dades.json');

$datos='dades.json';
carrega_json($datos);
$dades = carrega_json($datos);
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

?>