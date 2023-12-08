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
                    <h4 class="fw-bold mt-2 pt-3">LOGIN NOW</h4>
                </div>
                    <form action="api/ac_login.php?ac=user" method="post" id="frm_login">
                        <div class="mt-2">
                            <label class="form-label" for="">Username</label>
                            <input class="form-control" type="text" name="username" id="username">
                        </div>
                        
                        <div class="mt-2">
                            <label class="form-label" for="">Password</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>

                        <div class="text-center mt-4">
                            <h6>ยังไม่มีบัญชีใช่ไหม <a class="text-decoration-none" href="register.php">สมัครเลย!</a></h6>
                            <button type="submit" class="btn btn-primary mb-3 my-2 w-50">LOGIN</button>
                        </div>
                    </form>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
$(document).on("submit", "#frm_login", function () {
    let url = $(this).attr("action")
    let data = new FormData(this)

    $.ajax({
        url: url,
        type: $(this).attr("method"),
        dataType: "html",
        data: data,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data === "invild") {
                Swal.fire({
                    title: "มีบางอย่างผิดปกติ",
                    text: "กรุณากรอกข้อมูลให้ครบถ้วน",
                    icon: "warning"
                }).then(function () {
                    window.location.reload(true);
                });
            } else if (data === "ok") {
                Swal.fire({
                    title: "เข้าสู่ระบบสำเร็จ",
                    text: "ยินดีต้อนรับ ผู้ใช้งานทุกท่าน",
                    icon: "success"
                }).then(function () {
                    window.location.replace("index.php");
                });
            } else if (data === "nopass") {
                Swal.fire({
                    title: "Login Failed",
                    text: "รหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง",
                    icon: "error"
                }).then(function () {
                    window.location.reload(true);
                });
            }else if (data === "Notuse") {
                Swal.fire({
                    title: "Login Failed",
                    text: "เข้าสู่ระบบไม่สำเร็จ เนื่องจากชื่อผู้ใช้ไม่ถูกต้อง",
                    icon: "error"
                }).then(function () {
                    window.location.reload(true);
                });
            } else {
                console.log(data);
            }
        }
    })
    return false;
});

    </script>
</body>
</html>