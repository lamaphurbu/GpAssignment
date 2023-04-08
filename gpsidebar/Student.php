<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/112bf3ca6e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student</title>
</head>
<body>

  <div class="sectionDivision">  
<?php require'sidebar.php';?>
<div id="main">
<?php
require'header.php';
require'sqlQueries.php';
?>
<div class="search-container">
  <form action="student.php" method="POST" style="margin-bottom:4px;">
    <input type="text" name="student_id" placeholder="Student ID" style="border:solid;">
    <button type="submit" name="search"><i class="fa fa-search"></i></button>
  </form>
</div>
<?php if(!isset($_POST['search'])){?>
    <div class="table-content">
    <table>
  <thead>
    <tr>
      <th>S.N</th>
      <th>Student ID</th>
      <th>Student Name</th>
      <th></th>
      <th></th>
      <th></th>
      <!-- Add more columns as needed -->
    </tr>
  </thead>
  <tbody>
    <?php
  $data = selectData("student","*","status = 1");
if (!empty($data)) {
     $i = 1;
    foreach ($data as $row) {
    ?> <tr>
      <td><?php echo $i++;?></td>
      <td><a href="studentPage.php?id=<?php echo $row['student_id']?>" style="color:black"><?php echo $row['student_id']?></a></td>
      <td><a href="studentPage.php?id=<?php echo $row['student_id']?>" style="color:black"><?php echo $row['studentName']?></a></td>
      <td><a href="deleteStudent.php?id=<?php echo $row['student_id']?>"><i class="fa fa-trash-o" style="font-size:20px;color:red"></a></td>
      <td><a href="addStudent.php?id=<?php echo $row['student_id']?>"><i class="fa fa-edit"></i></a></td>
      <td><a href="archiveStud.php?id=<?php echo $row['student_id']?>"><i class="fa fa-archive"></i></a></td>
      <!-- Add more cells as needed -->
    </tr>
    <?php
    }
}
?>
    
    <!-- Add more rows as needed -->
  </tbody>
</table><?php
}else{?>
<div class="table-content">
    <table>
  <thead>
    <tr>
      <th>S.N</th>
      <th>Student ID</th>
      <th>Student Name</th>
      <th></th>
      <th></th>
      <th></th>
      <!-- Add more columns as needed -->
    </tr>
  </thead>
  <tbody>
    <?php
  $data = selectData("student", "*", " student_id = '" . $_POST['student_id'] . "'");
if (!empty($data)) {
     $i = 1;
    foreach ($data as $row) {
    ?> <tr>
      <td><?php echo $i++;?></td>
      <td><a href="studentPage.php?id=<?php echo $row['student_id']?>" style="color:black"><?php echo $row['student_id']?></a></td>
      <td><a href="studentPage.php?id=<?php echo $row['student_id']?>" style="color:black"><?php echo $row['studentName']?></a></td>
      <td><a href="deleteStudent.php?id=<?php echo $row['student_id']?>"><i class="fa fa-trash-o" style="font-size:20px;color:red"></a></td>
      <td><a href="addStudent.php?id=<?php echo $row['student_id']?>"><i class="fa fa-edit"></i></a></td>
      <td><a href="archiveStud.php?id=<?php echo $row['student_id']?>"><i class="fa fa-archive"></i></a></td>
      <!-- Add more cells as needed -->
    </tr>
    <?php
    }
}
?>
    
    <!-- Add more rows as needed -->
  </tbody>
</table><?php }?>



</div>
</div>
</div>
</body>
</html>