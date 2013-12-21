<head>
<link rel="stylesheet" href="lib/Zebra_Pagination/public/css/zebra_pagination.css" type="text/css">
</head>
<?php

require "lib/conecta.php";
$id = $_GET['id'];
$datos = Obras::find_by_id($id);

$countries = array(
	'1',
	'2',
	'3',
	'4',
	'5'
	);
        $records_per_page = 2;

        // include the pagination class
        require 'lib/Zebra_Pagination/Zebra_Pagination.php';

        // instantiate the pagination object
        $pagination = new Zebra_Pagination();

 // how many records should be displayed on a page?


        // set position of the next/previous page links
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

        // the number of total records is the number of records in the array
        $pagination->records(count($countries));

        // records per page
        $pagination->records_per_page($records_per_page);

        // here's the magick: we need to display *only* the records for the current page
        $countries = array_slice(
            $countries,                                             //  from the original array we extract
            (($pagination->get_page() - 1) * $records_per_page),    //  starting with these records
            $records_per_page                                       //  this many records
        );

?>
<!-- ACÁ EMPIEZA LA LISTA !-->
<?php echo $datos->nombre; ?>
<ul class="obra-detalle detalle caja">
    <li><?php echo $datos->memoria; ?></li>
    <li><?php echo $datos->ideas; ?></li>
    <li><?php echo $datos->asociado; ?></li>
    <li><?php echo $datos->espacio; ?> metros cuadrados</li>
    <li><?php echo $datos->memoria; ?>, argentina</li>
    <li><?php echo $datos->memoria; ?></li>
</ul>

<!-- Esta es la caja de los detalles de la obra. Esto debe ser sustituido por lo que me lance el query!-->
<ul>
<?php      
            foreach ($countries as $index => $country):
?> 
   
    <li class="detalle caja-foto"><img style="height:auto; width:auto; max-width:280px; max-height:280px;" src="assets/images/obras/<?php echo $country ?>.jpg" width=375 /></li> <!-- Esto debe ser sustituido por las fotos. Otro query !-->


            <?php
                     
            endforeach; #acá termina lo que va paginado en sí
?>
</ul>
<?php

        $pagination->render();

 
?>
