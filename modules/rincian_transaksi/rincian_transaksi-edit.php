<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('rincian_transaksi','*','','',"id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=rincian_transaksi-edit?">Home</a></li>
  <li class="disabled">Data Pemakaian transaksi</li>
</ul>
</nav>
<form action="" method="post">

  <!-- field jumlah -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jumlah" class="text-right middle">Jumlah</label>
    </div>
    <div class="small-6 cell">
    <input type="hidden" name="id" value="<?php echo $r['id']; ?>">    
      <input type="text" name="jumlah" placeholder="jumlah" value="<?php echo $r['jumlah']; ?>" required>
    </div>
  </div>

  <!-- field transaksi_id -->
  <div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="transaksi_id" class="text-right middle">Transaksi </label>
  </div>
  <div class="small-6 cell">
      <select name="transaksi_id">
      <?php
        $db = new Database();
        $db->select('transaksi','id, nomer');
        $transaksis = $db->getResult();
        foreach ($transaksis as &$transaksi){ 
          $selected =$r['transaksi_id'] == $transaksi['id'] ? 'selected' : '';
            echo "<option value=$transaksi[id]  $selected > $transaksi[nomer] </option>";
        }?>
      </select>
</div>
</div>



  <!-- field tarif_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="tarif_id" class="text-right middle">Tarif </label>
    </div>
    <div class="small-6 cell">
      <select name="tarif_id">
      <?php
        $db = new Database();
        $db->select('tarif','id, harga');
        $tarifs = $db->getResult();
        foreach ($tarifs as &$tarif){ 
          $selected =$r['tarif_id'] == $tarif['id'] ? 'selected' : '';
            echo "<option value=$tarif[id]  $selected > $tarif[harga] </option>";
        }?>
      </select>
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
   }
}
?>
<?php
// check action submit
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $jumlah = $_POST['jumlah'];
  $transaksi_id = $_POST['transaksi_id'];
  $tarif_id = $_POST['tarif_id'];
  $db = new Database();
  $db->update('rincian_transaksi',array(
    'jumlah'=>$jumlah,
    'transaksi_id'=>$transaksi_id,
    'tarif_id'=>$tarif_id,
  ),
    "id=$id"
  );
  $res = $db->getResult();
//   print_r($res);
  header('Location: /laundry2/index.php?module=rincian_transaksi');
}

?>