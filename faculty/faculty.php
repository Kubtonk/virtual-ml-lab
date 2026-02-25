<?php
session_start();
$facultyid = $_SESSION['facultyid'];
include '../dbconnect.php';
if(isset($_POST['proopen']))
{
    $projectid=$_POST['project'];
    setcookie('projectid',$projectid);
    setcookie('facultyid',$facultyid);
    $sql="DELETE FROM notifications WHERE project_id='$projectid'";
    $result = mysqli_query($connection, $sql);
    header('location:faculty_projects.php');

}
if(!isset($_SESSION['facultyid']))
    header("Location : index.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-win8.css">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
    (function($){
            $(document).ready(function(){ 
                var cookies = $.cookie();
                for(var cookie in cookies){
                 $.removeCookie(cookie);
             }     
             
         });
    })(jQuery);
    </script>    
    <style type="text/css">
        input[type=text], select {
            width: 100%;
            padding: 8px 16px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
        #aa{
            display: none;
        }
    </style>  
</head>
<body onload="clearListCookies()">
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="w3-container w3-black" style="height:80px;margin-bottom: 30px;">
                        <center><h1>VIRTUAL LABS</h1></center>
                    </div>
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
		                        $result = mysqli_query($connection, "SELECT * from faculty_details where faculty_id = '$facultyid'");
		                        $row = mysqli_fetch_assoc($result);
		                        echo $row['faculty_name'];
		                        echo '<br>';
		                        echo $row['faculty_branch'];
                        	?>
                        <div class="clearfix"></div>
                        <form action="../logout.php" method="post">
                            <button class="btn btn-default" name="admin_logout" value="admin_logout">LogOut</button>
                        </form>
                    	</div>
                	</div>                
                	<div class="panel panel-default">
                    	<div class="panel-heading">
                        	<i class="fa fa-bell fa-fw"></i> Notifications Panel
                    	</div>
                    	<!-- /.panel-heading -->
                    	<div class="panel-body">
                        	<div class="list-group">
                          		<h5> </h5>                           
                       		</div>
                       		<!-- /.list-group -->
                   		</div>
                   		<!-- /.panel-body -->
               		</div>
               		<!-- /.panel -->               
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                        Your Courses   
                        </div>
                        <div class="panel-body"> 
                          You can create course contents by following the below links.                                    
                        </div>
                        <!-- /.panel-body -->
                    </div>
                	<!-- /.panel -->
                	<?php
                	$dd = mysqli_query($connection,"select * from course_details where faculty_id='$facultyid'");
                	while($ff = mysqli_fetch_row($dd)){
                	?>
                	<div class="chat-panel panel panel-default">
                    	<div class="panel-heading">                        
                    	</div>
                   		<!-- /.panel-heading -->
                    	<div class="panel-body">   
                    		<a href="<?php echo $ff[1] ?>"  target="_blank"> <button class="btn btn-default" style="background: #eb7d34;color:white" ><?php echo $ff[2] ?></button></a> 
                    	</div>	
                    	<!-- /.panel-body -->
                    	<div class="panel-footer">
                        	<div class="input-group">                            
                        	</div>
                    	</div>
                    	<!-- /.panel-footer -->
                	</div>
                <?php } ?>
           		</div>
            	<div class="row">
                   	<div class="col-lg-7">
                        <div class="panel panel-default">
                        	<div class="panel-heading">
                         		Lab  Details
                     		</div>
                    		<!-- /.panel-heading -->                     
                     		<div class="panel-body">
                        		<div class="pull-left">
                        			<div class="panel panel-default">
                                        <div class="panel-heading">
                         					Lab1  Details
                     					</div>
                     					<!-- /.panel-heading -->
                     					<div class="panel-body">
                        					<div class="pull-left">
                        	 					<?php 
                                					$res = mysqli_query($connection,"select * from lab_details where lab1_assign='$facultyid'");
                               						while( $re = mysqli_fetch_row($res)){
                            					?>
                             					<?php
                            						echo "<b>"."LAB FOR : ".$re[0].'-'.$re[1].'-'.$re[2].'<br>'."</b>";
                                					echo "<b>"."LAB NAME : ".$re[3]."</b><br><br>";
                                				?>
                            					<div class="panel panel-default" style="float: left;margin-right: 5px;">
                        							<div class="panel-heading">
                        	 						Lab1  Details
                     								</div>
                     								<!-- /.panel-heading --> 
                     								<div class="panel-body">
                        								<div class="pull-left">                           
                             								<form action="faculty.php" method="post" enctype = "multipart/form-data">
                                    							<div class="form-group">                            
                            										<br>
                            										<label>Schedule Update</label>
                            										<input type="hidden" name="lab1" value="<?php echo $re[0].'-'.$re[1].'-'.$re[2];?>" >
                        											<input type="date" class="form-control" name="lab1_schedule_date">    
                        											<input type="text" class="form-control" name="lab1_schedule">
                                    							</div> 
                                    							<button type="submit" class="btn btn-default" value="infoupload" name="lab1_sch_upload">Upload</button>
                    										</form>
                    										                            
                           
                										</div>	               
        											</div>
        											<!-- /.panel-body -->
    											</div>
    											<div class="panel panel-default" style="float: right;">                       
                        							<div class="panel-heading">
                         								BroadCast Message
                     								</div>
                     								<!-- /.panel-heading -->                     
                     								<div class="panel-body">
                        								<div class="pull-left">
                        									<form method="post" action="faculty.php" enctype = "multipart/form-data"> 
                        										<input type="hidden" name="lab11" value="<?php echo $re[0].'-'.$re[1].'-'.$re[2];?>" >       
        														<label >Message To be Sent : </label>
        														<input type="text" name="grp-msg-lab1"  placeholder="Enter Message to be sent ">
        														<button type="submit" class="btn btn-default" value="generatelist" name="grp-btn-lab1">Send</button>
        														<br>
    														</form>
                        								</div>
                    								</div>
                								</div>
                								<?php
               				 						}
                    											
                    							?>
											</div>
										</div>
									</div>
									<!-- inner -->
									<?php
									if(isset($_POST['lab1_sch_upload'])) {
                        				$aa = explode("-",$_POST['lab1']);
										$rr = mysqli_query($connection,"select lab1_schedule from lab_details where lab_branch = '$aa[0]' and lab_semester='$aa[1]' and lab_section='$aa[2]'");
										$aa1 = mysqli_fetch_row($rr);
										$aa2 = "Date"." : ".$_POST['lab1_schedule_date']."_".$_POST['lab1_schedule'].
											                        ";";
										$aa3 = $aa1[0].$aa2;
										mysqli_query($connection,"Update lab_details set lab1_schedule='$aa3' where lab_branch = '$aa[0]' and lab_semester='$aa[1]' and lab_section='$aa[2]'");
                    					}  
                    				?>
                    				<?php 
   				 						if(isset($_POST['grp-btn-lab1'])){
											$msg=$_POST['grp-msg-lab1'];
											date_default_timezone_set("Asia/Calcutta"); 
											$s=date("h:i:sa");
											$v='';
											for($x = 0; $x < strlen($s)-5; $x++) {
												$v=$v.$s[$x];
											}
											$w='';
											for($x = 8; $x < 10; $x++) {
												$w=$w.$s[$x];
											}
											$w=strtoupper($w);
											$v=$v.' '.$w;
											$d= date("d-m-Y");
											$bb = explode("-",$_POST['lab11']);
											$gg = mysqli_query($connection,"select id from sectionid where branch='$bb[0]' and section='$bb[2]' and semester='$bb[1]'");
											$id=mysqli_fetch_row($gg);
											 $query1 = "INSERT into groupmessages (id,messages,sender,type,daate,timee) VALUES('$id[0]','$msg','$facultyid','text','$d','$v')";
											mysqli_query($connection, $query1);
										} 
									?>
									<br>
									<div class="panel panel-default">
                                        <div class="panel-heading">
                         					Lab-2  Details
                     					</div>
                     					<!-- /.panel-heading -->
                     					<div class="panel-body">
                        					<div class="pull-left">
                        	 					<?php 
                                					$res = mysqli_query($connection,"select * from lab_details where lab2_assign='$facultyid'");
                               						while( $re = mysqli_fetch_row($res)){
                            					?>
                             					<?php
                            						echo "<b>"."LAB FOR : ".$re[0].'-'.$re[1].'-'.$re[2].'<br>'."</b>";
                                					echo "<b>"."LAB NAME : ".$re[5]."</b><br><br>";
                                				?>
                            					<div class="panel panel-default" style="float: left;margin-right: 5px;">
                        							<div class="panel-heading">
                        	 						Lab-2  Details
                     								</div>
                     								<!-- /.panel-heading --> 
                     								<div class="panel-body">
                        								<div class="pull-left">                           
                             								<form action="faculty.php" method="post" enctype = "multipart/form-data">
                                    							<div class="form-group">                            
                            										<br>
                            										<label>Schedule Update</label>
                            										<input type="hidden" name="lab2" value="<?php echo $re[0].'-'.$re[1].'-'.$re[2];?>" >
                        											<input type="date" class="form-control" name="lab2_schedule_date">    
                        											<input type="text" class="form-control" name="lab2_schedule">
                                    							</div> 
                                    							<button type="submit" class="btn btn-default" value="infoupload" name="lab2_sch_upload">Upload</button>
                    										</form>
                    										                            
                           
                										</div>	               
        											</div>
        											<!-- /.panel-body -->
    											</div>
    											<div class="panel panel-default" style="float: right;">                       
                        							<div class="panel-heading">
                         								BroadCast Message
                     								</div>
                     								<!-- /.panel-heading -->                     
                     								<div class="panel-body">
                        								<div class="pull-left">
                        									<form method="post" action="faculty.php" enctype = "multipart/form-data"> 
                        										<input type="hidden" name="lab22" value="<?php echo $re[0].'-'.$re[1].'-'.$re[2];?>" >       
        														<label >Message To be Sent : </label>
        														<input type="text" name="grp-msg-lab2"  placeholder="Enter Message to be sent ">
        														<button type="submit" class="btn btn-default" value="generatelist" name="grp-btn-lab2">Send</button>
        														<br>
    														</form>
                        								</div>
                    								</div>
                								</div>
                								<?php
               				 						}
                    											
                    							?>
											</div>
										</div>
									</div>
									<!-- inner -->
									<?php
									if(isset($_POST['lab2_sch_upload'])) {
                        				$aa = explode("-",$_POST['lab2']);
										$rr = mysqli_query($connection,"select lab2_schedule from lab_details where lab_branch = '$aa[0]' and lab_semester='$aa[1]' and lab_section='$aa[2]'");
										$aa1 = mysqli_fetch_row($rr);
										$aa2 = "Date"." : ".$_POST['lab2_schedule_date']."_".$_POST['lab2_schedule'].
											                        ";";
										$aa3 = $aa1[0].$aa2;
										mysqli_query($connection,"Update lab_details set lab2_schedule='$aa3' where lab_branch = '$aa[0]' and lab_semester='$aa[1]' and lab_section='$aa[2]'");
                    					}  
                    				?>
                    				<?php 
   				 						if(isset($_POST['grp-btn-lab2'])){
											$msg=$_POST['grp-msg-lab2'];
											date_default_timezone_set("Asia/Calcutta"); 
											$s=date("h:i:sa");
											$v='';
											for($x = 0; $x < strlen($s)-5; $x++) {
												$v=$v.$s[$x];
											}
											$w='';
											for($x = 8; $x < 10; $x++) {
												$w=$w.$s[$x];
											}
											$w=strtoupper($w);
											$v=$v.' '.$w;
											$d= date("d-m-Y");
											$bb = explode("-",$_POST['lab22']);
											$gg = mysqli_query($connection,"select id from sectionid where branch='$bb[0]' and section='$bb[2]' and semester='$bb[1]'");
											$id=mysqli_fetch_row($gg);
											 $query1 = "INSERT into groupmessages (id,messages,sender,type,daate,timee) VALUES('$id[0]','$msg','$facultyid','text','$d','$v')";
											mysqli_query($connection, $query1);
										} 
									?>
									<br>
									<div class="panel panel-default">
                                        <div class="panel-heading">
                         					Lab-3  Details
                     					</div>
                     					<!-- /.panel-heading -->
                     					<div class="panel-body">
                        					<div class="pull-left">
                        	 					<?php 
                                					$res = mysqli_query($connection,"select * from lab_details where lab3_assign='$facultyid'");
                               						while( $re = mysqli_fetch_row($res)){
                            					?>
                             					<?php
                            						echo "<b>"."LAB FOR : ".$re[0].'-'.$re[1].'-'.$re[2].'<br>'."</b>";
                                					echo "<b>"."LAB NAME : ".$re[7]."</b><br><br>";
                                				?>
                            					<div class="panel panel-default" style="float: left;margin-right: 5px;">
                        							<div class="panel-heading">
                        	 						Lab1  Details
                     								</div>
                     								<!-- /.panel-heading --> 
                     								<div class="panel-body">
                        								<div class="pull-left">                           
                             								<form action="faculty.php" method="post" enctype = "multipart/form-data">
                                    							<div class="form-group">                            
                            										<br>
                            										<label>Schedule Update</label>
                            										<input type="hidden" name="lab3" value="<?php echo $re[0].'-'.$re[1].'-'.$re[2];?>" >
                        											<input type="date" class="form-control" name="lab3_schedule_date">    
                        											<input type="text" class="form-control" name="lab3_schedule">
                                    							</div> 
                                    							<button type="submit" class="btn btn-default" value="infoupload" name="lab3_sch_upload">Upload</button>
                    										</form>
                    										                            
                           
                										</div>	               
        											</div>
        											<!-- /.panel-body -->
    											</div>
    											<div class="panel panel-default" style="float: right;">                       
                        							<div class="panel-heading">
                         								BroadCast Message
                     								</div>
                     								<!-- /.panel-heading -->                     
                     								<div class="panel-body">
                        								<div class="pull-left">
                        									<form method="post" action="faculty.php" enctype = "multipart/form-data"> 
                        										<input type="hidden" name="lab33" value="<?php echo $re[0].'-'.$re[1].'-'.$re[2];?>" >       
        														<label >Message To be Sent : </label>
        														<input type="text" name="grp-msg-lab3"  placeholder="Enter Message to be sent ">
        														<button type="submit" class="btn btn-default" value="generatelist" name="grp-btn-lab3">Send</button>
        														<br>
    														</form>
                        								</div>
                    								</div>
                								</div>
                								<?php
               				 						}
                    											
                    							?>
											</div>
										</div>
									</div>
									<!-- inner -->
									<?php
									if(isset($_POST['lab3_sch_upload'])) {
                        				$aa = explode("-",$_POST['lab3']);
										$rr = mysqli_query($connection,"select lab3_schedule from lab_details where lab_branch = '$aa[0]' and lab_semester='$aa[1]' and lab_section='$aa[2]'");
										$aa1 = mysqli_fetch_row($rr);
										$aa2 = "Date"." : ".$_POST['lab3_schedule_date']."_".$_POST['lab3_schedule'].
											                        ";";
										$aa3 = $aa1[0].$aa2;
										mysqli_query($connection,"Update lab_details set lab3_schedule='$aa3' where lab_branch = '$aa[0]' and lab_semester='$aa[1]' and lab_section='$aa[2]'");
                    					}  
                    				?>
                    				<?php 
   				 						if(isset($_POST['grp-btn-lab3'])){
											$msg=$_POST['grp-msg-lab3'];
											date_default_timezone_set("Asia/Calcutta"); 
											$s=date("h:i:sa");
											$v='';
											for($x = 0; $x < strlen($s)-5; $x++) {
												$v=$v.$s[$x];
											}
											$w='';
											for($x = 8; $x < 10; $x++) {
												$w=$w.$s[$x];
											}
											$w=strtoupper($w);
											$v=$v.' '.$w;
											$d= date("d-m-Y");
											$bb = explode("-",$_POST['lab33']);
											$gg = mysqli_query($connection,"select id from sectionid where branch='$bb[0]' and section='$bb[2]' and semester='$bb[1]'");
											$id=mysqli_fetch_row($gg);
											 $query1 = "INSERT into groupmessages (id,messages,sender,type,daate,timee) VALUES('$id[0]','$msg','$facultyid','text','$d','$v')";
											mysqli_query($connection, $query1);
										} 
									?>
									                        
                				</div>                               
        					</div>
        					<!-- /.panel-body -->
        				</div>
					</div>
					<!-- /.col-lg-8 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
	</div>
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
