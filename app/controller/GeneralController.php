<?php
	include "Controller.php";
	
	class GeneralController extends Controller{

		public $initial = 'Informasi Proyek';
		public $page = 'general';
		private $controller = 'GeneralController.php';
		public $folder = 'general';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->klien = $this->model('Klien');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	$data['klien'] = $this->klien->getDataAll();
	    	return $data;
	    }

	    public function tambah(){
	    }

	    public function ubah(){
	    }

	    public function hapus(){
	    }

	    public function detail(){
	    }

	    public function save(){

	    	$message = 'Ubah data gagal.';
		   	$result = 'gagal';

		   	// form post
		   	$data = $_POST;

		   	if ($data['pryk_status'] != "Selesai") {
     			$data['pryk_tgl_selesai'] = NULL;
     		}

		   	if ($this->proyek->data_edit($data)) {
				$message = 'Ubah data berhasil.';
				$result = 'berhasil';
			}else{
	    		$message = 'Ubah data gagal.';
	    	}

	    	if (session_status() == PHP_SESSION_NONE) {
		        session_start();
		    }

		    $_SESSION["notification_message"] = $message;
		    $_SESSION["notification_result"] = $result;

		    header("Location:../view/page/general/proyek.php?id=".$data['pryk_id']);
	    }
	}

	$GeneralController = new GeneralController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($GeneralController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($GeneralController, $_POST['func']));
	}

?>