<?php
include_once '../dbconnect.php';

  

if(isset($_POST['upload_lab'])){
 

 $labname = $_FILES["lab_form"]["name"];
 $target_dir_lab = "List/Lab";
 $lab_target_file = $target_dir_lab . basename($_FILES["lab_form"]["name"]);
 

 //Extensions
 $lab_FileType = strtolower(pathinfo($lab_target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("xlsx","xls","xlsm");
 
  // Check extension
  if( in_array($lab_FileType,$extensions_arr) ){
  
    $query0result = mysqli_query($connection,"SELECT * from list");

   // Upload file
   move_uploaded_file($_FILES['lab_form']['tmp_name'],$target_dir_lab.$labname);
    
   $filename_lab = "List/lab/"."labs".$lab_FileType;
   
   rename($lab_target_file,$filename_lab);
  
   
  
   include_once 'exceltodatabase_lab.php';
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
  $query = "DELETE from lab_details where lab_section='$section' and lab_branch='$branch' and lab_semester='$semester' and project_type='$type'";
  mysqli_query($connection, $query);

  $query1 = "DELETE from lab_details where lab_branch='$branch' and lab_semester='$semester' and lab_section='$section' and project_type='$type'";
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