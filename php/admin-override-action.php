<?php
	include('dbConnect.php');
	session_start();
	if (isset($_POST["submit"]))
	{
		$taId=$_POST['ta'];
		$section=$_POST['section'];
		$active=1;
		$sql1 = "INSERT INTO `Admin_Matching` (`TA_Id`,`Section_Id` ,`IsActive`) VALUES ('$taId','$section','$active')";
		$result1 = mysqli_query($conn,$sql1);
		if($result1)
		{
			
				echo "<script> alert('New Matching Added');</script>";
				echo '<META HTTP-EQUIV="Refresh" Content="0; URL=../html/admin-matching.html">';
		}
		else
		{
			echo "<script> alert('Error Adding Section');</script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-override.php">';
		}
						
		
	}
	else
	{
		echo "<script> alert('Incorrect Submit');</script>";
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin-override.php">';
		
	}
?>

