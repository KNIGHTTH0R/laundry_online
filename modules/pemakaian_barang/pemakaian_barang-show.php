<?php require_once("database.php");
ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=pemakaian_barang?">Home</a></li>
  <li class="disabled">Detail pemakaian_barang</li>
</ul>
<md-dialog style="width: 1200px;">
    <div class="panel-heading" style="background: #33425b;">
        <span class="font-bold"><center><font color="white">DATA pemakaian_barang LAUNDRY</font></center></span>
    </div>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('pemakaian_barang','*','','', "id=$id");
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
      <td>Jumlah :</td>
      <td><?php echo $r['jumlah']; ?></td>
    </tr>
    <tr>
      <td>Barang :</td>
      <td><?php echo $r['barang_id']; ?></td>
    </tr>
    <tr>
      <td>Karyawan :</td>
      <td><?php echo $r['karyawan_id']; ?></td>
    </tr>
    </th>
  </tbody>
</table>
<a href="?module=pemakaian_barang-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</footer>
</div>
<?php }}?>
