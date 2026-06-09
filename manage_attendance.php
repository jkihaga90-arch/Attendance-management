<?php
session_start();
include 'manage_attendance.html';
include "../connection/db_connection.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: ../auth/login.php");
    exit();
}
//save attendance
if(isset($_POST['save'])){
    $date = date("Y-m-d");
    foreach($_POST['attendances'] as $student_id => $status){
        $sql = "INSERT INTO attendances (student_id, date, status)
                VALUES ('$student_id', '$date', '$status')";
        $conn->query($sql);
    }
    echo "<script>alert('Attendance saved successfully ');</script>";
}
?>
