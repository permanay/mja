<div class="panel panel-default card-view panel-refresh">
  <div class="refresh-container">
    <div class="la-anim-1"></div>
  </div>
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark" style="font-style: normal;">Pengawasan Waktu Pelaksanaan Proyek</h6>
    </div>
    <div class="pull-right">
      <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_1" aria-expanded="true">
        <i class="zmdi zmdi-chevron-down"></i>
        <i class="zmdi zmdi-chevron-up"></i>
      </a>
    </div>
    <div class="clearfix"></div>
  </div>
  <div  id="collapse_1" class="panel-wrapper collapse active in">
    <div class="panel-body isi-body">
        <div  class="pills-struct mt-20">
          <ul role="tablist" class="nav nav-pills nav-pills-outline" id="myTabs_12">
            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="tab_kinerja_waktu" href="#kinerja_waktu" style="font-size: 16px;">Kinerja</a></li>
            <li role="presentation"><a data-toggle="tab" id="tab_estimasi_waktu" role="tab" href="#estimasi_waktu" aria-expanded="false" style="font-size: 16px;">Estimasi Penyelesaian</a></li>
          </ul>
          <div class="tab-content" id="myTabContent_12">
            <div  id="kinerja_waktu" class="tab-pane fade active in" role="tabpanel">
              <div class="table-wrap mb-20">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0 custab">
                      <thead>
                        <tr>
                          <th>Minggu</th>
                          <th>BCWP</th>
                          <th>BCWS</th>
                          <th>SV</th>
                          <th>SPI</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 

                            foreach ($data['pengawasan'] as $d) {
                              echo '<tr>';
                                
                                echo '<td>'.$d['pengawasan_minggu'].'</td>';
                                echo '<td>'.$helper->convertAngkatoValue($d['pengawasan_bcwp']).'</td>';
                                echo '<td>'.$helper->convertAngkatoValue($d['pengawasan_bcws']).'</td>';
                                if ($d['pengawasan_sv'] < 0) {
                                  echo '<td style="color:red !important;">'.$helper->convertAngkatoValue($d['pengawasan_sv']).'</td>';
                                }else {
                                  echo '<td style="color:green !important;">'.$helper->convertAngkatoValue($d['pengawasan_sv']).'</td>';
                                }
                                if ($d['pengawasan_spi'] < 1) {
                                  echo '<td style="color:red !important;">'.$d['pengawasan_spi'].'</td>';
                                }else {
                                  echo '<td style="color:green !important;">'.$d['pengawasan_spi'].'</td>';
                                }
                                
                                
                                echo '<td>'.$d['pengawasan_ket_kin_jadwal'].'</td>';
                                
                              echo '</tr>';    
                            }
                          ?>    
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div  id="estimasi_waktu" class="tab-pane fade" role="tabpanel">
              <div class="table-wrap mb-20">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0 custab">
                      <thead>
                        <tr>
                          <th>Minggu</th>
                          <th>Sisa Waktu</th>
                          <th>SPI</th>
                          <th>ECD</th>
                          <th>Persentase ECD</th>
                          <th>Keterangan SPI</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 

                            foreach ($data['pengawasan'] as $d) {
                              echo '<tr>';
                                
                                echo '<td>'.$d['pengawasan_minggu'].'</td>';
                                echo '<td>'.$d['pengawasan_sisa_waktu'].'</td>';
                                if ($d['pengawasan_spi'] < 1) {
                                  echo '<td style="color:red !important;">'.$d['pengawasan_spi'].'</td>';
                                }else {
                                  echo '<td style="color:green !important;">'.$d['pengawasan_spi'].'</td>';
                                }
                                echo '<td>'.$d['pengawasan_ecd'].'</td>';
                                echo '<td>'.$d['pengawasan_percen_ecd'].' %</td>';
                                echo '<td>'.$d['pengawasan_ket_kin_jadwal'].'</td>';
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

