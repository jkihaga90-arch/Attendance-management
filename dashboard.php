<?php
/*session_start();
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: ../auth/login.php");
    exit();
}
*/
include 'dashboard.html';
include "../connection/db_connection.php";
// total students
$total_students = $conn->query("SELECT COUNT(*) as total FROM students")
                      ->fetch_assoc()['total'];
// present today
$today = date("Y-m-d");
$present_today = $conn->query("
    SELECT COUNT(*) as total 
    FROM attendances
    WHERE attendances_date='$today' AND status='present'
")->fetch_assoc()['total'];
// absent today
$absent_today = $conn->query("
    SELECT COUNT(*) as total 
    FROM attendances 
    WHERE attendances_date='$today' AND status='absent'
")->fetch_assoc()['total'];
?>
