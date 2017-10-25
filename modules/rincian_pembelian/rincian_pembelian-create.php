session_start();
ob_start();
<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=karyawan-create?">Home</a></li>
  <li class="disabled">Data Karyawan</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nik -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nik" class="text-right middle">NIK</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nik" placeholder="NIK" required>
    </div>
  </div>
  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" required>
    </div>
  </div>
  <!-- field alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="alamat" placeholder="Alamat" required>
    </div>
  </div>
  <!-- field telp -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="telp" class="text-right middle">Telphone</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="telp" placeholder="Telphone" required>
    </div>
  </div>
  <!-- field gender -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="gender" class="text-right middle">Gender</label>
    </div>
    <div class="small-6 cell">    
      <input type="radio" name="gender" value="L" placeholder="Gender" required>L
      <input type="radio" name="gender" value="P" placeholder="Gender" required>P
    </div>
  </div>
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
		<div class="small button-group">
  <button class="button" type="submit" name="submit">Simpan</button>
  <button class="button" type="reset">Reset</button>
  <a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
    </div>
  </div>
</form>
<?php 
require_once("database.php");

// check action submit
if(isset($_POST['submit'])){
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $gender = $_POST['gender'];
  
  $db=new Database();
  $db->insert('karyawan',array('nik'=>$nik, 'nama'=>$nama, 'alamat'=>$alamat, 'telp'=>$telp, 'gender'=>$gender));
  $res=$db->getResult();
  // redirect to list
  header('Location: /laundry2/index.php?module=karyawan');
}
?>