<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <h5>จำนวนผู้ใช้งานทั้งหมด</h5></div>
                        <?php 
                            $sql_user = $conn->query("SELECT * FROM tb_user WHERE user_role <> 1");
                            $num_user = $sql_user->num_rows;
                        ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_user; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        <h5>จำนวนคำขอทั้งหมด</h5></div>
                        <?php 
                            $sql_request = $conn->query("SELECT * FROM tb_fix ");
                            $num_request = $sql_request->num_rows;
                        ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_request; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <h5>จำนวนคำขอรอซ่อม</h5>
                        <?php 
                            $sql_request2 = $conn->query("SELECT * FROM tb_fix WHERE f_status = 0 ");
                            $num_request2 = $sql_request2->num_rows;
                        ?>
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $num_request2; ?></div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-info" role="progressbar"
                                    style="width: <?=  $num_request2; ?>%" aria-valuenow="<?=  $num_request2; ?>" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clock fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        <h5>คำขอที่ซ่อมเสร็จสิ้น</h5></div>
                        <?php 
                            $sql_request3 = $conn->query("SELECT * FROM tb_fix WHERE f_status = 0 ");
                            $num_request3 = $sql_request3->num_rows;
                        ?>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_request3; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-check fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
