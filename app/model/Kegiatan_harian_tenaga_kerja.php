<?php
	
	include "Database.php";

	class Kegiatan_harian_tenaga_kerja extends Database{

		private $table = "kegiatan_harian_tenaga_kerja";
		private $primary = "kgtntenker_id";
		private $field = array(
									'kgtntenker_id',
									'kgtnhari_id',
									'jbtn_id',
									'kgtntenker_jumlah'
							  );
		private $field_update = array(
										'jbtn_id',
										'kgtntenker_jumlah'
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

	    public function getDataKegiatanHarianTenagaKerja($kgtnhari_id){
	    	$result = $this->raw("SELECT * FROM `Kegiatan_harian_bahan_baku` a JOIN `kegiatan_harian` b on a.`kgtnhari_id` = b.`kgtnhari_id` JOIN `jabatan` c on a.`jbtn_id` = c.`jbtn_id` WHERE `kgtnhari_id` = 'kgtnhari_id'");
	     	return $result;
	    }

	    public function data_delete_by_kgtnhari_id($kgtnhari_id){
	     	$where ="`kgtnhari_id` = '$kgtnhari_id'";
	    	$result = false;

	    	if ($this->delete($this->table,$where)) {
	    		$result = true;
	    	}
	    	
	     	return $result;
	    }

	    public function getDataKegiatan_harian_tenaga_kerjaByID($id){
	    	$result = $this->raw("SELECT * FROM `Kegiatan_harian_tenaga_kerja` a LEFT JOIN `pengguna` b on a.`pgna_id` = b.`pgna_id` JOIN `jabatan` c on a.`jbtn_id` = c.`jbtn_id` where a.`peg_id` = '$id' ");
	     	return $result;
	    }

	    // custom

	}

?>