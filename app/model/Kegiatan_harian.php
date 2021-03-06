<?php
	
	include "Database.php";

	class Kegiatan_harian extends Database{

		private $table = "kegiatan_harian";
		private $primary = "kgtnhari_id";
		private $field = array(
									'kgtnhari_id',
									'pryk_id',
									'kgtnhari_tanggal',
									'kgtnhari_cuaca_pagi',
									'kgtnhari_cuaca_siang',
									'kgtnhari_cuaca_sore',
									'kgtnhari_catatan'
							  );
		private $field_update = array(
										'kgtnhari_tanggal',
										'kgtnhari_cuaca_pagi',
										'kgtnhari_cuaca_siang',
										'kgtnhari_cuaca_sore',
										'kgtnhari_catatan'
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

	    public function getDataKegiatan_harian(){
	    	$result = $this->raw("SELECT * FROM `Kegiatan_harian`");
	    	foreach ($result as $k => $v) {
	    		$result[$k]['bahan_baku'] = $this->getDataKegiatanHarianBahanBaku($v['kgtnhari_id']);
	    		$result[$k]['pekerjaan'] = $this->getDataKegiatanHarianPekerjaan($v['kgtnhari_id']);
	    		$result[$k]['tenaga_kerja'] = $this->getDataKegiatanHarianTenagaKerja($v['kgtnhari_id']);
	    		$result[$k]['risiko'] = $this->getDataKegiatanHarianRisiko($v['kgtnhari_id']);
	    	}
	     	return $result;
	    }

	    public function getDataKegiatan_harianById($kgtnhari_id){
	    	$result = $this->raw("SELECT * FROM `Kegiatan_harian` where `kgtnhari_id` = '$kgtnhari_id'");
	    	foreach ($result as $k => $v) {
	    		$result[$k]['bahan_baku'] = $this->getDataKegiatanHarianBahanBaku($v['kgtnhari_id']);
	    		$result[$k]['pekerjaan'] = $this->getDataKegiatanHarianPekerjaan($v['kgtnhari_id']);
	    		$result[$k]['tenaga_kerja'] = $this->getDataKegiatanHarianTenagaKerja($v['kgtnhari_id']);
	    		$result[$k]['risiko'] = $this->getDataKegiatanHarianRisiko($v['kgtnhari_id']);
	    	}
	     	return $result;
	    }

	    public function getDataKegiatanHarianBahanBaku($kgtnhari_id){
	    	$result = $this->raw("SELECT * FROM `Kegiatan_harian_bahan_baku` a JOIN `kegiatan_harian` b on a.`kgtnhari_id` = b.`kgtnhari_id` JOIN `bahan_baku` c on a.`bhnbku_id` = c.`bhnbku_id` WHERE a.`kgtnhari_id` = '$kgtnhari_id'");
	     	return $result;
	    }

	    public function getDataKegiatanHarianPekerjaan($kgtnhari_id){
	    	$result = $this->raw("SELECT * FROM `kegiatan_harian_pekerjaan` a JOIN `kegiatan_harian` b on a.`kgtnhari_id` = b.`kgtnhari_id` JOIN `struktur_pekerjaan` c on a.`strkpek_id` = c.`strkpek_id` JOIN `pekerjaan` d on c.`pek_id` = d.`pek_id` WHERE a.`kgtnhari_id` = '$kgtnhari_id'");
	     	return $result;
	    }

	   	public function getDataKegiatanHarianTenagaKerja($kgtnhari_id){
	    	$result = $this->raw("SELECT * FROM `kegiatan_harian_tenaga_kerja` a JOIN `kegiatan_harian` b on a.`kgtnhari_id` = b.`kgtnhari_id` JOIN `jabatan` c on a.`jbtn_id` = c.`jbtn_id` WHERE a.`kgtnhari_id` = '$kgtnhari_id'");
	     	return $result;
	    }

	    public function getDataKegiatanHarianRisiko($kgtnhari_id){
	    	$result = $this->raw("SELECT * FROM `kegiatan_harian_risiko` a JOIN `kegiatan_harian` b on a.`kgtnhari_id` = b.`kgtnhari_id` JOIN `risiko` c on a.`rsko_id` = c.`rsko_id` WHERE a.`kgtnhari_id` = '$kgtnhari_id'");
	     	return $result;
	    }

	    // custom

	}

?>