<?php
	include('dbConnect.php');
	session_start();
	if (isset($_GET["admin_matching_id"]))
	{
		$matchId=$_GET['admin_matching_id'];
		$active=1;
		$sql="UPDATE `Admin_Matching` SET `IsActive`='$active' WHERE `Admin_Matching_Id`='$matchId'";
		$result=mysqli_query($conn,$sql);
		echo $result;
		if($result)
		{
			#echo "<script> alert('Activation done');</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-view-matching.php">';
		}
		else
		{
			
			echo "<script> alert('Error Activation');</script>";
			#header('Location: ' . $_SERVER["HTTP_REFERER"] );
		
		}
		
	}
	else if (isset($_GET["matching_id"]))
	{
		$matchId=$_GET['matching_id'];
		$active=1;
		$sql="UPDATE `Matching` SET `IsActive`='$active' WHERE `Matching_Id`='$matchId'";
		$result=mysqli_query($conn,$sql);
		echo $result;
		if($result)
		{
			#echo "<script> alert('Activation done');</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-view-matching.php">';
		}
		else
		{
			
			echo "<script> alert('Error Activation');</script>";
			#header('Location: ' . $_SERVER["HTTP_REFERER"] );
		
		}
		
	}
	else
	{
		echo "<script> alert('Incorrect matching id');</script>";
		#header('Location: ' . $_SERVER["HTTP_REFERER"] );
		#exit;
		#echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-add-courses.php">';
	}
?>

