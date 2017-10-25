<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=transaksi-create?">Home</a></li>
  <li class="disabled">Data transaksi</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nomer -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nomer" class="text-right middle">nomer</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nomer" placeholder="nomer" required>
    </div>
  </div>
  <!-- field tanggal_transaksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal_transaksi" class="text-right middle">tanggal transaksi</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tanggal_transaksi" placeholder="tanggal transaksi" required>
    </div>
  </div>
  <!-- field tanggal_ambil -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal_ambil" class="text-right middle">tanggal ambil</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tanggal_ambil" placeholder="tanggal ambil" required>
    </div>
  </div>
  <!-- field diskon -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="diskon" class="text-right middle">diskon</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="diskon" placeholder="diskon" required>
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
  $nomer = $_POST['nomer'];
  $tanggal_transaksi = $_POST['tanggal_transaksi'];
  $tanggal_ambil = $_POST['tanggal_ambil'];
  $diskon = $_POST['diskon'];
  
  $db=new Database();
  $db->insert('transaksi',array('nomer'=>$nomer, 'tanggal_transaksi'=>$tanggal_transaksi,
              'tanggal_ambil'=>$tanggal_ambil, 'diskon'=>$diskon));
  $res=$db->getResult();
  // redirect to list
  header('Location: /laundry2/index.php?module=transaksi');
}
?>