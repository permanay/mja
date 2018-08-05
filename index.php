<!DOCTYPE html>
<html>
<head>
  <title>Sistem Informasi Manajemen Proyek PT. MJA</title>
</head>
<body>
  <script type="text/javascript">
  	<?php
	  if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	  }
	  if (isset($_SESSION['log_status']) && !empty($_SESSION['log_status'])) {
	  	if ($_SESSION['log_status'] == true) {
	  		echo 'window.location = "app/controller/route.php";';	
	  	}else{
	  		echo 'window.location = "app/view/page/front";';
	  	}
	  }else{
  		echo 'window.location = "app/view/page/front";';
  	}
	?>
  </script>
</body>
</html>