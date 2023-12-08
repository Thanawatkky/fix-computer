<?php 
session_start();
    include '../connect.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'user':
                if (empty($_REQUEST['username'])|| empty($_REQUEST['password'])) {
                    echo "invild";
                }else{
                    $sql = $conn->query("SELECT * FROM tb_user WHERE username='".$_REQUEST['username']."' AND user_role=2 ");
                    $num = $sql->num_rows;
                    $fet = $sql->fetch_object();
                    if ($num <= 0) {
                        echo "Notuse";
                    }else{
                        if (password_verify($_REQUEST['password'],$fet->password)) {
                            $_SESSION['user_id'] = $fet->user_id;
                            $_SESSION['username'] = $fet->username;
                            echo "ok";
                        }else{
                            echo "nopass";
                        }
                    }
                }
                break;
            case 'admin':
                if (empty($_REQUEST['username'])|| empty($_REQUEST['password'])) {
                    echo "invild";
                }else{
                    $sql = $conn->query("SELECT * FROM tb_user WHERE username='".$_REQUEST['username']."' AND user_role=1 ");
                    $num = $sql->num_rows;
                    $fet = $sql->fetch_object();
                    if ($num <= 0) {
                        echo "Notuse";
                    }else{
                        if (password_verify($_REQUEST['password'],$fet->password)) {
                            $_SESSION['user_id'] = $fet->user_id;
                            $_SESSION['username'] = $fet->username;
                            echo "ok";
                        }else{
                            echo "nopass";
                        }
                    }
                }
                break;
        }
    }
?>