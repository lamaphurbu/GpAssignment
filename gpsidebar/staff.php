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
<?php require 'sidebar.php';?>
<div id="main">
<?php
require'header.php';
require'sqlQueries.php';
?>
<div class="search-container">
  <form action="staff.php" method="POST" style="margin-bottom:4px;">
    <input type="text" name="staff_id" placeholder="Student ID" style="border:solid;">
    <button type="submit" name="search"><i class="fa fa-search"></i></button>
  </form>
</div>
<?php if(!isset($_POST['search'])){?>
    <div class="table-content">
    <table>
  <thead>
    <tr>
      <th>S.N</th>
      <th>Staff ID</th>
      <th>Staff Name</th>
      <th></th>
      <th></th>
      <th></th>
      <!-- Add more columns as needed -->
    </tr>
  </thead>
  <tbody>
    <?php
  $data = selectData("staff","*","status = 1");
if (!empty($data)) {
     $i = 1;
    foreach ($data as $row) {
    ?> <tr>
      <td><?php echo $i++;?></td>
      <td><a href="staffPage.php?id=<?php echo $row['staff_id']?>" style="color:black"><?php echo $row['staff_id']?></a></td>
      <td><a href="staffPage.php?id=<?php echo $row['staff_id']?>" style="color:black"><?php echo $row['staffName']?></a></td>
      <td><a href="deleteStaff.php?id=<?php echo $row['staff_id']?>"><i class="fa fa-trash-o" style="font-size:20px;color:red"></a></td>
      <td><a href="addStaff.php?id=<?php echo $row['staff_id']?>"><i class="fa fa-edit"></i></a></td>
      <td><a href="archiveStaff.php?id=<?php echo $row['staff_id']?>"><i class="fa fa-archive"></i></a></td>
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
      <th>Staff ID</th>
      <th>Staff Name</th>
      <th></th>
      <th></th>
      <th></th>
      <!-- Add more columns as needed -->
    </tr>
  </thead>
  <tbody>
    <?php
  $data = selectData("staff", "*", " staff_id = " . $_POST['staff_id']." AND status=1" );
if (!empty($data)) {
     $i = 1;
    foreach ($data as $row) {
    ?> <tr>
      <td><?php echo $i++;?></td>
      <td><a href="staffPage.php?id=<?php echo $row['staff_id']?>" style="color:black"><?php echo $row['staff_id']?></a></td>
      <td><a href="staffPage.php?id=<?php echo $row['staff_id']?>" style="color:black"><?php echo $row['staffName']?></a></td>
      <td><a href="deleteStaff.php?id=<?php echo $row['staff_id']?>"><i class="fa fa-trash-o" style="font-size:20px;color:red"></a></td>
      <td><a href="addStaff.php?id=<?php echo $row['staff_id']?>"><i class="fa fa-edit"></i></a></td>
      <td><a href="archiveStaf.php?id=<?php echo $row['staff_id']?>"><i class="fa fa-archive"></i></a></td>
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