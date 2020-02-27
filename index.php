<?php

require("PHPMailer_v5.1/class.phpmailer.php");

$email_send = array("patchrue@scg.com","bankben2005@hotmail.com");
$expire_arr = array(
    array("host_name" => "thzhost(locopack.net)"
        , "expire" => "2021-01-16 00:00:01"
        , "how_to_check" => "https://www.thzhost.com/clientarea.php"
        , "type" => "host"
        , "is_paid" => 0
    ),
    array("host_name" => "locopack.co"
        , "expire" => "2020-04-28 00:00:01"
        , "how_to_check" => "https://th.godaddy.com/"
        , "type" => "domain"
        , "is_paid" => 0
    ),
    array("host_name" => "locopack.net"
        , "expire" => "2021-02-08 00:00:01"
        , "how_to_check" => "https://cloud.z.com/th/signin/"
        , "type" => "domain"
        , "is_paid" => 0
    ),
    array("host_name" => "tangmo.packetlove(locopack.co)"
        , "expire" => "2020-06-04 00:00:01"
        , "how_to_check" => "https://th.godaddy.com/"
        , "type" => "host"
        , "is_paid" => 0
    ),
);

$current_date = date("Y-m-d H:i:s");
$body = "";
$count = 0;
foreach($expire_arr as $k => $d){
    //foreach($d as $sub_key => $sub_value){

        $date_expire_check = new DateTime($d["expire"]);
        $date_expire_check->modify('-7 days');
        $date_danger_before = $date_expire_check->format('Y-m-d H:i:s');
        /** ======================================
         * สถานะว่าจ่ายตังยัง
         * =======================================
         */
        $is_paid = $d["is_paid"];
        /** ======================================
         *  ถ้าเวลา ณ ปัจจุบันน้อยกว่า 1สัปดาห์ก่อนหมดอายุ
         * =======================================
         */

        if((strtotime($current_date) > strtotime($date_danger_before)) && $is_paid == 0){
            
            if($count == 0){
                $body .= "<b>สวัสดีครับ</b>";
                $body .= "<br>";
                
            }
            else{
                $body .= "<br>";
            }
            $number = $count + 1 . ".";
            $body .= $number . "กรุณาชำระเงิน ".$d["type"] . " " . $d["host_name"];
            $body .= " ก่อนวันที่". $d["expire"];
            ++ $count;
        }
}
/** ====================
 * ส่งเมล์
 * ===================
 */
send_mail($body,$count,$email_send);


function send_mail($body,$count,$email_send){
// //Create a new PHPMailer instance
$mail = new PHPMailer;
 if($count > 0){
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->CharSet = "utf-8";
    $mail->Debugoutput = 'html';

    $mail->Host = "smtp.gmail.com";
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true;
    $mail->Username = "dooddwebsite1@gmail.com";
    $mail->Password = "dooddwebsite";
    $mail->setFrom('dooddwebsite1@gmail.com');
    foreach($email_send as $key => $value){
        $mail->addAddress($value);
    }
    $mail->Subject = '*กรุณาชำระเงิน hosting,domain';
    $body .="<br>";
    $body .= "<br><b>ขอบคุณครับ</b>";
    $body .= "<br><b>Best Regards,</b>";
    $body .= "<br><b>Patcharapolt ruengroong(Bank)</b>";
    $body .= "<br><b>พัชรพล เรืองรุ่ง</b>";
    //$mail->Body = $body;
    $mail->msgHTML($body);

    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}
}
?>