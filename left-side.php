 <!-- MENU SECTION -->
 <div id="left" >
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/Profile_Uploaded/<?php echo $_SESSION["profilepicture"] ?>" / style="width:64px; height:64px">
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $_SESSION["name"] ?></h5>
                    <ul class="list-unstyled user-info">
                        
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> <?php echo $_SESSION["role"] ?>
                           
                        </li>
                       
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel">
                    <a href="dashboard.php" >
                        <i class="icon-table"></i> Dashboard
	   
                       
                    </a>                   
                </li>
                 <li class="panel active">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#Product">
                    <i class="icon-list-alt"></i> Stock
	   
       <span class="pull-right">
           <i class="icon-angle-left"></i>
       </span>
         &nbsp; <span class="label label-success">4</span>&nbsp;
   </a>
   <ul class="collapse" id="Product">
       <li class=""><a href="AddNewProduct.php"><i class="icon-angle-right"></i> Add Product </a></li>
       <li class=""><a href="ViewProduct.php"><i class="icon-angle-right"></i> View Product </a></li>
       <li class=""><a href="ViewProductToPurchase.php"><i class="icon-angle-right"></i> Update Stock </a></li>
       <li class=""><a href="ViewPurchase.php"><i class="icon-angle-right"></i> Supplies </a></li>
   </ul>
</li>
<?php
if($role=="Manager")
{
?>
<!-- <li class="panel active">
   <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#Purchase">
       <i class="icon-pencil"></i> Purchase

       <span class="pull-right">
           <i class="icon-angle-left"></i>
       </span>
         &nbsp; <span class="label label-warning">2</span>&nbsp;
   </a>
   <ul class="in" id="Purchase">
       
      
   </ul>
</li> -->
				<?php } ?>
                <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#Sales">
                        <i class="icon-shopping-cart"></i> Sales
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                          &nbsp; <span class="label label-info">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="Sales">
                        <li><a href="ViewProductToSale.php"><i class="icon-angle-right"></i> Add Sales </a></li>
                        <li><a href="ViewSales.php"><i class="icon-angle-right"></i> View Sales </a></li>
                    </ul>
                </li>
                
               
                

                <li><a href="ViewInvoice.php"><i class="icon-list "></i> Invoice </a></li>
                <li><a href="gallery.php"><i class="icon-picture"></i> Gallery </a></li>
				<?php
				if($role=="Manager")
				{
				?>
                <li><a href="Settings.php"><i class="icon-cogs"></i> Settings </a></li>
                
                 <li class="panel">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#Users">
                        <i class="icon-user"></i> Users
	   
                        <span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                         &nbsp; <span class="label label-success">2</span>&nbsp;
                    </a>
                    <ul class="collapse" id="Users">
                       
                        <li><a href="AddNewUser.php"><i class="icon-angle-right"></i> Add User  </a></li>
                        <li><a href="ViewUser.php"><i class="icon-angle-right"></i> View User  </a></li>
                    </ul>
                </li>
                <?php } ?>
                <li><a href="Execute/ExDestroySession.php"><i class="icon-signin"></i> Switch Users </a></li>

            </ul>

        </div>
        <!--END MENU SECTION -->