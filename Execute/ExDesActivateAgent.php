<?php
include './Config/connect.php';
$conn = new Database();
$db= $conn->getdbconnect();
 $Idd = ($_GET["id"]);
		 																															
$query= mysqli_query($db,"UPDATE agent SET Status='Deactivated' WHERE ID='$Idd'");
					if($query){
	 echo "<script>alert('Account Deactivated')</script>";
 	 echo "<script>location.href='../Agents_List.php'</script>";
 }else{
	 echo "<script>alert('No record Updated')</script>";
	 echo "<script>location.href='../Agents_List.php'</script>";
}
		
	?>