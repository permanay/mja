<?php
	
	include "Database.php";

	class Realisasi extends Database{

		private $table = "realisasi";
		private $table2 = "realisasi_jadwal";
		private $table3 = "realisasi_pekerjaan";
		private $primary = "realisasi_id";
		private $primary2 = "reajad_id";
		private $primary3 = "reapek_id";
		private $field = array(
									'realisasi_id',
									'pryk_id',
									'realisasi_minggu',
									'realisasi_biaya_aktual'
							  );
		private $field2 = array(
									'reajad_id',
									'realisasi_id',
									'jdwl_id',
									'reajad_bobot_rencana'
							  );
		private $field3 = array(
									'reapek_id',
									'realisasi_id',
									'strkpek_id',
									'reapek_volume',
									'reapek_harga',
									'reapek_bobot',
							  );
		private $field_update = array(
										'reafsk_minggu',
										'reafsk_biaya'
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

	    public function data_insert2($data, $id_insert = false){
	    	//string field insert
	    	$field = "";
	    	$i = 0;
			$len = count($this->field2);
	    	foreach ($this->field2 as $column) {
	    		$field = $field."`".$column."`";
	    		if ($i != ($len - 1)) {
	    			$field = $field.", ";
	    		}
	    		$i++;
	    	}

	    	//string value insert
	    	$value = "NULL, ";
	    	$i = 0;
	    	foreach ($this->field2 as $column) {
	    		if ($this->primary2 != $column) {
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
	    		$id_insert_data = $this->insert($this->table2,$field,$value,$id_insert);
		    	if ($id_insert_data != 0) {
		    		$result = $id_insert_data;
		    	}
	    	}else{
	    		$result = false;
		    	if ($this->insert($this->table2,$field,$value,$id_insert)) {
		    		$result = true;
		    	}	
	    	}

	     	return $result;
	    }

	    public function data_insert3($data, $id_insert = false){
	    	//string field insert
	    	$field = "";
	    	$i = 0;
			$len = count($this->field3);
	    	foreach ($this->field3 as $column) {
	    		$field = $field."`".$column."`";
	    		if ($i != ($len - 1)) {
	    			$field = $field.", ";
	    		}
	    		$i++;
	    	}

	    	//string value insert
	    	$value = "NULL, ";
	    	$i = 0;
	    	foreach ($this->field3 as $column) {
	    		if ($this->primary3 != $column) {
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
	    		$id_insert_data = $this->insert($this->table3,$field,$value,$id_insert);
		    	if ($id_insert_data != 0) {
		    		$result = $id_insert_data;
		    	}
	    	}else{
	    		$result = false;
		    	if ($this->insert($this->table3,$field,$value,$id_insert)) {
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

	    public function editRealisasiPekerjaan($data){
	    	$where = "`realisasi_id` = '".$data['realisasi_id']."' and `strkpek_id` = '".$data['strkpek_id']."'";

	    	$total_rab = $this->cariTotalRab($data['pryk_id']);
	    	$reapek_harga = $this->cariHargaAHSPSubRab($data['strkpek_id'], $data['pryk_id']) * $data['reapek_volume'];
	    	$bobot = ($reapek_harga / $total_rab)*100;
		 	$reapek_bobot = round($bobot,2);
	    	// value edit
	    	$value = "`reapek_volume` = '".$data['reapek_volume']."', `reapek_harga` = '".$reapek_harga."', `reapek_bobot` = '".$reapek_bobot."'";

	    	$result = false;

	    	if ($this->update($this->table3,$value,$where)) {
	    		$result = true;
	    	}
	    	
	     	return $result;
	    }

	    public function editRealisasiMaster($data){
	    	$where = "`realisasi_id` = '".$data['realisasi_id']."' and `pryk_id` = '".$data['pryk_id']."'";
	    	// value edit
	    	$value = "`realisasi_biaya_aktual` = '".$data['realisasi_biaya_aktual']."'";

	    	$result = false;

	    	if ($this->update($this->table,$value,$where)) {
	    		$result = true;
	    	}
	    	
	     	return $result;
	    }

	    //relasi

	    public function getDataRealisasi($pryk_id, $minggu){
	    	$realisasi = array();

	    	$realisasiMaster = $this->getDataRealisasiMaster($pryk_id, $minggu);
	    	if ($minggu == 1) {
	    		$minggu_lalu = 0;
	    	}else{
	    		$minggu_lalu = $minggu - 1;
	    	}

	    	$jadwal = $this->raw("SELECT a.* FROM `jadwal` a JOIN `Struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` WHERE a.`pryk_id` = '$pryk_id' ORDER BY cast(substring_index(`b`.`strkpek_no`,'.',1) as unsigned), cast(substring_index(substring_index(`b`.`strkpek_no`,'.',2),'.',-1) as unsigned), cast(substring_index(substring_index(`b`.`strkpek_no`,'.',3),'.',-1) as unsigned)");

	    	$key_realisasi = 0;
	    	$key_counter = 0;

	    	$total_rab = $this->cariTotalRab($pryk_id);

    		foreach ($jadwal as $j) {

    			// insert top to array realisasi

    			$realisasi_data = array();
	 			$realisasi_data['realisasi_id'] = $realisasiMaster[0]['realisasi_id'];
	 			$realisasi_data['realisasi_minggu'] = $realisasiMaster[0]['realisasi_minggu'];
	 			$realisasi_data['pryk_id'] = $pryk_id;

	 			$st = $this->raw("SELECT a.*, b.`pek_nama` FROM `struktur_pekerjaan` a JOIN `pekerjaan` b ON a.`pek_id` = b.`pek_id` WHERE a.`strkpek_id` = '".$j['strkpek_id']."'");

	 			$realisasi_data['strkpek_id'] = $st[0]['strkpek_id'];
	 			$realisasi_data['strkpek_no'] = $st[0]['strkpek_no'];
	 			$realisasi_data['jdwl_bobot'] = $j['jdwl_bobot'];
	 			$realisasi_data['strkpek_volume'] = $st[0]['strkpek_volume'];
	 			$realisasi_data['strkpek_status'] = 'top';
	 			$realisasi_data['pek_nama'] = $st[0]['pek_nama'];
	 			$realisasi_data['reapek_volume'] = 0;
	 			$realisasi_data['reapek_harga'] = 0;
	 			$realisasi_data['reapek_bobot'] = 0;
	 			$realisasi_data['reapek_volume_lalu'] = 0;
	 			$realisasi_data['reapek_harga_lalu'] = 0;
	 			$realisasi_data['reapek_bobot_lalu'] = 0;
	 			$realisasi_data['reapek_volume_sampai'] = 0;
	 			$realisasi_data['reapek_harga_sampai'] = 0;
	 			$realisasi_data['reapek_bobot_sampai'] = 0;
	 			array_push($realisasi, $realisasi_data);
	 			$key_realisasi = $key_counter;
	 			$key_counter++;
	 			// insert top to array realisasi

    			$strkpek = $this->raw("SELECT a.*, b.`pek_nama` FROM `struktur_pekerjaan` a JOIN `pekerjaan` b ON a.`pek_id` = b.`pek_id` WHERE a.`pek_id_pendahulu` = '".$j['strkpek_id']."' ORDER BY cast(substring_index(`a`.`strkpek_no`,'.',1) as unsigned), cast(substring_index(substring_index(`a`.`strkpek_no`,'.',2),'.',-1) as unsigned), cast(substring_index(substring_index(`a`.`strkpek_no`,'.',3),'.',-1) as unsigned)");

    			$reapek_harga = 0;
    			$reapek_bobot = 0;
    			$reapek_harga_lalu = 0;
    			$reapek_bobot_lalu = 0;
    			$reapek_harga_sampai = 0;
    			$reapek_bobot_sampai = 0;

    			foreach ($strkpek as $s) {

    				$realisasi_data = array();
		 			$realisasi_data['realisasi_id'] = $realisasiMaster[0]['realisasi_id'];
		 			$realisasi_data['realisasi_minggu'] = $realisasiMaster[0]['realisasi_minggu'];
		 			$realisasi_data['pryk_id'] = $pryk_id;
		 			$realisasi_data['strkpek_id'] = $s['strkpek_id'];
		 			$realisasi_data['strkpek_no'] = $s['strkpek_no'];

		 			$harga_rab_pek = $this->cariHargaAHSPSubRab($s['strkpek_id'], $pryk_id) * $s['strkpek_volume'];
		    		$bobot = ($harga_rab_pek / $total_rab)*100;
		 			$realisasi_data['jdwl_bobot'] = round($bobot,2);

		 			$realisasi_data['strkpek_volume'] = $s['strkpek_volume'];
		 			$realisasi_data['strkpek_status'] = 'sub';
		 			$realisasi_data['pek_nama'] = $s['pek_nama'];

		 			// realiasasi minggu ini
		 			$realisasi_minggu = $this->getDataRealisasiPekerjaan($realisasi_data['realisasi_id'], $realisasi_data['strkpek_id']);
		 			$realisasi_data['reapek_volume'] = $realisasi_minggu[0]['reapek_volume'];
		 			$realisasi_data['reapek_harga'] = $realisasi_minggu[0]['reapek_harga'];
		 			$realisasi_data['reapek_bobot'] = $realisasi_minggu[0]['reapek_bobot'];
		 			// realiasasi minggu ini

		 			if ($minggu_lalu != 0) {

		 				// realiasasi minggu lalu
		 				$realisasi_lalu = $this->getDataRealisasiMaster($pryk_id, $minggu_lalu);
			 			$realisasi_minggu_lalu = $this->getDataRealisasiPekerjaan($realisasi_lalu[0]['realisasi_id'], $realisasi_data['strkpek_id']);
			 			$realisasi_data['reapek_volume_lalu'] = $realisasi_minggu_lalu[0]['reapek_volume'];
			 			$realisasi_data['reapek_harga_lalu'] = $realisasi_minggu_lalu[0]['reapek_harga'];
			 			$realisasi_data['reapek_bobot_lalu'] = $realisasi_minggu_lalu[0]['reapek_bobot'];
			 			// realiasasi minggu lalu

			 			// realiasasi sampai minggu ini
			 			$realisasi_minggu_sampai = $this->getDataRealisasiPekerjaanSampai($pryk_id, $minggu, $realisasi_data['strkpek_id']);
			 			$realisasi_data['reapek_volume_sampai'] = $realisasi_minggu_sampai['reapek_volume'];
			 			$realisasi_data['reapek_harga_sampai'] = $realisasi_minggu_sampai['reapek_harga'];
			 			$realisasi_data['reapek_bobot_sampai'] = $realisasi_minggu_sampai['reapek_bobot'];
			 			// realiasasi sampai minggu ini

		 			}else{

		 				// realiasasi minggu lalu
			 			$realisasi_data['reapek_volume_lalu'] = 0;
			 			$realisasi_data['reapek_harga_lalu'] = 0;
			 			$realisasi_data['reapek_bobot_lalu'] = 0;
			 			// realiasasi minggu lalu

			 			// realiasasi sampai minggu ini
			 			$realisasi_data['reapek_volume_sampai'] = $realisasi_data['reapek_volume'];
			 			$realisasi_data['reapek_harga_sampai'] = $realisasi_data['reapek_harga'];
			 			$realisasi_data['reapek_bobot_sampai'] = $realisasi_data['reapek_bobot'];
			 			// realiasasi sampai minggu ini

		 			}

		 			array_push($realisasi, $realisasi_data);
	 				$key_counter++;

		 			$reapek_harga = $reapek_harga + $realisasi_data['reapek_harga'];
	    			$reapek_bobot = $reapek_bobot + $realisasi_data['reapek_bobot'];
	    			$reapek_harga_lalu = $reapek_harga_lalu + $realisasi_data['reapek_harga_lalu'];
	    			$reapek_bobot_lalu = $reapek_bobot_lalu + $realisasi_data['reapek_bobot_lalu'];
	    			$reapek_harga_sampai = $reapek_harga_sampai + $realisasi_data['reapek_harga_sampai'];
	    			$reapek_bobot_sampai = $reapek_bobot_sampai + $realisasi_data['reapek_bobot_sampai'];

    			}

    			$realisasi[$key_realisasi]['reapek_harga'] = $reapek_harga;
	 			$realisasi[$key_realisasi]['reapek_bobot'] = $reapek_bobot;
	 			$realisasi[$key_realisasi]['reapek_harga_lalu'] = $reapek_harga_lalu;
	 			$realisasi[$key_realisasi]['reapek_bobot_lalu'] = $reapek_bobot_lalu;
	 			$realisasi[$key_realisasi]['reapek_harga_sampai'] = $reapek_harga_sampai;
	 			$realisasi[$key_realisasi]['reapek_bobot_sampai'] = $reapek_bobot_sampai;
    		}

    		return $realisasi;

 			// foreach ($realisasi as $v) {
 			// 	echo $v['strkpek_no'].'-'.$v['reapek_volume'].'-'.$v['reapek_harga'].'-'.$v['reapek_bobot'].'- lalu - '.$v['reapek_volume_lalu'].'-'.$v['reapek_harga_lalu'].'-'.$v['reapek_bobot_lalu'].'-'.$v['reapek_volume_sampai'].'-'.$v['reapek_harga_sampai'].'-'.$v['reapek_bobot_sampai'].'<br>';
 			// }
	    	
	    }

	    public function getDataRealisasiBiaya($pryk_id){
	    	$realisasi_biaya = array();

	    	$realisasiMaster = $this->raw("SELECT * FROM `realisasi` WHERE `pryk_id` = '$pryk_id' ORDER BY `realisasi_minggu` ASC ");

	    	foreach ($realisasiMaster as $v) {
	    		$realisasi_data = array();
	    		$realisasi_data['pryk_id'] = $pryk_id;
	 			$realisasi_data['realisasi_id'] = $v['realisasi_id'];
	 			$realisasi_data['realisasi_minggu'] = $v['realisasi_minggu'];
	 			$realisasi_jadwal = $this->getDataBobotRencanaMinggu($v['realisasi_id']);
	 			$realisasi_data['bobot_rencana_minggu'] = $realisasi_jadwal[0]['bobot_rencana_minggu'];
	 			$realisasi_pekerjaan = $this->getDataBobotAktualMinggu($v['realisasi_id']);
	 			$realisasi_data['bobot_aktual_minggu'] = $realisasi_pekerjaan[0]['bobot_aktual_minggu'];
	 			$realisasi_data['realisasi_biaya_aktual'] = $v['realisasi_biaya_aktual'];
	 			array_push($realisasi_biaya, $realisasi_data);
	    	}

	    	return $realisasi_biaya;
	    }	

	    public function getDataBobotRencanaMinggu($realisasi_id){
			$result = $this->raw("SELECT SUM(`reajad_bobot_rencana`) as bobot_rencana_minggu FROM `realisasi_jadwal` WHERE `realisasi_id` = '$realisasi_id'");
	     	return $result;	
		}	

		public function getDataBobotAktualMinggu($realisasi_id){
			$result = $this->raw("SELECT SUM(`reapek_bobot`) as bobot_aktual_minggu FROM `realisasi_pekerjaan` WHERE `realisasi_id` = '$realisasi_id'");
	     	return $result;	
		}	

	    public function getDataRealisasiMaster($pryk_id, $minggu){
			$result = $this->raw("SELECT * FROM `realisasi` WHERE `pryk_id` = '$pryk_id' AND `realisasi_minggu` = '$minggu'");
	     	return $result;	
		}	

		public function getDataRealisasiPekerjaan($realisasi_id, $strkpek_id){
			$result = $this->raw("SELECT * FROM `realisasi_pekerjaan` WHERE `realisasi_id` = '$realisasi_id' AND `strkpek_id` = '$strkpek_id'");
	     	return $result;	
		}

		public function getDataRealisasiPekerjaanSampai($pryk_id, $minggu, $strkpek_id){
			$sampai = array();
			$jum_bobot = 0;
			$jum_harga = 0;
			$jum_vol = 0;
			for ($i=1; $i <= $minggu; $i++) { 
				$realisasi = $this->getDataRealisasiMaster($pryk_id, $i);
				$realisasi_pekerjaan = $this->getDataRealisasiPekerjaan($realisasi[0]['realisasi_id'], $strkpek_id);	
				$jum_bobot = $jum_bobot + $realisasi_pekerjaan[0]['reapek_bobot'];
				$jum_harga = $jum_harga + $realisasi_pekerjaan[0]['reapek_harga'];
				$jum_vol = $jum_vol + $realisasi_pekerjaan[0]['reapek_volume'];
			}

			$sampai['reapek_volume'] = $jum_vol;
			$sampai['reapek_harga'] = $jum_harga;
			$sampai['reapek_bobot'] = $jum_bobot;

	     	return $sampai;	
		} 

		public function getDataRealisasiMinggu($pryk_id, $minggu, $jdwl_id){
			$result = $this->raw("SELECT a.*,c.*,d.`jdwl_bobot`,f.`pek_nama`,e.`strkpek_no`,e.`strkpek_volume` FROM `Realisasi_fisik` a JOIN `proyek` b on b.`pryk_id` = a.`pryk_id` JOIN `detail_realisasi` c on c.`reafsk_id` = a.`reafsk_id` JOIN `jadwal` d on c.`jdwl_id` = d.`jdwl_id` JOIN `struktur_pekerjaan` e on d.`strkpek_id` = e.`strkpek_id` JOIN `pekerjaan` f on e.`pek_id` = f.`pek_id` WHERE a.`pryk_id` = '$pryk_id' AND a.`reafsk_minggu` = '$minggu' AND c.`jdwl_id` = '$jdwl_id'");

	     	return $result;	
		}	

		public function getDataRealisasiSampaiMinggu($pryk_id, $minggu, $jdwl_id){
			$sampai = array();
			$jum_bobot = 0;
			$jum_vol = 0;
			for ($i=1; $i <= $minggu; $i++) { 
				$realisasi = $this->getDataRealisasiMinggu($pryk_id, $i, $jdwl_id);	
				$jum_bobot = $jum_bobot + $realisasi[0]['detrea_bobot'];
				$jum_vol = $jum_vol + $realisasi[0]['detrea_volume'];
			}

			$sampai['detrea_bobot'] = $jum_bobot;
			$sampai['detrea_volume'] = $jum_vol;

	     	return $sampai;	
		}    

	    public function getDataRealisasi_fisikByID($id){
	    	$result = $this->raw("SELECT * FROM `Realisasi_fisik` a LEFT JOIN `pengguna` b on a.`pgna_id` = b.`pgna_id` JOIN `jabatan` c on a.`jbtn_id` = c.`jbtn_id` where a.`peg_id` = '$id' ");
	     	return $result;
	    }

	    // custom

	    public function cekDataRealisasi($pryk_id, $minggu, $cpm){

	    	if ($this->cekMingguRealisasi($minggu)) {	  

	    		// Insert master realisasi

	    		$data['pryk_id'] = $pryk_id;
	 			$data['realisasi_minggu'] = $minggu;
	 			$data['realisasi_biaya_aktual'] = 0;
				$data['realisasi_id'] = $this->data_insert($data, true);  

				// Insert master realisasi

	    		$jadwal = $this->raw("SELECT a.* FROM `jadwal` a JOIN `Struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` WHERE a.`pryk_id` = '$pryk_id' ORDER BY cast(substring_index(`b`.`strkpek_no`,'.',1) as unsigned), cast(substring_index(substring_index(`b`.`strkpek_no`,'.',2),'.',-1) as unsigned), cast(substring_index(substring_index(`b`.`strkpek_no`,'.',3),'.',-1) as unsigned)");
	    		foreach ($jadwal as $j) {

	    			$key = $this->searchKeyArrayCPM($j['jdwl_id'], $cpm);
	    			$jadwal_mulai_minggu = $cpm[$key]['eeti'] + 1;
	    			$jadwal_akhir_minggu = $jadwal_mulai_minggu + ($j['jdwl_durasi'] - 1);
	    			$bobot_rencana_minggu = 0;

	    			if ($minggu >= $jadwal_mulai_minggu && $minggu <= $jadwal_akhir_minggu) {

	    				// Insert Realisasi Jadwal (bobot rencana)

	    				$bobot_rencana_minggu = $j['jdwl_bobot'] / $j['jdwl_durasi'];
	    				$data['jdwl_id'] = $j['jdwl_id'];
			 			$data['reajad_bobot_rencana'] = $bobot_rencana_minggu;
						$this->data_insert2($data); 

						// Insert Realisasi Jadwal (bobot rencana)	    		
	    			}

	    			// Insert Realisasi Pekerjaan

		    		$strkpek = $this->raw("SELECT a.* FROM `struktur_pekerjaan` a WHERE a.`pek_id_pendahulu` = '".$j['strkpek_id']."' ORDER BY cast(substring_index(`a`.`strkpek_no`,'.',1) as unsigned), cast(substring_index(substring_index(`a`.`strkpek_no`,'.',2),'.',-1) as unsigned), cast(substring_index(substring_index(`a`.`strkpek_no`,'.',3),'.',-1) as unsigned)");
		    		
		    		foreach ($strkpek as $s) {
		    			$data['strkpek_id'] = $s['strkpek_id'];
			 			$data['reapek_volume'] = 0;
			 			$data['reapek_harga'] = 0;
			 			$data['reapek_bobot'] = 0;
						$this->data_insert3($data);
		    		}
		    		
		    		// Insert Realisasi Pekerjaan
	    		}

	    	}

	    }

	    public function insertJadwalRealisasi($pryk_id, $minggu, $realisasi_id){
	    	$jadwal = $this->raw("SELECT jdwl_id FROM `jadwal` a JOIN `Struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` WHERE a.`pryk_id` = '$pryk_id' ORDER BY cast(substring_index(`b`.`strkpek_no`,'.',1) as unsigned), cast(substring_index(substring_index(`b`.`strkpek_no`,'.',2),'.',-1) as unsigned), cast(substring_index(substring_index(`b`.`strkpek_no`,'.',3),'.',-1) as unsigned)");

	    	foreach ($jadwal as $v) {
	    		$data['realisasi_id'] = $realisasi_id;
	 			$data['jdwl_id'] = $v['jdwl_id'];
	 			$data['reajad_bobot_rencana'] = 0;
				$data['reajad_id'] = $this->data_insert2($data, true);    		
	    	}
	    }

		public function cekMingguRealisasi($minggu){
			$flag = false;
			$result = $this->raw("SELECT * FROM `realisasi` where `realisasi_minggu` = '$minggu' ");
			if (count($result) < 1) {
				$flag = true;
			}

	     	return $flag;
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

	    public function durasiProyek($pryk_id){
	    	
	    	$jadwal = $this->raw("SELECT * FROM `Jadwal` WHERE `pryk_id` = '$pryk_id' ORDER BY `jdwl_tgl_mulai` ASC");

	    	$durasi_proyek = array();
	    	$tgl_mulai = $jadwal[0]['jdwl_tgl_mulai'];
	    	$tgl_selesai = $jadwal[count($jadwal)-1]['jdwl_tgl_mulai'];
	    	$durasi = '+'.$jadwal[count($jadwal)-1]['jdwl_durasi'].' week';
			$tgl_selesai = date('Y-m-d', strtotime($durasi, strtotime($tgl_selesai)));
			for ($i=1; $i <= 40 ; $i++) { 

	    		$durasi = '+6 days';
				$tgl_akhir = date('Y-m-d', strtotime($durasi, strtotime($tgl_mulai)));

				if ($tgl_akhir < $tgl_selesai) {
					$minggu = array();
					$minggu['minggu'] = $i;
					$minggu['tgl_awal_minggu'] = $tgl_mulai;
					$minggu['tgl_akhir_minggu'] = $tgl_akhir;
					array_push($durasi_proyek, $minggu);

					$durasi = '+1 days';
					$tgl_mulai = date('Y-m-d', strtotime($durasi, strtotime($tgl_akhir)));
				}else{
					break;
				}
				
			}

			return $durasi_proyek;
	     	
	    }

	    public function searchKeyArrayCPM($jdwl_id, $cpm) {
		   foreach ($cpm as $key => $val) {
				if ($val['jdwl_id'] == $jdwl_id) {
				   return $key;
				}
		   }
		   return null;
		}

		public function cariTotalRab($pryk_id){
	    	$rab = $this->getDataAllRab($pryk_id);
	    	$total_rab = 0;
	    	foreach ($rab as $d) {
	    		if ($d['strkpek_status'] == 'sub') {
		          $total_rab = $total_rab + $d['jumlah'];
		        }
	    	}

	    	return $total_rab;
	    }

	    public function getDataAllRab($pryk_id){
	    	$rab = $this->raw("SELECT a.*,b.*,c.*,d.`ahsp_id`,e.* FROM `Rab` a JOIN `proyek` b on a.`pryk_id` = b.`pryk_id` JOIN `struktur_pekerjaan` c on a.`strkpek_id` = c.`strkpek_id` JOIN `pekerjaan` e on c.`pek_id` = e.`pek_id` LEFT JOIN `ahsp` d on a.`ahsp_id` = d.`ahsp_id` where a.`pryk_id` = '$pryk_id' ORDER BY c.`strkpek_no` ASC");
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

	    public function cariHargaAHSPSubRab($strkpek_id, $pryk_id){
	    	$rab = $this->raw("SELECT * FROM `rab` where `pryk_id` = '$pryk_id' and `strkpek_id` = ".$strkpek_id);
	    	$harga_satuan = $this->getTotalAhsp($rab[0]['ahsp_id']);
	    	
	    	return $this->getTotalAhsp($rab[0]['ahsp_id']);
	    }

	    public function getDataPengawasan($pryk_id){
	    	$pengawasan = array();

	    	$total_rab = $this->cariTotalRab($pryk_id);
	    	$durasi_proyek = $this->durasiProyek($pryk_id);

	    	$realisasiMaster = $this->raw("SELECT * FROM `realisasi` WHERE `pryk_id` = '$pryk_id' ORDER BY `realisasi_minggu` ASC ");

	    	foreach ($realisasiMaster as $v) {

	    		$realisasi_jadwal = $this->getDataBobotRencanaMinggu($v['realisasi_id']);
	    		$realisasi_pekerjaan = $this->getDataBobotAktualMinggu($v['realisasi_id']);
	    		$bobot_rencana_minggu = $realisasi_jadwal[0]['bobot_rencana_minggu'];
	    		$bobot_aktual_minggu = $realisasi_pekerjaan[0]['bobot_aktual_minggu'];
	    		$minggu = $v['realisasi_minggu'];
	    		$acwp = $v['realisasi_biaya_aktual'];
	    		$bcws = round( ($bobot_rencana_minggu/100) * $total_rab, 2);
	    		$bcwp = round( ($bobot_aktual_minggu/100) * $total_rab, 2);
	    		$sv = round($bcwp - $bcws,2);
	    		$spi = round($bcwp / $bcws, 4);
	    		if ($sv < 0 && $spi < 1) {
	    			$ket_kin_jadwal = "Terjadi keterlambatan pengerjaan proyek";
	    		}else {
	    			$ket_kin_jadwal = "Terjadi percepatan pengerjaan proyek";
	    		}
	    		$cv = round($bcwp - $acwp,2);
	    		$cpi = round($bcwp / $acwp, 4);
	    		if ($cv < 0 && $cpi < 1) {
	    			$ket_kin_biaya = "Terjadi pembengkakan pembiayaan proyek";
	    		}else if ($cv == 0 && $cpi == 0) {
	    			$ket_kin_biaya = "Tidak ada kemajuan realisasi proyek";
	    		}else{
	    			$ket_kin_biaya = "Terjadi penghematan pembiayaan proyek";
	    		}
	    		$sisa_waktu = count($durasi_proyek) - $minggu;
	    		$ecd = ($sisa_waktu / $spi) + $minggu;
	    		$ecd = round($ecd,2);
	    		$percen_ecd = 100 - (($ecd / count($durasi_proyek))*100);
	    		$percen_ecd = round($percen_ecd,2);
	    		$eac = (($total_rab - $bcwp) / $cpi) + $acwp;
	    		$eac = round($eac,2);
	    		$percen_eac = 100 - (($eac / $total_rab)*100);
	    		$percen_eac = round($percen_eac,2);
	    		$pengawasan_data = array();

	    		$pengawasan_data['pryk_id'] = $pryk_id;
	    		$pengawasan_data['bac'] = $total_rab;
	 			$pengawasan_data['realisasi_id'] = $v['realisasi_id'];
	 			$pengawasan_data['pengawasan_minggu'] = $minggu;
	 			$pengawasan_data['total_rab'] = $total_rab;
	 			$pengawasan_data['bobot_rencana_minggu'] = $bobot_rencana_minggu;
	 			$pengawasan_data['bobot_aktual_minggu'] = $bobot_aktual_minggu;
	 			$pengawasan_data['pengawasan_acwp'] = $acwp;
	 			$pengawasan_data['bobot_rencana_minggu'] = $bobot_rencana_minggu;
	 			$pengawasan_data['bobot_aktual_minggu'] = $bobot_aktual_minggu;
	 			$pengawasan_data['pengawasan_bcws'] = $bcws;
	 			$pengawasan_data['pengawasan_bcwp'] = $bcwp;
	 			$pengawasan_data['pengawasan_sv'] = $sv;
	 			$pengawasan_data['pengawasan_spi'] = $spi;
	 			$pengawasan_data['pengawasan_ket_kin_jadwal'] = $ket_kin_jadwal;
	 			$pengawasan_data['pengawasan_cv'] = $cv;
	 			$pengawasan_data['pengawasan_cpi'] = $cpi;
	 			$pengawasan_data['pengawasan_ket_kin_biaya'] = $ket_kin_biaya;
	 			$pengawasan_data['pengawasan_sisa_waktu'] = $sisa_waktu;
	 			$pengawasan_data['pengawasan_ecd'] = $ecd;
	 			$pengawasan_data['pengawasan_percen_ecd'] = $percen_ecd;
	 			$pengawasan_data['pengawasan_eac'] = $eac;
	 			$pengawasan_data['pengawasan_percen_eac'] = $percen_eac;
	 			
	 			array_push($pengawasan, $pengawasan_data);	

	    	}

	    	return $pengawasan;
 			
	    }

	}

?>


