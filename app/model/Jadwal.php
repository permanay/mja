<?php
	
	include "Database.php";

	class Jadwal extends Database{

		private $table = "jadwal";
		private $primary = "jdwl_id";
		private $field = array(
									'jdwl_id',
									'pryk_id',
									'strkpek_id',
									'jdwl_bobot',
									'jdwl_tgl_mulai',
									'jdwl_durasi',
									'jdwl_pendahulu_id'
							  );
		private $field_tenker = array(
									'jdwltenker_id',
									'jdwl_id',
									'jbtn_id',
									'jdwltenker_jumlah'
							  );
		private $field_update = array(
										'jdwl_durasi'
									 );
		private $field_update_tgl = array(
										'jdwl_tgl_mulai'
									 );
		private $field_update_id = array(
										'jdwl_pendahulu_id'
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

	    public function data_insert_tenker($data, $id_insert = false){
	    	//string field insert
	    	$field = "";
	    	$i = 0;
			$len = count($this->field_tenker);
	    	foreach ($this->field_tenker as $column) {
	    		$field = $field."`".$column."`";
	    		if ($i != ($len - 1)) {
	    			$field = $field.", ";
	    		}
	    		$i++;
	    	}

	    	//string value insert
	    	$value = "NULL, ";
	    	$i = 0;
	    	foreach ($this->field_tenker as $column) {
	    		if ('jdwltenker_id' != $column) {
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
	    		$id_insert_data = $this->insert('jadwal_tenaga_kerja',$field,$value,$id_insert);
		    	if ($id_insert_data != 0) {
		    		$result = $id_insert_data;
		    	}
	    	}else{
	    		$result = false;
		    	if ($this->insert('jadwal_tenaga_kerja',$field,$value,$id_insert)) {
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

	    public function data_edit_tgl($data){
	    	$where = $this->primary." = ".$data[$this->primary];

	    	// value edit
	    	$value = "";
	    	$i = 0;
			$len = count($this->field_update_tgl);
	    	foreach ($this->field_update_tgl as $column) {
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

	    public function data_edit_id($data){
	    	$where = $this->primary." = ".$data[$this->primary];

	    	// value edit
	    	$value = "";
	    	$i = 0;
			$len = count($this->field_update_id);
	    	foreach ($this->field_update_id as $column) {
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

	    public function getDataJadwal($pryk_id){
	    	$result = $this->raw("SELECT * FROM `Jadwal` a JOIN `struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` JOIN `proyek` c on a.`pryk_id` = c.`pryk_id` JOIN `pekerjaan` d on b.`pek_id` = d.`pek_id` WHERE a.`pryk_id` = '$pryk_id'");
	     	return $result;
	    }

	    public function getDataJadwalAll($pryk_id){
	    	$result = $this->raw("SELECT * FROM `Jadwal` a JOIN `struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` JOIN `proyek` c on a.`pryk_id` = c.`pryk_id` JOIN `pekerjaan` d on b.`pek_id` = d.`pek_id` WHERE a.`pryk_id` = '$pryk_id' ORDER BY CAST(b.`strkpek_no` AS SIGNED) ASC");
	    	$no = 1;
	    	$top = false;
	    	$kode = 'A';
	    	foreach ($result as $k => $v) {

	    		$total_durasi = $v['jdwl_durasi'];
	    		$tgl_mulai = $v['jdwl_tgl_mulai'];
	    		$durasi = '+'.$v['jdwl_durasi'].' week';
    			$tgl_selesai = date('Y-m-d', strtotime($durasi, strtotime($tgl_mulai)));
    			if ($v['jdwl_durasi'] != 0) {
    				$durasi2 = '-1 days';
    				$tgl_selesai = date('Y-m-d', strtotime($durasi2, strtotime($tgl_selesai)));
    			}
    			
	    		$result[$k]['tgl_mulai'] =  $tgl_mulai;
    			$result[$k]['tgl_selesai'] =  $this->formatDate($tgl_selesai);

    			if ($v['jdwl_pendahulu_id'] != '') {
    				$jumpen = explode(',', $v['jdwl_pendahulu_id']);
	    			$result[$k]['jumlah_pendahulu'] =  count($jumpen);
    			}else{
					$result[$k]['jumlah_pendahulu'] =  0;
    			}

    			$result[$k]['kode'] =  $kode;
    			
	    		$no++;
	    		$kode++;
	    	}

	     	return $result;
	    }

	    public function formatDate($date){
	    	$date = date_create($date);
			$date = date_format($date,"d/m/Y");
			return $date;
	    }

	    public function formatDate2($date){
	    	$date = date_create($date);
			$date = date_format($date,"d-m-Y");
			return $date;
	    }

	    public function getDataJadwalByID($id){
	    	$result = $this->raw("SELECT * FROM `Jadwal` a JOIN `struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` JOIN `proyek` c on a.`pryk_id` = c.`pryk_id` JOIN `pekerjaan` d on b.`pek_id` = d.`pek_id` WHERE a.`jdwl_id` = '$id' ");
	     	return $result;
	    }

	    // custom

	    public function cekDataJadwal($pryk_id){
	    	$total_rab = $this->cariTotalRab($pryk_id);
	    	$strukpek = $this->raw("SELECT * FROM `struktur_pekerjaan` a JOIN `rab` b on a.`strkpek_id` = b.`strkpek_id` where a.`pryk_id` = '$pryk_id'");
	    	$proyek = $this->raw("SELECT * FROM `proyek` where `pryk_id` = '$pryk_id'");
	    	$pryk_tgl_mulai = $proyek[0]['pryk_tgl_mulai'];
	    	$last_minggu = 1;

	    	foreach ($strukpek as $v) {
	    		if ($v['strkpek_status'] != 'sub') {
	    			$flag = $this->cariStrukpekInJadwal($v['pryk_id'], $v['strkpek_id']);
		    		if (!$flag) {
		    			$harga_rab_pek =  $this->cariTotal($v['pryk_id'], $v['strkpek_id']);
		    			$bobot = ($harga_rab_pek / $total_rab)*100;

		    			$data['pryk_id'] = $pryk_id;
		     			$data['strkpek_id'] = $v['strkpek_id'];
		     			$data['jdwl_bobot'] = round($bobot,2);
		     			$data['jdwl_tgl_mulai'] = $pryk_tgl_mulai;
		     			$data['jdwl_durasi'] = 0;
		     			$data['jdwl_pendahulu_id'] = '';
		    			$data['jdwl_id'] = $this->data_insert($data, true);
		    					
		    		}else{
		    			$harga_rab_pek = 0;
		    			$harga_rab_pek =  $this->cariTotal($v['pryk_id'], $v['strkpek_id']);
		    			$bobot = ($harga_rab_pek / $total_rab)*100;
		    			$this->updateBobot($v['pryk_id'],$v['strkpek_id'],round($bobot,2));
		    		}
	    		}
	    	}
	    }
	    public function updateBobotRencana($pryk_id, $strkpek_id, $last_minggu){
	    	$jdwl = $this->raw("SELECT * FROM `jadwal` where `pryk_id` = '$pryk_id' AND `strkpek_id` = '$strkpek_id'");
	    	$last = $last_minggu;
	    	if ($jdwl[0]['jdwl_durasi'] > 0) {
	    		$durasi_minggu = ceil($jdwl[0]['jdwl_durasi'] / 7);
		    	$bobot_rencana = $jdwl[0]['jdwl_bobot'] / $durasi_minggu;
		    	$bobot_rencana = round($bobot_rencana,2);
		    	$this->hapusBobotRencana($jdwl[0]['jdwl_id']);
		    	for ($i=$last_minggu; $i < ($last_minggu + $durasi_minggu); $i++) { 
		    		$this->insertJadwalRencana($jdwl[0]['jdwl_id'], $i, $bobot_rencana);	
		    	}
		    	$last = $i;
	    	}

	    	return $last;
	    }

	    public function hapusBobotRencana($jdwl_id){
	    	$where = "jdwl_id = $jdwl_id";
	    	$result = false;

	    	if ($this->delete('jadwal_rencana',$where)) {
	    		$result = true;
	    	}
	    	
	     	return $result;
	    }

	    public function cariTotalDurasi($pryk_id, $strkpek_id){
	    	$strukpek = $this->raw("SELECT * FROM `struktur_pekerjaan` where `pek_id_pendahulu` = '$strkpek_id' ORDER BY `strkpek_no` ASC");
	    	$total = 0;
	    	foreach ($strukpek as $v) {
	    		$jadwal = $this->raw("SELECT * FROM `jadwal` where `pryk_id` = ".$pryk_id." and `strkpek_id` = ".$v['strkpek_id']);
	    		if ($v['strkpek_status'] != 'top') {
	    			$total = $total + $jadwal[0]['jdwl_durasi'];
	    		}
	    	}

	    	return $total;
	    }

	    public function insertJadwalRencana($jdwl_id, $jdwlren_minggu, $jdwlren_bobot){
	    	$result = false;
	    	$field = '`jdwlren_id`, `jdwl_id`, `jdwlren_minggu`, `jdwlren_bobot`';
	    	$value = "NULL, '$jdwl_id', '$jdwlren_minggu', '$jdwlren_bobot'";

	    	if ($this->insert('jadwal_rencana',$field,$value,false)) {
	    		$result = true;
	    	}	

	    	return $result;
	    }

	    public function insertJadwalSdm($jdwl_id, $jdwlsdm_minggu, $jdwlsdm_jumlah_alokasi){
	    	$result = false;
	    	$field = '`jdwlsdm_id`, `jdwl_id`, `jdwlsdm_minggu`, `jdwlsdm_jumlah_alokasi`';
	    	$value = "NULL, '$jdwl_id', '$jdwlsdm_minggu', '$jdwlsdm_jumlah_alokasi'";
	    	if ($this->insert('jadwal_sdm',$field,$value,false)) {
	    		$result = true;
	    	}	

	    	return $result;
	    }

	    public function updateDurasi($pryk_id, $strkpek_id, $durasi){

	    	$jdwl = $this->raw("SELECT * FROM `jadwal` where `pryk_id` = '$pryk_id' AND `strkpek_id` = '$strkpek_id'");
	    	$jdwl_id = $jdwl[0]['jdwl_id'];
	    	$value = "`jdwl_durasi` = '$durasi'";
    		$where = $this->primary." = ".$jdwl_id;
    		$result = false;
    		if ($this->update($this->table,$value,$where)) {
    			$result = true;
    		}

    		return $result;
	    }

	    public function updateBobot($pryk_id, $strkpek_id, $bobot){

	    	$jdwl = $this->raw("SELECT * FROM `jadwal` where `pryk_id` = '$pryk_id' AND `strkpek_id` = '$strkpek_id'");
	    	$jdwl_id = $jdwl[0]['jdwl_id'];
	    	$value = "`jdwl_bobot` = '$bobot'";
    		$where = $this->primary." = ".$jdwl_id;
    		$result = false;
    		if ($this->update($this->table,$value,$where)) {
    			$result = true;
    		}

    		return $result;
	    }

	    public function cariStrukpekInJadwal($pryk_id, $strkpek_id){
	    	$result = $this->raw("SELECT * FROM `jadwal` where `pryk_id` = '$pryk_id' AND `strkpek_id` = '$strkpek_id'");
	    	if ($result) {
	    		return true;
	    	}else{
	    		return false;
	    	}
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

	    public function getDataCpm($pryk_id){
	    	$cpm = array();

	    	$jadwal = $this->raw("SELECT jdwl_id,jdwl_durasi FROM `jadwal` WHERE `pryk_id` = '$pryk_id' ORDER BY `jdwl_pendahulu_id` ASC");

	    	// Perhitungan Maju
	    	$akhir = false;
	    	$eeti = 0;
	    	$eetj = 0;
	    	$tahap = 0;
	    	$jdwl_id = 0;
	    	$jdwl_durasi = 0;
	    	$kode = 'A';
	    	while (!$akhir) {

	    		if ($tahap < 1) {
	    			$jdwl_id = $jadwal[0]['jdwl_id'];
	    			$durasi = $jadwal[0]['jdwl_durasi'];
	    		}else{
	    			$nextJadwal = $this->nextNode($jdwl_id);
	    			if (count($nextJadwal) < 1) {
		    			$akhir = true;	
		    			continue;
		    		}
	    			
	    			if (count($nextJadwal) > 1 ) {
	    				$maxEetj = 0;
	    				$jdwl_bentrok = array();
		    			$jdwl_last = "";
	    				foreach ($nextJadwal as $k => $v) {
	    					
	    					$jdwl_id = $v['jdwl_id'];
		    				$durasi = $v['jdwl_durasi'];
		    				$last = false;
	    					while (!$last) {
	    							
		    					$jdwl_pendahulu_id = $this->prevNode($jdwl_id);
	    						$eeti = $this->eetjNode($cpm, $jdwl_pendahulu_id);
	    						$eetj = $eeti + $durasi;
	    						$data_cpm = array();
					    		$data_cpm['jdwl_id'] = $jdwl_id;
					    		$data_cpm['eeti'] = $eeti;	
					    		$data_cpm['durasi'] = $durasi;	
					    		$data_cpm['eetj'] = $eetj;	
					    		array_push($cpm,$data_cpm);
					    		$jdwl_last = $jdwl_id;

					    		$nextJadwal = $this->nextNode($jdwl_id);
					    		$jdwl_id = $nextJadwal[0]['jdwl_id'];
	    						$durasi = $nextJadwal[0]['jdwl_durasi'];
	    						
	    						if ($this->cekNextNode($jdwl_id)) {
	    							array_push($jdwl_bentrok,$jdwl_last);
	    							if ($eetj > $maxEetj) {
	    								$maxEetj = $eetj;
	    							}
	    							
	    							$last = true;	
	    						}
	    					}
	    					
	    				}

	    				$jdwl_pendahulu_id = $this->prevNode($jdwl_id);
						$eeti = $maxEetj;
						$eetj = $eeti + $durasi;
						$data_cpm = array();
			    		$data_cpm['jdwl_id'] = $jdwl_id;
			    		$data_cpm['eeti'] = $eeti;	
			    		$data_cpm['durasi'] = $durasi;	
			    		$data_cpm['eetj'] = $eetj;	
			    		array_push($cpm,$data_cpm);

	    				foreach ($jdwl_bentrok as $e) {
	    					$key = $this->searchKeyArrayCPM($e,$cpm);
				    		$cpm[$key]['eetj'] = $maxEetj;
	    				}

	    				continue;


	    			}else{
	    				$jdwl_id = $nextJadwal[0]['jdwl_id'];
	    				$durasi = $nextJadwal[0]['jdwl_durasi'];	
	    				$jdwl_pendahulu_id = $this->prevNode($jdwl_id);
	    				$eeti = $this->eetjNode($cpm, $jdwl_pendahulu_id);
	    			}
	    		}

	    		$eetj = $eeti + $durasi;

	    		$data_cpm = array();
	    		$data_cpm['jdwl_id'] = $jdwl_id;
	    		$data_cpm['eeti'] = $eeti;	
	    		$data_cpm['durasi'] = $durasi;	
	    		$data_cpm['eetj'] = $eetj;	

	    		array_push($cpm,$data_cpm);

	    		$tahap++;
	    	}
	    	// Perhitungan Maju

	    	// Perhitungan Mundur
	    	$akhir = false;
	    	$letj = $this->searchEetjByJdwlId($jdwl_id,$cpm);
	    	$tahap = 0;
	    	$leti = 0;
	    	$jdwl_id_pendalulu = 0;
	    	while (!$akhir) {
	    		
	    		if ($tahap > 0) {
	    			$jdwl_id = $this->prevNode($jdwl_id);
	    			if ($jdwl_id == "" or empty($jdwl_id)) {
	    				$akhir = true;
	    				continue;
	    			}
	    			if (count(explode(',', $jdwl_id)) > 1 ) {
	    				$minLeti = 1000;
	    				$pJadwal = explode(',', $jdwl_id);
	    				$jdwl_bentrok = array();
		    			$jdwl_last = "";
	    				foreach ($pJadwal as $k => $v) {
	    					$jdwl_id = $v;
	    					$prevJadwal = $this->node($jdwl_id);
	    					$jdwl_id = $prevJadwal[0]['jdwl_id'];
		    				$durasi = $prevJadwal[0]['jdwl_durasi'];

		    				$first = false;
		    				while (!$first) {

		    					$jdwl_id_pendalulu = $this->majuNode($jdwl_id);
			    				$letj = $this->letiNode($cpm, $jdwl_id_pendalulu);
			    				$leti = $letj - $durasi;	
					    		$key = $this->searchKeyArrayCPM($jdwl_id,$cpm);
					    		$cpm[$key]['letj'] = $letj;
					    		$cpm[$key]['leti'] = $leti;
					    		$jdwl_last = $jdwl_id;

					    		$jdwl_id = $this->prevNode($jdwl_id);
					    		$prevJadwal = $this->node($jdwl_id);
		    					$jdwl_id = $prevJadwal[0]['jdwl_id'];
			    				$durasi = $prevJadwal[0]['jdwl_durasi'];

		    					if ($this->cekPrevNode($jdwl_id)) {
		    						array_push($jdwl_bentrok,$jdwl_last);
	    							if ($leti < $minLeti) {
	    								$minLeti = $leti;
	    							}
	    							
	    							$first = true;	
	    						}
		    				}
	    				}

	    				$jdwl_id_pendalulu = $this->majuNode($jdwl_id);
	    				$letj = $minLeti;
	    				$leti = $letj - $durasi;	
			    		$key = $this->searchKeyArrayCPM($jdwl_id,$cpm);
			    		$cpm[$key]['letj'] = $letj;
			    		$cpm[$key]['leti'] = $leti;

			    		foreach ($jdwl_bentrok as $e) {
	    					$key = $this->searchKeyArrayCPM($e,$cpm);
				    		$cpm[$key]['leti'] = $minLeti;
	    				}

			    		continue;

	    			}else{
	    				$prevJadwal = $this->node($jdwl_id);
						$jdwl_id = $prevJadwal[0]['jdwl_id'];
		    			$durasi = $prevJadwal[0]['jdwl_durasi'];	
		    			$jdwl_id_pendalulu = $this->majuNode($jdwl_id);
		    			$letj = $this->letiNode($cpm, $jdwl_id_pendalulu);	    				
	    			}
	    			
	    		}

	    		$leti = $letj - $durasi;	

	    		$key = $this->searchKeyArrayCPM($jdwl_id,$cpm);
	    		$cpm[$key]['letj'] = $letj;
	    		$cpm[$key]['leti'] = $leti;
	    		
	    		$tahap++;
				
	    	}
	    	// Perhitungan Maju

	    	// Perhitungan FF + TF
	    	foreach ($cpm as $k => $v) {
	    		$tf = $v['letj'] - $v['durasi'] - $v['eeti'];
	    		$ff = $v['eetj'] - $v['durasi'] - $v['eeti'];
	    		$pekerjaan = $this->cariPekerjaanByIdJdwl($v['jdwl_id']);
	    		$cpm[$k]['ff'] = $ff;
	    		$cpm[$k]['tf'] = $tf;
	    		$cpm[$k]['pek_nama'] = $pekerjaan;
	    	}
	    	// Perhitungan FF + TF

	    	return $cpm;
	    	
	    }

	    public function getDataGantt($pryk_id){
	    	$gantt = array();
	    	$task = array();
	    	$links = array();

	    	$jadwal = $this->raw("SELECT a.`jdwl_id`, c.`pek_nama`, a.`jdwl_tgl_mulai`, a.`jdwl_durasi` FROM `Jadwal` a JOIN `struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` JOIN `pekerjaan` c on b.`pek_id` = c.`pek_id` WHERE a.`pryk_id` = '$pryk_id' ORDER BY a.`jdwl_pendahulu_id` ASC");

	    	$source = 0;
	    	$target = 0;

	    	foreach ($jadwal as $v) {
	    		$v['jdwl_tgl_mulai'] =  $this->formatDate2($v['jdwl_tgl_mulai']);
	    		array_push($task,$v);
	    		$jdwl_id = $v['jdwl_id'];
	    		$nextNode = $this->nextNode($jdwl_id);
	    		if (count($nextNode) > 1) {
	    			foreach ($nextNode as $va) {
	    				$source = $jdwl_id;
	    				$target = $va['jdwl_id'];	

	    				$data_links = array();
			    		$data_links['source'] = $source;
			    		$data_links['target'] = $target;	
			    		array_push($links,$data_links);

	    			}
	    		}else{
	    			if (count($nextNode) > 0) {
	    				$source = $jdwl_id;
		    			$target = $nextNode[0]['jdwl_id'];
		    			$data_links = array();
			    		$data_links['source'] = $source;
			    		$data_links['target'] = $target;	
			    		array_push($links,$data_links);
	    			}
	    		}
	    	}

	    	array_push($gantt,$task);
	    	array_push($gantt,$links);

	    	return $gantt;
	    }

	    public function getDataVis($pryk_id, $cpm){
	    	$master_vis = array();
	    	$vis = array();
	    	$data_jadwal = array();
	    	$kode = 'A';
	    	foreach ($cpm as $v) {
	    		$data = array();
	    		$data['jdwl_id'] = $v['jdwl_id'];
	    		$data['kode'] = $kode;
	    		$data['tf'] = $v['tf'];
	    		array_push($data_jadwal, $data);
	    		$kode++;
	    	}

	    	$node = array();
	    	$no = 1;
	    	$id = 1;
	    	$from = 0;
	    	$to = 0;
	    	$label = '';
	    	$color = '';

    		$ulang = true;
    		$jdwl_id = 0;
    		$dari_banyak = false;
    		while ($ulang) {
    			
    			if ($no == 1) {
    				$from = $id;		
	    			$to = $id+1;
	    			$label = $data_jadwal[0]['kode'];
	    			if ($data_jadwal[0]['tf'] != 0) {
	    				$color = 'black';
	    			}else{
	    				$color = 'red';
	    			}
	    			$jdwl_id = $data_jadwal[0]['jdwl_id'];

	    			$data = array();
		    		$data['from'] = $from;
		    		$data['to'] = $to;
		    		$data['label'] = $label;
		    		$data['color'] = $color;
		    		array_push($vis, $data);

		    		$id = $to;


    			}else{
    				$nextNode = $this->nextNode($jdwl_id);
    				if (count($nextNode) < 1) {
    					$ulang = false;
    					continue;
    				}else{
    					$jdwl_id = $nextNode[0]['jdwl_id'];	
    				}
    				
    				if (count($nextNode) > 1) {
    					$id_next = 0;
    					$id_prev = $id;
    					$counter = 1;
    					$max_id = $id;
		    			foreach ($nextNode as $e) {
		    				$jdwl_id = $e['jdwl_id'];
		    				$nextNode_cek = $this->nextNode($jdwl_id);
					    	$jdwl_id_cek = $nextNode_cek[0]['jdwl_id'];
				    		if ($this->cekNextNode($jdwl_id_cek)) {
				    			
		    					if ($id_next != 0) {
		    						$from = $id_prev;
		    						$to = $id_next;
		    						$id = $id_next+1;
		    					}else{
		    						$from = $id_prev;	
		    						$to = $id+1;	
		    					}
			    				
		    					
		    					$key = $this->searchKeyArrayDataJadwal($jdwl_id, $data_jadwal);
		    					$label = $data_jadwal[$key]['kode'];
		    					if ($data_jadwal[$key]['tf'] != 0) {
				    				$color = 'black';
				    			}else{
				    				$color = 'red';
				    			}	

				    			if ($to > $max_id) {
				    				$max_id = $to;
				    			}

				    			$data = array();
					    		$data['from'] = $from;
					    		$data['to'] = $to;
					    		$data['label'] = $label;
					    		$data['color'] = $color;
					    		array_push($vis, $data);
					    		$id = $to;	

					    		$nextNode2 = $this->nextNode($jdwl_id);
					    		$jdwl_id = $nextNode2[0]['jdwl_id'];
				    			
				    		}else{
				    			$jdwl_id = $e['jdwl_id'];
				    			$from = $id_prev;	
					    		$to = $id+1;
		    					$key = $this->searchKeyArrayDataJadwal($jdwl_id, $data_jadwal);
		    					$label = $data_jadwal[$key]['kode'];
		    					if ($data_jadwal[$key]['tf'] != 0) {
				    				$color = 'black';
				    			}else{
				    				$color = 'red';
				    			}

				    			if ($to > $max_id) {
				    				$max_id = $to;
				    			}
				    			$data = array();
					    		$data['from'] = $from;
					    		$data['to'] = $to;
					    		$data['label'] = $label;
					    		$data['color'] = $color;
					    		array_push($vis, $data);
					    		$id = $to;	

					    		$rep = true;
					    		while ($rep) {
					    			$nextNode2 = $this->nextNode($jdwl_id);
					    			$jdwl_id = $nextNode2[0]['jdwl_id'];
					    			$nextNode_cek = $this->nextNode($jdwl_id);
					    			$jdwl_id_cek = $nextNode_cek[0]['jdwl_id'];
					    			if ($this->cekNextNode($jdwl_id_cek)) {
					    				$from = $id;		
					    				if ($id_next == 0) {
						    				$id_next = $to+1;	
						    				$to = $id+1;
						    			}else{
						    				$to = $id_next;
						    			}
				    					
				    					$key = $this->searchKeyArrayDataJadwal($jdwl_id, $data_jadwal);
				    					$label = $data_jadwal[$key]['kode'];
				    					if ($data_jadwal[$key]['tf'] != 0) {
						    				$color = 'black';
						    			}else{
						    				$color = 'red';
						    			}

						    			if ($to > $max_id) {
						    				$max_id = $to;
						    			}
						    			$data = array();
							    		$data['from'] = $from;
							    		$data['to'] = $to;
							    		$data['label'] = $label;
							    		$data['color'] = $color;
							    		array_push($vis, $data);
							    		$id = $to;

						    			$rep = false;
						    			
						    			continue;
						    		}

					    			$from = $id;		
			    					$to = $id+1;

			    					$key = $this->searchKeyArrayDataJadwal($jdwl_id, $data_jadwal);
			    					$label = $data_jadwal[$key]['kode'];
			    					if ($data_jadwal[$key]['tf'] != 0) {
					    				$color = 'black';
					    			}else{
					    				$color = 'red';
					    			}

					    			if ($to > $max_id) {
					    				$max_id = $to;
					    			}
					    			$data = array();
						    		$data['from'] = $from;
						    		$data['to'] = $to;
						    		$data['label'] = $label;
						    		$data['color'] = $color;
						    		array_push($vis, $data);
						    		$id = $to;	
						    		
					    		}
				    		}
				    		
				    		if ($counter == count($nextNode)) {
				    			$id = $max_id+1;
				    			$from = $id_next;	
				    			$to = $id;
		    					$key = $this->searchKeyArrayDataJadwal($jdwl_id, $data_jadwal);
		    					$label = $data_jadwal[$key]['kode'];
		    					if ($data_jadwal[$key]['tf'] != 0) {
				    				$color = 'black';
				    			}else{
				    				$color = 'red';
				    			}

				    			$data = array();
					    		$data['from'] = $from;
					    		$data['to'] = $to;
					    		$data['label'] = $label;
					    		$data['color'] = $color;
					    		array_push($vis, $data);
					    		// $id = $from;	

					    		// $nextNode2 = $this->nextNode($jdwl_id);
					    		// $jdwl_id = $nextNode2[0]['jdwl_id'];
					    		// $from = $id_next;
					    		// $to = $id+1;	
		    					// $key = $this->searchKeyArrayDataJadwal($jdwl_id, $data_jadwal);
		    					// $label = $data_jadwal[$key]['jdwl_id'];
		    					// if ($data_jadwal[$key]['tf'] != 0) {
				    			// 	$color = 'black';
				    			// }else{
				    			// 	$color = 'red';
				    			// }

				    			// $data = array();
					    		// $data['from'] = $from;
					    		// $data['to'] = $to;
					    		// $data['label'] = $label;
					    		// $data['color'] = $color;
					    		// array_push($vis, $data);
					    		// $id = $to;
				    		}

				    		$counter++;
				    		// break;	    		
		    			}

	    			}else{
	    				if (count($nextNode) > 0) {
	    					$from = $id;
	    					$to = $id+1;	
	    					$key = $this->searchKeyArrayDataJadwal($jdwl_id, $data_jadwal);
	    					$label = $data_jadwal[$key]['kode'];
	    					if ($data_jadwal[$key]['tf'] != 0) {
			    				$color = 'black';
			    			}else{
			    				$color = 'red';
			    			}

			    			$data = array();
				    		$data['from'] = $from;
				    		$data['to'] = $to;
				    		$data['label'] = $label;
				    		$data['color'] = $color;
				    		array_push($vis, $data);

				    		$id = $to;

	    				}else{
	    					$ulang = false;
	    				}
	    			}

		    		
    			}

	    		$no++;

    		}

    		$data = array();
    		foreach ($vis as $key => $value) {
    			if (in_array($value['from'], $data)){

    			}else{
    				array_push($data, $value['from']);
    			}

    			if (in_array($value['to'], $data)){

    			}else{
    				array_push($data, $value['to']);
    			}
    		}
    		
    		array_push($master_vis, $data);
    		array_push($master_vis, $vis);
	    	return $master_vis;
	    }

		public function nextNode($jdwl_id){
			$jadwal = $this->raw("SELECT * FROM `jadwal` WHERE jdwl_pendahulu_id LIKE '%".$jdwl_id."%' ORDER BY `jdwl_pendahulu_id` ASC");
			return $jadwal;
		}	    

		public function prevNode($jdwl_id){
			$jadwal = $this->raw("SELECT * FROM `jadwal` WHERE jdwl_id = '$jdwl_id'");
			return $jadwal[0]['jdwl_pendahulu_id'];
		}	

		public function majuNode($jdwl_id){
			$jadwal = $this->raw("SELECT * FROM `jadwal` WHERE jdwl_pendahulu_id LIKE '%".$jdwl_id."%'");
			return $jadwal[0]['jdwl_id'];
		}

		public function node($jdwl_id){
			$jadwal = $this->raw("SELECT * FROM `jadwal` WHERE jdwl_id = '$jdwl_id'");
			return $jadwal;
		}

		public function eetjNode($cpm, $jdwl_pendahulu_id){
			$eetj = 0;
			foreach ($cpm as $k => $v) {
				if ($v['jdwl_id'] == $jdwl_pendahulu_id) {
					$eetj = $v['eetj'];
				}
			}
			return $eetj;
		}	

		public function letiNode($cpm, $jdwl_maju_id){
			$leti = 0;
			foreach ($cpm as $k => $v) {
				if ($v['jdwl_id'] == $jdwl_maju_id) {
					$leti = $v['leti'];
				}
			}
			return $leti;
		}

		public function cekNextNode($jdwl_id){
			$jadwal = $this->raw("SELECT * FROM `jadwal` WHERE jdwl_id = '$jdwl_id'");
			$pekprev = explode(',', $jadwal[0]['jdwl_pendahulu_id']);
			$result = false;
			if (count($pekprev) > 1) {
				$result = true;
			}
			return $result;
		}	

		public function cekPrevNode($jdwl_id){
			$jadwal = $this->raw("SELECT * FROM `jadwal` WHERE jdwl_pendahulu_id LIKE '%".$jdwl_id."%'");
			$result = false;
			if (count($jadwal) > 1) {
				$result = true;
			}
			return $result;
		}

		public function searchEetjByJdwlId($jdwl_id, $cpm) {
		   foreach ($cpm as $key => $val) {
				if ($val['jdwl_id'] == $jdwl_id) {
				   return $val['eetj'];
				}
		   }
		   return null;
		}

		public function searchKeyArrayCPM($jdwl_id, $cpm) {
		   foreach ($cpm as $key => $val) {
				if ($val['jdwl_id'] == $jdwl_id) {
				   return $key;
				}
		   }
		   return null;
		}

		public function searchKeyArrayDataJadwal($jdwl_id, $data_jadwal) {
		   foreach ($data_jadwal as $key => $val) {
				if ($val['jdwl_id'] == $jdwl_id) {
				   return $key;
				}
		   }
		   return null;
		}

		public function cariPekerjaanByIdJdwl($jdwl_id){
			$jadwal = $this->raw("SELECT c.* FROM `Jadwal` a JOIN `struktur_pekerjaan` b on a.`strkpek_id` = b.`strkpek_id` JOIN `pekerjaan` c on b.`pek_id` = c.`pek_id` WHERE a.`jdwl_id` = '$jdwl_id'");
			return $jadwal[0]['pek_nama'];
		}

	    public function cariPendahulu($jdwl_id){
	    	$result = $this->raw("SELECT * FROM `jadwal` where `jdwl_id` = '$jdwl_id'");
	    	$pendahulu = "";
	    	if ($result[0]['jdwl_pendahulu_id'] != "") {
	    		$id_pendulu = explode(',', $result[0]['jdwl_pendahulu_id']);
		    	$no =1;
		    	foreach ($id_pendulu as $v) {
		    		$jadwal = $this->raw("SELECT * FROM `jadwal` where `jdwl_id` = '$v'");
		    		if ($no == 1) {
		    			$pendahulu = $pendahulu.$jadwal[0]['strkpek_id'];
		    		}else{
		    			$pendahulu =$pendahulu.','.$jadwal[0]['strkpek_id'];
		    		}

		    		$no++;
		    		
		    	}
	    	}
	    
	     	return $pendahulu;
	    }

	    public function getDataJadwalByIdProyekIdStrukpek($pryk_id, $strkpek_id){
	    	$result = $this->raw("SELECT * FROM `Jadwal` WHERE `pryk_id` = '$pryk_id' and  `strkpek_id` = '$strkpek_id'");
	     	return $result;
	    }
	    
	}

?>