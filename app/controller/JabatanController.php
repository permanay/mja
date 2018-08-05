<?php
	include "Controller.php";
	
	class JabatanController extends Controller{

		public $initial = 'Jabatan';

		private $controller = 'JabatanController.php';
		public $folder = 'jabatan';
		public $path_controller;
		public $table_data = 'jabatan';
    	public $table_primary = 'jbtn_id';
    	public $table_title = array(
									'Nama Jabatan',
								);
    	public $table_field = array(
    								'jbtn_nama',
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Jabatan');
	    	$this->pegawai = $this->model('Pegawai');
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

	     	if (count($this->pegawai->getDataWhere('jbtn_id',$_POST["id"])) > 0) {
	     		$result = 'gagal,Data tidak dapat dihapus.';
	     	}else{
	     		if ($this->model_main->data_delete($data)) {	    	
		    		$result = 'berhasil,Hapus data berhasil.';
		    	}	
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

			if ($spreadsheet->getActiveSheet()->getCell('A1')->getValue() == 'Jabatan'){
				$loop = true;
				$row = 2;
				while ($loop) {
					$jbtn_nama = $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue();
					$jbtn_nama = strtolower($jbtn_nama);
					if ($jbtn_nama != '') {
						
						if (count($this->model_main->getDataWhere('jbtn_nama',$jbtn_nama)) < 1) {
							$data = array( 'jbtn_nama' => $jbtn_nama);
							if ($this->model_main->data_insert($data)) {
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

	$JabatanController = new JabatanController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($JabatanController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($JabatanController, $_POST['func']));
	}

?>