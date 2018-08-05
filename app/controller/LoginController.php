<?php

	include "Controller.php";

	class LoginController extends Controller{

		function __construct()
	    {
	    	$this->pengguna = $this->model('Pengguna');
	    }

	    public function login(){
	     	$username = $_POST['username'];
	     	$sandi = md5(trim($_POST['sandi']));
	     	$return = '0';
	     	if ($this->pengguna->login($username,$sandi)) {
				$return = '1';
	     	}

	     	echo $return;
	    }

	    public function logout(){
	     	if (session_status() == PHP_SESSION_NONE) {
			    session_start();
			}
		    session_unset();
		    session_destroy();
		    session_write_close();
		    setcookie(session_name(),'',0,'/');
		    session_regenerate_id(true);
	     	header("Location:../../index.php");
	    }

	    public function lupasandi(){
	     	$email = $_POST['email'];
	     	$return = '0';
	     	ob_start();
	     	$data = $this->pengguna->lupasandi($email);
	     	
	     	if ($data[0]['stat'] == "1") {
	     		$return = '1';
	     	}
	     	ob_end_clean();
	     	echo $return;
	    }

	}

	$LoginController = new LoginController();
	call_user_func(array($LoginController, $_GET['func']));


?>