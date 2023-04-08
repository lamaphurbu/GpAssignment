<?php
require'sqlQueries.php';
$data = array(
    'status'=>'0'
);
updateData('student',$data,'student_id',$_GET['id']);
header('Location:sidebar.php');
?>