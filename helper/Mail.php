<?php 
	
	//use PHPMailer\PHPMailer\PHPMailer;
	require_once 'src/Exception.php';
	require_once 'src/PHPMailer.php';
	require_once 'src/SMTP.php';
	/*
		send message to email
		@param string @email
		@param string @name
		@param string @subject
		@param string @content
	*/
	function sendMail($email, $name, $subject, $message){
		$mail = new PHPMailer(true);
			try {
		    //Server settings
		    $mail->SMTPDebug = 0;   
		    $mail->CharSet = "UTF-8";                              // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'loveabletruog@gmail.com';                 // SMTP username
		    $mail->Password = 'dieuquynh9';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;      //ssl: 465                              // TCP port to connect to

		    //Recipients
		    $mail->setFrom('loveabletruog@gmail.com', 'YangsShop');
		    //$mail->addAddress('dotiendai.dtd@gmail.com', 'Dai Do');     // Add a recipient
		    $mail->addAddress("$email","$name");               // Name is optional
		    $mail->addReplyTo('loveabletruog@gmail.com', 'YangsShop');
		    //$mail->addCC('cc@example.com'); // 
		    $mail->addBCC('bcc@example.com'); //

		    //Attachments
		  //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		  //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);  // Set email format to HTML
		    $mail->Subject = "$subject"; // Tiêu đề của gmail
		/*    $mail->Body    = '<p>Đặt hàng thành công. 
		    Vui lòng nhấp vào <a href="http://localhost:8888/shop2408/dat-hang">Đây</a> để xác nhận đơn hàng.</p>
		    <img src="http://imgt.taimienphi.vn/cf/Images/nth/2015/3/phan-biet-cc-va-bcc-trong-email.jpg"/>
		    <p>Xin cảm ơn.</p>';*/
		    $mail->Body = "$message";
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    return $mail->send();
		    //echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		    return false;
		}
	}

	

 ?>