<?php
	include "Controller.php";
	
	class UpahController extends Controller{

		public $initial = 'Upah';

		private $controller = 'UpahController.php';
		public $folder = 'upah';
		public $path_controller;
		public $table_data = 'upah';
    	public $table_primary = 'upah_id';
    	public $table_title = array(
									'Jabatan',
									'Satuan',
									'Harga'
								);
    	public $table_field = array(
									'jbtn_nama',
									'upah_satuan',
									'upah_harga'
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Upah');
	    	$this->jabatan = $this->model('Jabatan');
	    }

	    public function index(){
	     	$data[$this->table_data] = $this->model_main->getDataUpah();
	    	return $data;
	    }

	    public function tambah(){
	    	$data['jabatan'] = $this->jabatan->getDataAll();
	    	return $data;
	    }

	    public function ubah(){
	    	
	    	$data[$this->table_data] = $this->model_main->getDataUpahByID($_GET["id"]);
	    	$data['jabatan'] = $this->jabatan->getDataAll();
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

			if ($spreadsheet->getActiveSheet()->getCell('C1')->getValue() == 'Upah'){
				$loop = true;
				$row = 2;
				while ($loop) {
					$jbtn_nama = $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue();
					$upah_satuan = $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue();
					$upah_harga = $spreadsheet->getActiveSheet()->getCell('C'.$row)->getValue();
					$upah_satuan = strtolower($upah_satuan);
					if ($jbtn_nama != '' && $upah_satuan != '') {
						if ($upah_harga != 0) {
							$jbtn_id = $this->jabatan->getDataWhere('jbtn_nama',$jbtn_nama);
							if (count($jbtn_id) > 0) {
								if (count($this->model_main->getDataWhere('jbtn_id',$jbtn_id[0]['jbtn_id'])) < 1) {
									$data = array( 'jbtn_id' => $jbtn_id[0]['jbtn_id'], 'upah_satuan' => $upah_satuan, 'upah_harga' => $upah_harga );
									if ($this->model_main->data_insert($data)) {
					    				$message = 'Import data berhasil.';
					    				$result = 'berhasil';		
					    			}
					    		}
							}else{
								$message = 'Import data berhasil.';
				    			$result = 'berhasil';		
							}
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

	$UpahController = new UpahController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($UpahController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($UpahController, $_POST['func']));
	}

?>