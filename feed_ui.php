<?php
// include 'Config/connect.php';
// $conn = new Database();
// $db= $conn->getdbconnect();

class feed_ui{
    //Get products
    function getPro_ducts(){
   $sql="SELECT * FROM product ORDER by productid DESC";    

$results=mysqli_query($db,$sql);
// if(count($results)==0){
//     return "Nothing to show for ".$saleDate;
// }


while($row=$results->fetch_assoc())
{
echo"<tr>
<td><input class='form-control' type='checkbox' value=".$row['productid']."name='check[]'/></td>
<td>".$row['product_name'] ."</td>
<td>".$row['brand'] ."</td>
<td>".$row['quantity'] ."</td>
<td>".$row['price'] ."</td>
<td><input type='number' name='num_ber[]'/></td>

</tr>";


}
    }
}


?>