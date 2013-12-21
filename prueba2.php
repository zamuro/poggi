<?php
require "lib/conecta.php";
$id = $_GET['id'];
$datos = Obras::find_by_id($id);
$fotos = Fotos::find('all', array('obraid' => $id));  
echo "<li>$datos->id</li>";
echo "<li>$datos->nombre</li>";
echo "<li>$datos->ubicacion</li>";
foreach ($fotos as $url) {
	echo "<li>$url->url</li>";
}
?>
