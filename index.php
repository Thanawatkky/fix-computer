<?php
    session_start();
    include 'connect.php';
    include 'api/function.php';
    if (empty($_SESSION['user_id'])) {
        header("Location: index.html");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                <div class="sidebar-brand-text mx-3">Dashboard</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?p=fix-request">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>แจ้งซ่อมคอมพิวเตอร์</span>
                </a>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?p=myrequest">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>คำขอของฉัน</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?p=history">
                    <i class="fas fa-fw fa-history"></i>
                    <span>ประวัติการส่งซ่อม</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?p=line">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>เข้ากลุ่มไลน์เพื่อติดตามผล</span>
                </a>
            </li>



            <!-- Sidebar Toggler (Sidebar) -->

            <!-- Sidebar Message -->
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                    $sql_profile = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
                                    $fet_profile = $sql_profile->fetch_object();
                                ?>
                                <img src="img/profile/<?= $fet_profile->user_img; ?>" width="32" height="32" class="rounded-circle mx-2" alt="">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="index.php?p=profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="index.php?p=repass">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    เปลี่ยนรหัสผ่าน
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <button id="btn-confirm" class="dropdown-item" type="button" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </button>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php 
                        if (isset($_REQUEST['p'])) {
                            include($_REQUEST['p'].".php");
                        }else {
                            include 'dashboard.php';
                        }
                    ?>

            </div>
            <!-- End of Main Content -->

           

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
    <script src="js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script>


        $(document).ready(() => {
            $("#btn-confirm").click(() => {
                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "api/ac_logout.php",
                        type: "GET",
                        dataType: "html",
                        success:function(data){
                            setTimeout(() => {
                               Swal.fire({
                                title: "Successfully",
                                text: "ออกจากระบบสำเร็จ",
                                icon: "success",
                               }).then(()=>{
                                    window.location.replace("index.html");
                               })
                            }, 500);
                        }
                    });
                }
                });
            });

        })
        $(document).on("click","#btn-edit",function() {
                $("#fname1").val($(this).data("fname"))
                $("#lname1").val($(this).data("lname"))
                $("#tel1").val($(this).data("tel"))
        })
        $(document).on("submit","#frm_profile",function() {
               let url = $(this).attr("action");
               let data = new FormData(this);
               $.ajax({
                url: url,
                data: data,
                type: "post",
                dataType: "html",
                processData: false,
                contentType: false,
                success:function(data) {
                    if (data === "OK") {
                       setTimeout(() => {
                        Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "แก้ไขข้อมูลส่วนตัวสำเร็จ",
                        showConfirmButton: false,
                        timer: 1000
                        }).then(function() {
                            window.location.reload(true);
                        })
                       }, 500);
                    }
                }
               })
               return false;
        })
        $(document).on("submit","#frm_repass",function() {
               let url = $(this).attr("action");
               let data = new FormData(this);
               $.ajax({
                url: url,
                data: data,
                type: "post",
                dataType: "html",
                processData: false,
                contentType: false,
                success:function(data) {
                    if (data === "OK") {
                       setTimeout(() => {
                        Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "เปลี่ยนรหัสผ่านสำเร็จ",
                        showConfirmButton: false,
                        timer: 1000
                        }).then(function() {
                            window.location.reload(true);
                        })
                       }, 500);
                    }else{
                        console.log(data);
                    }
                    if (data === "invaild") {
                       setTimeout(() => {
                        Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "รหัสผ่านไม่ตรงกัน",
                        showConfirmButton: false,
                        timer: 1000
                        }).then(function() {
                            window.location.reload(true);
                        })
                       }, 500);
                    }else{
                        console.log(data);
                    }
                    if (data === "NOTMATCH") {
                       setTimeout(() => {
                        Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "รหัสผ่านปัจจุบันไม่ถูกต้อง",
                        showConfirmButton: false,
                        timer: 1000
                        }).then(function() {
                            window.location.reload(true);
                        })
                       }, 500);
                    }else{
                        console.log(data);
                    }
                }
               })
               return false;
        })
        $(document).on("submit","#frm_fix",function() {
            let url = $(this).attr('action');
            let data = new FormData(this);
            $.ajax({
                url: url,
                data: data,
                dataType: "html",
                type: $(this).attr("method"),
                processData: false,
                contentType: false,
                success: function(data){
                    if (data === "OK") {
                        setTimeout(() => {
                        Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "ส่งคำขอสำเร็จ",
                        showConfirmButton: false,
                        timer: 1000
                        }).then(function() {
                            window.location.reload(true);
                        })
                       }, 500);
                    }else{
                        console.log(data);
                    }
                }
            })
            return false;
        });
        let table = new DataTable("#myTable");
    </script>
</body>

</html>