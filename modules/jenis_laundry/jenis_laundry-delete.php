<?php
require_once('database.php');
$db=new Database();
$id = $_GET['id'];

$db->delete('jenis_laundry',"id=$id");
$res = $db->getResult();
  if($res){
    header('Location: /laundry2/index.php?module=jenis_laundry');
   }else{
    echo "Upss Something wrong..";
   }
  
?>