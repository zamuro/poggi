<head>
<link rel="stylesheet" href="lib/Zebra_Pagination/public/css/zebra_pagination.css" type="text/css">
</head>
<?php
$countries = array(
	'01',
	'02',
	'03',
	'04',
	'05',
	'06',
	'07',
	'08',
	'09',
	'10',
	'11',
	'12',
	'13',
	'14',
	'15',
	'16',
	'17', 
	'18', 
    '19',
    '20'
	);
        $records_per_page = 5;

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
<ul>
<form method="get" action="extras/obra-detalle.php">
<input type="hidden" name="id">
<?php      
            foreach ($countries as $index => $country):
$i = $country % $records_per_page;
?>

<?php

      if ($i == 1 || $i == 2) { ?>

    
    <li class="arriba"><a href="obras-detalle.php?id=<?php echo $country; ?>"><img src="assets/images/thumbnails/<?php echo $country; ?>.jpg" width="176" height="176"></a></li>
 
    <?php } 
    else { ?>
    

 
     <li class="abajo"><a href="obras-detalle.php?id=<?php echo $country; ?>"><img src="assets/images/thumbnails/<?php echo $country; ?>.jpg" width="176" height="176"></a></li>
 
    

 
            <?php
                     
             } 

            endforeach;
?>
</form>
</ul>
<?php

        $pagination->render();

 
?>