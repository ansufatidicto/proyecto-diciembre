
<?php
function carrega_json($arxiu_json) {
    $dades = json_decode(file_get_contents('$arxiu_json'), true);
}


?>