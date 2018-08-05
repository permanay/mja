<?php
	include "Controller.php";
	
	class RisikoController extends Controller{

		public $initial = 'Risiko';

		private $controller = 'RisikoController.php';
		public $folder = 'risiko';
		public $path_controller;
		public $table_data = 'risiko';
    	public $table_primary = 'rsko_id';
    	public $table_title = array(
    								'Pekerjaan',
									'Nama Risiko',
									'Tingkat Kepentingan Risiko',
									'Tindakan Pengendalian Risiko',
									'Penanggung Jawab',
								);
    	public $table_field = array(
    								'pek_nama',
									'rsko_nama',
									'rsko_tingkat',
									'rsko_pengendalian',
									'jbtn_nama',
    							);
		public $model_main;			

		function __construct()
	    {
	    	$this->auth();
	    	$this->path_controller = "../../../controller/".$this->controller;
	    	$this->model_main = $this->model('Risiko');
	    	$this->jabatan = $this->model('Jabatan');
	    	$this->pekerjaan = $this->model('Pekerjaan');
	    }

	    public function index(){
	     	$data[$this->table_data] = $this->model_main->getDataRisiko();
	     	$data['jabatan'] = $this->jabatan->getDataAll();
	     	$data['pekerjaan'] = $this->pekerjaan->getDataAll();
	    	return $data;
	    }

	    public function tambah(){
	    	return $data;
	    }

	    public function ubah(){
	    	
	    	$data[$this->table_data] = $this->model_main->getDataRisikoByID($_GET["id"]);
	    	$data['jabatan'] = $this->jabatan->getDataAll();
	     	$data['pekerjaan'] = $this->pekerjaan->getDataAll();
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
	     		$data['rsko_nilai_probabilitas'] = '0,1';
	     		$data['rsko_tingkat'] = $this->model_main->cariTingkatRisiko($data['rsko_nilai_probabilitas'], $data['rsko_nilai_dampak']);
	     		if ($this->model_main->data_insert($data)) {
    				$message = 'Tambah data berhasil.';
    				$result = 'berhasil';		
    			}
	     	}else{
	     		$data['rsko_nilai_probabilitas'] = '0,1';
	     		$data['rsko_tingkat'] = $this->model_main->cariTingkatRisiko($data['rsko_nilai_probabilitas'], $data['rsko_nilai_dampak']);
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

	    public function test(){
	    	$data= $this->model_main->cariTingkatRisiko('0,1', '0,4');
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

	$RisikoController = new RisikoController();
	if (isset($_GET['func']) && !empty($_GET['func'])) {
		call_user_func(array($RisikoController, $_GET['func']));
	}
	if (isset($_POST['func']) && !empty($_POST['func'])) {
		call_user_func(array($RisikoController, $_POST['func']));
	}

?>