<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li><a href="?module=home">Home</a></li>
  <li class="disabled">Data tarif</li>
</ul>
</nav>
  <a href="?module=tarif-create" class="small button">Create</a>
<table>
  <thead>
      <tr>
          <th>Nama</th>
          <th>Jenis Laundry</th>
          <th>Tarif</th>
          <th>Aksi</th>
      </tr>
  </thead>
<?php
  require_once("database.php");
  $db=new Database();
  $db->select('tarif', 'id, nama, jenis_laundry_id, harga');
  $res=$db->getResult();
    if(count($res) == 0){
        echo "<b>Tidak ada data yang tersedia</b>";
    }else{
        foreach ($res as &$r){?>
        <tr>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['jenis_laundry_id'] ?></td>
            <td><?php echo $r['tarif'] ?></td>
            <td>
                <div class="small button-group">
                    <a href="?module=tarif-show?id=<?php echo $r['id']; ?>" class=" button">View</a>
                    <a href="?module=tarif-edit?id=<?php echo $r['id']; ?>" class="secondary button">Edit</a>
                    <a href="?module=tarif-delete?id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert button">Delete</a>
                </div>
            </td>
        </tr>
<?php
              }
          }
          ?>
</table>