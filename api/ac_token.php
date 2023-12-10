<?php 
    session_start();
    include '../connect.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'token':
                $sql_check = $conn->query("SELECT *  FROM tb_token");
                $num_check = $sql_check->num_rows;
                if ($num_check <= 0) {
                    $sql_add = $conn->query("INSERT INTO tb_token(token)  VALUES('".$_REQUEST['token']."') ");
                    if ($sql_add) {
                        echo "added";
                    }else{
                        echo $conn->error;
                    }
                }else{
                    $sql_update = $conn->query("UPDATE tb_token SET token='".$_REQUEST['token']."' ");
                    if ($sql_update) {
                        echo "updated";
                    }else{
                        echo $conn->error;
                    }
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>