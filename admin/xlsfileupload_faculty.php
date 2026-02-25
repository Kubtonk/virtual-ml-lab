<?php
include_once '../dbconnect.php';

 
  

if(isset($_POST['upload_faculty'])){
   $branch = $_POST['branch_faculty'];
 

 $facultyname = $_FILES["faculty_form"]["name"];
 $target_dir_faculty = "List/Faculty";
 $faculty_target_file = $target_dir_faculty . basename($_FILES["faculty_form"]["name"]);
 

 //Extensions
 $faculty_FileType = strtolower(pathinfo($faculty_target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("xlsx","xls","xlsm");
 
  // Check extension
  if( in_array($faculty_FileType,$extensions_arr) ){
  
    $query0result = mysqli_query($connection,"SELECT * from list");

   // Upload file
   move_uploaded_file($_FILES['faculty_form']['tmp_name'],$target_dir_faculty.$facultyname);
    
   $filename_faculty = "List/faculty/".$branch.".".$faculty_FileType;
   
   rename($faculty_target_file,$filename_faculty);
  
   
  
   include_once 'exceltodatabase_faculty.php';
   ?>
   <script> window.alert("Files Uploaded to Server");window.location='admin.php';</script>
   <?php
   
  }
  else{
    //echo '<script> alert("Please Upload valid Files"); </script>';
  }
}

if(isset($_POST['delete'])){
  
  $result = mysqli_query($connection, "SELECT * from data_table where branch='$branch' and section='$section' and semester='$semester'");
  
  if(mysqli_num_rows($result)!=0){
  $query = "DELETE from faculty_details where faculty_section='$section' and faculty_branch='$branch' and faculty_semester='$semester' and project_type='$type'";
  mysqli_query($connection, $query);

  $query1 = "DELETE from faculty_details where faculty_branch='$branch' and faculty_semester='$semester' and faculty_section='$section' and project_type='$type'";
  mysqli_query($connection, $query1);

  $query2 = "DELETE from data_table where branch='$branch' and section='$section' and semester='$semester'";
  mysqli_query($connection, $query2);

  $query3 = "DELETE from project_details where project_id in (select project_id from generate where branch='$branch' and section='$section' and semester='$semester' and project_type='$type' )";
   mysqli_query($connection, $query3);

    $query4 = "DELETE from generate where branch='$branch' and section='$section' and semester='$semester' and project_type='$type'";
    mysqli_query($connection, $query4);

  header("Location: admin.php");
  }
}
?>