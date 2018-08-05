<?php
	include "Controller.php";
	
	class AhspController extends Controller{

		public $initial = 'Analisa Harga Satuan Pekerjaan';

		private $controller = 'AhspController.php';
		public $folder = 'ahsp';
		public $path_controller;
		public $table_data = 'ahsp';
    	public $table_primary = 'ahsp_id';
    	public $table_title = array(
									'Nama Analisa',
									'Harga Satuan',
								);
    	public $table_field = array(
									'ahsp_nama',
									'harga_satuan',
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Ahsp');
	    	$this->detail_ahsp_bahan_baku = $this->model('Detail_ahsp_bahan_baku');
	    	$this->detail_ahsp_upah = $this->model('Detail_ahsp_upah');
	    	$this->bhnbku = $this->model('Bahan_baku');
	    	$this->upah = $this->model('Upah');
	    	$this->jabatan = $this->model('Jabatan');
	    }

	    public function index(){
	     	$data[$this->table_data] = $this->model_main->getDataAhsp();
	    	return $data;
	    }

	    public function tambah(){
	    	$data['bhnbku'] = $this->bhnbku->getDataAll();
	    	$data['upah'] = $this->upah->getDataUpah();
	    	return $data;
	    }

	    public function ubah(){
	    	$data['bhnbku'] = $this->bhnbku->getDataAll();
	    	$data['upah'] = $this->upah->getDataUpah();
	    	$data['ahsp'] = $this->model_main->getDataAhspByID($_GET["id"]);
	     	$data['detail_bhnbku'] = $this->detail_ahsp_bahan_baku->getDataDetail_ahsp_bahan_baku($data['ahsp'][0]['ahsp_id']);
	     	$data['detail_upah'] = $this->detail_ahsp_upah->getDataDetail_ahsp_upah($data['ahsp'][0]['ahsp_id']);
	    	return $data;
	    }

	    public function hapus(){
		   	$result = 'gagal,Hapus data gagal.';
	     	$data[$this->table_primary] = $_POST["id"];

	     	if ($this->model_main->data_delete($data)) {	    	
	     		if ($this->detail_ahsp_bahan_baku->data_delete_by_ahsp($_POST['id'])) {	
	     			if ($this->detail_ahsp_upah->data_delete_by_ahsp($_POST['id'])) {	
	     				$result = 'berhasil,Hapus data berhasil.';
	     			}	
	     		}
	    	}	
			echo $result;

	    }

	    public function detail(){
	     	$data['ahsp'] = $this->model_main->getDataAhspByID($_GET["id"]);
	     	$data['detail_bhnbku'] = $this->detail_ahsp_bahan_baku->getDataDetail_ahsp_bahan_baku($data['ahsp'][0]['ahsp_id']);
	     	$data['detail_upah'] = $this->detail_ahsp_upah->getDataDetail_ahsp_upah($data['ahsp'][0]['ahsp_id']);
	    	return $data;
	    }

	    public function save(){

	    	$message = 'Tambah data gagal.';
		   	$result = 'gagal';
		   
		   	// form post
		   	$data = $_POST;

	     	if ($data['post_type'] === 'tambah') {

	     		$data['ahsp_id'] = $this->model_main->data_insert($data, true);

	     		if ($data['ahsp_id'] != '') {

	     			for ($i=0; $i < count($data['bhnbku']) ; $i++) { 
	     				$data['bhnbku_id'] = $data['bhnbku'][$i];
	     				$data['detahspbb_koeff'] = $data['detahspbb'][$i];
	     				if ($this->detail_ahsp_bahan_baku->data_insert($data)) {
		 					$message = 'Tambah data berhasil.';
    						$result = 'berhasil';		
		 				}		
	     			}

	     			for ($i=0; $i < count($data['upah']) ; $i++) { 
	     				$data['upah_id'] = $data['upah'][$i];
	     				$data['detahspupah_koeff'] = $data['detahspupah'][$i];
	     				if ($this->detail_ahsp_upah->data_insert($data)) {
		 					$message = 'Tambah data berhasil.';
    						$result = 'berhasil';		
		 				}		
	     			}
    			}

	     	}else{
	     		if ($this->model_main->data_edit($data)) {

	     			if ($this->detail_ahsp_bahan_baku->data_delete_by_ahsp($data['ahsp_id'])) {	
	     				for ($i=0; $i < count($data['bhnbku']) ; $i++) { 
		     				$data['bhnbku_id'] = $data['bhnbku'][$i];
		     				$data['detahspbb_koeff'] = $data['detahspbb'][$i];
		     				if ($this->detail_ahsp_bahan_baku->data_insert($data)) {
			 					$message = 'Ubah data berhasil.';
    							$result = 'berhasil';	
			 				}		
		     			}
	     			}    

	     			if ($this->detail_ahsp_upah->data_delete_by_ahsp($data['ahsp_id'])) {	
	     				for ($i=0; $i < count($data['upah']) ; $i++) { 
		     				$data['upah_id'] = $data['upah'][$i];
		     				$data['detahspupah_koeff'] = $data['detahspupah'][$i];
		     				if ($this->detail_ahsp_upah->data_insert($data)) {
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

		    header("Location:../view/page/".$this->folder);

	    }

	     public function import(){

	     	$message = 'Import data gagal.';
		   	$result = 'gagal';

	     	$file = $_FILES['file']['tmp_name'];

		    $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$reader->setReadDataOnly(true);
			$spreadsheet = $reader->load($file);

			if ($spreadsheet->getActiveSheet()->getCell('A1')->getValue() == 'Uraian Jenis Pekerjaan'){
				$loop = true;
				$row = 2;
				$ahsp_id = 0;
				$sama = false;
				while ($loop) {
					$pekerjaan = $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue();
					$koeff = $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue();
					$pekerjaan = strtolower($pekerjaan);

					if (count($this->bhnbku->getDataWhere('bhnbku_nama',$pekerjaan)) > 0 && !$sama) {
						$data_bhnbku = $this->bhnbku->getDataWhere('bhnbku_nama',$pekerjaan);
						$data['ahsp_id'] = $ahsp_id;
						$data['bhnbku_id'] = $data_bhnbku[0]['bhnbku_id'];
	     				$data['detahspbb_koeff'] = $koeff;
	     				if ($this->detail_ahsp_bahan_baku->data_insert($data)) {
		 					$message = 'Import data berhasil.';
    						$result = 'berhasil';		
		 				}	


					}else if (count($this->jabatan->getDataWhere('jbtn_nama',$pekerjaan)) > 0 && !$sama) {
						$jbtn = $this->jabatan->getDataWhere('jbtn_nama',$pekerjaan);
						if (count($this->upah->getDataWhere('jbtn_id',$jbtn[0]['jbtn_id'])) > 0) {
							$data_upah = $this->upah->getDataWhere('jbtn_id',$jbtn[0]['jbtn_id']);
							$data['ahsp_id'] = $ahsp_id;
							$data['upah_id'] = $data_upah[0]['upah_id'];
		     				$data['detahspupah_koeff'] = $koeff;
		     				if ($this->detail_ahsp_upah->data_insert($data)) {
			 					$message = 'Import data berhasil.';
	    						$result = 'berhasil';		
			 				}
			 			}

					}else if ($pekerjaan == '' && $koeff == '') {
						$loop = false;
					} else {
						if ($koeff == '') {
							if (count($this->model_main->getDataWhere('ahsp_nama',$pekerjaan)) < 1) {
								$data['ahsp_nama'] = $pekerjaan;
								$ahsp_id = $this->model_main->data_insert($data, true);
								if ($ahsp_id != 0) {
									$sama = false;
				 					$message = 'Import data berhasil.';
		    						$result = 'berhasil';		
				 				}
				 			}else{
				 				$sama = true;
				 			}
						}
					}

					$row++;
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

	$AhspController = new AhspController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($AhspController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($AhspController, $_POST['func']));
	}

?>