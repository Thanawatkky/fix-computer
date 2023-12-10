<?php 
    function status($s) {
        if ($s == 0) {
            echo "ส่งคำขอแล้ว";
        }elseif($s == 1){
            echo "กำลังตรวจสอบอาการเสีย";
        }elseif($s == 2) {
            echo "ดำเนินการซ่อมแซม";
        }elseif ($s == 3) {
            echo "ยืนยันการซ่อมแซมเสร็จสิ้น";
        }else{
            echo "ยกเลิกคำขอแล้ว";
        }
    }
    
   
?>