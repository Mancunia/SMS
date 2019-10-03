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
// include 'feed_ui.php';
$conn = new Database();
$db= $conn->getdbconnect();
// $ui =new feed_ui();

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    <title>OSMS | Dashboard </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="assets/css/layout2.css" rel="stylesheet" />
       <link href="assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="assets/plugins/timeline/timeline.css" />
           <script src="assets/plugins/jquery-2.0.3.min.js"></script>
    <!-- END PAGE LEVEL  STYLES -->
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      
      
    <![endif]-->
    
    <script   type="text/javascript">
$(document).ready(function()
{

	$('#scr').animate({ 
	scrollTop: $("#scr").prop("scrollHeight")}, 0
	);
	
$("#sentbtn").click(function()
{
var message = $("#sms").val();
var userid = <?php echo $userid?>;
var data = 'sms='+message+'&userid='+userid;
$.ajax(
{
type:'POST',
url:'insertmessage.php',
data:data,

success:function(data)
{
$("#dispaly").append(data);
}

});
});
});
</script>
</head>

    <!-- END HEAD -->

    <!--Modal -->
    

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header btn-warning">
        <h5 class="modal-title" id="exampleModalCenterTitle">SELL SOMETHING</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" class="form-group" method="POST">
        <select class="form-control" name="item">
        <?php 
     //$ui->getproducts($db);

        ?>
        </select>
<select class="form-control" name="model">

</select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="dashboard.php" class="navbar-brand">
                    <img src="assets/img/home.png" alt="" />
                        
                        </a>
                </header>
                
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                    <!--ADMIN SETTINGS SECTIONS -->
                    <br><br>
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
             
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Dashboard </h1>
                    </div>
                </div>
                  <hr />
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
                        <div style="text-align: center;">
                        <?PHP
						
                        		$product=0;  
								if($role=="Manager")
								{ 
								//$product=0;  
								$query= mysqli_query($db,"SELECT * FROM product");
								foreach ($query as $b)
								{ 
				
								$product++; 
 								}
								}
								else
								{
								// $product=0;  
								$query= mysqli_query($db,"SELECT * FROM product WHERE IDBranch='$IDBranch' ");
								foreach ($query as $b)
								{ 
								$product++; 
 								
								}
								}
								?>
                           
                            <a class="quick-btn" href="#">
                                <i class="icon-check icon-2x"></i>
                                <span> Products</span>
                                <span class="label label-danger"><?php echo  $product; ?></span>
                            </a>

                            <a class="quick-btn" href="#">
                                <i class="icon-envelope icon-2x"></i>
                                <span>Messages</span>
                                <span class="label label-success">456</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-signal icon-2x"></i>
                                <span>Profit</span>
                                <span class="label label-warning">+25</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-external-link icon-2x"></i>
                                <span>value</span>
                                <span class="label btn-metis-2">3.14159265</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-lemon icon-2x"></i>
                                <span>tasks</span>
                                <span class="label btn-metis-4">107</span>
                            </a>
                            <a class="quick-btn" href="#">
                                <i class="icon-bolt icon-2x"></i>
                                <span>Tickets</span>
                                <span class="label label-default">20</span>
                            </a>

                            
                            
                        </div>

                    </div>

                </div>
                  <!--END BLOCK SECTION -->
                <hr />
                   <!-- CHART & CHAT  SECTION -->
                 
                 <!--END CHAT & CHAT SECTION -->
                 <!-- COMMENT AND NOTIFICATION  SECTION -->
                <div class="row">
                    <div class="col-lg-7" style="width:100%">

                        <div  id="scr" class="chat-panel panel panel-success">
                            <div class="panel-heading">
                                <i class="icon-comments"></i>
                                New Messages
                            
                            </div>

                            <div id="dispaly" class="panel-body">
                            </div>
                            

                            <div class="panel-footer">
                                <div class="input-group">
                                
                                    <input id="sms" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                    <span class="input-group-btn">
                                        <button type="submit"class="btn btn-success btn-sm" id="sentbtn">
                                            Send
                                        </button>
                                    </span>
                                    
                                </div>
                            </div>

                        </div>


                    </div>
                    
                </div>
                <!-- END COMMENT AND NOTIFICATION  SECTION -->
                

                

                 <!--  STACKING CHART  SECTION   -->
                
                 <!--END STACKING CHART SCETION  -->

                

                
            </div>

        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
        <div id="right">

            
            <div class="well well-small">
                <ul class="list-unstyled">
                    <li>Visitor &nbsp; : <span>23,000</span></li>
                    <li>Users &nbsp; : <span>53,000</span></li>
                    <li>Registrations &nbsp; : <span>3,000</span></li>
                </ul>
            </div>
            <div class="well well-small">
                <a href="AddNewProduct.php" style="padding:2px"> <button class="btn btn-primary btn-block"> Add Product</button> </a>
                <a href="ViewProductToSale.php" style="padding:2px"><button class="btn btn-info btn-block">Sale </button></a>
                <?php
				if($role=="Manager")
				{
				?>
                <a href="ViewProductToPurchase.php" style="padding:2px"><button class="btn btn-success btn-block"> Purchase </button></a>
               <a href="AddNewUser.php" style="padding:2px"> <button class="btn btn-danger btn-block"> Add User </button></a>
                <!-- <a href="Settings.php" style="padding:2px"><button class="btn btn-warning btn-block"> Setting </button></a>
                Button trigger modal -->
<a style="padding:2px" ><button class="btn btn-warning btn-block" data-toggle="modal" data-target="#exampleModalCenter">
  Sell something
</button></a>
                <?php } ?>
            </div>

        </div>
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    <!--END MAIN WRAPPER -->

    <!-- FOOTER -->
   
    <?php
	include 'Footer.php';
	?>
    
    <!--END FOOTER -->


    <!-- GLOBAL SCRIPTS -->

     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="assets/plugins/flot/jquery.flot.js"></script>
    <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
    <script src="assets/plugins/flot/jquery.flot.time.js"></script>
     <script  src="assets/plugins/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/for_index.js"></script>
   
    <!-- END PAGE LEVEL SCRIPTS -->


</body>

    <!-- END BODY -->
</html>
<?php
}
else{
// echo "<script>location.href='index.php'</script>";
header('Location:index.php');
} ?>
