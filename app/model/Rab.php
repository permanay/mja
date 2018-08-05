<?php
	
	include "Database.php";

	class Rab extends Database{

		private $table = "rab";
		private $primary = "rab_id";
		private $field = array(
									'rab_id',
									'pryk_id',
									'strkpek_id',
									'ahsp_id',
									'detrab_harga'
							  );
		private $field_update = array(
										'ahsp_id',
										'detrab_harga'
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

	    public function getDataRab($pryk_id){
	    	$result = $this->raw("SELECT * FROM `Rab` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` JOIN `struktur_pekerjaan` c on a.`strkpek_id` = c.`strkpek_id` LEFT JOIN `ahsp` d on a.`ahsp_id` = d.`ahsp_id` where a.`pryk_id` = '$pryk_id' ORDER BY c.`strkpek_no` ASC");
	     	return $result;
	    }

	    public function getDataRabByID($id){
	    	$result = $this->raw("SELECT * FROM `Rab` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` JOIN `struktur_pekerjaan` c on a.`strkpek_id` = c.`strkpek_id` LEFT JOIN `ahsp` d on a.`ahsp_id` = d.`ahsp_id` where a.`peg_id` = '$id' ");
	     	return $result;
	    }
	    // custom

	    public function cekDataRab($pryk_id){
	    	$strukpek = $this->raw("SELECT * FROM `struktur_pekerjaan` where `pryk_id` = '$pryk_id'");
	    	foreach ($strukpek as $v) {
	    		$flag = $this->cariStrukpekInRab($v['strkpek_id']);
	    		if (!$flag) {
	    			$data['pryk_id'] = $pryk_id;
	     			$data['strkpek_id'] = $v['strkpek_id'];
	     			$data['ahsp_id'] = 'NULL';
	     			$data['detrab_harga'] = 0;
	    			$this->data_insert($data);
	    		}else{

	    		}
	    	}
	    }

	    public function cariStrukpekInRab($strkpek_id){
	    	$result = $this->getDataWhere("strkpek_id",$strkpek_id);
	    	if ($result) {
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	    public function getDataAllRab($pryk_id){
	    	$rab = $this->raw("SELECT a.*,b.*,c.*,d.`ahsp_id`,e.* FROM `Rab` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` JOIN `struktur_pekerjaan` c on a.`strkpek_id` = c.`strkpek_id` JOIN `pekerjaan` e on c.`pek_id` = e.`pek_id` LEFT JOIN `ahsp` d on a.`ahsp_id` = d.`ahsp_id` where a.`pryk_id` = '$pryk_id' ORDER BY cast(substring_index(`c`.`strkpek_no`,'.',1) as unsigned), cast(substring_index(substring_index(`c`.`strkpek_no`,'.',2),'.',-1) as unsigned), cast(substring_index(substring_index(`c`.`strkpek_no`,'.',3),'.',-1) as unsigned)");
	    	foreach ($rab as $k => $v) {
	    		if ($v['strkpek_status'] != 'top') {
		    		$rab[$k]['harga_satuan'] =  $this->getTotalAhsp($v['ahsp_id']);
		    		$rab[$k]['jumlah'] =  $this->cariJumlahHarga($v['rab_id'], $this->getTotalAhsp($v['ahsp_id']));
	    		}else{
	    			$rab[$k]['harga_satuan'] =  "";
		    		$rab[$k]['jumlah'] =  $this->cariTotal($v['pryk_id'], $v['strkpek_id']);
	    		}
	    	}
	     	return $rab;
	    }

	    public function cariJumlahHarga($rab_id, $harga_satuan){
	    	$rabh = $this->raw("SELECT * FROM `rab` a JOIN `struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` where a.`rab_id` = '$rab_id' and a.`rab_id` = ".$rab_id);
	    	$jumlah = $rabh[0]['strkpek_volume'] * $harga_satuan;

	    	return $jumlah;
	    }

	    public function cariTotal($pryk_id, $strkpek_id){
	    	$strukpek = $this->raw("SELECT * FROM `struktur_pekerjaan` where `pek_id_pendahulu` = '$strkpek_id' ORDER BY `strkpek_no` ASC");
	    	$total = 0;
	    	foreach ($strukpek as $v) {
	    		$rab = $this->raw("SELECT * FROM `rab` a JOIN `struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` where a.`pryk_id` = ".$pryk_id." and a.`strkpek_id` = ".$v['strkpek_id']);
	    		if ($v['strkpek_status'] != 'top') {
	    			$total = $total + $this->cariJumlahHarga($rab[0]['rab_id'], $this->getTotalAhsp($rab[0]['ahsp_id']));
	    		}
	    	}

	    	return $total;
	    }

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

	    public function getDataDetail_ahsp_bahan_baku($ahsp_id){
	    	$result = $this->raw("SELECT * FROM `Detail_ahsp_bahan_baku` a JOIN `ahsp` b on a.`ahsp_id` = b.`ahsp_id` JOIN `bahan_baku` c on a.`bhnbku_id` = c.`bhnbku_id` where a.`ahsp_id` = '$ahsp_id'");
	     	return $result;
	    }

	    public function getDataDetail_ahsp_upah($ahsp_id){
	    	$result = $this->raw("SELECT * FROM `detail_ahsp_upah` a JOIN `ahsp` b on a.`ahsp_id` = b.`ahsp_id` JOIN `upah` c on a.`upah_id` = c.`upah_id` JOIN `jabatan` d on d.`jbtn_id` = c.`jbtn_id` where a.`ahsp_id` = '$ahsp_id'");
	     	return $result;
	    }


	}

?>