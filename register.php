<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 shadow-sm bg-white m-auto px-5 py-5">
                <div class="text-center mt-3">
                    <img width="150" height="150" class="rounded-circle" style="object-fit: cover;" src="assets/img/368054398_1121077865543295_5260389996880628060_n.jpg" alt="login-img">
                    <h4 class="fw-bold mt-2 pt-3">REGISTER NOW</h4>
                </div>
                    <form action="api/ac_register.php?ac=regis" method="post" id="frm_regis" enctype="multipart/form-data">
                        <div class="mt-2">
                            <label class="form-label" for="">Username</label>
                            <input class="form-control" type="text" name="username" id="username" placeholder="Enter your username">
                        </div>
                        
                        <div class="mt-2">
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
                        </div>
                        <div class="mt-2">
                            <label class="form-label" for="">ชื่อ</label>
                            <input class="form-control" type="text" name="fname" id="fname" placeholder="Enter your first name">
                        </div>
                        <div class="mt-2">
                            <label class="form-label" for="">นามสกุล</label>
                            <input class="form-control" type="text" name="lname" id="lname" placeholder="Enter your last name">
                        </div>
                        <div class="mt-2">
                            <label class="form-label" for="">เบอร์โทรศัพท์</label>
                            <input class="form-control" type="text" name="tel" id="tel" placeholder="Enter your phone number ">
                        </div>
                        <div class="mt-2">
                            <label class="form-label" for="">รูปโปรไฟล์</label>
                            <input class="form-control" type="file" name="user_img" id="user_img" >
                        </div>
                        
                        <div class="text-center mt-4">
                            <h6>มีบัญชีอยู่แล้วใช่ไหม <a class="text-decoration-none" href="login.php">เข้าสู่ระบบ!</a></h6>
                            <button type="submit" class="btn btn-primary mb-3 my-2 w-50">SUMMIT</button>
                        </div>
                    </form>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).on("submit", "#frm_regis", function() {
      let url = $(this).attr("action")
      let data = new FormData(this)

      $.ajax({
        url: url,
        type: $(this).attr("method"),
        dataType: "html",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {

          if (data === "invild") {
              setTimeout(function(){
                Swal.fire({
                title: "มีบางอย่างผิดปกติ",
                text: "กรุณากรอกข้อมูลให้ครบถ้วน",
                icon: "warning"
             }).then(function() {
                  window.location.reload(true);
              });
              }, 500);
          }else if (data === "haved") {
            setTimeout(function() {
              Swal.fire({
                  title: "สมัครสมาชิกไม่สำเร็จ",
                  text: "มีชื่อผู้ใช้ดังกล่าวอยู่ในระบบแล้ว",
                  icon: "warning"
              }).then(function() {
                  window.location.reload(true);
              });
          }, 500);

          }else if(data === "ok") {
            setTimeout(function() {
              Swal.fire({
                  title: "สมัครสมาชิกสำเร็จ",
                  text: "สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบก่อนเข้าใช้งาน",
                  icon: "success"
              }).then(function() {
                  window.location.href = "login.php";
              });
          }, 500);

          }else{
            console.log(data);
          }
        }
      })


      return false
    })
  </script>
</body>
</html>