<?php require_once("database.php");
ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pembelian?">Home</a></li>
  <li class="disabled">Detail pembelian</li>
</ul>
<md-dialog style="width: 1200px;">
    <div class="panel-heading" style="background: #33425b;">
        <span class="font-bold"><center><font color="white">DATA pembelian LAUNDRY</font></center></span>
    </div>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('pembelian','*','','', "id=$id");
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
      <td>Nomer :</td>
      <td><?php echo $r['nomer']; ?></td>
    </tr>
    <tr>
      <td>Tanggal :</td>
      <td><?php echo $r['tanggal']; ?></td>
    </tr>
    <tr>
      <td>Total :</td>
      <td><?php echo $r['total']; ?></td>
    </tr>
    <tr>
      <td>Karyawan :</td>
      <td><?php echo $r['karyawan']; ?></td>
    </tr>
    <tr>
      <td>Supplier :</td>
      <td><?php echo $r['supplier']; ?></td>
    </tr>
    </th>
  </tbody>
</table>
<a href="?module=pembelian-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</footer>
</div>
<?php }}?>
