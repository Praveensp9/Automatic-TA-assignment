<?php
	include('dbConnect.php');
	session_start();
	if (isset($_POST["matching_id"]))
	{
		$matchId=$_POST["matching_id"];
		$source=$_POST["source"];
		
		if($source)
		{
			$sql1="DELETE FROM `Admin_Matching` WHERE `Admin_Matching_Id`='$matchId'";
			
			$result1=mysqli_query($conn,$sql1);
			
			if($result1)
			{
				echo "<script> alert('Record Deleted.');</script>";
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-view-matching.php">';
				
				
			}
			else
			{
				echo "<script> alert('Error Deleting record from Admin Matching Table.');</script>";
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-view-matching.php">';
			}
		}
		else
		{
			
			$sql1="DELETE FROM `Matching` WHERE `Matching_Id`='$matchId'";
			
			$result1=mysqli_query($conn,$sql1);
			
			if($result1)
			{
				echo "<script> alert('Record Deleted.');</script>";
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-view-matching.php">';
				
			}
			else
			{
				echo "<script> alert('Error Deleting record from Admin Matching Table.');</script>";
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-view-matching.php">';
			}
			
		}
		
		
	}
	else
	{
		echo "<script> alert('No userid');</script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-view-courses.php">';
	}
?>

