<?php
	include "Controller.php";
	
	class PrarkkController extends Controller{

		public $initial = 'Pra-RK3K';
		public $page = 'prarkk';
		private $controller = 'PrarkkController.php';
		public $folder = 'rab';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->prarkk = $this->model('Prarkk');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	$this->prarkk->cekDataPrarkk($this->dproyek[0]['pryk_id']);
	    	$data['prarkk'] = $this->prarkk->getDataPrarkk($this->dproyek[0]['pryk_id']);
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

	$PrarkkController = new PrarkkController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($PrarkkController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($PrarkkController, $_POST['func']));
	}

?>