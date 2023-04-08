<?php
require'sqlQueries.php';
$data = array(
    'status'=>'0'
);
updateData('staff',$data,'staff_id',$_GET['id']);
header('Location:staff.php');
?>