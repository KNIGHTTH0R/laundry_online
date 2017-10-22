<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data Rincian Transaksi</li>
</ul>
</nav>
  <a href="?module=rincian_transaksi-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>ID</th>
          <th>Jumlah</th>
          <th>Transaksi</th>
          <th>Tarif</th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('rincian_transaksi', 'id, jumlah, transaksi_id, tarif_id');
  $res=$db->getResult();
    if(count($res) == 0){
        echo "<b>Tidak ada data yang tersedia</b>";
    }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['id'] ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            <td><?php echo $r['transaksi_id'] ?></td>
            <td><?php echo $r['tarif_id'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=rincian_transaksi-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=rincian_transaksi-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=rincian_transaksi-delete?id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>