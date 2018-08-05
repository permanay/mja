<?php
	
	include "Database.php";

	class Pengguna extends Database{

		private $table = "pengguna";
		private $primary = "pgna_id";
		private $field = array(
									'pgna_id',
									'pgna_username',
									'pgna_sandi',
									'pgna_status'
							  );
		private $field_update = array(
										'pgna_username',
										'pgna_sandi',
										'pgna_status'
									 );

		function __construct()
	    {
	    		
	    }

	    public function getDataAll(){
	    	$result = $this->select('*',$this->table);
	     	return $result;
	    }

	    public function getDataByID($id){
	    	$result = $this->selectWhere('*',$this->table,$this->primary." = '$id'");
	     	return $result;
	    }

	    public function data_insert($data, $id_insert = false){
	    	//string field insert
	    	$field = "";
	    	$i = 0;
			$len = count($this->field);
	    	foreach ($this->field as $column) {
	    		$field = $field."`".$column."`";
	    		if ($i != ($len - 1)) {
	    			$field = $field.", ";
	    		}
	    		$i++;
	    	}

	    	//string value insert
	    	$value = "NULL, ";
	    	$i = 0;
	    	foreach ($this->field as $column) {
	    		if ($this->primary != $column) {
	    			$value = $value."'".$data[$column]."'";

	    			if ($i != ($len - 1)) {
		    			$value = $value.", ";
		    		}
	    		}
	    		
	    		$i++;
	    	}

	    	//insert
	    	if ($id_insert) {
	    		$result = 0;
	    		$id_insert_data = $this->insert($this->table,$field,$value,$id_insert);
		    	if ($id_insert_data != 0) {
		    		$result = $id_insert_data;
		    	}
	    	}else{
	    		$result = false;
		    	if ($this->insert($this->table,$field,$value,$id_insert)) {
		    		$result = true;
		    	}	
	    	}

	     	return $result;
	    }

	    public function data_edit($data){
	    	$where = $this->primary." = ".$data[$this->primary];

	    	// value edit
	    	$value = "";
	    	$i = 0;
			$len = count($this->field_update);
	    	foreach ($this->field_update as $column) {
	    		$value = $value."`".$column."` = '".$data[$column]."'";
	    		if ($i != ($len - 1)) {
	    			$value = $value.", ";
	    		}
	    		$i++;
	    	}

	    	$result = false;

	    	if ($this->update($this->table,$value,$where)) {
	    		$result = true;
	    	}
	    	
	     	return $result;
	    }


	    public function data_delete($data){
	    	$where = $this->primary." = ".$data[$this->primary];
	    	$result = false;

	    	if ($this->delete($this->table,$where)) {
	    		$result = true;
	    	}
	    	
	     	return $result;
	    }

	    //relasi

	    public function getDataPengguna(){
	    	$result = $this->raw("SELECT * FROM `pengguna` a JOIN `pegawai` b on a.`pgna_id` = b.`pgna_id` JOIN `jabatan` c on b.`jbtn_id` = c.`jbtn_id`");
	     	return $result;
	    }

	    // custom

	    public function cek_password($id_pengguna, $password){
	    	$result = $this->selectWhere('*',$this->table,"`id_pengguna` = '$id_pengguna' and `password` = '$password'");
	     	return $result;
	    }

	    public function login($username,$sandi){

	    	$result = false;
	    	$data = $this->raw("SELECT * FROM `pengguna` a JOIN `pegawai` b on a.`pgna_id` = b.`pgna_id` JOIN `jabatan` c on b.`jbtn_id` = c.`jbtn_id` where a.`pgna_username` = '$username' and a.`pgna_sandi` = '$sandi' and a.`pgna_status` = '1'");

	    	if (count($data) > 0) {
	    		$result = true;
	    		if (session_status() == PHP_SESSION_NONE) {
				    session_start();
				}
				$_SESSION["log_pgna_id"] = $data[0]['pgna_id'];
				$_SESSION["log_peg_id"] = $data[0]['peg_id'];
				$_SESSION["log_jbtn_id"] = $data[0]['jbtn_id'];
				$_SESSION["log_username"] = $data[0]['pgna_username'];
				$_SESSION["log_jabatan"] = strtolower($data[0]['jbtn_nama']);
				$_SESSION["log_nama"] = $data[0]['peg_nama'];
				$_SESSION["log_peg_email"] = $data[0]['peg_email'];
				$_SESSION["log_status"] = true;
	    	}

	     	return $result;
	    }

	    public function lupasandi($email){
	    	$result = $this->raw("SELECT * FROM `pegawai` where `peg_email` = '$email'");

	    	if (!empty($result)) {
	    		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $charactersLength = strlen($characters);
			    $randomString = '';
			    for ($i = 0; $i < 6; $i++) {
			        $randomString .= $characters[rand(0, $charactersLength - 1)];
			    }

			    $result['kode'] = $randomString;
			    $pass_baru = md5($randomString);

			    $karyawan = $this->raw("SELECT * FROM `karyawan` where `id_pengguna` = '".$result[0]['id_pengguna']."'");
			    $id_pengguna = 0;

			    if (!empty($karyawan)) {
			    	$id_pengguna = $karyawan[0]['id_pengguna'];
			    }else{
			    	$calon_karyawan = $this->raw("SELECT * FROM `calon_karyawan` where `id_pengguna` = '".$result[0]['id_pengguna']."'");
			    	if (!empty($calon_karyawan)) {
			    		$id_pengguna = $calon_karyawan[0]['id_pengguna'];	
			    	}
			    }

			    if ($this->update("pengguna","`password` = '".$pass_baru."'","id_pengguna = ".$id_pengguna)) {
		    		$result[0]['stat'] = "1";
		    	}else{
		    		$result[0]['stat'] = "2";
		    	}

	    	}else{
	    		$result[0]['stat'] = "0";
	    	}
	     	return $result;
	    }

	}

?>