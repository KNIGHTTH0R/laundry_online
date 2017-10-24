<?php
require_once('database.php');
$db=new Database();
$id = $_GET['id'];

$db->delete('barang',"id=$id");
$res = $db->getResult();
  if($res){
    header('Location: /laundry2/index.php?module=barang');
   }else{
    echo "Upss Something wrong..";
   }
  
?>