<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data transaksi</li>
</ul>
</nav>
  <a href="?module=transaksi-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>nomer</th>
          <th>tanggal transaksi</th>
          <th>tanggal ambil</th>
          <th>diskon</th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('transaksi', 'id, nomer, tanggal_transaksi, tanggal_ambil, diskon');
  $res=$db->getResult();
    if(count($res) == 0){
        echo "<b>Tidak ada data yang tersedia</b>";
    }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['nomer'] ?></td>
            <td><?php echo $r['tanggal_transaksi'] ?></td>
            <td><?php echo $r['tanggal_ambil'] ?></td>
            <td><?php echo $r['diskon'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=transaksi-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=transaksi-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=transaksi-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>