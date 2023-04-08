<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/112bf3ca6e.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Student</title>
    <style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
			box-shadow: 0 0 10px #ccc;
			width: 500px;
			margin: 50px auto;
		}

		input[type="text"], select {
			padding: 10px;
			margin: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 80%;
			font-size: 1.2em;
			outline: none;
		}

		label {
			font-size: 1.2em;
			margin-bottom: 5px;
		}

		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 1.2em;
			margin-top: 20px;
		}

		input[type="submit"]:hover {
			background-color: #3e8e41;
		}

		h1 {
			text-align: center;
			margin-top: 50px;
		}
	</style>
</head>
<body>

  <div class="sectionDivision">  
<?php require'sidebar.php';?>
<div id="main">
<?php

require 'header.php';
require 'connection.php';
require 'sqlQueries.php';

if (isset($_POST['submit'])) {
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = 4;
    $random_string = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    try {
        if (empty($_POST['student_id'])) {
            $random_string = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 1, 3);
            $random = date("Y") . $random_string . rand(100, 10000);
            $data = array(
                'student_id' => $random,
                'studentName' => $_POST['name'],
                'email' => $_POST['email'],
                'studentContact' => $_POST['phone'],
                'status'=>1
            );
            insertData('student', $data);
        } else {
            $data = array(
                'studentName' => $_POST['name'],
                'email' => $_POST['email'],
                'studentContact' => $_POST['phone']
            );
            updateData('student', $data, 'student_id', $_POST['student_id']);
        }
        //header('Location: sidebar.php');
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    echo "updated sucessfully";
}

if (isset($_GET['id'])) {
    $student = selectDataById('student', $_GET['id'],'student_id');
} else {
    $student = array();
    $student['student_id'] = '';
    $student['studentName'] = '';
    $student['email'] = '';
    $student['studentContact'] = '';
}


?>
<h1><?php echo empty($_GET['id']) ? 'Add Student' : 'Edit Student'; ?></h1>
    <form action="addStudent.php" method="POST">
        <input type="hidden" name="student_id" value="<?php echo $student['student_id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $student['studentName']; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $student['email']; ?>" required><br><br>
        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" value="<?php echo $student['studentContact']; ?>" required><br><br>
        <input type="submit" name="submit" value="<?php echo empty($_GET['id']) ? 'Add Student' : 'Update Student'; ?>">
    </form> 
</div>
</div>
</body>
</html>
