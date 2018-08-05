<?php
	
	include "Database.php";

	

	class Prarkk extends Database {

		private $table = "pra_rkk";
		private $primary = "prarkk_id";
		private $field = array(
									'prarkk_id',
									'pryk_id',
									'rsko_id'
							  );
		private $field_update = array(
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
	    		if ($data[$column] != 'NULL') {
    				$value = $value."`".$column."` = '".$data[$column]."'";
    			}else{
    				$value = $value."`".$column."` = ".$data[$column];
    			}
	    		
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

	    public function getDataPrarkk($pryk_id){
	    	$result = $this->raw("SELECT * FROM `pra_rkk` a JOIN `risiko` b on a.`rsko_id` = b.`rsko_id` JOIN `pekerjaan` c on b.`pek_id` = c.`pek_id` JOIN `jabatan` d on b.`jbtn_id` = d.`jbtn_id` where a.`pryk_id` = '$pryk_id' ");
	     	return $result;
	    }

	    public function cekDataPrarkk($pryk_id){
	    	$strukpek = $this->raw("SELECT * FROM `struktur_pekerjaan` where `pryk_id` = '$pryk_id'");
	    	foreach ($strukpek as $v) {
	    		$risiko = $this->raw("SELECT * FROM `risiko` where `pek_id` = '".$v['pek_id']."'");
    			foreach ($risiko as $e) {
    				$flag = $this->cariRisikoInPrarkk($e['rsko_id'], $pryk_id);
    				if (!$flag) {
	    				$data['pryk_id'] = $pryk_id;
		     			$data['rsko_id'] = $e['rsko_id'];
		    			$this->data_insert($data);
	    			}
    			}
	    	}
	    }

	    public function cariRisikoInPrarkk($rsko_id, $pryk_id){
	    	$result = $this->selectWhere('*',$this->table,"`rsko_id` = '$rsko_id' AND `pryk_id` = '$pryk_id'");
	    	if ($result) {
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	}
	

?>