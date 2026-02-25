<?php
include 'dbconnect.php';
session_start();

if(isset($_POST['login_admin'])){

    $id = $_POST['admin_username'];
    $pass = $_POST['admin_password'];

//$result = mysqli_query($connection,"select * from faculty_details where faculty_id='$id' and faculty_pass='$pass'");
    if($id=='admin'&&$pass=='admin')
    {
        $_SESSION['adminid'] = $id;
        header('Location: admin/admin.php');
    }
    else
        echo "Username or Password is incorrect";
}

if(isset($_POST['login_student'])){
    
    $id = $_POST['student_username'];
    $pass = $_POST['student_password'];
    
    $result = mysqli_query($connection,"select * from student_details where student_id='$id' and student_pass='$pass'");
    if(mysqli_num_rows($result)==1)
    {
       $_SESSION['studentid'] = $id;
       header('Location: student/student.php');
   }
   else
    echo "Username or Password is incorrect";
}


if(isset($_POST['login_faculty'])){
    
    $id = $_POST['faculty_username'];
    $pass = $_POST['faculty_password'];
    
    $result = mysqli_query($connection,"select * from faculty_details where faculty_id='$id' and faculty_pass='$pass'");
    if(mysqli_num_rows($result)!=0)
    {
        $_SESSION['facultyid'] = $id;
        header('Location: faculty/faculty.php');
    }
    else
        echo "Username or Password is incorrect";
}


?>