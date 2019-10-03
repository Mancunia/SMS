<?php
// Start the session
session_start();
?>
<?php
// include '../Config/config1.php';
// include '../Config/config.php';
include '../Config/connect.php';
$conn = new Database();
$db= $conn->getdbconnect();

 $IDUser = ($_POST["IDUser"]);
$ProfileImage = ($_FILES["Image"]["name"]);
		 																															
$query= mysqli_query($db,"UPDATE user SET profilepicture='$ProfileImage' WHERE userid='$IDUser'");

					if($query){
	 echo "<script>alert('The profilepicture is successfully Updated')</script>";			
 	 echo "<script>location.href='../UserProfile.php? id=$IDUser'</script>";
	 $_SESSION["profilepicture"]=$ProfileImage;
	 
 }else{
	 echo "<script>location.href='../UserProfile.php? id=$IDUser'</script>";
}
		
	?>
    <?php
$target_dir = "../assets/img/Profile_Uploaded/";
$target_file = $target_dir . basename($_FILES["Image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);    
?>
