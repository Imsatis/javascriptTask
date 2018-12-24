<?php

$count=0;$count++;

$conn = new mysqli('localhost','root','','userdata');


if($conn->connect_error) {
    
    die("Connection Failed");
}
//echo $_GET['run'];

if(isset($_GET['run'])) {

if($_GET['run'] =='getName') {

$SELECT = "SELECT * FROM USER";

$result  = $conn->query($SELECT);

if($result->num_rows > 0) {

   while($row = $result->fetch_assoc()) {
    echo "<li onclick='read(".$row['id'].")'>".$row['name']."</li><div id='user".$row['id']."'></div>";   
   }
 }
}


if($_GET['run'] =='getdetail') {
    
  $QUERY = "SELECT * FROM USER WHERE id = ".$_GET['id'];
  //echo $QUERY;

  $result = $conn->query($QUERY);

  if($result->num_rows>0) {
      while($row = $result->fetch_assoc()) {
          echo "<b>Username: ".$row['username']."<b><br>";
          echo "<b>email: ".$row['email']."</b>";
      }
  }
}
}
//echo $count++;

?>