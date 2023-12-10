<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 m-auto shadow rounded-4 pt-2 px-4">
    <div class="text-center pt-4">
        <h4 class="pt-3 fw-bold">เปลี่ยนรหัสผ่าน</h4>
    </div>

    <form action="../api/ac_repass.php?ac=user" method="post" id="frm_repass">
        <div class="row px-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                <div class="mt-3">
                    <label class="form-label" for="">ชื่อผู้ใช้</label>
                    <input class="form-control" type="text" name="username" id="username" value="<?= $fet_profile->username; ?>" readonly>
                </div>

                <div class="mt-3">
                    <label class="form-label" for="">รหัสผ่านเดิม</label>
                    <input class="form-control" type="password" name="oldpass" id="oldpass" placeholder="กรอกรหัสผ่านปัจจุบัน" required>
                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
                <div class="mt-3">
                    <label class="form-label" for="">รหัสผ่านใหม่</label>
                    <input class="form-control" type="password" name="newpass" id="newpass"  placeholder="กรอกรหัสผ่านใหม่" required>
                </div>
                
                <div class="mt-3">
                    <label class="form-label" for="">ยืนยันรหัสผ่านใหม่</label>
                    <input class="form-control" type="password" name="compass" id="compass" placeholder="ยืนยันรหัสผ่านใหม่อีกครั้ง" required>
                </div>
            </div>
    
        </div>

        <div class="text-center mt-4">
            <a href="index.php?p=profile" class="btn btn-light mb-5">ยกเลิก</a>
            <button class="btn btn-primary mb-5" type="submit">ยืนยัน</button>
        </div>

    </form>
</div>