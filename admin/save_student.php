<?php
include('dbcon.php');
        
$un = $_POST['un'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$class_id = $_POST['class_id'];

$query = "SELECT COUNT(*) AS existingIdNumber FROM student WHERE username = " . $un;

$result = mysqli_query($conn, $query) ;

$row = $result->fetch_assoc();

if (isset($row['existingIdNumber']) && $row['existingIdNumber'] > 0) {
    header("HTTP/1.1 422 Unprocessable Entity");
    header('Content-Type: application/json');
    
    echo json_encode(['message' => 'ID Number already exists']);
    die();
}

mysqli_query(
    $conn,
    "insert into student (username,firstname,lastname,location,class_id,status)
      values ('$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')                                    
      ") 
or die(mysqli_error());
  ?>