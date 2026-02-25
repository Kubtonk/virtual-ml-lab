<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
//Load the settings
session_start();
if(isset($_SESSION['studentid'])){
  $connection = mysqli_connect("localhost", "root", "", "project");
  $studentid = $_SESSION['studentid'];
  //$result = mysqli_query($connection,"select password from project_details where project_id='$projectid'");
  //$row = mysqli_fetch_row($result);

  //$password = $row[0];
  $uploadFolder = "StudentArea/".$studentid."/";

  $message = "";
//Has the user uploaded something?
  if(isset($_FILES['file']))
  {
   $target_path = $uploadFolder;
   $target_path = $target_path . time() . '_' . basename( $_FILES['file']['name']);
//Check the password to verify legal upload
	//Try to move the uploaded file into the designated folder
    if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
      $message = "The file ".  basename( $_FILES['file']['name']). 
      " has been uploaded";
    } else{
      $message = "There was an error uploading the file, please try again!";
    }
  }
  
if(strlen($message) > 0)
{
  $message = '<p class="error">' . $message . '</p>';
}

function getFileType($extension)
{
  $images = array('jpg', 'gif', 'png', 'bmp');
  $docs   = array('txt', 'rtf', 'doc');
  $apps   = array('zip', 'rar', 'exe');

  if(in_array($extension, $images)) return "Images";
  if(in_array($extension, $docs)) return "Documents";
  if(in_array($extension, $apps)) return "Applications";
  return "";
}
function formatBytes($bytes, $precision = 2) { 
  $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

  $bytes = max($bytes, 0); 
  $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
  $pow = min($pow, count($units) - 1); 

  $bytes /= pow(1024, $pow); 

  return round($bytes, $precision) . ' ' . $units[$pow]; 
} 
?>
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Online file storage</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<style type="text/css" media="all"> 
   @import url("style.css");
 </style>
 <style type="text/css">
  .drop{


    width: 260px;
    height: 60px;
    border: 2px dashed BLACK;
  }
  .drop p{
    width: 260px;
    height: 60px;
    text-align: center;
    line-height: 35px;
    color: black;
    font-family: Arial;
  }
  .drop input{
    position: absolute;
    margin: 0;
    padding: 0;
    width: 260px;
    height: 60px;
    outline: none;
    opacity: 0;
  }

</style>
<script src="http://code.jquery.com/jquery-latest.js"></script>


</head>
<body style="background:url('../../images/clouddata2.png') no-repeat center ;;">
  <div class="w3-container w3-black" id ="head-main" style="margin-left: 0px;width: 100%;background: black">

      <center><img src="../../images/logo-2.png" style="float: left;height: 80px;padding-bottom: 10px;padding-left: 40px;"><h1 style="font-weight: 800;">VIRTUAL LAB SPACE</h1></center>
    </div>
  <div id="container" style="margin-left: 150px;margin-top: 10px;">
   <h1>Store your Files here</h1>
   <?php
   echo $message;
   ?>

   <fieldset>
     <legend>Add a new file to the storage</legend>
     <form method="post" action="index.php" enctype="multipart/form-data">
       <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
       <p><div class="drop">
        <input type="file" name="file" name="MAX_FILE_SIZE" value="4194304" >
        <p>Drag your files here or click Here</p>

</div><!--<label for="name">Select file</label><br />
<input type="file" name="file" name="MAX_FILE_SIZE" value="4194304">--></p>
<!--<p><label for="password">Password for upload</label><br />
 <input type="password" name="password" /></p>-->
 <p><input type="submit" name="submit" value="Start upload" /></p>
</form>   
</fieldset>
<fieldset>
  <legend>Previousely uploaded files</legend>
		    <!--<ul id="menu">
		        <li><a href="">All files</a></li>
		        <li><a href="">Documents</a></li>
		        <li><a href="">Images</a></li>
		        <li><a href="">Applications</a></li>
          </ul>-->

          <ul id="files">
           <?php
           /** LIST UPLOADED FILES **/
           $uploaded_files = "";

//Open directory for reading
           $dh = opendir($uploadFolder);
//LOOP through the files
           while (($file = readdir($dh)) !== false) 
           {
             if($file != '.' && $file != '..')
             {
               $filename = $uploadFolder . $file;
               $parts = explode("_", $file);
               $size = formatBytes(filesize($filename));
               $added = date("m/d/Y", $parts[0]);
               $origName = $parts[1];
               $filetype = getFileType(substr($file, strlen($file) - 3));
               $uploaded_files .= "<li class=\"$filetype\"><a href=\"$filename\" preview>$origName</a> $size - $added</li>\n";
             }
           }
           closedir($dh);
           if(strlen($uploaded_files) == 0)
           {
            $uploaded_files = "<li><em>No files found</em></li>";
          }
          ?>
          <?php echo $uploaded_files; ?>
        </ul>
      </fieldset>
    </div>
    <script type="text/javascript">
     $(document).ready(function(){
      $('.drop input').change(function () {
        $('.drop p').text(this.files.length + " file(s) selected");
      });
    });
  </script>
<?php }
else{
	echo "No access";
}
?>
<!--<iframe width="560" height="415" src="https://www.vardhaman.org" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="float: right;margin-top: -370px;margin-left: -150px;"></iframe>-->
</body>
</html>