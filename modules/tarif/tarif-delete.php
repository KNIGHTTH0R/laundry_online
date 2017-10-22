<?php
require_once('database.php');
$db=new Database();
  $id = $_GET['id'];

  $queryhapus = mysqli_query($db, "DELETE FROM 11_deaamaliaputri_laundry WHERE id = $id");
  $res =$db->getResult();
  if($res){
    header('location: index.php');
   }else{
    echo "Upss Something wrong..";
   }
  
?>