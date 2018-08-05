<?php
	include "Controller.php";
	
	class LaporanController extends Controller{

		public $initial = 'Laporan Proyek';
		public $page = 'laporan';
		private $controller = 'LaporanController.php';
		public $folder = 'laporan';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->struktur_pekerjaan = $this->model('Struktur_pekerjaan');
	    	$this->rab = $this->model('Rab');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	$data['struktur_pekerjaan'] = $this->struktur_pekerjaan->getDataStruktur_pekerjaan($this->dproyek[0]['pryk_id']);
	    	$data['rab'] = $this->rab->getDataAllRab($this->dproyek[0]['pryk_id']);
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
	    }

	}

	$LaporanController = new LaporanController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($LaporanController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($LaporanController, $_POST['func']));
	}

?>