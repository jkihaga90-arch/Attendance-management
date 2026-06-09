<?php
session_start();
include 'attendance_report.html';
include "../connection/db_connection.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: ../auth/login.php");
    exit();
}
include "../connection/db_connection.php";
$attendances_date = "";
if(isset($_GET['attendances_date'])){
    $attendances_date = $_GET['attendances_date'];
    $attendances = $conn->query("
        SELECT users.name, attendances.attendances_date, attendances.status
        FROM attendances
        JOIN students ON attendances.student_id = students.student_id
        JOIN users ON students.user_id = users.id
        WHERE attendances.attendances_date = '$attendances_date'
        ORDER BY attendances.attendances_date DESC
    ");
} else {
    $attendances = $conn->query("
        SELECT users.name, attendances.attendances_date, attendances.status
        FROM attendances
        JOIN students ON attendances.student_id = students.student_id
        JOIN users ON students.user_id = users.id
        ORDER BY attendances.attendances_date DESC
    ");
}
?>
