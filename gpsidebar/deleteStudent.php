<?php
require'sqlQueries.php';
$table = 'student'; // the name of the table you want to delete from
$id = $_GET['id']; // the ID of the row you want to delete
deleteData($table, $id,'student_id');
header('Location:Student.php');
?>