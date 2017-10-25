<?php require_once("database.php");

ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=barang?">Home</a></li>
  <li class="disabled">Detail barang</li>
</ul>
<md-dialog style="width: 1200px;">
    <div class="panel-heading" style="background: #33425b;">
        <span class="font-bold"><center><font color="white">DATA BARANG LAUNDRY</font></center></span>
    </div>

</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('barang','*','','', "id=$id");
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
      <td>Kode :</td>
      <td><?php echo $r['kode']; ?></td>
    </tr>
    <tr>
      <td>Nama :</td>
      <td><?php echo $r['nama']; ?></td>
    </tr>
    <tr>
      <td>Stok :</td>
      <td><?php echo $r['stok']; ?></td>
    </tr>
    <tr>
      <td>Tanggal :</td>
      <td><?php echo $r['tanggal_update_stok']; ?></td>
    </tr>
    </th>
  </tbody>
</table>
<a href="?module=barang-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>