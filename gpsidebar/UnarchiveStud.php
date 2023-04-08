<?php
require'sqlQueries.php';
$data = array(
    'status'=>'1'
);
updateData('student',$data,'student_id',$_GET['id']);
header('Location:archiveStudent.php');
?>