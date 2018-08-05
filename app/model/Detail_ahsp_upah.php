<?php
	
	include "Database.php";

	class Detail_ahsp_upah extends Database{

		private $table = "detail_ahsp_upah";
		private $primary = "detahspupah_id";
		private $field = array(
									'detahspupah_id',
									'ahsp_id',
									'upah_id',
									'detahspupah_koeff'
							  );
		private $field_update = array(
										'upah_id',
										'detahspupah_koeff'
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

	    public function getDataDetail_ahsp_upah($ahsp_id){
	    	$result = $this->raw("SELECT * FROM `detail_ahsp_upah` a JOIN `ahsp` b on a.`ahsp_id` = b.`ahsp_id` JOIN `upah` c on a.`upah_id` = c.`upah_id` JOIN `jabatan` d on d.`jbtn_id` = c.`jbtn_id` where a.`ahsp_id` = '$ahsp_id'");
	     	return $result;
	    }

	    public function getDataDetail_ahsp_upahByID($id){
	    	$result = $this->raw("SELECT * FROM `detail_ahsp_upah` a JOIN `ahsp` b on a.`ahsp_id` = b.`ahsp_id` JOIN `upah` c on a.`upah_id` = c.`upah_id` JOIN `jabatan` d on d.`jbtn_id` = c.`jbtn_id` where a.`detahspupah_id` = '$id' ");
	     	return $result;
	    }

	    public function data_delete_by_ahsp($ahsp_id){
	    	$where ="ahsp_id = $ahsp_id";
	    	$result = false;

	    	if ($this->delete($this->table,$where)) {
	    		$result = true;
	    	}
	    	
	     	return $result;
	    }

	    // custom

	}

?>