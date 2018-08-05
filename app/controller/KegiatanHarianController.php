<?php
	include "Controller.php";
	
	class KegiatanHarianController extends Controller{

		public $initial = 'Kegiatan Harian';
		public $page = 'kegiatan';
		private $controller = 'KegiatanHarianController.php';
		public $folder = 'kegiatan-harian';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->kegiatan_harian = $this->model('Kegiatan_harian');
	    	$this->kegiatan_harian_bahan_baku = $this->model('Kegiatan_harian_bahan_baku');
	    	$this->kegiatan_harian_pekerjaan = $this->model('Kegiatan_harian_pekerjaan');
	    	$this->kegiatan_harian_tenaga_kerja = $this->model('Kegiatan_harian_tenaga_kerja');
	    	$this->kegiatan_harian_risiko = $this->model('Kegiatan_harian_risiko');
	    	$this->struktur_pekerjaan = $this->model('Struktur_pekerjaan');
	    	$this->bahan_baku = $this->model('Bahan_baku');
	    	$this->jabatan = $this->model('Jabatan');
	    	$this->risiko = $this->model('Risiko');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	$data['kegiatan_harian'] = $this->kegiatan_harian->getDataKegiatan_harian($this->dproyek[0]['pryk_id']);
	    	$data['struktur_pekerjaan'] = $this->struktur_pekerjaan->getDataStruktur_pekerjaan($this->dproyek[0]['pryk_id']);
	    	$data['bahan_baku'] = $this->bahan_baku->getDataAll();
	    	$data['jabatan'] = $this->jabatan->getDataAll();
	    	$data['risiko'] = $this->risiko->getDataRisiko();

	    	return $data;
	    }

	    public function tambah(){
	    }

	    public function ubah(){
	    }

	    public function hapus(){
	    	$result = 'gagal,Hapus data gagal.';
	     	$data['kgtnhari_id'] = $_POST["id"];
	     	$data['pryk_id'] = $_POST["pryk_id"];

	     	if ($this->kegiatan_harian_pekerjaan->data_delete_by_kgtnhari_id($data['kgtnhari_id'])) {	
	     		if ($this->kegiatan_harian_bahan_baku->data_delete_by_kgtnhari_id($data['kgtnhari_id'])) {	
	     			if ($this->kegiatan_harian_tenaga_kerja->data_delete_by_kgtnhari_id($data['kgtnhari_id'])) {	
	     				if ($this->kegiatan_harian_risiko->data_delete_by_kgtnhari_id($data['kgtnhari_id'])) {	
		     				if ($this->kegiatan_harian->data_delete($data)) {	    	
					    		$result = 'berhasil,Hapus data berhasil.';
					    	}
					    }
	     			}
	     		}
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
				
	     		$data['kgtnhari_id'] = $this->kegiatan_harian->data_insert($data, true);

	     		if ($data['kgtnhari_id'] != 0) {

	     			for ($i=0; $i < count($data['pek_kgtnhari']) ; $i++) { 
	     				$data['strkpek_id'] = $data['pek_kgtnhari'][$i];

	     				if ($this->kegiatan_harian_pekerjaan->data_insert($data)) {
		 					$message = 'Tambah data berhasil.';
    						$result = 'berhasil';		
		 				}		
	     			}

	     			for ($i=0; $i < count($data['bhnbku_kgtnhari']) ; $i++) { 
	     				$data['bhnbku_id'] = $data['bhnbku_kgtnhari'][$i];
	     				$data['kgtnbhnbku_jumlah'] = $data['jumbhnbku_kgtnhari'][$i];

	     				if ($this->kegiatan_harian_bahan_baku->data_insert($data)) {
		 					$message = 'Tambah data berhasil.';
    						$result = 'berhasil';		
		 				}		
	     			}

	     			for ($i=0; $i < count($data['tenker_kgtnhari']) ; $i++) { 
	     				$data['jbtn_id'] = $data['tenker_kgtnhari'][$i];
	     				$data['kgtntenker_jumlah'] = $data['jumtenker_kgtnhari'][$i];

	     				if ($this->kegiatan_harian_tenaga_kerja->data_insert($data)) {
		 					$message = 'Tambah data berhasil.';
    						$result = 'berhasil';		
		 				}		
	     			}	

	     			for ($i=0; $i < count($data['risk_kgtnhari']) ; $i++) { 
	     				$data['rsko_id'] = $data['risk_kgtnhari'][$i];

	     				if ($this->kegiatan_harian_risiko->data_insert($data)) {
		 					$message = 'Tambah data berhasil.';
    						$result = 'berhasil';		
		 				}		
	     			}	
    			}
	     	}else{

	     		if ($this->kegiatan_harian->data_edit($data)) {

	     			if ($this->kegiatan_harian_pekerjaan->data_delete_by_kgtnhari_id($data['kgtnhari_id'])) {	
	     				for ($i=0; $i < count($data['pek_kgtnhari']) ; $i++) { 
		     				$data['strkpek_id'] = $data['pek_kgtnhari'][$i];
		     				$data['kgtnpek_volume'] = $data['volpek_kgtnhari'][$i];

		     				if ($this->kegiatan_harian_pekerjaan->data_insert($data)) {
			 					$message = 'Ubah data berhasil.';
    							$result = 'berhasil';			
			 				}		
		     			}
	     			} 

	     			if ($this->kegiatan_harian_bahan_baku->data_delete_by_kgtnhari_id($data['kgtnhari_id'])) {	
	     				for ($i=0; $i < count($data['bhnbku_kgtnhari']) ; $i++) { 
		     				$data['bhnbku_id'] = $data['bhnbku_kgtnhari'][$i];
		     				$data['kgtnbhnbku_jumlah'] = $data['jumbhnbku_kgtnhari'][$i];

		     				if ($this->kegiatan_harian_bahan_baku->data_insert($data)) {
			 					$message = 'Ubah data berhasil.';
    							$result = 'berhasil';			
			 				}		
		     			}
	     			} 

	     			if ($this->kegiatan_harian_tenaga_kerja->data_delete_by_kgtnhari_id($data['kgtnhari_id'])) {	
	     				for ($i=0; $i < count($data['tenker_kgtnhari']) ; $i++) { 
		     				$data['jbtn_id'] = $data['tenker_kgtnhari'][$i];
		     				$data['kgtntenker_jumlah'] = $data['jumtenker_kgtnhari'][$i];

		     				if ($this->kegiatan_harian_tenaga_kerja->data_insert($data)) {
			 					$message = 'Ubah data berhasil.';
    							$result = 'berhasil';	
			 				}		
		     			}
	     			} 

	     			if ($this->kegiatan_harian_risiko->data_delete_by_kgtnhari_id($data['kgtnhari_id'])) {	
	     				for ($i=0; $i < count($data['risk_kgtnhari']) ; $i++) { 
		     				$data['rsko_id'] = $data['risk_kgtnhari'][$i];

		     				if ($this->kegiatan_harian_risiko->data_insert($data)) {
			 					$message = 'Ubah data berhasil.';
    							$result = 'berhasil';	
			 				}		
		     			}
	     			} 

 					
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

	    public function cariKegiatanHarian(){
	    	$data = $_POST;
	    	$kegiatan_harian = $this->kegiatan_harian->getDataKegiatan_harianById($data['id']);
	    	echo json_encode($kegiatan_harian);
	    }

	}

	$KegiatanHarianController = new KegiatanHarianController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($KegiatanHarianController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($KegiatanHarianController, $_POST['func']));
	}

?>