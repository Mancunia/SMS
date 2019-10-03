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

 $ProductName = ($_POST["ProductName"]);
 $BrandName = ($_POST["BrandName"]);
 $ProductPrice = ($_POST["ProductPrice"]);
//  $Quantity = ($_POST["Quantity"]);
//  $TotalPrice = ($_POST["TotalPrice"]);
//  $DisplaySize = ($_POST["DisplaySize"]);
//  $OperatingSystem = ($_POST["OperatingSystem"]);
//  $Processor = ($_POST["Processor"]);
//  $InternalMemory = ($_POST["InternalMemory"]);
//  $RAM = ($_POST["RAM"]);
// //  $CameraDescription = ($_POST["CameraDescription"]);
// //  $BatteryLife = ($_POST["BatteryLife"]);
//  $Weight = ($_POST["Weight"]);
//  $Model = ($_POST["Model"]);
//  $Dimension = ($_POST["Dimension"]);
//  $ASIN = ($_POST["ASIN"]);
 $date2 = ($_POST["date2"]);
 $Description = ($_POST["Description"]);
 $ProductImage = ($_FILES["ProductImage"]["name"]);
 $IDUSer = ($_SESSION["Id"]);
 $IDBranch = ($_SESSION["IDBranch"]);
 
 $status = "Available";
 $is_there=mysqli_query($db,"SELECT * From product WHERE product_name='$ProductName'");
 if(mysqli_num_rows($is_there)>=1){
	echo "<script>alert('A product already has this name')</script>";
	echo "<script>location.href='../AddNewProduct.php'</script>";
 }


$query ="INSERT INTO 
		product(`product_name`, `brand`, `price`, `description`, `flaturedimage`, `status`, `date`, `IDUser`, `IDBranch`) 
		VALUES ('$ProductName', '$BrandName','$ProductPrice', '$Description', '$ProductImage','$status','$date2','$IDUSer','$IDBranch')";
 $row="mysql_num_rows($query)";

 $done=mysqli_query($db,$query)or die(mysql_error());
// $last_id="";
//  $res=mysqli_query($db,"SELECT LAST_INSERT_ID() From product");
//  if(mysqli_num_rows($res)==1){
//  $row = mysqli_fetch_assoc($res);
//  $last_id=$row['productid'];
 
//  }
if(isset($done)){

	echo "<script>alert('the product is successfully added')</script>";
	echo "<script>location.href='../AddNewProduct.php'</script>";
}
	else {
		echo "<script>alert('the product was not successfully added')</script>";
		# code...
	}

 ?>
  <?php
$target_dir = "../assets/img/Product_Uploaded/";
$target_file = $target_dir . basename($_FILES["ProductImage"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["ProductImage"]["tmp_name"], $target_file);   


?>
