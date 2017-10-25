<?php require_once("database.php");
ob_start();
?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=karyawan?">Home</a></li>
  <li class="disabled">Detail karyawan</li>
</ul>
<md-dialog style="width: 1200px;">
    <div class="panel-heading" style="background: #33425b;">
        <span class="font-bold"><center><font color="white">DATA KARYAWAN LAUNDRY</font></center></span>
    </div>
</nav>
<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('karyawan','*','','', "id=$id");
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
      <td>NIK :</td>
      <td><?php echo $r['nik']; ?></td>
    </tr>
    <tr>
      <td>Nama :</td>
      <td><?php echo $r['nama']; ?></td>
    </tr>
    <tr>
      <td>Alamat :</td>
      <td><?php echo $r['alamat']; ?></td>
    </tr>
    <tr>
      <td>Telphone :</td>
      <td><?php echo $r['telp']; ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin :</td>
      <td><?php echo $r['gender']; ?></td>
    </tr>
    </th>
  </tbody>
</table>
<a href="?module=karyawan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
<a class="button" href='javascript:self.history.back();'>Kembali</a>
</footer>
</div>
<?php }}?>