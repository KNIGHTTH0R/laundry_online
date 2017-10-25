<?php require_once("database.php");
ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian_transaksi?">Home</a></li>
  <li class="disabled">Detail rincian_transaksi</li>
</ul>
<md-dialog style="width: 1200px;">
    <div class="panel-heading" style="background: #33425b;">
        <span class="font-bold"><center><font color="white">DATA rincian_transaksi LAUNDRY</font></center></span>
    </div>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('rincian_transaksi','*','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){ ?>
  <table>
    <tbody>
      <tr>
        <td>Data yang anda cari tidak ada atau terhapus</td>
      </tr>
    </tbody>
  </table>
<?php }else{
  foreach ($res as &$r){ 
?>
<table>
  <tbody>
  <th>
    <tr>
      <td>jumlah :</td>
      <td><?php echo $r['jumlah']; ?></td>
    </tr>
    <tr>
      <td>Transaksi :</td>
      <td><?php echo $r['transaksi']; ?></td>
    </tr>
    <tr>
      <td>Tarif :</td>
      <td><?php echo $r['tarif']; ?></td>
    </tr>
    </th>
  </tbody>
</table>
<a href="?module=rincian_transaksi-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</footer>
</div>
<?php }}?>
