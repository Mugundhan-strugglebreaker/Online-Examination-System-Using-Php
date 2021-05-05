<?php
  function sendOTP($email,$otp)
  {
  	// require('phpmailer/PHPMailer-FE_v4.11/_lib/class.phpmailer.php');
  	// require('phpmailer/PHPMailer-FE_v4.11/_lib/class.smtp.php');
  	// 	$message_body= "One Time Password for PHP login authentication is:<br/><br/>".$otp;
  	// 	$mail=new PHPMailer();
  	// 	// $mail->isSMTP();
  	// 	$mail->AddReplyTo('mugundsure@gmail.com','sureshrenuka');
  	// 		//$mail->SetFrom('mugundsure@gmail.com','Mugundhan');
  	// 		$mail->From = 'mugundsure@gmail.com';
   //          $mail->FromName = 'sureshrenuka';
  	// 		$mail->AddAddress($email);
  	// 		$mail->SMTPOptions = array(
			// 	'ssl' => array(
			// 	'verify_peer' => false,
			// 	'verify_peer_name' => false,
			// 	'allow_self_signed' => true
			// 	)
			// 	);
  	// 		$mail->isSMTP();
			// $mail->Host = gethostbyname('smtp.Gmail.com');
			// $mail->SMTPAuth = false;
			// $mail->SMTPAutoTLS = false; 
			// $mail->Port = 25; 
  	// 		$mail->Subject="Otp to Login";
  	// 		$mail->MsgHTML($message_body);
  	// 		$result=$mail->Send();
  	// 		if(!$result)
  	// 		{
  	// 			echo "Mailer Error".$mail->ErrorInfo;

  	// 		}
  	// 		else
  	// 		{
  	// 			return $result;
  	// 		}


require('phpmailer/PHPMailer-FE_v4.11/_lib/class.phpmailer.php');
  	require('phpmailer/PHPMailer-FE_v4.11/_lib/class.smtp.php');
 $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                     
        $mail->isSMTP();                                         
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->Username   = 'mugundsure@gmail.com';                     
        $mail->Password   = '';                               
        $mail->SMTPSecure = 'ssl';                                  
        $mail->Port       = 465;                                   
    
        //Recipients
        $mail->From = 'mugundsure@gmail.com';
            $mail->FromName = '';
     //   $mail->setFrom('mugundsure@gmail.com', 'Mailer');
        $mail->addAddress($email);    
        //$mail->addReplyTo('mugundsure@gmail.com', 'Information');

        // Content
   //    $mail->MsgHTML($message_body);
        $mail->isHTML(true);                    
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }




  }
?>
