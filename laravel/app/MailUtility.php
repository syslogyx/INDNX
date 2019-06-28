<?php
namespace App;

use Config;
use Illuminate\Support\Facades\Mail;
use Bogardo\Mailgun\MailgunServiceProvider;
use PHPMailer\PHPMailer;
use App\VerifyUser;
use App\Mail\VerifyMail;

/**
* @author Kalyani
*/
class MailUtility {

 	//Send an email
    public static function sendMail($subject, $mailBody, $recipients,$user){

    	if(!empty($recipients) && count($recipients) > 0){
	        require(base_path()."/vendor/phpmailer/phpmailer/src/PHPMailer.php");
	        require(base_path()."/vendor/phpmailer/phpmailer/src/SMTP.php");
	        
	        $mail = new PHPMailer\PHPMailer();
	        $mail->IsSMTP(); // enable SMTP
	        
	        // $mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
	        $mail->SMTPAuth = true; // authentication enabled
	        $mail->SMTPSecure = false; //'tls'; // secure transfer enabled REQUIRED for Gmail
	        $mail->Host = "mail.indnx.in";
	        $mail->Port = 25; // or 587
	        $mail->IsHTML(true);
	        $mail->Username = "info@indnx.in";
	        $mail->Password = "Kmb9t#99";
	        $mail->SetFrom("info@indnx.in");
	        $mail->Subject = $subject;
	        $mail->Body = $mailBody;

	        foreach ($recipients as $key => $value) {
	        	$mail->AddAddress($value);
	        	// $mail->
	        }

	        //Keep recipients in cc
	        // $mail->addCC("joe@site.com","Joe Tailer"); 
	        //Keep recipients in bcc
	        // $mail->addBCC("joe@site.com","Joe Tailer"); 

	        if(!$mail->Send(new VerifyMail($user))) {
	            // echo "Mailer Error: " . $mail->ErrorInfo;
	            return false;
	        } else {
	            // echo "Message has been sent";
	            return true;
	        }
     	}

     	return false;
    }

}
?>
