<?php
session_start();
include 'manage_student,html';
include "../connection/db_connection.php";
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: ../auth/login.php");
    exit();
}
//create students
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $class = $_POST['class'];
    $reg_no = $_POST['reg_no'];
    // insert user
    $conn->query("
        INSERT INTO users(name,email,password,role)
        VALUES('$name','$email','$password','student')
    ");
    $user_id = $conn->insert_id;
    // insert student
    $conn->query("
        INSERT INTO students(user_id,class,reg_no)
        VALUES('$user_id','$class','$reg_no')
    ");
}
  //edit students data
$edit_id = "";
$edit_name = "";
$edit_email = "";
$edit_class = "";
$edit_reg_no = "";
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit_result = $conn->query("
        SELECT students.id, users.name, users.email, students.class, students.reg_no,
students.user_id
        FROM students
        JOIN users ON students.user_id = users.id
        WHERE students.id = $edit_id
    ");
    if($edit_result->num_rows > 0){
        $edit_row = $edit_result->fetch_assoc();
        $edit_name = $edit_row['name'];
        $edit_email = $edit_row['email'];
        $edit_class = $edit_row['class'];
        $edit_reg_no = $edit_row['reg_no'];
        $edit_user_id = $edit_row['user_id'];
    }
}
//update student information
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $reg_no = $_POST['reg_no'];
    // update user table
    $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$edit_user_id");
    // update student table
    $conn->query("UPDATE students SET class='$class', reg_no='$reg_no' WHERE id=$id");
    // redirect to avoid resubmission
    header("Location: manage_students.php");
    exit();
}
//delete student information
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    // delete student (user will auto delete if FK set CASCADE)
    $conn->query("DELETE FROM students WHERE id=$id");
}
?>
