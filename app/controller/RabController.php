<?php
	include "Controller.php";
	
	class RabController extends Controller{

		public $initial = 'Rencana Anggaran Biaya';
		public $page = 'rab';
		private $controller = 'RabController.php';
		public $folder = 'rab';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->rab = $this->model('Rab');
	    	$this->ahsp = $this->model('Ahsp');
	    	$this->struktur_pekerjaan = $this->model('Struktur_pekerjaan');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	$this->rab->cekDataRab($this->dproyek[0]['pryk_id']);
	    	$data['rab'] = $this->rab->getDataAllRab($this->dproyek[0]['pryk_id']);
	    	$data['ahsp'] = $this->ahsp->getDataAll();
	    	return $data;
	    }

	    public function tambah(){
	    }

	    public function ubah(){
	    }

	    public function hapus(){
	    	$result = 'gagal,Hapus data gagal.';
	     	$data['strkpek_id'] = $_POST["id"];
	     	$data['pryk_id'] = $_POST["pryk_id"];

	     	if ($this->struktur_pekerjaan->data_delete($data)) {	    	
	    		$result = 'berhasil,Hapus data berhasil.';
	    	}
	    	$this->struktur_pekerjaan->cekTop($data['pryk_id']);
			echo $result;
	    }

	    public function detail(){
	    }

	    public function save(){

	    	$message = 'Ubah data gagal.';
		   	$result = 'gagal';
		   
		   	// form post
		   	$data = $_POST;
			
			$total = $this->ahsp->getTotalAhsp($data['ahsp_id']);
			$data['detrab_harga'] = $total;
	     	if ($this->rab->data_edit($data)) {
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
	    }

	    public function print($no, $nama, $volume, $satuan, $ahsp_nama, $detrab_harga, $harga, $status){

	    	if ($status == 'top') {
	    		$volume = "";
	    		$satuan = "";
	    	}
	    	echo '<tr>';
              echo '<td>'.$no.'.</td>';
              echo '<td>'.$nama.'</td>';
              echo '<td>'.$volume.'</td>';
              echo '<td>'.$satuan.'</td>';
              echo '<td>'.$ahsp_nama.'</td>';
              echo '<td>'.$detrab_harga.'</td>';
              echo '<td>'.$harga.'</td>';
            echo '</tr>';
	    }

	    public function cariTotal($pryk_id,$strkpek_id){
	    	$total = 0;
	    	$total = $this->rab->cariTotal($pryk_id,$strkpek_id);	
	    	return $total;
	    }

	    public function cariTotalAhsp($ahsp_id){
	    	$total = 0;
	    	$total = $this->ahsp->getTotalAhsp($ahsp_id);
	    	return $total;
	    }

	}

	$RabController = new RabController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($RabController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($RabController, $_POST['func']));
	}

?>