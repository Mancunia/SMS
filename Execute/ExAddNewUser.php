<?php
// Start the session
session_start();
?>
<?php

// include '../Config/config.php';
// include '../Config/config1.php';
include '../Config/connect.php';
$conn = new Database();
$db= $conn->getdbconnect();

 $Names = ($_POST["Names"]);
 $Address = ($_POST["Address"]);
 $email = ($_POST["email"]);
 $Role = ($_POST["Role"]);
 $UserName = ($_POST["UserName"]);
 $Password = ($_POST["Password"]);
 $Activate = ($_POST["Activate"]);
 $Branch = ($_POST["Branch"]);
 $ProfilePicture = ($_FILES["ProfilePicture"]["name"]);
 $Username2="";
  	
$queri= mysqli_query($db,"SELECT * FROM  user where username='$UserName'"); 
while($ss = mysqli_fetch_array($queri))
	{
	$Username2=$ss['username'];
	}

if($UserName==$Username2){
echo "<script>alert('The UserName has Allready Used')</script>";
echo "<script>location.href='../AddNewUser.php'</script>";
}

else
{
$query ="INSERT INTO 
		user (`name`, `address`, `e-mail`, `username`, `passwourd`, `role`, `activate`, `profilepicture`, `IDBranch`) 
		VALUES ('$Names', '$Address','$email', '$UserName', '$Password','$Role', '$Activate','$ProfilePicture','$Branch')";
 $row="mysql_num_rows($query)";

 mysqli_query($db,$query)or die(mysql_error());
 
 if(mysql_affected_rows()>=1){
	echo "<script>alert('The user Account is successfully created, can now login')</script>";
	echo "<script>location.href='../AddNewUser.php'</script>";

 }else{
	echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      
	<strong>Awesome!</strong>".$UserName."
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	  <span aria-hidden='true'>&times;</span>
	</button>
	</div>";
	echo "<script>location.href='../AddNewUser.php'</script>";

 } }
 ?>
  <?php
$target_dir = "../assets/img/Profile_Uploaded/";
$target_file = $target_dir . basename($_FILES["ProfilePicture"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["ProfilePicture"]["tmp_name"], $target_file);    
?>
