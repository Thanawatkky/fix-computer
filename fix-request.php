<div class="card shadow-sm">
    <div class="card-header bg-white">
        <h5 class="text-center py-1 text-dark">ส่งคำขอซ่อมคอมพิวเตอร์</h5>
    </div>
    <div class="card-body">
    <form action="api/ac_fix-com.php?ac=request" method="post" id="frm_fix">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="mt-2">
                    <label for="tower">อาคาร/ตึก:</label>
                    <input type="text" name="tower" id="tower" class="form-control" placeholder="กรอกตึกหรืออาการที่ต้องการ">
                </div>
                <div class="mt-2">
                    <label for="level">ชั้น:</label>
                    <input type="text" name="level" id="level" class="form-control" placeholder="กรอกชั้นที่คุณต้องการ">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="mt-2">
                    <label for="fix-detail">อาการเสีย:</label>
                    <textarea name="fix_detail" id="fix_detail" class="form-control" cols="30" rows="4" placeholder="กรอกรายละเอียดการเสียแบบคร่าวๆ"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <button class="btn btn-secondary" onclick="return window.location.reload(true)">ยกเลิก</button>
        <button class="btn btn-primary" type="submit">ส่ง</button>
    </div>
</form>
</div>