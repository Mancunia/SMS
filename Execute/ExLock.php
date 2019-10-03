<?php
// Start the session
session_start();
?>
<?php

// include 'Config/config.php';
// include 'Config/config1.php';
include 'Config/connect.php';
$conn = new Database();
$db= $conn->getdbconnect();

 $UName = ($_SESSION["UserName"]);
 $PW = ($_POST["Password"]);
 $PassWord=0;
 $UserName=0;
$quer= mysqli_query($db,"SELECT * FROM customer where UserName='$UName' AND	Password='$PW'");
while($ss = mysqli_fetch_array($quer))
	{
	$UserName=$ss['UserName'];
	$PassWord=$ss['Password'];
	$Id=$ss['Id'];
	$FirstName=$ss['FirstName'];
	$LastName=$ss['LastName'];
	$ProfileImage=$ss['ProfileImage'];
	}

if($PassWord!=$PW || $UserName!=$UName ){
echo "<script>alert('Incorrect Password')</script>";
echo "<script>location.href='../lock.php'</script>";
}
else
{
$_SESSION["Id"]=$Id;
$_SESSION["FirstName"]=$FirstName;
$_SESSION["LastName"]=$LastName;
$_SESSION["UserName"]=$UserName;
$_SESSION["ProfileImage"]=$ProfileImage;
echo "<script>location.href='../Index.php'</script>";	
}
 ?>
