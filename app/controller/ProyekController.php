<?php
	include "Controller.php";
	
	class ProyekController extends Controller{

		public $initial = 'Proyek';

		private $controller = 'ProyekController.php';
		public $folder = 'proyek';
		public $path_controller;
		public $table_data = 'proyek';
    	public $table_primary = 'pryk_id';
    	public $table_title = array(
									'Kode Proyek',
									'Jenis Proyek',
									'Tanggal Kontrak',
									'Nilai Kontrak',
									'Durasi Proyek',
									'Tanggal Mulai',
									'Tanggal Selesai',
									'Status Proyek'
								);
    	public $table_field = array(
    								'pryk_kode',
									'pryk_jenis_proyek',
									'pryk_tgl_kontrak',
									'pryk_nilai_kontrak',
									'pryk_durasi',
									'pryk_tgl_mulai',
									'pryk_tgl_selesai',
									'pryk_status'
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Proyek');
	    	$this->pegawai = $this->model('Pegawai');
	    	$this->klien = $this->model('Klien');
	    }

	    public function index(){
	     	$data[$this->table_data] = $this->model_main->getDataProyek();
	    	return $data;
	    }

	    public function tambah(){
	    	$data['klien'] = $this->klien->getDataAll();
	    	$data['pegawai'] = $this->pegawai->getDataWhere('jbtn_id',1);
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
	     		$data['pryk_tgl_selesai'] = NULL;
	     		$data['pryk_status'] = "Perencanaan";
	     		if ($this->model_main->data_insert($data)) {
    				$message = 'Tambah data berhasil.';
    				$result = 'berhasil';		
    			}
	     	}else{

	     		if ($data['pryk_status'] != "Selesai") {
	     			$data['pryk_tgl_selesai'] = NULL;
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

	$ProyekController = new ProyekController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($ProyekController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($ProyekController, $_POST['func']));
	}

?>