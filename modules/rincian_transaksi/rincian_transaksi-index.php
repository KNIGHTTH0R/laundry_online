<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data pemakaian rincian_transaksi</li>
</ul>
</nav>
  <a href="?module=rincian_transaksi-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>Jumlah </th>
          <th>Transaksi </th> 
          <th>Tarif </th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('rincian_transaksi', 'rincian_transaksi.id, rincian_transaksi.jumlah,
  rincian_transaksi.transaksi_id, rincian_transaksi.tarif_id, 
  transaksi.nomer, tarif.harga as tarif', 
  'transaksi ON transaksi.id = rincian_transaksi.transaksi_id', 
  'tarif ON tarif.id = rincian_transaksi.tarif_id');

  $res=$db->getResult();
//   print_r($res);
    if(count($res) == 0){
        echo "<b>Tidak ada data yang tersedia</b>";
    }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['jumlah'] ?></td>
            <td><?php echo $r['nomer'] ?></td>
            <td><?php echo $r['tarif'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=rincian_transaksi-show&id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=rincian_transaksi-edit&id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=rincian_transaksi-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>