<?php
	include "Controller.php";
	
	class JadwalController extends Controller{

		public $initial = 'Penjadwalan Proyek';
		public $page = 'jadwal';
		private $controller = 'JadwalController.php';
		public $folder = 'jadwal';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->jadwal = $this->model('Jadwal');
	    	$this->rab = $this->model('Rab');
	    	$this->ahsp = $this->model('Ahsp');
	    	$this->struktur_pekerjaan = $this->model('Struktur_pekerjaan');
	    	$this->pekerjaan = $this->model('Pekerjaan');
	    	$this->jadwal_tenaga_kerja = $this->model('Jadwal_tenaga_kerja');
	    	$this->jabatan = $this->model('Jabatan');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	$this->jadwal->cekDataJadwal($this->dproyek[0]['pryk_id']);
	    	$data['jadwal'] = $this->jadwal->getDataJadwalAll($this->dproyek[0]['pryk_id']);
	    	$data['cpm'] = $this->jadwal->getDataCpm($this->dproyek[0]['pryk_id']);
	    	$data['gantt'] = $this->jadwal->getDataGantt($this->dproyek[0]['pryk_id']);
	    	$data['jabatan'] = $this->jabatan->getDataAll();
	    	$data['struktur_pekerjaan'] = $this->struktur_pekerjaan->getDataStruktur_pekerjaan_top($this->dproyek[0]['pryk_id']);
	    	$data['durasiProyek'] = $this->jadwal_tenaga_kerja->durasiProyek($this->dproyek[0]['pryk_id']);
	    	$data['alokasi'] = $this->jadwal_tenaga_kerja->alokasiTenker($this->dproyek[0]['pryk_id'], $data['cpm']);
	    	$data['vis'] = $this->jadwal->getDataVis($this->dproyek[0]['pryk_id'], $data['cpm']);
	    	return $data;
	    }

	    public function tambah(){
	    	$cpm = $this->jadwal->getDataCpm('1');
	    	$data['vis'] = $this->jadwal->getDataVis('1', $cpm);

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
			
			if ($data['type_insert'] == 'durasi') {
				if ($this->jadwal->data_edit($data)) {
					$message = 'Ubah data berhasil.';
					$result = 'berhasil';
				}else{
		    		$message = 'Ubah data gagal.';
		    	}
			}else if ($data['type_insert'] == 'tanggal') {
				if ($this->jadwal->data_edit_tgl($data)) {
					$message = 'Ubah data berhasil.';
					$result = 'berhasil';
				}else{
		    		$message = 'Ubah data gagal.';
		    	}
			}else if ($data['type_insert'] == 'tenker') {
				if ($data['jdwl_id_tenker'] != '') {

					$data['jdwl_id'] = $data['jdwl_id_tenker'];

					if ($this->jadwal_tenaga_kerja->data_delete_by_jdwl_id($data['jdwl_id'])) {	

		     			for ($i=0; $i < count($data['jbtn_tenker']) ; $i++) { 
		     				$data['jbtn_id'] = $data['jbtn_tenker'][$i];
		     				$data['jdwltenker_jumlah'] = $data['jum_tenker'][$i];
		     				$data['jdwltenker_skip'] = 0;
		     				if ($this->jadwal_tenaga_kerja->data_insert($data)) {
			 					$message = 'Ubah data berhasil.';
	    						$result = 'berhasil';		
			 				}		
		     			}
		     		}

    			}
			}else if ($data['type_insert'] == 'perataan') {

				if ($data['jdwl_id_perataan'] != '') {

					$cpm = $this->jadwal->getDataCpm($data['pryk_id']);
					$cek = $this->jadwal_tenaga_kerja->ubahPerataan($cpm, $data['jdwl_id_perataan'], $data['harker']);
					if ($cek) {
						$message = 'Ubah data berhasil.';
						$result = 'berhasil';
					}else{
			    		$message = 'Ubah data gagal.';
			    	}
    			}
			}else{
				$pendahulu = "";
				$no =1;
				foreach ($data['pek_id_pendahulu'] as $v) {
					$jadwal = $this->jadwal->getDataJadwalByIdProyekIdStrukpek($data['pryk_id'],$v);
					if ($no == 1) {
						$pendahulu = $pendahulu.$jadwal[0]['jdwl_id'];
					}else{
						$pendahulu = $pendahulu.','.$jadwal[0]['jdwl_id'];
					}
					$no++;
				}
				$data['jdwl_pendahulu_id'] = $pendahulu;
				$data['jdwl_id'] = $data['jdwl_id_penpek'];
				if ($this->jadwal->data_edit_id($data)) {
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

		    if ($data['type_insert'] == 'pendahulu' or $data['type_insert'] == 'tenker' or $data['type_insert'] == 'perataan') {
		    	header("Location:../view/page/".$this->folder."/index.php?id=".$data['pryk_id']);
		    }
		    
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

	    public function cariPendahulu(){
	    	$data = $_POST;
	    	$pendahulu = $this->jadwal->cariPendahulu($data['id']);	
	    	echo $pendahulu;
	    }

	    public function formatDate($date){
	    	$date = date_create($date);
			$date = date_format($date,"d/m/Y");
			return $date;
	    }

	    public function countTenagaKerja($jdwl_id){
	    	$tenker = $this->jadwal_tenaga_kerja->getDataTenkerByJdwlId($jdwl_id);
	    	$jum = 0;
	    	if (count($tenker) > 0) {
	    		foreach ($tenker as $v) {
	    			$jum = $jum + $v['jdwltenker_jumlah'];
	    		}
	    	}
			return $jum;
	    }

	    public function cariTenagaKerja(){
	    	$data = $_POST;
	    	$tenker = $this->jadwal_tenaga_kerja->getDataTenkerByJdwlId($data['id']);
	    	echo json_encode($tenker);
	    }

	    public function cariPosisiPerataan($cpm, $jdwl_id){
	    	$posisi = $this->jadwal_tenaga_kerja->cariPosisiPerataan($cpm, $jdwl_id);
	    	return $posisi;
	    }

	}

	$JadwalController = new JadwalController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($JadwalController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($JadwalController, $_POST['func']));
	}

?>