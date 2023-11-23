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
    // Implementa la lògica per generar codis únics
}

// Redirigeix a la pàgina principal
header('Location: menu.html');
include("menu.html");
include("dades.json");
exit();
?>
