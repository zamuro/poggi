<?php
// how many records should be displayed on a page?
$id = $_GET['id'];

$records_per_page = 2;

// include the pagination class
require 'lib/Zebra_Pagination/Zebra_Pagination.php';
require 'lib/conecta.php';

// instantiate the pagination object
$pagination = new Zebra_Pagination();

// set position of the next/previous page links
$pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

// the MySQL statement to fetch the rows
// note how we build the LIMIT
// also, note the "SQL_CALC_FOUND_ROWS"
// this is to get the number of rows that would've been returned if there was no LIMIT
// see http://dev.mysql.com/doc/refman/5.0/en/information-functions.html#function_found-rows
$MySQL = Fotos::find_by_obra_id($id);


// if query could not be executed
if (!($result = @mysql_query($MySQL)))

    // stop execution and display error message
    die(mysql_error());

// fetch the total number of records in the table
$rows = Fotos::count('conditions' => 'obra_id' > $id);

// pass the total number of records to the pagination class
$pagination->records($rows['rows']);

// records per page
$pagination->records_per_page($records_per_page);


?>
