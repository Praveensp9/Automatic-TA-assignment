<?php
	include('dbConnect.php');
	session_start();
	if (isset($_POST["submit"]))
	{
		$username=$_SESSION['Username'];
		$sql1="SELECT * FROM `User` WHERE `Username`='$username'";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($result1);
		$userId=$row1['User_Id'];
		
		$sql2="SELECT * FROM `TA` WHERE `User_Id`='$userId'";
		$result2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($result2);
		$taId=$row2['TA_Id'];
		
		$timeId=$_POST['time'];
		$reasonId=$_POST['reason'];
		if($reasonId==4)
		{
			$reason=$_POST['reasonIfOther'];
		}
		else
		{
			$reason="";
		}
		
		$sql3="INSERT INTO `TA_Time_Constraints` (`TA_Id`,`Time_Interval_Not_Available_Id`,`Reason_Id`,`Reason_If_Other`) VALUES('$taId','$timeId','$reasonId','$reason')";
		$result3=mysqli_query($conn,$sql3);
		if($result3)
		{
			echo "<script> alert('Added Time Constraint');</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../html/user-personal.html">';
		}
		else
		{
			echo "<script> alert('Error Adding Time Constraint');</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=user-add-time-constraints.php">';
		}
	}
	else if (isset($_POST["submit-add"]))
	{
		$username=$_SESSION['Username'];
		$sql1="SELECT * FROM `User` WHERE `Username`='$username'";
		$result1=mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($result1);
		$userId=$row1['User_Id'];
		
		$sql2="SELECT * FROM `TA` WHERE `User_Id`='$userId'";
		$result2=mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($result2);
		$taId=$row2['TA_Id'];
		
		$timeId=$_POST['time'];
		$reasonId=$_POST['reason'];
		if($reasonId==4)
		{
			$reason=$_POST['reasonIfOther'];
		}
		else
		{
			$reason="";
		}
		
		$sql3="INSERT INTO `TA_Time_Constraints` (`TA_Id`,`Time_Interval_Not_Available_Id`,`Reason_Id`,`Reason_If_Other`) VALUES('$taId','$timeId','$reasonId','$reason')";
		$result3=mysqli_query($conn,$sql3);
		if($result3)
		{
			echo "<script> alert('Added Time Constraint');</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=user-add-time-constraints.php">';
		}
		else
		{
			echo "<script> alert('Error Adding Time Constraint');</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=user-add-time-constraints.php">';
		}
	}
	else
	{
		echo "<script> alert('Incorrect Submit');</script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=user-add-time-constraints.php">';
		
	}
?>

