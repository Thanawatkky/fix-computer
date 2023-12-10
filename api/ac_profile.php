<?php 
session_start();
    include '../connect.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'user':
                if ($_FILES['user_img']['name'] != "") {
                    $file = $_FILES['user_img']['name'];
                    move_uploaded_file($_FILES['user_img']['tmp_name'],"../img/profile/".$file);
                }else{
                    $sql_img = $conn->query("SELECT user_img FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
                    $fet_img = $sql_img->fetch_object();
                    $file = $fet_img->user_img;
                }
                $sql = $conn->query("UPDATE tb_user SET fname='".$_REQUEST['fname']."',lname='".$_REQUEST['lname']."',tel='".$_REQUEST['tel']."',user_img='".$file."' WHERE user_id='".$_SESSION['user_id']."' ");
                if ($sql) {
                    echo "OK";
                }else{
                    echo $conn->error;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>