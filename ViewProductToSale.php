<?php
session_start();
?>
<?php
// extract($_POST);
if($_SESSION){

$userid =$_SESSION["Id"];
$IDBranch=$_SESSION["IDBranch"];
$role=$_SESSION["role"];

// include 'Config/config.php';
// include 'Config/config1.php';
include 'Config/connect.php';
include 'feed_ui.php';
$ui = new feed_ui();
$conn = new Database();
$db= $conn->getdbconnect();

// echo "b4 function";
// if(isset($_POST['modal_btn'])){

//     $InvoiceNumber = ($_POST["InvoiceNumber"]);
//     // $IDProduct = ($_POST["IDProduct"]);
//     // $Price = ($_POST["Price"]);
//     // $QuatityInStore = ($_POST["QuatityInStore"]);
//     $Quantity2 = ($_POST["Quantity2"]);
//     $TotalPrice2 = ($_POST["TotalPrice2"]);
//     $AmountPaid = ($_POST["AmountPaid"]);
//     $Balance = ($_POST["Balance"]);
//     $ClientName = ($_POST["ClientName"]);
//     $ClientPhone = ($_POST["ClientPhone"]);
//     $date2 = ($_POST["date2"]);
//     if(!isset($date2)){
//         $date2=date();
//     }

//     echo "in function";
//     if(isset($_POST['checkbox'])){
//         echo "the IDs are in ";
        

//         if(isset($_POST['num_bers'])){
//             echo "numbers are in";
//         }
//  foreach ($contain as $key => $_POST['checkbox']) {
//      echo $contain;
//      # code...
//  }
//         $check=$_POST['checkbox'];
//     echo "in if function";

//         for($i=0;$i<=count($checkbox);$i++){
//     echo "In loop";

//             $arr=explode(",",$checkbox[$i]);
//             echo $arr[$i];
//         }
//     }
// }
if(isset($_POST['modal_btn'])){//to run PHP script on submit
    extract($_POST);
   

    if(!isset($date2)){
        $date2=date();
    }
    if(!empty($check)&&!empty($num_bers)){
    // Loop to store and display values of individual checked checkbox.
    
    foreach($check as $index => $selected){
$from_prod=mysqli_fetch_array(mysqli_query($db,"SELECT * from product where productid='$selected'"));

        
// $query = "INSERT INTO sales (`IDProduct`, `Price`, `QuatityInStore`, `QuantitySold`, `TotalPrice`, `AmountPaid`, `Balance`, `ClientName`, `PhoneNumber`, `SaleDate`, `IDInvoice`, `IDUSer`, `IDBranch`) VALUES ('$IDProduct','$Price','$from_prod['quantity']','$Quantity2','$TotalPrice2','$AmountPaid','$Balance','$ClientName','$ClientPhone','$date2','$InvoiceNumber','$IDUSer', '$IDBranch')"; 
//  $row="mysql_num_rows($query)";
 
 $NewQty=$QuatityInStore-$Quantity2;
 
 $querii= mysqli_query($db,"UPDATE product SET quantity='$NewQty' WHERE productid='$IDProduct'");
 
 mysqli_query($db,$query)or die(mysql_error());
        
//       productid-----------quantity
    echo $selected." ". $num_bers[$index]."<br>";


    }
//quantity
    // foreach($num_bers as $selected){

    //     echo $selected."</br>";
    
    //     }
    }

    }

 
 



?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>| Add Sales</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    function GetSelected() {
        // alert("Anything");
            //Reference the Table.
            var grid = document.getElementByName("modal_table");
            alert("In the function");
            //Reference the CheckBoxes in Table.
            var checkBoxes = grid.getElementsById("check");
            var message = "Id  Name                  Country\n";
            alert("Got them ids");
            //Loop through the CheckBoxes.
            for (var i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    var row = checkBoxes[i].parentNode.parentNode;
                    message += row.cells[3].innerHTML;
                    message += "   " + row.cells[5].innerHTML;
                    message += "   " + row.cells[6].innerHTML;
                    message += "\n";
                }
            }

            //Display selected Row data in Alert Box.
            alert(message);
        }
    </script>
</head>
     <!-- END HEAD -->
     <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="modal_items">
      <!-- Modal form -->
        <form class="form-group" action="ViewProductToSale.php" method="POST">
        <!-- Modal Table -->
        <table class="table table-striped table-bordered table-hover" name="modal_table" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Product Name</th>
                                            <th>Brand Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Buying</th> 
                                            <th>Total</th>
                                      </tr>
                                    </thead>
                                    <tbody>
<?php

// $ui->getPro_ducts();
$sql="SELECT * FROM product ORDER by productid DESC";    

$results=mysqli_query($db,$sql);
// if(count($results)==0){
//     return "Nothing to show for ".$saleDate;
// }


while($row=$results->fetch_assoc())
{
    $chkbx= array($row['productid'],$row['quantity'],$row['price']);
    $val=implode(",",$chkbx);
echo"<tr>
<td><input class='form-control' type='checkbox' id='check' value='".$row['productid']."' name='check[]'/></td>
<td>".$row['product_name'] ."</td>
<td>".$row['brand'] ."</td>
<td>".$row['quantity'] ."</td>
<td>".$row['price'] ."</td>
<td><input type='number' name='num_bers[]'
min='0' max='".$row['quantity']."'></td>
<td><input type='text' name='total[]' size='3' disabled read-only</td>
</tr>";


}
$query= mysqli_query($db,"SELECT MAX(InvoiceNumber) AS max_inv FROM invoice");
      foreach ($query as $invoice) {
        $InvoiceNo=$invoice['max_inv'];
        $InvoiceNo+=1;
 }

?>


                                    </tbody>
       
       </table>
      </div>
      <div class="modal-footer">
      <button class="form-control btn btn-primary" style="position:inherit; width:30%;" onclick="GetSelected()" >
      Next
      </button>
        
</div>
<div id="user_info" style="">

  <div class="form-group row">
                                            <label class="control-label col-lg-4"> Invoice Number</label>

                                                
                                <input type="text" id="InvoiceNumber" name="InvoiceNumber" class="form-control" readonly value="<?php printf("%04d",$InvoiceNo);  ?>" />
                                                           </div>
                               <div class=" form-group row">
                                            <label class="control-label col-lg-4"> Total Price</label>

                                            <div class="col-lg-4">
                                                <input type="text" id="TotalPrice2" name="TotalPrice2" class="form-control" readonly />
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4"> Amount Paid</label>

                                            <div class="col-lg-4">
                                                <input type="text" id="AmountPaid" name="AmountPaid" class="form-control" />
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4"> Balance</label>

                                            <div class="col-lg-4">
                                                <input type="text" id="Balance" name="Balance" class="form-control" readonly />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4">Client Name</label>

                                            <div class="col-lg-4">
                                                <input type="text" id="ClientName" name="ClientName" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4">Client Phone Number</label>

                                            <div class="col-lg-4">
                                            <div class="input-group">
                                                <input type="text" id="ClientPhone" name="ClientPhone" class="form-control" data-mask="+233 999 999 999" placeholder="+233 000 000 000"/>
                                                <!-- <span class="input-group-addon">+233 999 999 999</span> -->
                                            </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-lg-4">Date</label>

                                            <div class="col-lg-4">
                                                <input type="date" id="date2" name="date2" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- <div class="form-actions no-margin-bottom" style="text-align:center;">
                                            <input type="submit" value="Save" class="btn btn-primary btn-lg " />
                                            <a href="Invoice.php? id=<?/*php echo $InvoiceNo;*/ ?>"> <input type="button" value="Invoice" class="btn btn-success btn-lg " /></a>
                                        </div> -->

<input type="Submit" class="btn btn-primary" name="modal_btn">

</div>
        </form>
</div>
      </div>
    </div>
  </div>
</div>


     <!-- BEGIN BODY -->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.html" class="navbar-brand">
                    <img src="assets/img/logo.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">


                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                        
                            <li><a href="UserProfile.php"><i class="icon-user"></i> My Profile </a>
                            </li>
                            <?php
							if($role=="Manager")
								{
								?>
                            <li><a href="Settings.php"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <?php }?>
                            <li class="divider"></li>
                            
                            <li><a href="Execute/ExDestroySession.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->




<!-- MENU SECTION -->
<?php include 'left-side.php'; ?>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Search Product </h2>



                    </div>
                </div>

                <hr />


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details Info about Products
                      </div>
                      <!-- <form class="form-group" action="ViewProductToSale.php" method="POST"> -->
                        <div class="panel-body">
                            <div class="">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Brand Name</th>
                                            <th>Quantity</th>
                                            <th>Wholesale Price</th>
                                            <th>Action</th> 
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
									if($role=="Manager")
								{  
					//$idd=$_SESSION["CName"];       
					$query= mysqli_query($db,"SELECT * FROM product ORDER by productid DESC");
					foreach ($query as $product) {
 	
					?>
                                        <tr class="odd gradeX">
                                        
                                        	<td><?php echo $product['productid'];?></td>
                                            <td><?php echo $product['product_name'];?></td>
                                            <td><?php echo $product['brand'];?></td>
                                            <td class="center"><?php echo $product['quantity'];?></td>
                                            <td>
                                            <?php 

												// $IDProduct=$product['productid'];
                                           		//  $quer= mysqli_query($db,"SELECT DISTINCT Price FROM price where IDProduct='$IDProduct'");
												//  while($i = mysqli_fetch_array($quer))
												// 		{
												// 	$Price=$i['Price'];
												// 	}
											?>
											<?php echo $product['price'];?>
                                            
                                            </td>
                                            <td class="center">
                                            <a href="AddNewSales.php? id=<?php echo $product['productid'];?>">
                                            <button class="btn"><i class=" icon-plus"></i> Sell</button> </a>
                                            </td>
                                        </tr>
                                       
                                    <?php } }
									 
									else
								{  
					//$idd=$_SESSION["CName"];       
					$query= mysqli_query($db,"SELECT * FROM product ORDER by productid DESC");
					foreach ($query as $product) {
 	
					?>
                                        <tr class="odd gradeX">
                                        <td><?php echo $product['productid'];?></td>
                                                <td><?php echo $product['product_name'];?></td>
                                            <td><?php echo $product['brand'];?></td>
                                            <td class="center"><?php echo $product['quantity'];?></td>
                                           <td>
                                            <?php 
												// $IDProduct=$product['productid'];
                                           		//  $quer= mysqli_query($db,"SELECT DISTINCT Price FROM price where IDProduct='$IDProduct'");
												//  while($i = mysqli_fetch_array($quer))
												// 		{
												// 	$Price=$i['Price'];
												// 	}
											?>
										<?php  echo $product['price'];?>
                                            
                                            </td>
                                            <td class="center">
                                            <a href="AddNewSales.php? id=<?php echo $product['productid'];?>">
                                            <button class="btn"><i class=" icon-plus"></i> Sell</button> </a>
                                            </td>
                                        </tr>
                                    <?php } }?>     
                                  </tbody>
                                </table>
                            </div>
                           
                        </div>

                        <div class="" style="position:relative; padding-left:30px">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
  Multiple Sales
</button>
                        </div>
                        
                        
                        <!-- </form> -->
                    </div>
                </div>
            </div>
          

            </div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
   <?php
	include 'Footer.php';
	?>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });

// modal table and form form 

        
    
    </script>
     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
<?php
}
else{
echo "<script>location.href='index.php'</script>";
} ?>