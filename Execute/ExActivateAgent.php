<?php
include './Config/connect.php';
$conn = new Database();
$db= $conn->getdbconnect();

 $Idd = ($_GET["id"]);
 //$Accept = "Activated";
		 																															
$query= mysqli_query($db,"UPDATE agent SET Status='Activated' WHERE ID='$Idd'");
					if($query){
	 echo "<script>alert('Account Activated')</script>";
 	 echo "<script>location.href='../Agents_List.php'</script>";
 }else{
	 echo "<script>alert('No record Activated')</script>";
	 echo "<script>location.href='../Agents_List.php'</script>";
}
		
	?>
