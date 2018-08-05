<?php
	
	include "Database.php";

	if (!class_exists('Proyek')) {
		
		class Proyek extends Database{

			private $table = "Proyek";
			private $primary = "pryk_id";
			private $field = array(
										'pryk_id',
										'peg_id',
										'klien_id',
										'pryk_kode',
										'pryk_nama',
										'pryk_tgl_kontrak',
										'pryk_nilai_kontrak',
										'pryk_jenis_proyek',
										'pryk_lokasi',
										'pryk_durasi',
										'pryk_tgl_mulai',
										'pryk_tgl_selesai',
										'pryk_status'
								  );
			private $field_update = array(
											'klien_id',
											'pryk_kode',
											'pryk_nama',
											'pryk_tgl_kontrak',
											'pryk_nilai_kontrak',
											'pryk_jenis_proyek',
											'pryk_lokasi',
											'pryk_durasi',
											'pryk_tgl_mulai',
											'pryk_tgl_selesai',
											'pryk_status'
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

		    public function getDataWhere($field, $value){
		    	$result = $this->selectWhere('*',$this->table,"$field = '$value'");
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
		    			if ($data[$column] != 'NULL') {
		    				$value = $value."'".$data[$column]."'";
		    			}else{
		    				$value = $value."".$data[$column]."";
		    			}

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

		    public function getDataProyek(){
		    	$result = $this->raw("SELECT * FROM `proyek` a JOIN `klien` b on a.`klien_id` = b.`klien_id` JOIN `pegawai` c on a.`peg_id` = c.`peg_id`");
		     	return $result;
		    }

		    public function getDataProyekByID($id){
		    	$result = $this->raw("SELECT * FROM `proyek` a JOIN `klien` b on a.`klien_id` = b.`klien_id` JOIN `pegawai` c on a.`peg_id` = c.`peg_id` where a.`pryk_id` = '$id' ");
		     	return $result;
		    }

		    // custom

		}
	}

?>