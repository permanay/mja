<?php
	include "Controller.php";
	
	class HargasatController extends Controller{

		public $initial = 'Daftar Harga Satuan Proyek';
		public $page = 'hargasat';
		private $controller = 'HargasatController.php';
		public $folder = 'harga-satuan';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->jabatan = $this->model('Jabatan');
	    	$this->upah = $this->model('Upah');
	    	$this->bahan_baku = $this->model('Bahan_baku');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	$data['jabatan'] = $this->jabatan->getDataAll();
	    	$data['upah'] = $this->upah->getDataUpah($this->dproyek[0]['pryk_id']);
	    	$data['bahan_baku'] = $this->bahan_baku->getDataBahan_baku($this->dproyek[0]['pryk_id']);
	    	return $data;
	    }

	    public function tambah(){
	    }

	    public function ubah(){
	    }

	    public function hapus(){
	    	$result = 'gagal,Hapus data gagal.';
	     	$data['bhnbku_id'] = $_POST["id"];
	     	if ($this->bahan_baku->data_delete($data) == 1) {	
	     		$result = 'berhasil,Hapus data berhasil.';
	    	}else if ($this->bahan_baku->data_delete($data) == 2) {	
	    		$result = 'gagal,Data tidak dapat dihapus.';
	    	}
			echo $result;
	    }

	    public function hapus2(){
	    	$result = 'gagal,Hapus data gagal.';
	     	$data['upah_id'] = $_POST["id"];
	     	if ($this->upah->data_delete($data) == 1) {	
	     		$result = 'berhasil,Hapus data berhasil.';
	    	}else if ($this->upah->data_delete($data) == 2) {	
	    		$result = 'gagal,Data tidak dapat dihapus.';
	    	}
			echo $result;
	    }

	    public function detail(){
	    }

	    public function save(){
	    	$message = 'Tambah data gagal.';
		   	$result = 'gagal';
		   
		   	// form post
		   	$data = $_POST;
			
	     	if ($data['post_type'] === 'tambah') {
	     		if ($this->bahan_baku->data_insert($data)) {
    				$message = 'Tambah data berhasil.';
    				$result = 'berhasil';		
    			}
	     	}else{

	     		if ($this->bahan_baku->data_edit($data)) {
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

		    header("Location:../view/page/".$this->folder."/index.php?id=".$data['pryk_id']);
	    }

	    public function save2(){
	    	$message = 'Tambah data gagal.';
		   	$result = 'gagal';
		   
		   	// form post
		   	$data = $_POST;
			
	     	if ($data['post_type'] === 'tambah') {
	     		if ($this->upah->data_insert($data)) {
    				$message = 'Tambah data berhasil.';
    				$result = 'berhasil';		
    			}
	     	}else{

	     		if ($this->upah->data_edit($data)) {
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

		    header("Location:../view/page/".$this->folder."/index.php?id=".$data['pryk_id']);
	    }

	    public function cari(){

	    	// form post
		   	$data = $_POST;

		   	$hasil = $this->bahan_baku->getDataByID($data['id']);
	    	echo json_encode($hasil);
	    }

	    public function cari2(){

	    	// form post
		   	$data = $_POST;

		   	$hasil = $this->upah->getDataByID($data['id']);
	    	echo json_encode($hasil);
	    }

	}

	$HargasatController = new HargasatController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($HargasatController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($HargasatController, $_POST['func']));
	}

?>