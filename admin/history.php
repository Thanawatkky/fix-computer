
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="text-center py-1 text-dark">คำขอซ่อมคอมพิวเตอร์</h5>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อ-นามสกุล</th>
      <th scope="col">อาคาร/ตึก</th>
      <th scope="col">ชั้น</th>
      <th scope="col">อาการเสีย</th>
      <th scope="col">สถานะ</th>

    </tr>
  </thead>
  <tbody>
  <?php 
    $sql = $conn->query("SELECT tb_fix.*,tb_user.fname,tb_user.lname FROM tb_fix LEFT JOIN tb_user ON tb_fix.user_id = tb_user.user_id WHERE tb_fix.f_status = 3");
    $i=0;
    while ($fet = $sql->fetch_object()) {
        $i++;
?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $fet->fname." ".$fet->lname; ?></td>
      <td><?= $fet->tower; ?></td>
      <td><?= $fet->level; ?>to</td>
      <td><?= $fet->fix_detail; ?></td>
      <td><?= status($fet->f_status); ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    </div>
</div>