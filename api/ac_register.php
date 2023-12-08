<?php 
session_start();
    include '../connect.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'regis':
                if ($_REQUEST['username'] == "" || $_REQUEST['fname'] == "" || $_REQUEST['lname'] == "" || $_REQUEST['password'] == "" || $_REQUEST['tel'] == "") {
                    echo "invild";
                }else{
                   if ($_FILES['user_img']['name'] != "" ) {
                        $file = $_FILES['user_img']['name'];
                        move_uploaded_file($_FILES['user_img']['tmp_name'],"../img/profile/".$file);
                   }else{
                        $file = "avatar.jpg";
                   }
                   $sql_check = $conn->query("SELECT username FROM tb_user WHERE username='".$_REQUEST['username']."' ");
                   $num = $sql_check->num_rows;
                   if ($num > 0) {
                       echo "haved";
                   }else{
                       $hash = password_hash($_REQUEST['password'],PASSWORD_BCRYPT);
                       $sql = $conn->query("INSERT INTO tb_user(username, fname, lname, password, user_role, tel, user_img) VALUES('".$_REQUEST['username']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$hash."',2,'".$_REQUEST['tel']."','".$file."') ");
                       if ($sql) {
                           echo "ok";
                       }else{
                           echo $conn->error;
                       }
                       
                   }
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>