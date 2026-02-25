<?php
session_start();
$studentid = $_SESSION['studentid'];
include 'dbconnect.php';
if(!isset($_SESSION['studentid']))
	header("Location : index.html");

?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">

	<meta name="description" content="">
	<meta name="author" content="">
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

    
    <style type="text/css">
    	#container{
    		width:495px;
    		height:900px;
    		background:#eff3f7;
    		margin:0;
    		font-size:0;
    		border-radius:5px;
    		overflow:hidden;
    	}
    	aside{
    		width:260px;
    		height:800px;
    		background-color:#3b3e49;
    		display:inline-block;
    		font-size:15px;
    		vertical-align:top;
    	}
    	main{
    		width:490px;
    		height:800px;
    		display:inline-block;
    		font-size:15px;
    		vertical-align:top;
    	}

    	aside header{
    		padding:30px 20px;
    	}
    	aside input{
    		width:100%;
    		height:50px;
    		line-height:50px;
    		padding:0 50px 0 20px;
    		background-color:#5e616a;
    		border:none;
    		border-radius:3px;
    		color:#fff;
    		background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_search.png);
    		background-repeat:no-repeat;
    		background-position:170px;
    		background-size:40px;
    	}
    	aside input::placeholder{
    		color:#fff;
    	}
    	aside ul{
    		padding-left:0;
    		margin:0;
    		list-style-type:none;
    		overflow-y:scroll;
    		height:690px;
    	}
    	aside li{
    		padding:10px 0;
    	}
    	aside li:hover{
    		background-color:#5e616a;
    	}
    	h2,h3{
    		margin:0;
    	}
    	aside li img{
    		border-radius:50%;
    		margin-left:20px;
    		margin-right:8px;
    	}
    	aside li div{
    		display:inline-block;
    		vertical-align:top;
    		margin-top:12px;
    	}
    	aside li h2{
    		font-size:14px;
    		color:#fff;
    		font-weight:normal;
    		margin-bottom:5px;
    	}
    	aside li h3{
    		font-size:12px;
    		color:#7e818a;
    		font-weight:normal;
    	}

    	.status{
    		width:8px;
    		height:8px;
    		border-radius:50%;
    		display:inline-block;
    		margin-right:7px;
    	}
    	.green{
    		background-color:#58b666;
    	}
    	.orange{
    		background-color:#ff725d;
    	}
    	.blue{
    		background-color:#6fbced;
    		margin-right:0;
    		margin-left:7px;
    	}

    	main header{
    		height:110px;
    		padding:30px 20px 30px 40px;
    	}
    	main header > *{
    		display:inline-block;
    		vertical-align:top;
    	}
    	main header img:first-child{
    		border-radius:50%;
    	}
    	main header img:last-child{
    		width:24px;
    		margin-top:8px;
    	}
    	main header div{
    		margin-left:10px;
    		margin-right:145px;
    	}
    	main header h2{
    		font-size:16px;
    		margin-bottom:5px;
    	}
    	main header h3{
    		font-size:14px;
    		font-weight:normal;
    		color:#7e818a;
    	}

    	#chat{
    		padding-left:0;
    		margin:0;
    		list-style-type:none;
    		overflow-y:scroll;
    		height:535px;
    		border-top:2px solid #fff;
    		border-bottom:2px solid #fff;
    	}
    	#chat li{
    		padding:10px 30px;
    	}
    	#chat h2,#chat h3{
    		display:inline-block;
    		font-size:13px;
    		font-weight:normal;
    	}
    	#chat h3{
    		color:#bbb;
    	}
    	#chat .entete{
    		margin-bottom:5px;
    	}
    	#chat .message{
    		padding:10px;
    		padding-right: 20px;
    		color:#fff;
    		line-height:25px;
    		max-width:90%;
    		display:inline-block;
    		text-align:left;
    		border-radius:5px;
    	}
    	#chat .me{
    		text-align:right;
    	}
    	#chat .you .message{
    		background-color:#58b666;
    	}
    	#chat .me .message{
    		background-color:#6fbced;
    	}
    	#chat .triangle{
    		width: 0;
    		height: 0;
    		border-style: solid;
    		border-width: 0 5px 5px 5px;
    	}
    	#chat .you .triangle{
    		border-color: transparent transparent #58b666 transparent;
    		margin-left:15px;
    	}
    	#chat .me .triangle{
    		border-color: transparent transparent #6fbced transparent;
    		margin-left:375px;
    	}

    	main footer{
    		height:155px;
    		padding:20px 30px 10px 20px;
    	}
    	main footer input[type=text]{
    		resize:none;
    		border:none;
    		display:block;
    		width:100%;
    		height:80px;
    		border-radius:3px;
    		padding:20px;
    		font-size:13px;
    		margin-bottom:13px;
    	}
    	main footer input[type=text]::placeholder{
    		color:#ddd;
    	}
    	main footer img{
    		height:30px;
    		cursor:pointer;
    	}
    	input[type=submit] {

    		text-transform:uppercase;
    		font-weight:bold;
    		width: 100px;
    		background-color: #eff3f7;
    		color: black;
    		padding: 4px 8px;

    		border: none;
    		border-radius: 4px;
    		cursor: pointer;
    		margin-top:5px;
    		float:right;
    	}

    	input[type=submit]:hover {
    		background-color: #45a049;
    	}
    	#file-input
    	{
    		display: none;
    	}
    	#file-input1
    	{
    		display: none;
    	}


    </style>


</head>

<body>
	<div id="wrapper">
		<div class="w3-container w3-black" id ="head-main" style="margin-left: 0px;width: 100%">

			<center><img src="../images/logo-2.png" style="float: left;height: 80px;padding-bottom: 10px;padding-left: 40px;"><h1 style="font-weight: 800;">VIRTUAL LAB SPACE</h1></center>
		</div>
		<br>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">

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
							$result = mysqli_query($connection, "SELECT * from student_details where student_id = '$studentid'");
							$row = mysqli_fetch_assoc($result);
							echo $row['student_name'];
							echo '<br>';
							echo $row['student_branch'];
							?>
							<div class="clearfix">

							</div>
							<form action="../logout.php" method="post">
								<button class="btn btn-default" name="student_logout" value="student_logout">LogOut</button>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-code fa-fw">
							</i>
							Compiler Area
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<h4 style="float: left;">
								Take me there
							</h4>
							<a href="Compilers/ide-master/index.php" style="float: right;margin-right: 40px;" target="__parent">
								<i class="fa fa-arrow-circle-right" style="font-size:35px;color:green">

								</i>
							</a>     
						</div>
						<!-- /.list-group -->
					</div>
					<!-- /.panel-body -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<i class="fa fa-cloud fa-fw">

							</i>
							Cloud Area
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="list-group">
								<h5 style="float: left;">Access Files</h5><a href="Cloud Storage/index.php" style="float: right;margin-right: 40px;"><i class="fa fa-cloud fa-fw" style="font-size:30px;color:blue"></i></a>

							</div>
							<!-- /.list-group -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-book fa-fw">

                            </i>
                            Courses Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <marquee direction="up" onmouseover="this.stop();" onmouseout="this.start();"><div class="list-group">
                                <?php
                    $dd = mysqli_query($connection,"select * from course_details ");
                    while($ff = mysqli_fetch_row($dd)){

                    ?>
                    <a href="<?php echo $ff[1] ?>"><?php echo $ff[2] ?></a><hr>
                <?php } ?>
                                
                            </div>
                            <!-- /.list-group -->
                            </marquee>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					<div class="panel panel-default">
						<div class="panel-heading">

						</div>
						<div class="panel-body"> 

						</div>
						<!-- /.panel-body -->

					</div>
					<div class="panel panel-default">
						<div class="panel-heading">

						</div>
						<div class="panel-body"> 

						</div>
						<!-- /.panel-body -->

					</div>
					<div class="panel panel-default">
						<div class="panel-heading">

						</div>
						<div class="panel-body"> 

						</div>
						<!-- /.panel-body -->

					</div>

					<!-- /.panel -->
					<div class="chat-panel panel panel-default">
						<div class="panel-heading">

						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">

						</div>
						<!-- /.panel-body -->
						<div class="panel-footer">
							<div class="input-group">

							</div>
						</div>
						<!-- /.panel-footer -->
					</div>
				</div>
				<div class="row">
					<div class="col-lg-7">
						<div class="panel panel-default" style="min-width: 1000px;">
							<div class="panel-heading">
								Lab Schedule
							</div>
							<!-- /.panel-heading -->
                            <?php 
                            $rs = mysqli_query($connection,"select * from student_details where student_id = '$studentid'");
                            $rr = mysqli_fetch_row($rs);
                            $rs1 = mysqli_query($connection,"select * from lab_details   where lab_branch='$rr[3]' and lab_semester='$rr[5]' and lab_section='$rr[4]'");
                            $rr1 = mysqli_fetch_row($rs1);
                            ?>
							<div class="panel-body">
								<div class="pull-left" style="float:left;">
									<div class="form-group">
										<div class="panel panel-default" style="max-width: 450px;">
											<div class="panel-heading">
												<b><?php echo $rr1[3] ?> <a href="#" target="__parent"><span  style="float:right;margin-top: 0px;top: 0px;right: 40px;padding: 3px 6px;border-radius: 10%;background-color: red;color: white;">Download</span></a> </b>
											</div>
											<!-- /.panel-heading -->
											<div class="panel-body">
												<div class="pull-left">
                                                    <?php
                                                    $ss = mysqli_query($connection,"select faculty_name from faculty_details where faculty_id in (select lab1_assign from lab_details where lab_branch='$rr[3]' and lab_semester='$rr[5]' and lab_section='$rr[4]') " );
                                                     $ss1 = mysqli_fetch_row($ss);
                                                     echo "<b>"."Faculty Name : ".$ss1[0]."<br></br>"; 
                                                    $sc = explode(";",$rr1[9]);
                                                   
                                                    $i=0;
                                                    
                                                    while($i<count($sc)-1 && $sc[0]!=''){
                                                        $sc1 = explode("_",$sc[$i++]);
                                                        echo $sc1[0]."<br>";
                                                        echo "Descripton : ".$sc1[1]."<hr>";
                                                    }                                                    
                                                    ?>
													
												</div>
												<!-- /.panel-body -->
											</div>
										</div>
										<!-- /.panel -->
									
										<br>
										<div class="panel panel-default" style="max-width: 450px;">
                                            <div class="panel-heading">
                                                <?php echo $rr1[5] ?> <a href="#" target="__parent"><span  style="float:right;margin-top: 0px;top: 0px;right: 40px;padding: 3px 6px;border-radius: 10%;background-color: red;color: white;">Download</span></a> 
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="pull-left">

                                                    <?php 
                                                    
                                                     $ss = mysqli_query($connection,"select faculty_name from faculty_details where faculty_id in (select lab2_assign from lab_details where lab_branch='$rr[3]' and lab_semester='$rr[5]' and lab_section='$rr[4]') " );
                                                     $ss1 = mysqli_fetch_row($ss);
                                                     echo "<b>"."Faculty Name : ".$ss1[0]."<br></br>";
                                                    $sc = explode(";",$rr1[10]);
                                                   
                                                    $i=0;
                                                    
                                                    while($i<count($sc)-1 && $sc[0]!=''){
                                                        $sc1 = explode("_",$sc[$i++]);
                                                        echo $sc1[0]."<br>";
                                                        echo "Descripton : ".$sc1[1]."<hr>";
                                                    }                                                    
                                                    ?>
                                                    
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                        <div class="panel panel-default" style="max-width: 450px;">
                                            <div class="panel-heading">
                                                <?php echo $rr1[7] ?> <a href="#" target="__parent"><span  style="float:right;margin-top: 0px;top: 0px;right: 40px;padding: 3px 6px;border-radius: 10%;background-color: red;color: white;">Download</span></a> 
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="pull-left">
                                                    <?php 
                                                     $ss = mysqli_query($connection,"select faculty_name from faculty_details where faculty_id in (select lab3_assign from lab_details where lab_branch='$rr[3]' and lab_semester='$rr[5]' and lab_section='$rr[4]') " );
                                                     $ss1 = mysqli_fetch_row($ss);
                                                     echo "<b>"."Faculty Name : ".$ss1[0]."<br></br>";
                                                    $sc = explode(";",$rr1[11]);
                                                   
                                                    $i=0;
                                                    //echo count($sc);
                                                    
                                                    while($i<count($sc)-1 && $sc[0]!=''){
                                                        $sc1 = explode("_",$sc[$i++]);
                                                        echo $sc1[0]."<br>";
                                                        echo "Descripton : ".$sc1[1]."<hr>";
                                                    }                                                    
                                                    ?>
                                                    
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
										<!-- /.panel -->
										
									</div>
								</div>
								<!-- /.panel-body -->
								<!-- Chat Box -->
								<div id="container" style="float: right;">
									<?php
									$stu = mysqli_query($connection,"SELECT student_branch,student_section,student_semester from student_details where student_id='$studentid'");
									$studata=mysqli_fetch_row($stu);
									$r=mysqli_query($connection,"SELECT id from sectionid where branch='$studata[0]' and  section='$studata[1]' and  semester='$studata[2]'");
									$rdata=mysqli_fetch_row($r);
									$roomid=$rdata[0];
									$result=mysqli_query($connection,"SELECT count(sender) as total from groupmessages where id='$roomid'");
									$data=mysqli_fetch_row($result);
									$group = $studata[0].'-'.$studata[2].'-'.$studata[1]
									?>
									<main>
										<header>
											<img src="https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-shadow-circle-512.png" alt="" style="width:55px;height: 55px;">
											<div>
												<h2> <?php echo $group ?> </h2>
												<h3>already <?php echo $data[0];?> messages</h3>
											</div>
											<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_star.png" alt="">
										</header>
										<div id="container1">
											<ul id="chat">
												<?php
												$sql="SELECT * FROM groupmessages where id='$roomid'";
												$resultchat=mysqli_query($connection,$sql);
												while ($rowchat=mysqli_fetch_row($resultchat))
												{
													if($rowchat[2]==$studentid)
													{
														?>
														<li class="me">
															<div class="entete">
																<h3> <?php echo $rowchat[5] ?>, <?php echo $rowchat[4] ?> &nbsp</h3><h2><?php echo $rowchat[2] ?></h2>
																<span class="status blue"></span>
															</div>
															<div class="triangle">

															</div>
															<?php if($rowchat[3]!=='image')
															{
																?>
																<div class="message">
																	<?php if (\strpos($rowchat[1], 'https://') !== false) 
																	{ 
																		?>
																		<a href="<?php echo $rowchat[1] ?>" style="color:red;" target="_blank"> <?php echo $rowchat[1] ?></a>
																		<?php
																	}
																	else{
																		echo $rowchat[1] ;
																	}
																	?>
																</div>
															<?php } else{ ?>
																<div class="message">
																	<?php $aa= $rowchat[1]; ?>
																	<a href="<?php echo '../uploads/'.substr($aa, 1) ?>">
																		<img src="<?php echo '../uploads/'.substr($aa, 1); ?>" style="width: 100px;height: 100px;" onerror="this.onerror=null;this.src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png';" target="_blank" preview>
																	</a>
																</div>
																<?php 
															}
															?>
														</li>
														<?php
													}
													else 
													{ 
														?>
														<li class="you">
															<div class="entete">
																<span class="status green"></span>
																<h2><?php echo $rowchat[2] ?> &nbsp</h2>
																<h3><?php echo $rowchat[5] ?>, <?php  echo $rowchat[4]; ?></h3>
															</div>
															<div class="triangle"></div>
															<?php if($rowchat[3]!=='image')
															{
																?>
																<div class="message">
																	<?php 
																	if (\strpos($rowchat[1], 'https://') !== false) 
																	{ 
																		?>
																		<a href="<?php echo $rowchat[1] ?>" style="color:red;" target="_blank"> <?php echo $rowchat[1] ?></a>
																		<?php
																	}
																	else
																	{
																		echo $rowchat[1] ;
																	}
																	?>
																</div>
															<?php } else{ ?>
																<div class="message">
																	<?php $aa= $rowchat[1]; ?>
																	<a href="<?php echo '../uploads/'.substr($aa, 1) ?>"> <img src="<?php echo '../uploads/'.substr($aa, 1); ?>" style="width: 100px;height: 100px;" onerror="this.onerror=null;this.src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png';" target="_blank" preview></a>
																	</div> <?php } ?>
																</li>
																<?php
															} 
														}

														?>


													</ul>
												</div>
												<footer id="focus1">
													<form method="post" action="student.php" enctype="multipart/form-data">
														<input type="text" name="msg" placeholder="Type your Text Here" style="border-radius:50px;
														">
														<label for="file-input">
															<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
														</label>

														<input  type="file" name="file"  id="file-input" style="display: none;">
    <!--<label for="file-input1">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt="">
            </label>

            <input id="file-input1" type="file" name="doc-upl" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf" >-->
            <input type="submit" value="Send" name="msgsnd1" id="send">
        </form>
        <?php
        if(isset($_POST['msgsnd1']))

        {
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
        	$d= date("d-m-Y") ;



        	$msg=$_POST['msg'];
        	if($_FILES['file']['name']!=''){
        		$file = rand(1000,100000)."-".$_FILES['file']['name'];
        		$file_loc = $_FILES['file']['tmp_name'];
        		$file_size = $_FILES['file']['size'];
        		$file_type = $_FILES['file']['type'];
        		$folder="../uploads/";

    // new file size in KB
        		$new_size = $file_size/1024;  
    // new file size in KB

    // make file name in lower case
        		$new_file_name = strtolower($file);
    // make file name in lower case

        		$final_file=str_replace(' ','-',$new_file_name);

        		if(move_uploaded_file($file_loc,$folder.$final_file))
        		{
        			$msg=$_FILES['file']['name'];
        			$query1 = "INSERT into groupmessages (id,messages,sender,type,daate,timee) VALUES('$roomid',' $final_file','$studentid','image','$d','$v')";
        			mysqli_query($connection, $query1);
        			
        		}
        		else
        		{
        			?>
        			<script>
        				alert('error while uploading file');
        				window.location.href='student.php';
        			</script>
        			<?php
        		}



        	}
        	else{
        		$query1 = "INSERT into groupmessages (id,messages,sender,type,daate,timee) VALUES('$roomid','$msg','$studentid','text','$d','$v')";
        		mysqli_query($connection, $query1);
        		

        	}







        }

        ?>
    </footer>
</main>
</div>
<!-- Chat Box Ends -->
</div>
<!-- /.panel -->
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
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="../vendor/raphael/raphael.min.js"></script>
<script src="../vendor/morrisjs/morris.min.js"></script>
<script src="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

<script src="http://code.jquery.com/jquery-latest.js"></script>


<script type="text/javascript" language="javascript">
	(function($)
	{
		$(document).ready(function()
		{

			$.ajaxSetup(
			{
				cache: false,
				beforeSend: function() {
					$('#container1').hide();
					$('#container1').show();
					scrollToBottom();
               // window.location.hash = '#container1';
           },
           complete: function() {
           	$('#container1').hide();
           	$('#container1').show();
           	scrollToBottom();
               // window.location.hash = '#container1';
           },
           success: function() {
           	$('#container1').hide();
           	$('#container1').show();
           	scrollToBottom();
               // window.location.hash = '#container1';
           }
       });
			var $container = $("#container1");
			$container.load("student.php #container1");
			var refreshId = setInterval(function()
			{
				$container.load('student.php #container1');
				scrollToBottom();
           // window.location.hash = '#container1';


       }, 9000);
		});
	})(jQuery);
	function scrollToBottom() {


		var objDiv = document.getElementById("chat");
		objDiv.scrollTop = objDiv.scrollHeight;
	}

</script>



</body>

</html>

