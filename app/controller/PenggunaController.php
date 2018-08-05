<?php
	include "Controller.php";
	
	class PenggunaController extends Controller{

		public $initial = 'Pengguna';

		private $controller = 'PenggunaController.php';
		public $folder = 'pengguna';
		public $path_controller;
		public $table_data = 'pengguna';
    	public $table_primary = 'pgna_id';
    	public $table_title = array(
									'Nama Pegawai',
									'Jabatan',
									'Username',
									'Status'
								);
    	public $table_field = array(
									'peg_nama',
									'jbtn_nama',
									'pgna_username',
									'pgna_status'
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Pengguna');
	    	$this->pegawai = $this->model('Pegawai');
	    }

	    public function index(){
	     	$data[$this->table_data] = $this->model_main->getDataPengguna();
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

	     	if (count($this->pegawai->getDataWhere('jbtn_id',$_POST["id"])) > 0) {
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

	     		$pengguna = $this->model_main->getDataByID($data['pgna_id']);
 				if ($pengguna[0]['pgna_sandi'] != $data['pgna_sandi']) {
 					$data["pgna_sandi"] = md5(trim($data['pgna_sandi']));
 				}
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

	$PenggunaController = new PenggunaController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($PenggunaController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($PenggunaController, $_POST['func']));
	}

?>