<head>
<link rel="stylesheet" href="lib/Zebra_Pagination/public/css/zebra_pagination.css" type="text/css">
</head>
<?php
$countries = array(
	'1',
	'2',
	'3',
	'4',
	'5',
	'6',
	'7',
	'8',
	'9',
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
<?php      
            foreach ($countries as $index => $country):
$i = $country % $records_per_page;
      if ($i == 1 || $i == 2) { ?>
 
    
    <li class="arriba"><?php echo $country ?></li>
 
    <?php } 
    else { ?>
    

 
    
    <li class="abajo"><?php echo $country ?></li>

 
            <?php
                     
             } 

            endforeach;
?>
</ul>
<?php

        $pagination->render();

 
?>