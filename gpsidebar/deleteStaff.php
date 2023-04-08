<?php
require'sqlQueries.php';
$table = 'staff'; // the name of the table you want to delete from
$id = $_GET['id']; // the ID of the row you want to delete
deleteData($table, $id,'staff_id');
header('Location:staff.php');
?>