<?php
	
	include "Database.php";

	class Ahsp extends Database{

		private $table = "ahsp";
		private $primary = "ahsp_id";
		private $field = array(
									'ahsp_id',
									'ahsp_nama',
							  );
		private $field_update = array(
										'ahsp_nama',
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

	    public function getDataAhsp(){
	    	$result = $this->raw("SELECT * FROM `Ahsp`");
	    	foreach ($result as $k => $v) {
	    		$result[$k]['harga_satuan'] =  $this->getTotalAhsp($v['ahsp_id']);
	    	}
	     	return $result;
	    }

	    public function getDataAhspByID($id){
	    	$result = $this->raw("SELECT * FROM `Ahsp` where `ahsp_id` = '$id' ");
	     	return $result;
	    }

	    public function getDataAhspBhnbaku($ahsp_id){
	    	$result = $this->raw("SELECT * FROM `detail_ahsp_bahan_baku` a JOIN `Ahsp` b on a.`ahsp_id` = b.`ahsp_id` JOIN `proyek` c on c.`pryk_id` = b.`pryk_id` where a.`ahsp_id` = '$ahsp_id'");
	     	return $result;
	    }

	    public function getDataAhspUpah($ahsp_id){
	    	$result = $this->raw("SELECT * FROM `detail_ahsp_upah` a JOIN `Ahsp` b on a.`ahsp_id` = b.`ahsp_id` JOIN `proyek` c on c.`pryk_id` = b.`pryk_id` where a.`ahsp_id` = '$ahsp_id'");
	     	return $result;
	    }

	    public function getDataDetail_ahsp_bahan_baku($ahsp_id){
	    	$result = $this->raw("SELECT * FROM `Detail_ahsp_bahan_baku` a JOIN `ahsp` b on a.`ahsp_id` = b.`ahsp_id` JOIN `bahan_baku` c on a.`bhnbku_id` = c.`bhnbku_id` where a.`ahsp_id` = '$ahsp_id'");
	     	return $result;
	    }

	    public function getDataDetail_ahsp_upah($ahsp_id){
	    	$result = $this->raw("SELECT * FROM `detail_ahsp_upah` a JOIN `ahsp` b on a.`ahsp_id` = b.`ahsp_id` JOIN `upah` c on a.`upah_id` = c.`upah_id` JOIN `jabatan` d on d.`jbtn_id` = c.`jbtn_id` where a.`ahsp_id` = '$ahsp_id'");
	     	return $result;
	    }

	    // custom

	    public function getTotalAhsp($ahsp_id){
	    	$ahsp = $this->raw("SELECT * FROM `Ahsp` where `ahsp_id` = '$ahsp_id'");
	    	$bhnbaku = $this->getDataDetail_ahsp_bahan_baku($ahsp_id);
	    	$jum_bhnbku = 0;
	    	foreach ($bhnbaku as $v) {
	    		$jum_bhnbku = $jum_bhnbku + ($v['bhnbku_harga']*$v['detahspbb_koeff']);
	    	}
	    	$upah = $this->getDataDetail_ahsp_upah($ahsp_id);
	    	$jum_upah = 0;
	    	foreach ($upah as $v) {
	    		$jum_upah = $jum_upah + ($v['upah_harga']*$v['detahspupah_koeff']);
	    	}

	    	$hasil = $jum_bhnbku + $jum_upah;

	    	$result = ($hasil * 0.1) + $hasil;
	    	$result = round($result);
	     	return $result;
	    }

	}

?>