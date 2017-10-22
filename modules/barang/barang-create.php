<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=barang-create?">Home</a></li>
  <li class="disabled">Data Barang</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field kode -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="kode" class="text-right middle">KODE</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="kode" placeholder="KODE" required>
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
  <!-- field stok -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="stok" class="text-right middle">stok</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="stok" placeholder="stok" required>
    </div>
  </div>
  <!-- field tanggal_update_stok -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal_update_stok" class="text-right middle">Tanggal Update Stok</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tanggal_update_stok" placeholder="Tanggal Update Stok" required>
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
  $stok = $_POST['stok'];
  $tanggal_update_stok = $_POST['tanggal_update_stok'];
  // validation empty
  if(empty($kode) || empty($nama)|| empty($stok)|| empty($tanggal_update_stok)){
    if(empty($kode)){
      echo "kode harus diisi";
    }
    if(empty($nama)){
      echo "Nama harus diisi";
    }
    if(empty($stok)){
      echo "stok harus diisi";
    }
    if(empty($tanggal_update_stok)){
      echo "tanggal_update_stok harus diisi";
    }
  } else {
    $db=new Database();
    $db->insert('barang',array('kode'=>$kode, 'nama'=>$nama, 'stok'=>$stok, 'tanggal_update_stok'=>$tanggal_update_stok));
    $res=$db->getResult();
    // redirect to list
    header('Location: /laundry2/index.php?module=barang');
  }
}
?>
</html>
</body>