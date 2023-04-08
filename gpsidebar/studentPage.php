<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/112bf3ca6e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student</title>
    <style>
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}

		.personimg {
			width: 200px;
			height: 200px;
			object-fit: cover;
			border-radius: 50%;
			margin-bottom: 20px;
		}

		table {
			border-collapse: collapse;
			margin-top: 20px;
			width: 80%;
			max-width: 600px;
		}

		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		th {
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			margin-bottom: 10px;
		}
	</style>
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
                        <a href="sidebar.php">
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
<div class="container">
		<img class="personimg" src="person.jpg" alt="Student Placeholder Image">
        <?php
        $data = selectData("student", "*", " student_id = '" . $_GET['id'] . "'");
if (!empty($data)) {
     $i = 1;
    foreach ($data as $row) {?>

		<h1><?php echo $row['studentName'];?></h1>
		<table>
			<tr>
				<th>Student ID:</th>
				<td><?php echo $row['student_id'];?></td>
			</tr>
			<tr>
				<th>Email:</th>
				<td><?php echo $row['email'];?></td>
			</tr>
			<tr>
				<th>Major:</th>
				<td>Computer Science</td>
			</tr>
			<tr>
				<th>GPA:</th>
				<td>3.8</td>
			</tr>
			<tr>
				<th>Graduation Date:</th>
				<td>May 2023</td>
			</tr>
		</table>
        <?php
    }
}?>
	</div>
</div>
</div>
</body>
</html>