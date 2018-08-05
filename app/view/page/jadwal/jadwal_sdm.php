<div class="panel panel-default card-view panel-refresh">
  <div class="refresh-container">
    <div class="la-anim-1"></div>
  </div>
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark" style="font-style: normal;">Jadwal Tenaga Kerja Proyek</h6>
    </div>
    <div class="pull-right">
      <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_2" aria-expanded="false">
        <i class="zmdi zmdi-chevron-down"></i>
        <i class="zmdi zmdi-chevron-up"></i>
      </a>
    </div>
    <div class="clearfix"></div>
  </div>
  <div  id="collapse_2" class="panel-wrapper collapse">
    <div class="panel-body isi-body">
      <div  class="pills-struct mt-20">
        <ul role="tablist" class="nav nav-pills nav-pills-outline" id="myTabs_13">
          <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="tab_data_tenaga_kerja" href="#data_tenaga_kerja" style="font-size: 16px;">Data</a></li>
          <li role="presentation"><a data-toggle="tab" id="tab_perataan" role="tab" href="#perataan" aria-expanded="false" style="font-size: 16px;">Perataan Sumber Daya</a></li>
          <li role="presentation"><a data-toggle="tab" id="tab_alokasi" role="tab" href="#alokasi" aria-expanded="false" style="font-size: 16px;">Alokasi Tenaga Kerja</a></li>
        </ul>
        <div class="tab-content" id="myTabContent_13">
          <div  id="data_tenaga_kerja" class="tab-pane fade active in" role="tabpanel">
            <div class="table-wrap mb-20">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered mb-0 custab">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Nama Pekerjaan</th>
                        <th>Bobot (%)</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Durasi<br>(minggu)</th>
                        <th><i>Resource</i><br>Per Hari</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $total = 0;
                          $no = 1;
                          foreach ($data['jadwal'] as $d) {
                            echo '<tr>';
                              
                              echo '<td>'.$d['kode'].'</td>';
                              echo '<td>'.ucfirst($d['pek_nama']).'</td>';
                              echo '<td>'.$d['jdwl_bobot'].'</td>';    
                              echo '<td>'.$JadwalController->formatDate($d['tgl_mulai']).'</td>';      
                              echo '<td>'.$d['tgl_selesai'].'</td>';   
                              echo '<td>'.$d['jdwl_durasi'].'</td>';   
                        ?>
                              <td><a href="#" onclick="$(this).tenker('<?php echo $d['jdwl_id']; ?>');" data-toggle="modal" data-target="#responsive-modal2" class="edit-pred" style="text-decoration: none;border-bottom: dashed 1px #0088cc;"><?php echo $JadwalController->countTenagaKerja($d['jdwl_id']);?> tenaga kerja</a></a></td>
                        <?php
                            echo '</tr>';    
                          }
                        ?>    
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
          <div  id="perataan" class="tab-pane fade" role="tabpanel">
            <button id="ubah-perataan" class="btn btn-tambah btn-lable-wrap left-label mt-10 mb-10" alt="default" data-toggle="modal" data-target="#responsive-modal3" class="model_img img-responsive"> <span class="btn-label"><i class="fa fa-pencil"></i> </span><span class="btn-text">Perataan Sumber Daya</span></button>
            <div class="table-wrap mb-20">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered mb-0 custab">
                    <thead>
                      <tr>
                        <th rowspan="2">Nama Pekerjaan</th>
                        <th colspan="<?php echo count($data['durasiProyek']); ?>">Hari Kerja</th>
                      </tr>
                      <tr>
                        <?php
                          $awal = 1;
                          $akhir = 0;
                          foreach ($data['durasiProyek'] as $v) {
                            $akhir = $awal + 6;
                            echo '<th>'.$awal.'<br>-<br>'.$akhir.'</th>';
                            $awal = $akhir +1;
                          }
                        ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        foreach ($data['jadwal'] as $d) {
                          echo '<tr>';
                            echo '<td>'.ucfirst($d['pek_nama']).'</td>';

                            $posisi = $JadwalController->cariPosisiPerataan($data['cpm'],$d['jdwl_id']);
                            
                            for ($j=1; $j <= count($data['durasiProyek']); $j++) { 

                              if ($j == ($posisi['es']+1)) {

                                for ($k=$posisi['es']+1; $k <= ($posisi['es'] + $posisi['dur'] + $posisi['tf']); $k++) { 
                                  if ($k == $posisi['es']+1+$posisi['skip']) {
                                    for ($i=0; $i < $posisi['dur']; $i++) { 
                                      echo '<td>'.$posisi['resource'].'</td>';
                                    }
                                    $k = $k + $posisi['dur']-1;
                                  }else{
                                    echo '<td>-</td>';  
                                  }
                                }

                                $jum = $j + $posisi['dur'] + $posisi['tf'];
                                for ($i=$jum; $i <= count($data['durasiProyek']); $i++) { 
                                  echo '<td></td>';
                                }
                                break;

                              }else{
                                echo '<td></td>';
                              }
                            }
                            
                    
                          echo '</tr>';
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
          <div  id="alokasi" class="tab-pane fade" role="tabpanel">
            <div class="table-wrap mb-20">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered mb-0 custab">
                    <thead>
                      <tr>
                        <th>Minggu Ke-</th>
                        <th>Tanggal Awal Minggu</th>
                        <th>Tanggal Akhir Minggu</th>
                        <th>Resource Per Hari</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $total = 0;
                          $no = 1;
                          foreach ($data['alokasi'] as $d) {
                            echo '<tr>';
                              
                              echo '<td>'.$d['minggu'].'</td>';
                              echo '<td>'.$JadwalController->formatDate($d['tgl_awal_minggu']).'</td>';    
                              echo '<td>'.$JadwalController->formatDate($d['tgl_akhir_minggu']).'</td>';    
                              echo '<td>'.$d['jum_alokasi'].'</td>';   
                            echo '</tr>';    
                          }
                        ?>    
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>