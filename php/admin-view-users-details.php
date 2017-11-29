<?php
	include('dbConnect.php');
	session_start();
	if (isset($_GET['user_id']))
	{
		$userId=$_GET['user_id'];
		$sql1 = "SELECT * FROM `User` WHERE User_Id ='$userId'";
		$result1 = mysqli_query($conn,$sql1);
		$row1 = mysqli_fetch_array($result1);
		
		$sql2 = "SELECT * FROM `TA` WHERE User_Id ='$userId'";
		$result2 = mysqli_query($conn,$sql2);
		$row2 = mysqli_fetch_array($result2);
		
		$sql3 = "SELECT * FROM `Milestones` WHERE `Milestone_Id` ='".$row2['Milestones_Id']."'";
		$result3 = mysqli_query($conn,$sql3);
		$row3 = mysqli_fetch_array($result3);
		
	}
	else
	{
		$userId="empty";	
	}
?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Admin Dashboard</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<!--<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>-->
		<link href="../css/admin.css" type="text/css" rel="stylesheet">
		<link href="../js/admin.js" type="text/javascript">
		<!--<script src="../js/jquery-cookie-master/src/jquery.cookie.js"></script>-->
	</head>
	<body>
	<!-- NAVBAR -->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="../html/admin.html">Admin Dashboard</a>
	      <!--<a class="navbar-brand" href="#"><img src="../images/usc.jpg" style="width: 50px;height:50px;"></img></a>-->
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
		<li><a href="../html/admin.html">Home</a></li>
		<li class="active"><a href="../html/admin-users.html">Users</a></li>
		<li><a href="../html/admin-courses.html">Courses</a></li> 
		<li><a href="../html/admin-matching.html">Matching</a></li> 
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
		<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<img src="../images/uscheader.png" style="width: 100%;"></img>
			</div>
			
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-top: 2%;">
				<ol class="breadcrumb">
				  <li><a href="../html/admin-users.html">Users</a></li> 
				  <li><a href="admin-view-users.php">View Users</a></li>
				  <li class="active">View User Details</li>
				</ol>
			</div>
			<div class="container">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<center><h3>User Details</h3><center><br>
				<table class="table" style="width:60%;">
				    <tbody>
					<tr>
					  <th>User Id</th>
					    <td><?php echo $userId;?></td>
					</tr>
					<tr>
					  <th>Name</th>
					    <td><?php echo $row1['Name'];?></td>
					</tr>
					<tr>
					  <th>Username</th>
					    <td><?php echo $row1['Username'];?></td>
					</tr>
				      	<tr>
					  <th>Area</th>
					    <td><?php echo $row2['Area'];?></td>
					</tr>
					<tr>
					  <th>Has TA Experience</th>
					    <td>
					    	<?php 
					    	if($row2['Has_TA_Experience']==1)
						{
						    	echo "Yes";
						}
						else
						{
							echo "No";
						}
						 ?></td>
					</tr>
					<tr>
					  <th>Previous Courses Taught</th>
					    <td><?php 
					    	$courses=explode(",",$row2['Previous_Courses_Taught']);
					    	foreach ($courses as $c)
					    	{
					    		#echo $c;
					    		$sql4 = "SELECT * FROM `Course` WHERE Course_Id ='$c'";
							$result4 = mysqli_query($conn,$sql4);
							$row4 = mysqli_fetch_array($result4);
							echo $row4['Course_Code'];
							echo "<br>";
					    	}
					    
					    ?></td>
					</tr>
					<tr>
					  <th>Happy with Previous Courses Taught</th>
					    <td><?php echo $row2['Happy_With_Previous_Courses_Taught'];?></td>
					</tr>
					<tr>
					  <th>Number of Semesters (of TA Experience)</th>
					    <td><?php echo $row2['Has_TA_Experience_For_Number_Of_Semester'];?></td>
					</tr>
					<tr>
					  <th>Milestone</th>
					    <td><?php echo $row3['Milestone_Name'];?></td>
					</tr>
					
				    </tbody>
				</table>
				<br><br><br>
			</div>
			</div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-top: 2%;">
				
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</body>
</html>
