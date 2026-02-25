<?php
session_start();
$adminid = $_SESSION['adminid'];
include '../dbconnect.php';

if(!isset($_SESSION['adminid']))
    header("Location : index.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-1.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-5">
                                   SESSION DETAILS
                                </div>
                            </div>
                        </div>
                
                            <div class="panel-footer">
                                    <?php
                                    
                                    echo 'Admin';
                                    echo '<br>';
                                    echo 'Vardhaman College of Engineering';
                                    ?>
                                <div class="clearfix"></div>
                                <form action="../logout.php" method="post">
                                    <button class="btn btn-default" name="admin_logout" value="admin_logout">LogOut</button>
                                </form>
                            </div>
                    </div>
                    
                    
                    
                </div>
                
            <div class="row">
                <div class="col-lg-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student Details Upload
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="pull-left">
                                <form action="xlsfileupload.php" method="post" enctype = "multipart/form-data">
                                    <div class="form-group">
                                        <label >Branch:</label>
                                        <select class="form-control col-xs-2" name="branch">
                                        <option value="" disabled selected>Branch</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="IT">IT</option>
                                        <option value="EEE">EEE</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="MECH">MECH</option>
                                        </select>
                                        <br>
                                        <label >Semester:</label>
                                        <select class="form-control col-xs-2" name="semester">
                                        <option value="" disabled selected>Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        </select>
                                        <br>
                                        <label >Section:</label>
                                        <select class="form-control col-xs-2" name="section">
                                        <option value="" disabled selected>Section</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        </select>
                                        <br>
                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Student Details</label>
                                      <input type="file" class="form-control" name="student_form">
                                    </div> 
                                    <button type="submit" class="btn btn-default" value="infoupload" name="upload">Upload</button>
                                    <button type="submit" class="btn btn-default" value="infodelete" name="delete">Delete</button>
                                  </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Faculty Details Upload
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="pull-left">
                                <form action="xlsfileupload_faculty.php" method="post" enctype = "multipart/form-data">
                                    <div class="form-group">
                                        <label >Branch:</label>
                                        <select class="form-control col-xs-2" name="branch_faculty">
                                        <option value="" disabled selected>Branch</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="IT">IT</option>
                                        <option value="EEE">EEE</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="MECH">MECH</option>
                                        </select>
                                        <br>
                                        
                                        
                                    </div>
                                    <div class="form-group">
                                      <label>Faculty Details</label>
                                      <input type="file" class="form-control" name="faculty_form">
                                    </div> 
                                    <button type="submit" class="btn btn-default" value="infoupload" name="upload_faculty">Upload</button>
                                    <button type="submit" class="btn btn-default" value="infodelete" name="delete_faculty">Delete</button>
                                  </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lab Details Upload
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="pull-left">
                                <form action="xlsfileupload_lab.php" method="post" enctype = "multipart/form-data">
                                    <div class="form-group">
                                      <label>Lab Details</label>
                                      <input type="file" class="form-control" name="lab_form">
                                    </div> 
                                    <button type="submit" class="btn btn-default" value="infoupload" name="upload_lab">Upload</button>
                                    <button type="submit" class="btn btn-default" value="infodelete" name="delete_lab">Delete</button>
                                  </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->




                     <div class="panel panel-default">
                        <div class="panel-heading">
                            Faculty Lab Assign
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="pull-left">
                                <!-- ineer panel -->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                             Lab-1 Assign
                        </div>
                        <div class="panel-body">
                            <div class="pull-left">
                                <form action="admin.php" method="post" enctype = "multipart/form-data">
                                    <div class="form-group">
                                        <label >Lab-1:</label>
                                        <select class="form-control col-xs-2" name="id_lab_1">
                                        <option value="" disabled selected>Lab Details</option>
                                        <?php 
                                         $result = mysqli_query($connection,"select * from lab_details");
                                         while($row = mysqli_fetch_row($result)){
                                        ?>
                                        <option value="<?php echo $row[0]."-".$row[1]."-".$row[2] ?>"><?php echo $row[0]."-".$row[1]."-".$row[2]."-".$row[3] ?></option>
                                    <?php } ?>
                                </select>
                                        
                                        <br>
                                        <br>
                                        <select class="form-control col-xs-2" name="id_faculty_1">
                                        <option value="" disabled selected>Faculty Details</option>
                                        <?php 
                                         $result1 = mysqli_query($connection,"select * from faculty_details");
                                         while($row1 = mysqli_fetch_row($result1)){
                                        ?>
                                        <option value="<?php echo $row1[0] ?>"><?php echo $row1[0]."-".$row1[2]?></option>
                                    <?php } ?>
                                </select>
                                        
                                        <br>
                                        
                                        
                                    </div>
                                    <br>
                                     
                                    <button type="submit" class="btn btn-default" value="infoupload" name="upload_lab_1">Upload</button>
                                    
                                  </form>
                                  <?php
                                  if(isset($_POST['upload_lab_1']))
                                  {
                                    $id = $_POST['id_faculty_1'];
                                    $arr = $_POST['id_lab_1'];
                                    $a  = explode("-",$arr);
                                    mysqli_query($connection,"UPDATE lab_details set lab1_assign='$id' where lab_branch='$a[0]' and lab_semester='$a[1]' and lab_section='$a[2]'");

                                  }
                                   ?>
                              </div>
                          </div>
                              </div>
                              <!--  inner panel -->

                              <!-- ineer panel -->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                             Lab-2 Assign
                        </div>
                        <div class="panel-body">
                            <div class="pull-left">
                                <form action="admin.php" method="post" enctype = "multipart/form-data">
                                    <div class="form-group">
                                        <label >Lab-2:</label>
                                        <select class="form-control col-xs-2" name="id_lab_2">
                                        <option value="" disabled selected>Lab Details</option>
                                        <?php 
                                         $result1 = mysqli_query($connection,"select * from lab_details");
                                         while($row11 = mysqli_fetch_row($result1)){
                                        ?>
                                        <option value="<?php echo $row11[0]."-".$row11[1]."-".$row11[2] ?>"><?php echo $row11[0]."-".$row11[1]."-".$row11[2]."-".$row11[3] ?></option>
                                    <?php } ?>
                                </select>
                                        
                                        <br>
                                        <br>
                                        <select class="form-control col-xs-2" name="id_faculty_2">
                                        <option value="" disabled selected>Faculty Details</option>
                                        <?php 
                                         $result2 = mysqli_query($connection,"select * from faculty_details");
                                         while($row2 = mysqli_fetch_row($result2)){
                                        ?>
                                        <option value="<?php echo $row2[0] ?>"><?php echo $row2[0]."-".$row2[2]?></option>
                                    <?php } ?>
                                </select>
                                        
                                        <br>
                                        
                                        
                                    </div>
                                    <br>
                                     
                                    <button type="submit" class="btn btn-default" value="infoupload" name="upload_lab_2">Upload</button>
                                    
                                  </form>
                                  <?php
                                  if(isset($_POST['upload_lab_2']))
                                  {
                                    $id = $_POST['id_faculty_2'];
                                    $arr = $_POST['id_lab_2'];
                                    $a  = explode("-",$arr);
                                    mysqli_query($connection,"UPDATE lab_details set lab2_assign='$id' where lab_branch='$a[0]' and lab_semester='$a[1]' and lab_section='$a[2]'");

                                  }
                                   ?>
                              </div>
                          </div>
                              </div>
                              <!--  inner panel -->

                              <!-- ineer panel -->
                                <div class="panel panel-default">
                        <div class="panel-heading">
                             Lab-3 Assign
                        </div>
                        <div class="panel-body">
                            <div class="pull-left">
                                <form action="admin.php" method="post" enctype = "multipart/form-data">
                                    <div class="form-group">
                                        <label >Lab-3:</label>
                                        <select class="form-control col-xs-2" name="id_lab_3">
                                        <option value="" disabled selected>Lab Details</option>
                                        <?php 
                                         $result13 = mysqli_query($connection,"select * from lab_details");
                                         while($row33 = mysqli_fetch_row($result13)){
                                        ?>
                                        <option value="<?php echo $row33[0]."-".$row33[1]."-".$row33[2] ?>"><?php echo $row33[0]."-".$row33[1]."-".$row33[2]."-".$row33[3] ?></option>
                                    <?php } ?>
                                </select>
                                        
                                        <br>
                                        <br>
                                        <select class="form-control col-xs-2" name="id_faculty_3">
                                        <option value="" disabled selected>Faculty Details</option>
                                        <?php 
                                         $result3 = mysqli_query($connection,"select * from faculty_details");
                                         while($row3 = mysqli_fetch_row($result3)){
                                        ?>
                                        <option value="<?php echo $row3[0] ?>"><?php echo $row3[0]."-".$row3[2]?></option>
                                    <?php } ?>
                                </select>
                                        
                                        <br>
                                        
                                        
                                    </div>
                                    <br>
                                     
                                    <button type="submit" class="btn btn-default" value="infoupload" name="upload_lab_3">Upload</button>
                                    
                                  </form>
                                  <?php
                                  if(isset($_POST['upload_lab_3']))
                                  {
                                    $id = $_POST['id_faculty_3'];
                                    $arr = $_POST['id_lab_3'];
                                    $a  = explode("-",$arr);
                                    mysqli_query($connection,"UPDATE lab_details set lab3_assign='$id' where lab_branch='$a[0]' and lab_semester='$a[1]' and lab_section='$a[2]'");

                                  }
                                   ?>
                              </div>
                          </div>
                              </div>
                              <!--  inner panel -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->



                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Build a Course
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="pull-left">
                               
                                    
                                      <label>Create a course and Admin</label><br>
                                      <a href="https://virtual-labs-267308.uc.r.appspot.com/modules/admin"> <button class="btn btn-default" >Create a Course</button></a><br>
                                       <form action="admin.php" method="post" enctype = "multipart/form-data">
                                      <div class="form-group">
                                      
                                      <label>Enter Course and Admin details :</label><br>
                                      <label>Faculty ID :</label>
                                      <input type="text" class="form-control" name="fac_id">
                                      <label>Course URL :</label>
                                      <input type="text" class="form-control" name="cou_url">
                                       <label>Course Name :</label>
                                      <input type="text" class="form-control" name="cou_name">
                                    </div> 
                                    <button type="submit" class="btn btn-default" value="infoupload" name="upload_cou">Upload</button>
                                    <button type="submit" class="btn btn-default" value="infodelete" name="delete_cou">Delete</button>
                                  </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <?php
                        if(isset($_POST['upload_cou'])){
                            $facid = $_POST['fac_id'];
                            $courl=$_POST['cou_url'];
                            $couname = $_POST['cou_name'];
                            mysqli_query($connection,"insert into course_details values('$facid','$courl','$couname')");


                        }
                    ?>
                 
            
                         
                   
                   
                   
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
