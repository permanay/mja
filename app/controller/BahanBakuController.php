<?php
	include "Controller.php";
	
	class BahanBakuController extends Controller{

		public $initial = 'Bahan Baku';

		private $controller = 'BahanBakuController.php';
		public $folder = 'bahan-baku';
		public $path_controller;
		public $table_data = 'bahan_baku';
    	public $table_primary = 'bhnbku_id';
    	public $table_title = array(
									'Nama',
									'Satuan',
									'Harga'
								);
    	public $table_field = array(
									'bhnbku_nama',
									'bhnbku_satuan',
									'bhnbku_harga'
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Bahan_baku');
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

			if ($spreadsheet->getActiveSheet()->getCell('A1')->getValue() == 'Nama Bahan Baku'){
				$loop = true;
				$row = 2;
				while ($loop) {
					$bhnbku_nama = $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue();
					$bhnbku_satuan = $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue();
					$bhnbku_harga = $spreadsheet->getActiveSheet()->getCell('C'.$row)->getValue();
					$bhnbku_nama = strtolower($bhnbku_nama);
					$bhnbku_satuan = strtolower($bhnbku_satuan);
					if ($bhnbku_nama != '' && $bhnbku_satuan != '') {
						if ($bhnbku_harga != 0) {
							$data = array( 'bhnbku_nama' => $bhnbku_nama, 'bhnbku_satuan' => $bhnbku_satuan, 'bhnbku_harga' => $bhnbku_harga );
							if (count($this->model_main->getDataWhere('bhnbku_nama',$bhnbku_nama)) < 1) {
								if ($this->model_main->data_insert($data)) {
				    				$message = 'Import data berhasil.';
				    				$result = 'berhasil';		
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

	$BahanBakuController = new BahanBakuController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($BahanBakuController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($BahanBakuController, $_POST['func']));
	}

?>