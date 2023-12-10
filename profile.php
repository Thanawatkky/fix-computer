
<section >
  <div class="container py-5"  id="profile-user">


    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="img/profile/<?= $fet_profile->user_img; ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?= $fet_profile->fname." ".$fet_profile->lname; ?></h5>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-outline-primary ms-1"  data-fname="<?= $fet_profile->fname; ?>" data-lname="<?= $fet_profile->lname; ?>"  data-tel="<?= $fet_profile->tel; ?>" data-toggle="modal" data-target="#modal-profile" id="btn-edit">Edit</button>
            </div>
          </div>
        </div>
       
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $fet_profile->username; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $fet_profile->fname." ".$fet_profile->lname; ?></p>
              </div>
            </div>
            
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $fet_profile->tel; ?></p>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-profile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <form action="api/ac_profile.php?ac=user" method="post" enctype="multipart/form-data" id="frm_profile">
          <div class="form-group">
              <label for="fname">ชื่อ</label>
              <input type="text" name="fname" id="fname1" class="form-control">
          </div>
          <div class="form-group">
              <label for="fname">นามสกุล</label>
              <input type="text" name="lname" id="lname1" class="form-control">
          </div>
          <div class="form-group">
              <label for="fname">เบอร์โทรศัพท์</label>
              <input type="text" name="tel" id="tel1" class="form-control">
          </div>
          <div class="form-group">
              <label for="fname">รูปโปรไฟล์</label>
              <input type="file" name="user_img" id="user_img">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">ยืนยัน</button>
        </div>
      </form>
    </div>
  </div>
</div>