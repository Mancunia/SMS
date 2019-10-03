<?php
include './Config/connect.php';
$conn = new Database();
$db= $conn->getdbconnect();

 $Id = ($_POST["Id"]);
 $NID = ($_POST["NID"]);
 $FirstName = ($_POST["FirstName"]);
 $LastName = ($_POST["LastName"]);
 $Country = ($_POST["Country"]);
 $Occupation = ($_POST["Occupation"]);
 $EMail = ($_POST["EMail"]);
 $Website = ($_POST["Website"]);
 $AboutMe = ($_POST["AboutMe"]);
 //$DOB = ($_POST["DOB"]);
		 																															
$query= mysqli_query($db,"UPDATE customer SET NID='$NID', FirstName='$FirstName',LastName='$LastName' ,Country='$Country',Website='$Website',Occupaton='$Occupation',EMail='$EMail' ,AboutMe='$AboutMe' WHERE Id='$Id'");
					if($query){
	 echo "<script>alert('Record Updated')</script>";
 	 echo "<script>location.href='../profile.php? id=$Id'</script>";
 }else{
	 echo "<script>alert('No record Updated')</script>";
	 echo "<script>location.href='../edit_profile.php? id=$Id'</script>";
}
		
	?>
