<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Admin Dashboard</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link  type="text/javascript"href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
		<!--<link href="css/admin.css" type="text/css" rel="stylesheet">
		<link href="js/admin.js" type="text/javascript">
		<script src="../js/jquery-cookie-master/src/jquery.cookie.js"></script>-->
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
	      <a class="navbar-brand" href="admin.html">Admin Dashboard</a>
	      <!--<a class="navbar-brand" href="#"><img src="../images/usc.jpg" style="width: 50px;height:50px;"></img></a>-->
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
		<li><a href="#">Home</a></li>
		<li class="active"><a href="admin-users.html">Users</a></li>
		<li><a href="admin-courses.html">Courses</a></li> 
		<li><a href="admin-matching.html">Matching</a></li> 
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
		<li><a href="../php/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<img src="../images/uscheader.png" style="width: 100%;"></img>
			</div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				<ol class="breadcrumb">
				  <li>Users</li>
				  <li class="active">View Users</li>
				</ol>
			</div>
			<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 table-responsive table-hover">
				<table class="table table-striped table-hover ">
				    <thead>
					<tr>
					    <th>User ID</th>
					    <th>Name</th>
					    <th></th>
					    <th>Reward</th>
					    <th>Column heading</th>
					</tr>
				    </thead>

				    <tbody>
					<?php
					    $con = new mysqli("host","user", "password", "database");

					    $execItems = $con->query("SELECT id, name, descrip, reward, img FROM `items` WHERE id BETWEEN 1 AND 20 ");

					    while($infoItems = $execItems->fetch_array()){
						echo    "
							    <tr>
								<td>".$infoItems['id']."</td>
								<td>".$infoItems['name']."</td>
								<td>".$infoItems['descrip']."</td>
								<td>".$infoItems['reward']."</td>
								<td>".$infoItems['img']."</td>
							    </tr>
							";

					    }
					?>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
	</body>
</html>
