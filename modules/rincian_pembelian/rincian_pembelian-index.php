<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data Rincian Pembelian</li>
</ul>
</nav>
  <a href="?module=rincian_pembelian-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>Nomer</th>
          <th>Jumlah</th>
          <th>Barang</th>
          <th>Pembelian</th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('rincian_pembelian', 'id, nomer, jumlah, barang_id, pembelian_id');
  $res=$db->getResult();
    if(count($res) == 0){
        echo "<b>Tidak ada data yang tersedia</b>";
    }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['nomer'] ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            <td><?php echo $r['barang_id'] ?></td>
            <td><?php echo $r['pembelian_id'] ?></td>
            <td><?php echo $r['gender'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=rincian_pembelian-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=rincian_pembelian-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=rincian_pembelian-delete?id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>