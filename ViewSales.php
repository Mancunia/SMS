<?php
session_start();
?>
<?php
if($_SESSION){

$userid =$_SESSION["Id"];
$IDBranch=$_SESSION["IDBranch"];
$role=$_SESSION["role"];

// include 'Config/config.php';
// include 'Config/config1.php';
include 'Config/connect.php';
include 'feed_ui.php';
$ui= new feed_ui();
$conn = new Database();
$db= $conn->getdbconnect();

if(isset($_POST['search_btn'])){

    $search= $_POST['search'];
    
}

else{
    $search="";
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title> | View Sales</title>
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
    
</head>
     <!-- END HEAD -->
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
                    <img src="assets/img/home.png" alt="" /></a>
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


        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
                <div class="row">
                    <div class="col-lg-12">


                        <h2> Sold Product </h2>



                    </div>
                </div>

                <hr />

<form action="ViewSales.php" method="POST">
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Details Info about sold Products
                      </div>
                      <!-- <div class="">
                      <label>Order by Date:</label>
                      <input type="date" class="form-control" data-date-format="YYYY MMMM DD" name="search">
                     <input type="submit" class="btn btn-succes" name="search_btn" onclick="table_toggle()">
                     
                    
                      </div> -->
                        <div class="panel-body">
                            <div class="table-responsive" id="result_st">
                                <table style="display=none;" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>

                                            <th>Product Name</th>
                                             <th>Qty</th>
                                            <th>Price</th>
                                            <th>T.Price</th>
                                            <th>A.Paid</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            
                                            <th>Date</th>
                                            <th>Inv No</th>
                                            <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
									<?php
				if($role=="Manager")
				{
				  
					//$idd=$_SESSION["CName"];       
					$query= mysqli_query($db,"SELECT * FROM  sales ORDER by salesid DESC");
					foreach ($query as $product) {
 	
					?>
                                        <tr class="odd gradeX">
                                        	
                                           <td>
                                            <?php 
												$IDProduct=$product['IDProduct'];
                                           		 $quer= mysqli_query($db,"SELECT DISTINCT product_name FROM product where productid='$IDProduct'");
												 while($i = mysqli_fetch_array($quer))
														{
													$product_name=$i['product_name'];
													}
											?>
											<?php echo $product_name;?>
                                            
                                            </td> 
                                            <td><?php echo $product['QuantitySold'];?></td>
                                            <td><?php echo $product['Price'];?></td>
                                            <td><?php echo $product['TotalPrice'];?></td>
                                            <td><?php echo $product['AmountPaid'];?></td>
                                            <td><?php echo $product['ClientName'];?></td>
                                            <td><?php echo $product['PhoneNumber'];?></td>
                                            <td class="center"><?php echo $product['SaleDate'];?></td>
                                            <td class="center"><?php echo $product['IDInvoice'];?></td>
                                            
                                            <td class="center">
                                            <a href="AddNewPurchase.php? id=<?php echo $product['purchaseid'];?>">
                                            <button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button> </a>
                                            
                                            <a href="AddNewPurchase.php? id=<?php echo $product['purchaseid'];?>">
                                            <button class="btn btn-danger"><i class="icon-remove icon-white"></i></button> </a>
                                            
                                            </td>
                                        </tr>
                                    <?php }} 
									
										
				else
				{
				   
					//$idd=$_SESSION["CName"];       
					$query= mysqli_query($db,"SELECT * FROM  sales ORDER by salesid DESC");
					foreach ($query as $product) {
 	
					?>
                                        <tr class="odd gradeX">
                                        	
                                           <td>
                                            <?php 
												$IDProduct=$product['IDProduct'];
                                           		 $quer= mysqli_query($db,"SELECT DISTINCT product_name FROM product where productid='$IDProduct'");
												 while($i = mysqli_fetch_array($quer))
														{
													$product_name=$i['product_name'];
													}
											?>
											<?php echo $product_name;?>
                                            
                                            </td> 
                                            <td><?php echo $product['QuantitySold'];?></td>
                                            <td><?php echo $product['Price'];?></td>
                                            <td><?php echo $product['TotalPrice'];?></td>
                                            <td><?php echo $product['AmountPaid'];?></td>
                                            <td><?php echo $product['ClientName'];?></td>
                                            <td><?php echo $product['PhoneNumber'];?></td>
                                            <td class="center"><?php echo $product['SaleDate'];?></td>
                                            <td class="center"><?php echo $product['IDInvoice'];?></td>
                                            
                                            <td class="center">
                                            <a href="AddNewPurchase.php? id=<?php echo $product['purchaseid'];?>">
                                            <button class="btn btn-primary"><i class="icon-pencil icon-white"></i></button> </a>
                                            
                                            <a href="AddNewPurchase.php? id=<?php echo $product['purchaseid'];?>">
                                            <button class="btn btn-danger"><i class="icon-remove icon-white"></i></button> </a>
                                            
                                            </td>
                                        </tr>
                                    <?php }} ?> 
									  
                                  </tbody>
                                  </div>
                                   </table>
                                  <!--search results-->
                                  <!-- <div class="table-responsive" id="result_sr" style="display:none;">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>

                                            <th>Product Name</th>
                                             <th>Qty</th>
                                            <th>Price</th>
                                            <th>T.Price</th>
                                            <th>A.Paid</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            
                                            <th>Date</th>
                                            <th>Inv No</th>
                                            <th>Action</th>
                                      </tr>
                                    </thead>
                                  <tbody>
                                  <?php
                                  /*$ui->getSalesbyDate($db,$search);*/
                                  ?>
                                  </tbody>
                                  </table>
                                  </div> -->
                               
                                </form>


                            </div>
                           
                        </div>
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
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>

    <!-- JS for handling table-->
<script>

function table_toggle(){

    var here= document.getElementById('result_st');
    var coming = document.getElementById('result_sr');
    
    if(coming.style.display==="none"){
        console.log('in the function');
        here.style.display="none";
        coming.style.display="block";
        console.log('End of the function');
    }
}

// var today= new Date();
//  function the_time(){
     
//  }


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