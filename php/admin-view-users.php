<?php
	include('dbConnect.php');
	session_start();
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
				  <li class="active">View Users</li>
				  
				</ol>
			</div>
			
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<center><h3>View User Details</h3><center>
			</div>
			
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin-top: 2%;">
				<table class="table table-striped table-responsive ">
				    <thead>
					<tr>
					    <th><center>User Id</center></th>
					    <th><center>Name</center></th>
					    <th><center>Username</center></th>
					    <th><center>Area</center></th>
					    <th><center>Action</center></th>
					</tr>
				    </thead>

				    <tbody><?php
				    		
						$query1="SELECT * FROM `User`";
						$result1=mysqli_query($conn,$query1);
						#$row=mysqli_fetch_array($result);
						/*
						while($row1=mysqli_fetch_array($result1))
						{
							echo $row1['Username'];
							print "\n";
						}
						
						$query1="SELECT * FROM `Users`";
						$result1=mysqli_query($conn,$query1);
						//$row1=mysqli_fetch_array($result1);
						
						
					    	$query3="SELECT * FROM `Milestones`";
					    	$result3=mysqli_query($conn,$query3);
						$row3=mysqli_fetch_array($result3);
						*/
						$records_flag=False;
						
						while($row1 = mysqli_fetch_array($result1))
						{
							if($row1['Username']=="admin")
							{	
								continue;
							}
							#echo $row1['User_Id'];
							$query2="SELECT * FROM `TA` WHERE `User_Id`='".$row1['User_Id']."'";
							$result2=mysqli_query($conn,$query2);
							$row2=mysqli_fetch_array($result2);
							$row2['User_Id'];
										    	
							echo    "
								    <tr>
									<td><center>".$row1['User_Id']."</center></td>
									<td><center>".$row1['Name']."</center></td>
									<td><center>".$row1['Username']."</center></td>
									<td><center>".$row2['Area']."</center></td>
									<td>
										<center>
										<!-- Split button -->
										<div class='btn-group'>
										  <button type='button' class='btn btn-primary'>Action</button>
										  <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
										    <span class='caret'></span>
										    <span class='sr-only'>Toggle Dropdown</span>
										  </button>
										  <ul class='dropdown-menu'>
										    <li><a href='admin-view-users-details.php?user_id=".$row1['User_Id']."'>View</a></li>
										    <li role='separator' class='divider'></li>
										    <li><a href='admin-update-user-details.php?user_id=".$row1['User_Id']."'>Update</a></li>
										    <li role='separator' class='divider'></li>
										    <li><a href='admin-delete-user.php?user_id=".$row1['User_Id']."'>Delete</a></li>
										  </ul>
										</div>
										</center>
									</td>
								    </tr>
								";

				    		
				    			$records_flag=True;
						}
						
						if($records_flag==False)
						{
							echo 	"
										<div class='container col-lg-12 col-md-12 col-xs-12 col-sm-12'>
											<div class='col-lg-12 col-md-12 col-xs-12 col-sm-12'>
												<center>No Records Found</center>
											</div>
										</div>
							
									";
						}
						//*/			
					?>		    	
				   </tbody>
				</table>
				
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</body>
</html>