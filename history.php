
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="text-center py-1 text-dark">ประวัติการส่งซ่อมของฉัน</h5>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">อาคาร/ตึก</th>
      <th scope="col">ชั้น</th>
      <th scope="col">อาการเสีย</th>
      <th scope="col">สถานะ</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $sql = $conn->query("SELECT * FROM tb_fix WHERE user_id='".$_SESSION['user_id']."' AND f_status = 3");
    $i=0;
    while ($fet = $sql->fetch_object()) {
        $i++;
?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $fet->tower; ?></td>
      <td><?= $fet->level;?>to</td>
      <td><?= $fet->fix_detail; ?></td>
      <td><?= status($fet->f_status); ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    </div>
</div>