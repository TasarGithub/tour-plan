<?php

// $mail->CharSet = "UTF-8";

if ($_POST['emailforsubscribe']<>''){
    // $userName = $_POST['userName'];
    $userEmail = $_POST['emailForSubscribe'];
		// $userPhone = $_POST['userPhone'];
		//Формирование письма
		$title = "Новый e-mail для подписки на новости";
		$body = "
		<h2> Новый e-mail для подписки на новости </h2>
		<b>Почта:</b> $userEmail<br>
		<b></b> <br>
		<b></b> <br>
		";
}

if ($_POST['userNameFooter']<>''){
    $userName = $_POST['userNameFooter'];
		$userPhone = $_POST['userPhoneFooter'];
		$userMessage = $_POST['userMessage'];
	 // echo $userName;
		//Формирование письма
		$title = "Новый обращение Best Tour Plan";
		$body = "
		<h2> Новое обращение </h2>
		<b></b> $name <br>
		<b> Почта: </b> $userEmail <br>
		<b> Сообщение:</b><br> $userMessage
		";

}



echo "userName", $_POST['userName'];
// echo "userNameMetering", $_POST['userNameMetering'];
// echo $_POST['userNameControl'];
// echo $_POST['userNameFuter'];


// Load Composer's autoloader
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

try {
		//Server settings
		$mail->isSMTP();                                            // Send using SMTP
		$mail->CharSet = "UTF-8";
		$mail->SMTPAuth   = true;                                   // Enable SMTP 
		$mail->SMTPDebug = 2;                      // Enable verbose debug output
		$mail->Debugoutput = function($str, $level) {GLOBALS['status'][]= $str;};

		// Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
authentication
    $mail->Username   = 'vshtrs@gmail.com';                     // SMTP username
    $mail->Password   = '$rfv%tgb^yhn';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('vshtrs@gmail.com', 'Тарас отправитель');
		$mail->addAddress('tasar-ya@yandex.ru', 'Тарас получатель');     // Add a recipient
		$mail->addAddress('tasar-ya@yandex.ru', 'Тарас получатель');     // Add a second recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = $body;
		//${userName} ${userNameFooter} ${userNameFoursteps} ${userNameControl}
		
    if ($mail->send()) { $result = "success";
      echo "ok nnnnnnnn";
    } else { $result = "error";
        echo "Не отправлено. Код ошибки: {$mail->ErrorInfo}";
     }

    //  $mail->send();
    //  header('Location: thanks.html');
} catch (Exception $e) {
    echo "Письмо не отправлено. Код ошибки: {$mail->ErrorInfo}";
}

// Отображение результата

echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

