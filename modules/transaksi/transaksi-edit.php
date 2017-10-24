<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('transaksi','*','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=transaksi-edit?">Home</a></li>
  <li class="disabled">Data Edit transaksi</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nomer -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nomer" class="text-right middle">nomer</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nomer" placeholder="nomer" value="<?php echo $r['nomer']; ?>" required>
    </div>
  </div>
  <!-- field tanggal transaksi-->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="tanggal_transaksi" class="text-right middle">tanggal transaksi</label>
  </div>
  <div class="small-6 cell">
    <input type="date" name="tanggal_transaksi" placeholder="tanggal transaksi" value="<?php echo $r['tanggal_transaksi']; ?>" required>
  </div>
</div>
<!-- field tanggal ambil -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal_ambil" class="text-right middle">tanggal ambil</label>
    </div>
    <div class="small-6 cell">
      <input type="date" name="tanggal_ambil" placeholder="tanggal ambil" value="<?php echo $r['tanggal_ambil']; ?>" required>
    </div>
  </div>
  <!-- field diskon -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="diskon" class="text-right middle">diskon</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="diskon" placeholder="diskon" value="<?php echo $r['diskon']; ?>" required>
    </div>
  </div>
  
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tanggal_transaksi" class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
		<div class="small button-group">
  <button class="button" type="submit" name="submit">Simpan</button>
  <a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
    </div>
  </div>
</form>
<?php
              }
          }
          ?>
<?php 
// check action submit
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $nomer = $_POST['nomer'];
  $tanggal_transaksi = $_POST['tanggal_transaksi'];
  $tanggal_ambil = $_POST['tanggal_ambil'];
  $diskon = $_POST['diskon'];
  $db = new Database();
  $db->update('transaksi',array(
    'nomer'=>$nomer,
    'tanggal_transaksi'=>$tanggal_transaksi,
    'tanggal_ambil'=>$tanggal_ambil,
    'diskon'=>$diskon,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  // print_r($res);
  header('Location: /laundry2/index.php?module=transaksi');
}

?>