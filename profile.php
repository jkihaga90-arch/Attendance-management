<?php
include 'profile.html';
session_start();
include "../connection/db_connection.php";
if(!isset($_SESSION['user_id'])){
header("Location: ../auth/login.php");
exit();
}
$user_id = $_SESSION['user_id'];
$sql = "
SELECT users.name,
users.email,
students.class,
students.reg_no,
students.student_id AS student_id
FROM users
JOIN students ON users.id = students.user_id
WHERE users.id = $user_id
";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
$student_id = $student['student_id'];

$total_query = $conn->query("
SELECT COUNT(*) AS total
FROM attendances
WHERE student_id = $student_id
");
$total = $total_query->fetch_assoc()['total'];
$present_query = $conn->query("
SELECT COUNT(*) AS present_days
FROM attendances
WHERE student_id = $student_id
AND status='present'
");
$present = $present_query->fetch_assoc()['present_days'];

$percentage = 0;
if($total > 0){
$percentage = ($present / $total) * 100;
}
?>
