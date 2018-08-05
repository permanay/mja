<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
	
	if (file_exists(dirname(__FILE__)."/../../../vendors/phpmailer/phpmailer/src/Exception.php")) { 
		include_once dirname(__FILE__)."/../../../vendors/phpmailer/phpmailer/src/Exception.php";
		include_once dirname(__FILE__)."/../../../vendors/phpmailer/phpmailer/src/PHPMailer.php";
		include_once dirname(__FILE__)."/../../../vendors/phpmailer/phpmailer/src/SMTP.php";
    }

    if (file_exists(dirname(__FILE__)."/../../vendor/autoload.php")) { 
        include_once dirname(__FILE__)."/../../vendor/autoload.php";
    }

	class Controller
	{

		function __construct()
		{
		}

		public static function model($className) {

			if (file_exists(dirname(__FILE__)."/../model/".$className . '.php')) { 
		        include dirname(__FILE__)."/../model/".$className . '.php'; 
		        $model = new $className();
		        return $model; 
		    } 
		    return false; 
	    }

	    public static function auth(){
	    	if (session_status() == PHP_SESSION_NONE) {
			    session_start();
			}
			if (!isset($_SESSION['log_pgna_id']) && empty($_SESSION['log_pgna_id'])) {
				if (file_exists("route.php")) { 
			        header("Location: route.php");
			    }
				
			}
	    }

	    public static function email_send($penerima,$isi) {
	    	$mail = new PHPMailer();

			$mail->SMTPOptions = array(
			    'ssl' => array(
			        'verify_peer' => false,
			        'verify_peer_name' => false,
			        'allow_self_signed' => true
			    )
			);
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
			                                           // 1 = errors and messages
			                                           // 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "tls";                 
			$mail->Host       = "smtp.gmail.com";      // SMTP server
			$mail->Port       = 587;                   // SMTP port
			$mail->Username   = "info.tirtaratna@gmail.com";  // username
			$mail->Password   = "Rbisd$09";            // password

			$mail->SetFrom('info.tirtaratna@gmail.com', 'PT. Tirta Ratna');

			$mail->Subject = "Password baru akun anda di PT. Tirta Ratna";

			$message = $isi;
			
			$mail->MsgHTML($message);
			$mail->AddAddress($penerima);

			if(!$mail->Send()) {
			    $return = "2";
			} else {
				$return = "1";
			}

			return $return;
	    }

	}

?>