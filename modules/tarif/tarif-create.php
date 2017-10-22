<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=tarif-create?">Home</a></li>
  <li class="disabled">Data tarif</li>
</ul>
</nav>
<form action="" method="post">
  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" required>
    </div>
  </div>
  <!-- field jenis_laundry_id -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="jenis_laundry_id" class="text-right middle">jenis laundry</label>
    </div>
    <div class="small-6 cell">
    <select name="jenis_laundry_id">
    <?php
      $db = new Database();
      $db->select('jenis_laundry','id, nama');
      $res = $db->getResult();
      foreach ($res as &$r){
        echo "<option value=$r[id]>$r[nama]</option>";
      }    
    ?>
    </select>
  </div>
  </div>
  <!-- field harga -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="harga" class="text-right middle">harga</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="harga" placeholder="harga" required>
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
  $jenis_laundry_id = $_POST['jenis_laundry_id'];
  $harga = $_POST['harga'];
  // validation empty
  if(empty($nama)|| empty($jenis_laundry_id)|| empty($harga)){
    if(empty($nama)){
      echo "Nama harus diisi";
    }
    if(empty($jenis_laundry_id)){
      echo "jenis_laundry_id harus diisi";
    }
    if(empty($harga)){
      echo "tarif harus diisi";
    }
    
  } else {
    $db=new Database();
    $db->insert('tarif',array('nama'=>$nama, 'jenis_laundry_id'=>$jenis_laundry_id, 'harga'=>$harga));
    $res=$db->getResult();
    // redirect to list
    header('Location: /laundry2/index.php?module=tarif');
  }
}
?>
</html>
</body>