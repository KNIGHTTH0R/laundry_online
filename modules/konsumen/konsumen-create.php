<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=konsumen-create?">Home</a></li>
  <li class="disabled">Data Konsumen</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field kode -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">KODE</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="kode" placeholder="kode" required>
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
  $kode = $_POST['kode'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  // validation empty
  if(empty($kode) || empty($nama)|| empty($alamat)){
    if(empty($kode)){
      echo "KODE harus diisi";
    }
    if(empty($nama)){
      echo "Nama harus diisi";
    }
    if(empty($alamat)){
      echo "Alamat harus diisi";
    }
  } else {
    $db=new Database();
    $db->insert('konsumen',array('kode'=>$kode, 'nama'=>$nama, 'alamat'=>$alamat));
    $res=$db->getResult();
    // redirect to list
    header('Location: /laundry2/index.php?module=konsumen');
  }
}
?>
</html>
</body>