<?php
	
	include "Database.php";

	class Struktur_pekerjaan extends Database{

		private $table = "struktur_pekerjaan";
		private $primary = "strkpek_id";
		private $field = array(
									'strkpek_id',
									'pryk_id',
									'pek_id',
									'pek_id_pendahulu',
									'strkpek_volume',
									'strkpek_status'
							  );
		private $field_update = array(
										'pek_id',
										'pek_id_pendahulu',
										'strkpek_volume',
										'strkpek_status'
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
	    	echo $value;

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

	    public function getDataStruktur_pekerjaan($pryk_id){
	    	$result = $this->raw("SELECT * FROM `Struktur_pekerjaan` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` JOIN `pekerjaan` c on a.`pek_id` = c.`pek_id` where a.`pryk_id` = '$pryk_id' ORDER BY cast(substring_index(`a`.`strkpek_no`,'.',1) as unsigned), cast(substring_index(substring_index(`a`.`strkpek_no`,'.',2),'.',-1) as unsigned), cast(substring_index(substring_index(`a`.`strkpek_no`,'.',3),'.',-1) as unsigned)");
	     	return $result;
	    }

	    public function getDataStruktur_pekerjaan_top($pryk_id){
	    	$result = $this->raw("SELECT * FROM `Struktur_pekerjaan` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` JOIN `pekerjaan` c on a.`pek_id` = c.`pek_id` where a.`pryk_id` = '$pryk_id' and pek_id_pendahulu IS NULL");
	     	return $result;
	    }

	    public function getDataStruktur_pekerjaan_sub($id){
	    	$result = $this->raw("SELECT * FROM `Struktur_pekerjaan` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` JOIN `pekerjaan` c on a.`pek_id` = c.`pek_id` WHERE a.`pek_id_pendahulu` = $id");
	     	return $result;
	    }

	    public function getDataStruktur_pekerjaanByID($id){
	    	$result = $this->raw("SELECT * FROM `Struktur_pekerjaan` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` JOIN `pekerjaan` c on a.`pek_id` = c.`pek_id` where strkpek_id = $id ");
	     	return $result;
	    }

	    // custom

	    public function cekTop($pryk_id){
	    	$data = $this->raw("SELECT * FROM `Struktur_pekerjaan` WHERE pryk_id = '$pryk_id'");
	     	foreach ($data as $v) {
	     		if ($v['strkpek_volume'] == '' || $v['strkpek_volume'] == 'NULL' ||  $v['strkpek_volume'] == '0') {
	     			$value = "`strkpek_status` = 'top'";
	     			$where = "`strkpek_id` = ".$v['strkpek_id'];
	     			if ($this->update($this->table,$value,$where)) {
			    		$result = true;
			    	}
	     		}else{
	     			$value = "`strkpek_status` = 'sub'";
	     			$where = "`strkpek_id` = ".$v['strkpek_id'];
	     			if ($this->update($this->table,$value,$where)) {
			    		$result = true;
			    	}
	     		}
	     	}
	    }

	    public function cekNo($pryk_id){
	    	$strukpek_top = $this->getDataStruktur_pekerjaan_top($pryk_id);
	    	$no = 1;
	    	foreach ($strukpek_top as $d) {
	    		$this->updateNo($d['strkpek_id'],$no.'.');

	    		$strukpek_sub = $this->getDataStruktur_pekerjaan_sub($d['strkpek_id']);
                if (!empty($strukpek_sub)) {
                	$j = 1;
                    foreach ($strukpek_sub as $v) {
						$this->updateNo($v['strkpek_id'],$no.'.'.$j.'.');
						$strukpek_sub2 = $this->getDataStruktur_pekerjaan_sub($v['strkpek_id']);
				        if (!empty($strukpek_sub2)) {
				            $k = 1;
				            foreach ($strukpek_sub2 as $m) {
	                            $this->updateNo($m['strkpek_id'],$no.'.'.$j.'.'.$k.'.');
	                            $k++;
	                        }
				        }
				        $j++;
                    }
                }

                $no++;
	    	}
	    }

	    public function updateNo($strkpek_id, $no){
	    	$value = "`strkpek_no` = '$no'";
    		$where = $this->primary." = ".$strkpek_id;
    		$result = false;
    		if ($this->update($this->table,$value,$where)) {
    			$result = true;
    		}

    		return $result;
	    }

	    public function isTop($strkpek_id){
	    	
	    	$result = $this->raw("SELECT * FROM `Struktur_pekerjaan` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` where a.`pek_id_pendahulu` = $strkpek_id");
	    	if (count($result) > 0) {
	    		return true;
	    	}else{
	    		return false;
	    	}
    		
	    }

	}

?>