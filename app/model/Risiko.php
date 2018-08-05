<?php
	
	include "Database.php";

	class Risiko extends Database{

		private $table = "risiko";
		private $primary = "rsko_id";
		private $field = array(
									'rsko_id',
									'rsko_nama',
									'pek_id',
									'rsko_nilai_probabilitas',
									'rsko_nilai_dampak',
									'rsko_tingkat',
									'jbtn_id',
									'rsko_pengendalian'
							  );
		private $field_update = array(
										'rsko_nama',
										'pek_id',
										'rsko_nilai_probabilitas',
										'rsko_nilai_dampak',
										'rsko_tingkat',
										'jbtn_id',
										'rsko_pengendalian'
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

	    public function getDataRisiko(){
	    	$result = $this->raw("SELECT * FROM `Risiko` a JOIN `pekerjaan` b on a.`pek_id` = b.`pek_id` JOIN `jabatan` c on a.`jbtn_id` = c.`jbtn_id`");
	     	return $result;
	    }

	    public function getDataRisikoByID($id){
	    	$result = $this->raw("SELECT * FROM `Risiko` a JOIN `pekerjaan` b on a.`pek_id` = b.`pek_id` JOIN `jabatan` c on a.`jbtn_id` = c.`jbtn_id` where a.`rsko_id` = '$id' ");
	     	return $result;
	    }

	    // custom

	    public function cariTingkatRisiko($probabilitas,$dampak){
	    	
	    	$matriks = $this->matrixRisiko();
	    	$tingkat = "";
	    	foreach ($matriks as $k => $v) {
	    		if ($probabilitas == $v['probabilitas'] && $dampak == $v['dampak']) {
	    			$tingkat = $v['tingkat'];
	    			break;
	    		}
	    	}

	     	return $tingkat;
	    }

	    public function matrixRisiko()
	    {
	    	$matriks = array();
	    	
	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,9';
	    	$nilai['dampak'] = '0,05';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,9';
	    	$nilai['dampak'] = '0,2';
	    	$nilai['tingkat'] = 'Sedang';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,9';
	    	$nilai['dampak'] = '0,4';
	    	$nilai['tingkat'] = 'Tinggi';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,9';
	    	$nilai['dampak'] = '0,6';
	    	$nilai['tingkat'] = 'Tinggi';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,9';
	    	$nilai['dampak'] = '0,8';
	    	$nilai['tingkat'] = 'Tinggi';
	    	array_push($matriks, $nilai);

	    	// 0.7

	    	$nilai['probabilitas'] = '0,7';
	    	$nilai['dampak'] = '0,05';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,7';
	    	$nilai['dampak'] = '0,2';
	    	$nilai['tingkat'] = 'Sedang';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,7';
	    	$nilai['dampak'] = '0,4';
	    	$nilai['tingkat'] = 'Sedang';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,7';
	    	$nilai['dampak'] = '0,6';
	    	$nilai['tingkat'] = 'Tinggi';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,7';
	    	$nilai['dampak'] = '0,8';
	    	$nilai['tingkat'] = 'Tinggi';
	    	array_push($matriks, $nilai);

	    	// 0.5

	    	$nilai['probabilitas'] = '0,5';
	    	$nilai['dampak'] = '0,05';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,5';
	    	$nilai['dampak'] = '0,2';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,5';
	    	$nilai['dampak'] = '0,4';
	    	$nilai['tingkat'] = 'Sedang';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,5';
	    	$nilai['dampak'] = '0,6';
	    	$nilai['tingkat'] = 'Tinggi';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,5';
	    	$nilai['dampak'] = '0,8';
	    	$nilai['tingkat'] = 'Tinggi';
	    	array_push($matriks, $nilai);

	    	// 0.3

	    	$nilai['probabilitas'] = '0,3';
	    	$nilai['dampak'] = '0,05';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,3';
	    	$nilai['dampak'] = '0,2';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,3';
	    	$nilai['dampak'] = '0,4';
	    	$nilai['tingkat'] = 'Sedang';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,3';
	    	$nilai['dampak'] = '0,6';
	    	$nilai['tingkat'] = 'Sedang';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,3';
	    	$nilai['dampak'] = '0,8';
	    	$nilai['tingkat'] = 'Tinggi';
	    	array_push($matriks, $nilai);

	    	// 0.1

	    	$nilai['probabilitas'] = '0,1';
	    	$nilai['dampak'] = '0,05';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,1';
	    	$nilai['dampak'] = '0,2';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,1';
	    	$nilai['dampak'] = '0,4';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,1';
	    	$nilai['dampak'] = '0,6';
	    	$nilai['tingkat'] = 'Rendah';
	    	array_push($matriks, $nilai);

	    	$nilai = array();
	    	$nilai['probabilitas'] = '0,1';
	    	$nilai['dampak'] = '0,8';
	    	$nilai['tingkat'] = 'Sedang';
	    	array_push($matriks, $nilai);

	    	return $matriks;
	    }
	}

?>
