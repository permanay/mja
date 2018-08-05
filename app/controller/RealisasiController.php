<?php
	include "Controller.php";
	
	class RealisasiController extends Controller{

		public $initial = 'Realisasi Pelaksanaan Proyek';
		public $page = 'realisasi';
		private $controller = 'RealisasiController.php';
		public $folder = 'realisasi';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->realisasi = $this->model('Realisasi');
	    	$this->jadwal = $this->model('Jadwal');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	
	    	if (!empty($_GET["m"])) {
	    		$minggu = $_GET["m"];
	    	}else{
	    		$minggu = 1;	
	    	}
	    	$data['cpm'] = $this->jadwal->getDataCpm($this->dproyek[0]['pryk_id']);
	    	$this->realisasi->cekDataRealisasi($this->dproyek[0]['pryk_id'], $minggu, $data['cpm']);
	    	$data['realisasi'] = $this->realisasi->getDataRealisasi($this->dproyek[0]['pryk_id'], $minggu);
	    	$data['minggu'] = $minggu;
	    	$data['durasi'] = $this->realisasi->durasiProyek($this->dproyek[0]['pryk_id']);
	    	$data['realisasi_biaya'] = $this->realisasi->getDataRealisasiBiaya($this->dproyek[0]['pryk_id']);
	    	return $data;
	    }

	    public function tambah(){
	    	$data['realisasi'] = $this->realisasi->getDataRealisasiBiaya(1);
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
			if ($data['type_insert'] == 'volrea') {
				if ($this->realisasi->editRealisasiPekerjaan($data)) {
					$message = 'Ubah data berhasil.';
					$result = 'berhasil';
				}else{
		    		$message = 'Ubah data gagal.';
		    	}
			}else{
				if ($this->realisasi->editRealisasiMaster($data)) {
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

		    echo $data['realisasi_minggu'];
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

	$RealisasiController = new RealisasiController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($RealisasiController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($RealisasiController, $_POST['func']));
	}

?>