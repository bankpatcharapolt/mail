<?php
require("PHPMailer_v5.1-master/class.phpmailer.php");
// function smtpmail( $email , $subject , $body )
// {
//     $mail = new PHPMailer();
//     $mail->IsSMTP();         
//       $mail->CharSet = "utf-8";  // ในส่วนนี้ ถ้าระบบเราใช้ tis-620 หรือ windows-874 สามารถแก้ไขเปลี่ยนได้                        
//     $mail->Host     = "mail.yourdomain.com"; //  mail server ของเรา
//     $mail->SMTPAuth = true;     //  เลือกการใช้งานส่งเมล์ แบบ SMTP
//     $mail->Username = "account@yourdomain.com";   //  account e-mail ของเราที่ต้องการจะส่ง
//     $mail->Password = "**********";  //  รหัสผ่าน e-mail ของเราที่ต้องการจะส่ง

//     $mail->From     = "account@yourdomain.com";  //  account e-mail ของเราที่ใช้ในการส่งอีเมล
//     $mail->FromName = "ชื่อผู้ส่ง"; //  ชื่อผู้ส่งที่แสดง เมื่อผู้รับได้รับเมล์ของเรา
//     $mail->AddAddress($email);            // Email ปลายทางที่เราต้องการส่ง(ไม่ต้องแก้ไข)
//     $mail->IsHTML(false);                  // ถ้า E-mail นี้ มีข้อความในการส่งเป็น tag html ต้องแก้ไข เป็น true
//     $mail->Subject     =  $subject;        // หัวข้อที่จะส่ง(ไม่ต้องแก้ไข)
//     $mail->Body     = $body;                   // ข้อความ ที่จะส่ง(ไม่ต้องแก้ไข)
//      $result = $mail->send();       
//      return $result;
// }
$email = "bankben2005@hotmail.com";
$subject = "t";
$body = "b";
smtpmail($email,$subject,$body);
function smtpmail( $email , $subject , $body )
{
    $mail = new PHPMailer();
    $mail->IsSMTP();         
      $mail->CharSet = "utf-8";  // ในส่วนนี้ ถ้าระบบเราใช้ tis-620 หรือ windows-874 สามารถแก้ไขเปลี่ยนได้                        
    $mail->Host     = "outmail.scg.com"; //  mail server ของเรา
    $mail->SMTPAuth = true;     //  เลือกการใช้งานส่งเมล์ แบบ SMTP
    $mail->Username = "patchrue@scg.com";   //  account e-mail ของเราที่ต้องการจะส่ง
    $mail->Password = "Oleo2020";  //  รหัสผ่าน e-mail ของเราที่ต้องการจะส่ง

    $mail->From     = "patchrue@scg.com";  //  account e-mail ของเราที่ใช้ในการส่งอีเมล
    $mail->FromName = "patchrue"; //  ชื่อผู้ส่งที่แสดง เมื่อผู้รับได้รับเมล์ของเรา
    $mail->AddAddress($email);            // Email ปลายทางที่เราต้องการส่ง(ไม่ต้องแก้ไข)
    $mail->IsHTML(false);                  // ถ้า E-mail นี้ มีข้อความในการส่งเป็น tag html ต้องแก้ไข เป็น true
    $mail->Subject     =  $subject;        // หัวข้อที่จะส่ง(ไม่ต้องแก้ไข)
    $mail->Body     = $body;                   // ข้อความ ที่จะส่ง(ไม่ต้องแก้ไข)
     $result = $mail->send();       
     return $result;
}


?>