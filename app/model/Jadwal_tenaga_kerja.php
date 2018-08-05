<?php
	
	include "Database.php";

	class Jadwal_tenaga_kerja extends Database{

		private $table = "jadwal_tenaga_kerja";
		private $primary = "jdwltenker_id";
		private $field = array(
									'jdwltenker_id',
									'jdwl_id',
									'jbtn_id',
									'jdwltenker_jumlah',
									'jdwltenker_skip'
							  );
		private $field_update = array(
										'jbtn_id',
										'jdwltenker_jumlah',
										'jdwltenker_skip'
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

	    public function getDataTenkerByJdwlId($jdwl_id){
	    	$result = $this->raw("SELECT * FROM `jadwal_tenaga_kerja` WHERE `jdwl_id` = '$jdwl_id'");
	     	return $result;
	    }

	    public function data_delete_by_jdwl_id($jdwl_id){
	    	$where ="jdwl_id = $jdwl_id";
	    	$result = false;

	    	if ($this->delete($this->table,$where)) {
	    		$result = true;
	    	}
	    	
	     	return $result;
	    }

	    public function getDatajadwal_tenaga_kerjaByID($id){
	    	$result = $this->raw("SELECT * FROM `jadwal_tenaga_kerja` a LEFT JOIN `pengguna` b on a.`pgna_id` = b.`pgna_id` JOIN `jabatan` c on a.`jbtn_id` = c.`jbtn_id` where a.`peg_id` = '$id' ");
	     	return $result;
	    }

	    // custom

	    public function tentukanMinggu($tgl_mulai_proyek, $tgl_pelaksanaan){
	    	$durasi_proyek = array();
	    	$tgl_mulai = $tgl_mulai_proyek;
			for ($i=1; $i <= 40 ; $i++) { 

	    		$durasi = '+6 days';
				$tgl_akhir = date('Y-m-d', strtotime($durasi, strtotime($tgl_mulai)));

				$minggu = array();
				$minggu['minggu'] = $i;
				$minggu['tgl_awal_minggu'] = $tgl_mulai;
				$minggu['tgl_akhir_minggu'] = $tgl_akhir;
				array_push($durasi_proyek, $minggu);

				$durasi = '+1 days';
				$tgl_mulai = date('Y-m-d', strtotime($durasi, strtotime($tgl_akhir)));
			}

			$tgl_pelaksanaan=date('Y-m-d', strtotime($tgl_pelaksanaan));

			$mnggu = 0;
			foreach ($durasi_proyek as $v) {
				if (($tgl_pelaksanaan >= $v['tgl_awal_minggu']) && ($tgl_pelaksanaan <= $v['tgl_akhir_minggu'])) {
					$mnggu = $v['minggu'];
					break;
				}
			}

			return $durasi_proyek;
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

	    public function cariPosisiPerataan($cpm, $jdwl_id){
	    	$posisi = array();
	    	
	    	$posisi['resource'] = $this->countTenagaKerja($jdwl_id);
	    	$posisi['skip'] = $this->skipPerataaan($jdwl_id);
	    	$key = $this->searchKeyArrayCPM($jdwl_id, $cpm);
	    	$posisi['es'] = $cpm[$key]['eeti'];
	    	$posisi['tf'] = $cpm[$key]['tf'];
	    	$posisi['dur'] = $cpm[$key]['durasi'];

	    	return $posisi;
	    }

	    public function ubahPerataan($cpm, $jdwl_id, $harker){	    	
	    	$ubah = false;
	    	$posisi = $this->cariPosisiPerataan($cpm, $jdwl_id);

	    	if ($posisi['tf'] > 0) {
	    		if (($harker + ($posisi['dur']-1)) <= ($posisi['es'] + $posisi['dur'] + $posisi['tf']) && $harker > $posisi['es']) {
	    			
	    			$skip = $harker - ($posisi['es']+1);
	    			$value = "`jdwltenker_skip` = '$skip'";
		    		$where = "`jdwl_id` = ".$jdwl_id;
		    		if ($this->update($this->table,$value,$where)) {
		    			$ubah = true;
		    		}

	    		}
	    	}

	    	return $ubah;
	    }

	    public function alokasiTenker($pryk_id,$cpm){	    	
	    	
	    	$durasiProyek = $this->durasiProyek($pryk_id);
	    	$alokasi = $durasiProyek;
	    	foreach ($alokasi as $z => $e) {
	    		$alokasi[$z]['jum_alokasi'] = 0;
	    	}

	    	$jadwal = $this->raw("SELECT * FROM `Jadwal` WHERE `pryk_id` = '$pryk_id' ORDER BY `jdwl_tgl_mulai` ASC");
	    	foreach ($jadwal as $d) {
	    	
		    	$posisi = $this->cariPosisiPerataan($cpm,$d['jdwl_id']);
		        
	            for ($j=1; $j <= count($durasiProyek); $j++) { 

	              if ($j == ($posisi['es']+1)) {

	                for ($k=$posisi['es']+1; $k <= ($posisi['es'] + $posisi['dur'] + $posisi['tf']); $k++) { 
	                  if ($k == $posisi['es']+1+$posisi['skip']) {
	                  	$minggu = $k;
	                    for ($i=0; $i < $posisi['dur']; $i++) { 
	                    	$key = $this->searchKeyArrayAlokasi($minggu, $alokasi);
	                    	$alokasi[$key]['jum_alokasi'] = $alokasi[$key]['jum_alokasi'] + $posisi['resource'];
	                    	$minggu++;
	                    }
	                    $k = $k + $posisi['dur']-1;
	                  }else{
	                  }
	                }
	                break;

	              }

	            }
	        }

	        return $alokasi;
	    }

	    public function skipPerataaan($jdwl_id){
	    	$tenker = $this->getDataTenkerByJdwlId($jdwl_id);
	    	
			return $tenker[0]['jdwltenker_skip'];
	    }

	    public function countTenagaKerja($jdwl_id){
	    	$tenker = $this->getDataTenkerByJdwlId($jdwl_id);
	    	$jum = 0;
	    	if (count($tenker) > 0) {
	    		foreach ($tenker as $v) {
	    			$jum = $jum + $v['jdwltenker_jumlah'];
	    		}
	    	}
			return $jum;
	    }

	    public function searchKeyArrayCPM($jdwl_id, $cpm) {
		   foreach ($cpm as $key => $val) {
				if ($val['jdwl_id'] == $jdwl_id) {
				   return $key;
				}
		   }
		   return null;
		}

		public function searchKeyArrayAlokasi($minggu, $alokasi) {
		   foreach ($alokasi as $key => $val) {
				if ($val['minggu'] == $minggu) {
				   return $key;
				}
		   }
		   return null;
		}

	}

?>
