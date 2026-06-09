<?php
session_start();
include 'dashboard_student.html'
include "../connection/db_connection.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student'){
    header("Location: ../auth/login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
?>
