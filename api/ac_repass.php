<?php 
    session_start();
    include '../connect.php';
    if (isset($_REQUEST['ac'])) {
       switch ($_REQUEST['ac']) {
        case 'user':
            $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
            $fet = $sql->fetch_object();
            if ($_REQUEST['newpass'] != $_REQUEST['compass']) {
                echo "invaild";
            }else{
                if (password_verify($_REQUEST['oldpass'], $fet->password)) {
                    $hash = password_hash($_REQUEST['newpass'], PASSWORD_BCRYPT);
                    $sql_update = $conn->query("UPDATE tb_user SET password='".$hash."' WHERE user_id='".$_SESSION['user_id']."' ");
                    if ($sql_update) {
                       echo "OK";
                    }else{
                        echo $conn->error;
                    }
                }else{
                    echo "NOTMATCH";
                }
            }
            break;
       
       }
    }
?>