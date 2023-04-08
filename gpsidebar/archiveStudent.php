
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/112bf3ca6e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Archive</title>
</head>
<body>

  <div class="sectionDivision">  
<div id="sidebar">
        <ul>
           <img class="wuc" src="wuclogo.png" alt="wuc">
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Students</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="addStudent.php">
                    <li ><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="Student.php">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                        <a href="archiveStudent.php">
                        <li>
                        <i class="fa fa-archive"></i>    
                        Archive
                    </li>
                        </a>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Staff</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="#">
                        <li><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="#">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Courses</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="#">
                        <li><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="#">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Modules</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="#">
                        <li><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="#">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tasks"></i>
                    <span>Assignments</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="#">
                        <li><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="#">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>Attendance</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="#">
                        <li><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="#">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Personal Tutor</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="#">
                        <li><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="#">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-clock-o"></i>
                    <span>Time Table</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="#">
                        <li><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="#">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-calendar-o"></i>
                    <span>Diary</span>
                </a>
                <div class="expand">
                    <ul>
                    <a href="#">
                        <li><i class="fa-solid fa-plus"></i>Create</li>
                        </a>
                        <a href="#">
                        <li>
                        <i class="fa-solid fa-eye"></i>    
                        View
                    </li>
                        </a>
                </ul>
            </div>
        </li>
        <li>
                <a href="#">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Sign Out</span>
                </a>
              
    </ul>
</div>
<div id="main">
<?php
require'header.php';
require'sqlQueries.php';
?>
<div class="search-container">
  <form action="archiveStudent.php" method="POST" style="margin-bottom:4px;">
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
  $data = selectData("student","*","status != 1");
if (!empty($data)) {
     $i = 1;
    foreach ($data as $row) {
    ?> <tr>
      <td><?php echo $i++;?></td>
      <td><a href="studentPage.php?id=<?php echo $row['student_id']?>" style="color:black"><?php echo $row['student_id']?></a></td>
      <td><a href="studentPage.php?id=<?php echo $row['student_id']?>" style="color:black"><?php echo $row['studentName']?></a></td>
      <td><a href="deleteStudent.php?id=<?php echo $row['student_id']?>"><i class="fa fa-trash-o" style="font-size:20px;color:red"></a></td>
      <td><a href="addStudent.php?id=<?php echo $row['student_id']?>"><i class="fa fa-edit"></i></a></td>
      <td><a href="UnarchiveStud.php?id=<?php echo $row['student_id']?>"><i class="fa fa-archive"></i></a></td>
      <!-- Add more cells as needed -->
    </tr>
    <?php
    }
}
?>
    
    <!-- Add more rows as needed -->
  </tbody>
</table>
<?php }else
{?>
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
      <td><a href="UnarchiveStud.php?id=<?php echo $row['student_id']?>"><i class="fa fa-archive"></i></a></td>
      <!-- Add more cells as needed -->
    </tr>
    <?php
    }
}
}
?>



</div>
</div>
</div>
</body>
</html>