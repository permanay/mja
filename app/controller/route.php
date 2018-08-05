<?php

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	if ($_SESSION["log_pgna_id"] != "") {
		if($_SESSION["log_jabatan"] == 'manajer proyek'){
			header("Location:../view/page/pengguna/");
		}else{
			echo "lain-lain";
		}	
	}else{
		echo "a";
		echo $_SESSION["log_pgna_id"];
	}

?>