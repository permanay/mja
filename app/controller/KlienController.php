<?php
	include "Controller.php";
	
	class KlienController extends Controller{

		public $initial = 'Klien';

		private $controller = 'KlienController.php';
		public $folder = 'klien';
		public $path_controller;
		public $table_data = 'klien';
    	public $table_primary = 'klien_id';
    	public $table_title = array(
									'Nama',
									'Email',
									'No Telepon',
									'Alamat'
								);
    	public $table_field = array(
									'klien_nama',
									'klien_email',
									'klien_no_tlp',
									'klien_alamat'
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Klien');
	    	$this->proyek = $this->model('Proyek');
	    }

	    public function index(){
	     	$data[$this->table_data] = $this->model_main->getDataAll();
	    	return $data;
	    }

	    public function tambah(){
	    	return $data;
	    }

	    public function ubah(){
	    	
	    	$data[$this->table_data] = $this->model_main->getDataByID($_GET["id"]);
	    	return $data;
	    }

	    public function hapus(){
		   	$result = 'gagal,Hapus data gagal.';
	     	$data[$this->table_primary] = $_POST["id"];

	     	if (count($this->proyek->getDataWhere('klien_id',$_POST["id"])) > 0) {
	     		$result = 'gagal,Data tidak dapat dihapus.';
	     	}else{
	     		if ($this->model_main->data_delete($data)) {	    	
		    		$result = 'berhasil,Hapus data berhasil.';
		    	}	
	     	}
			echo $result;

	    }

	    public function detail(){
	    	
	     	$data[''] = $this->model_main->getDataAll($_GET["id"]);
	    	return $data;
	    }

	    public function save(){

	    	$message = 'Tambah data gagal.';
		   	$result = 'gagal';
		   
		   	// form post
		   	$data = $_POST;
			
	     	if ($data['post_type'] === 'tambah') {
	     		if ($this->model_main->data_insert($data)) {
    				$message = 'Tambah data berhasil.';
    				$result = 'berhasil';		
    			}
	     	}else{

	     		if ($this->model_main->data_edit($data)) {
 					$message = 'Ubah data berhasil.';
    				$result = 'berhasil';
 				}else{
		    		$message = 'Ubah data gagal.';
		    	}

	     	}

	     	if (session_status() == PHP_SESSION_NONE) {
		        session_start();
		    }

		    $_SESSION["notification_message"] = $message;
		    $_SESSION["notification_result"] = $result;

		    header("Location:../view/page/".$this->folder);

	    }
	}

	$KlienController = new KlienController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($KlienController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($KlienController, $_POST['func']));
	}

?>