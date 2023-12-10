<?php
session_start(); 
    include '../connect.php';
    include 'function.php';
    if (isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'request':
                $sql = $conn->query("INSERT INTO tb_fix(fix_detail,tower,level,user_id) VALUES('".$_REQUEST['fix_detail']."','".$_REQUEST['tower']."','".$_REQUEST
                ['level']."','".$_SESSION['user_id']."') ");
                if ($sql) {
                    echo "OK";
                }else{
                    echo $conn->error;
                }
                break;
                case 'to1':
                    $sql =  $conn->query("UPDATE tb_fix SET f_status = 1 WHERE fix_id='".$_REQUEST['fix_id']."' ");
                    if ($sql) {
                       echo "OK";
                    }else{
                        echo $conn->error;
                    }
                    break;
                case 'to2':
                    $sql =  $conn->query("UPDATE tb_fix SET f_status = 2 WHERE fix_id='".$_REQUEST['fix_id']."' ");
                    if ($sql) {
                       echo "OK";
                    }else{
                        echo $conn->error;
                    }
                    break;
                case 'to3':
                    $sql =  $conn->query("UPDATE tb_fix SET f_status = 3 WHERE fix_id='".$_REQUEST['fix_id']."' ");
                    if ($sql) {
                       echo "OK";
                    }else{
                        echo $conn->error;
                    }
                    break;
                case 'to9':
                    $sql =  $conn->query("UPDATE tb_fix SET f_status = 9 WHERE fix_id='".$_REQUEST['fix_id']."' ");
                    if ($sql) {
                       echo "OK";
                    }else{
                        echo $conn->error;
                    }
                    break;
        }
    }
?>