<?php
	include "Controller.php";
	
	class PekerjaanController extends Controller{

		public $initial = 'Pekerjaan';

		private $controller = 'PekerjaanController.php';
		public $folder = 'pekerjaan';
		public $path_controller;
		public $table_data = 'pekerjaan';
    	public $table_primary = 'pek_id';
    	public $table_title = array(
									'Nama Pekerjaan',
									'Satuan',
								);
    	public $table_field = array(
									'pek_nama',
									'pek_satuan',
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Pekerjaan');
	    }

	    public function index(){
	     	$data[$this->table_data] = $this->model_main->getDataAll();
	    	return $data;
	    }

	    public function tambah(){
	    	return $data;
	    }

	    public function ubah(){
	    	
	    	$data[$this->table_data] = $this->model_main->getDataByID($_GET["id"]);
	    	return $data;
	    }

	    public function hapus(){
		   	$result = 'gagal,Hapus data gagal.';
	     	$data[$this->table_primary] = $_POST["id"];

	     	if ($this->model_main->data_delete($data)) {	    	
	    		$result = 'berhasil,Hapus data berhasil.';
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
	     		if ($this->model_main->data_insert($data)) {
    				$message = 'Tambah data berhasil.';
    				$result = 'berhasil';		
    			}
	     	}else{

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

	    public function import(){

	     	$message = 'Import data gagal.';
		   	$result = 'gagal';

	     	$file = $_FILES['file']['tmp_name'];

		    $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$reader->setReadDataOnly(true);
			$spreadsheet = $reader->load($file);

			if ($spreadsheet->getActiveSheet()->getCell('A1')->getValue() == 'Nama Pekerjaan'){
				$loop = true;
				$row = 2;
				while ($loop) {
					$pek_nama = $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue();
					$pek_satuan = $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue();
					$pek_nama = strtolower($pek_nama);
					$pek_satuan = strtolower($pek_satuan);
					if ($pek_nama != '') {
						if ($pek_satuan == '') {
							$pek_satuan = NULL;
						}
						
						if (count($this->model_main->getDataWhere('pek_nama',$pek_nama)) < 1) {
							$data = array( 'pek_nama' => $pek_nama, 'pek_satuan' => $pek_satuan );
							if ($this->model_main->data_insert($data)) {
			    				$message = 'Import data berhasil.';
			    				$result = 'berhasil';		
			    			}
		    			}else{
		    				$message = 'Import data berhasil.';
		    				$result = 'berhasil';		
		    			}
					}else{
						$loop = false;
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

	$PekerjaanController = new PekerjaanController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($PekerjaanController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($PekerjaanController, $_POST['func']));
	}

?>