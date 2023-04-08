<?php

if (!function_exists('insertData')) {
function insertData($table, $data) {
    $conn = mysqli_connect("localhost", "root", "", "course");
    // Escape the table name
    $table = $conn->real_escape_string($table);
    // Build the SQL statement
    $fields = array_keys($data);
    $values = array_map(array($conn, 'real_escape_string'), array_values($data));
    $fields = implode(", ", $fields);
    $values = "'" . implode("', '", $values) . "'";
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    
    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
}
}
if (!function_exists('selectDataById')) {
function selectDataById($table, $id,$column) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM $table WHERE $column = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
  }
}
if (!function_exists('updateData')) {
function updateData($table, $data, $idColumn, $idValue) {
    // Connect to database
    include 'connection.php';

    // Create the SQL query
    $sql = "UPDATE " . $table . " SET ";

    // Add each column to the query
    $firstColumn = true;
    foreach ($data as $columnName => $columnValue) {
        if (!$firstColumn) {
            $sql .= ", ";
        }
        $sql .= $columnName . "='" . $columnValue . "'";
        $firstColumn = false;
    }

    // Add the WHERE clause to the query
    $sql .= " WHERE " . $idColumn . "='" . $idValue . "'";

    // Execute the query and return true or false depending on success
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}
}

if (!function_exists('selectData')) {
function selectData($table, $columns = "*", $condition = "") {
    // Connect to the database
    include 'connection.php';

    // Build the SELECT query
    $query = "SELECT $columns FROM $table";
    if (!empty($condition)) {
        $query .= " WHERE $condition";
    }

    // Execute the query and fetch the results
    $result = mysqli_query($conn, $query);
    $data = array();
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    // Close the database connection and return the data
    mysqli_close($conn);
    return $data;
}
}

function deleteData($table, $id, $column) {
    $conn = mysqli_connect("localhost", "root", "", "course");
    $stmt = $conn->prepare("DELETE FROM $table WHERE $column = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

?>