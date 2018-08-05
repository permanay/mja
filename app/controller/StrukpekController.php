<?php
	include "Controller.php";
	
	class StrukpekController extends Controller{

		public $initial = 'Struktur Pekerjaan Proyek';
		public $page = 'strukpek';
		private $controller = 'StrukpekController.php';
		public $folder = 'struktur-pekerjaan';
		public $path_controller;
		public $dproyek;

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->proyek = $this->model('Proyek');
	    	$this->proyek();
	    	$this->struktur_pekerjaan = $this->model('Struktur_pekerjaan');
	    	$this->pekerjaan = $this->model('Pekerjaan');
	    }

	    public function proyek(){
	    	if (!empty($_GET["id"])) {
	    		$pryk_id = $_GET["id"];
	     		$this->dproyek = $this->proyek->getDataProyekByID($pryk_id);
	    	}
	    }

	    public function index(){
	    	$data['struktur_pekerjaan'] = $this->struktur_pekerjaan->getDataStruktur_pekerjaan($this->dproyek[0]['pryk_id']);
	    	$data['pekerjaan'] = $this->pekerjaan->getDataAll();
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
	    	$this->struktur_pekerjaan->cekNo($data['pryk_id']);
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
	     		if ($data['pek_id_pendahulu'] == '--Pilih--') {
	     			$data['pek_id_pendahulu'] = 'NULL';
	     			$data['strkpek_status'] = 'top';
	     		}else{
	     			$data['strkpek_status'] = 'sub';
	     		}

	     		if ($this->struktur_pekerjaan->data_insert($data)) {
    				$message = 'Tambah data berhasil.';
    				$result = 'berhasil';		
    			}
	     	}else{

	     		if ($data['pek_id_pendahulu'] == '--Pilih--' or empty($data['pek_id_pendahulu']) or $data['pek_id_pendahulu'] == "") {
	     			$data['pek_id_pendahulu'] = 'NULL';
	     			$data['strkpek_status'] = 'top';
	     		}else{
	     			$data['strkpek_status'] = 'sub';
	     		}

	     		if ($this->struktur_pekerjaan->data_edit($data)) {
 					$message = 'Ubah data berhasil.';
    				$result = 'berhasil';
 				}else{
		    		$message = 'Ubah data gagal.';
		    	}

	     	}

	     	$this->struktur_pekerjaan->cekTop($data['pryk_id']);
	     	$this->struktur_pekerjaan->cekNo($data['pryk_id']);

	     	if (session_status() == PHP_SESSION_NONE) {
		        session_start();
		    }

		    $_SESSION["notification_message"] = $message;
		    $_SESSION["notification_result"] = $result;

		    header("Location:../view/page/".$this->folder."/index.php?id=".$data['pryk_id']);
	    }

	    public function print($no, $nama, $volume, $satuan, $id, $status){

	    	if ($status == 'top') {
	    		$volume = "";
	    		$satuan = "";
	    	}
	    	echo '<tr>';
              echo '<td>'.$no.'.</td>';
              echo '<td>'.$nama.'</td>';
              echo '<td>'.$volume.'</td>';
              echo '<td>'.$satuan.'</td>';
              echo '<td class="text-nowrap">';
              	if ($status == 'sub') {
		    		echo '<button alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-warning btn-icon-anim btn-square mr-5" onclick="$(this).ubah(\''.$id.'\');"><i class="fa fa-pencil"></i></button>';
                	echo '<button class="btn btn-danger btn-icon-anim btn-square" onclick="$(this).delete(\''.$id.'\');"><i class="fa fa-trash-o"></i></button>';
		    	}
              echo '</td>';
            echo '</tr>';
	    }

	    public function carisub($id){
	    	$strukpek_sub = $this->struktur_pekerjaan->getDataStruktur_pekerjaan_sub($id);
	    	return $strukpek_sub;
	    }

	    public function cari(){

	    	// form post
		   	$data = $_POST;

		   	$strukpek_sub = $this->struktur_pekerjaan->getDataStruktur_pekerjaanByID($data['id']);
	    	echo json_encode($strukpek_sub);
	    }

	}

	$StrukpekController = new StrukpekController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($StrukpekController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($StrukpekController, $_POST['func']));
	}

?>