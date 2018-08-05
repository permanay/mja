<?php
	include "Controller.php";
	
	class PegawaiController extends Controller{

		public $initial = 'Pegawai';

		private $controller = 'PegawaiController.php';
		public $folder = 'pegawai';
		public $path_controller;
		public $table_data = 'pegawai';
    	public $table_primary = 'peg_id';
    	public $table_title = array(
									'Nama',
									'Jabatan',
									'Email',
									'No Telepon',
									'Domisili',
									'Status',
									
								);
    	public $table_field = array(
									'peg_nama',
									'jbtn_nama',
									'peg_email',
									'peg_no_tlp',
									'peg_domisili',
									'peg_status',
									
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Pegawai');
	    	$this->pengguna = $this->model('Pengguna');
	    	$this->jabatan = $this->model('Jabatan');
	    }

	    public function index(){
	     	$data[$this->table_data] = $this->model_main->getDataPegawai();
	    	return $data;
	    }

	    public function tambah(){
	    	$data['jabatan'] = $this->jabatan->getDataAll();
	    	return $data;
	    }

	    public function ubah(){
	    	$data[$this->table_data] = $this->model_main->getDataPegawaiByID($_GET["id"]);
	    	$data['jabatan'] = $this->jabatan->getDataAll();
	    	return $data;
	    }

	    public function hapus(){
		   	$result = 'gagal,Hapus data gagal.';
	     	$data[$this->table_primary] = $_POST["id"];
	     	$pegawai = $this->model_main->getDataByID($_POST["id"]);	    	
	     	if ($this->model_main->data_delete($data) == 1) {	
	     		if ($pegawai[0]['pgna_id'] != NULL) {
	     			$data['pgna_id'] = $pegawai[0]['pgna_id'];
		     		if ($this->pengguna->data_delete($data)) {	
		     			$result = 'berhasil,Hapus data berhasil.';
		     		}
	     		}else{
	     			$result = 'berhasil,Hapus data berhasil.';
	     		}
	    	}else if ($this->model_main->data_delete($data) == 2) {	
	    		$result = 'gagal,Data tidak dapat dihapus.';
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
	     		if (isset($data['peg_hak_akses'])) {
	     			$data['peg_hak_akses'] = 1;
	     			$data['pgna_status'] = 1;
     				$data["pgna_sandi"] = md5(trim($data['pgna_sandi']));
     				$data['pgna_id'] = $this->pengguna->data_insert($data, true);
	     		}else{
	     			$data['peg_hak_akses'] = 0;
	     			$data['pgna_id'] = 'NULL';
	     		}
	     		if ($this->model_main->data_insert($data)) {
	     			$message = 'Tambah data berhasil.';
    				$result = 'berhasil';
    			}
	     	}else{

	     		if (isset($data['peg_hak_akses'])) {

	     			$asli = $this->model_main->getDataByID($data['peg_id']);

	     			if ($asli[0]['peg_hak_akses'] == '0') {
	     				$data['peg_hak_akses'] = 1;
		     			$data['pgna_status'] = 1;
	     				$data["pgna_sandi"] = md5(trim($data['pgna_sandi']));
	     				$data['pgna_id'] = $this->pengguna->data_insert($data, true);
	     			}else{
	     				$data['pgna_status'] = 1;
	     				$data['peg_hak_akses'] = 1;
	     				$data['pgna_id'] = $asli[0]['pgna_id'];
	     				$pengguna = $this->pengguna->getDataByID($asli[0]['pgna_id']);
	     				if ($pengguna[0]['pgna_sandi'] != $data['pgna_sandi']) {
	     					$data["pgna_sandi"] = md5(trim($data['pgna_sandi']));
	     				}
	     				$this->pengguna->data_edit($data);
	     			}

	     		}else{
	     			$data['peg_hak_akses'] = 0;
	     			$data['pgna_id'] = NULL;
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

	    public function profil(){

	    	// form post
		   	$data = $_POST;

		   	$message = 'Membarui profil gagal.';
		   	$result = 'gagal';

		   	$asli = $this->model_main->getDataByID($data['peg_id']);
		   	$pengguna = $this->pengguna->getDataByID($asli[0]['pgna_id']);
		   	$data['pgna_status'] = $pengguna[0]['pgna_status'];
			$data['peg_hak_akses'] = 1;
			$data['peg_status'] = $asli[0]['peg_status'];
			$data['jbtn_id'] = $asli[0]['jbtn_id'];
			$data['pgna_id'] = $asli[0]['pgna_id'];
			if ($pengguna[0]['pgna_sandi'] != $data['pgna_sandi']) {
				$data["pgna_sandi"] = md5(trim($data['pgna_sandi']));
			}
			
		   	if ($this->model_main->data_edit($data) && $this->pengguna->data_edit($data)) {
				$message = 'Membarui profil berhasil.';
    			$result = 'berhasil';
			}
	    	
			if (session_status() == PHP_SESSION_NONE) {
		        session_start();
		    }

		    $_SESSION["notification_message"] = $message;
		    $_SESSION["notification_result"] = $result;

		    header("Location:../view/page/front/profil.php?id=".$data['peg_id']);
	    }
	}

	$PegawaiController = new PegawaiController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($PegawaiController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($PegawaiController, $_POST['func']));
	}

?>