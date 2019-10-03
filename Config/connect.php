<?php

class Database{
  
    // specify your own database credentials
    // private $host = "localhost"; 
    // private $db_name = "mydb";
    // private $username = "root";
    // private $password = "";
    // public $conn;


    function getdbconnect(){

      $conn = mysqli_connect("localhost","root","","hellophones") or die("<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      
      <strong>OOPS!</strong> You are not connected.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>");
     

    return $conn;
  }

  // function getdbconnect(){
  //   $conn = mysqli_connect("localhost:3306","root","","id10897322_hellophones") or die("<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      
  //   <strong>OOPS!</strong> You are not connected.
  //   <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  //     <span aria-hidden='true'>&times;</span>
  //   </button>
  //   </div>");
  //   if(!$conn){
  //     getdboffline();
  //   }
  //   return $conn;
  // }
}
?>