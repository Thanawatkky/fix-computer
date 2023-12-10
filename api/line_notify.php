     <?php
     session_start();
     include '../connect.php';
     
     $sql_token = $conn->query("SELECT * FROM tb_token");
     $fet_token =  $sql_token->fetch_object();
     $sql = $conn->query("SELECT tb_fix.*,tb_user.fname,tb_user.lname FROM tb_fix LEFT JOIN tb_user ON tb_fix.user_id = tb_user.user_id WHERE tb_fix.fix_id='".$_REQUEST['fix_id']."' ");
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken = $fet_token->token;
     while ($fet = $sql->fetch_object()) {
     
         $sMessage = "แจ้งเตือน!! \n";
         $sMessage .= "วันที่".date("d-m-Y H:i:s")."น.\n";
         $sMessage .= "เรียนคุณ: ".$fet->fname." ".$fet->lname."\n";
         
                                if($fet->f_status == 0){
                                    $sMessage .= "สถานะ: ส่งคำขอแล้ว";
                                }elseif($fet->f_status == 1){
                                  $sMessage .= "สถานะ: กำลังตรวจสอบอาการเสีย";
                                }elseif($fet->f_status == 2){
                                   $sMessage .= "สถานะ: ดำเนินการซ่อมแซม";
                                }elseif($fet->f_status == 3){
                                   $sMessage .= "สถานะ: ยืนยันการซ่อมแซมเสร็จสิ้น";
                                }else{
                                   $sMessage .= "สถานะ: ยกเลิกคำขอแล้ว";
                                };
    
       


	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

    if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	curl_close( $chOne );    
     }
	?>