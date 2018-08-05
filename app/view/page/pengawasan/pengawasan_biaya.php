<div class="panel panel-default card-view panel-refresh">
  <div class="refresh-container">
    <div class="la-anim-1"></div>
  </div>
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark" style="font-style: normal;">Pengawasan Biaya Pelaksanaan Proyek</h6>
    </div>
    <div class="pull-right">
      <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_2" aria-expanded="true">
        <i class="zmdi zmdi-chevron-down"></i>
        <i class="zmdi zmdi-chevron-up"></i>
      </a>
    </div>
    <div class="clearfix"></div>
  </div>
  <div  id="collapse_2" class="panel-wrapper collapse active in">
    <div class="panel-body isi-body">
        <div  class="pills-struct mt-20">
          <ul role="tablist" class="nav nav-pills nav-pills-outline" id="myTabs_12">
            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="tab_kinerja_biaya" href="#kinerja_biaya" style="font-size: 16px;">Kinerja</a></li>
            <li role="presentation"><a data-toggle="tab" id="tab_estimasi_biaya" role="tab" href="#estimasi_biaya" aria-expanded="false" style="font-size: 16px;">Estimasi Penyelesaian</a></li>
          </ul>
          <div class="tab-content" id="myTabContent_12">
            <div  id="kinerja_biaya" class="tab-pane fade active in" role="tabpanel">
              <div class="table-wrap mb-20">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0 custab">
                      <thead>
                        <tr>
                          <th>Minggu</th>
                          <th>BCWP</th>
                          <th>ACWP</th>
                          <th>CV</th>
                          <th>CPI</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 

                            foreach ($data['pengawasan'] as $d) {
                              echo '<tr>';
                                
                                echo '<td>'.$d['pengawasan_minggu'].'</td>';
                                echo '<td>'.$helper->convertAngkatoValue($d['pengawasan_bcwp']).'</td>';
                                echo '<td>'.$helper->convertAngkatoValue($d['pengawasan_acwp']).'</td>';
                                if ($d['pengawasan_cv'] < 0) {
                                  echo '<td style="color:red !important;">'.$helper->convertAngkatoValue($d['pengawasan_cv']).'</td>';
                                }else {
                                  echo '<td style="color:green !important;">'.$helper->convertAngkatoValue($d['pengawasan_cv']).'</td>';
                                }
                                if ($d['pengawasan_cpi'] < 1) {
                                  echo '<td style="color:red !important;">'.$d['pengawasan_cpi'].'</td>';
                                }else {
                                  echo '<td style="color:green !important;">'.$d['pengawasan_cpi'].'</td>';
                                }
                              
                                echo '<td>'.$d['pengawasan_ket_kin_biaya'].'</td>';
                                
                              echo '</tr>';    
                            }
                          ?>    
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div  id="estimasi_biaya" class="tab-pane fade" role="tabpanel">
              <div class="table-wrap mb-20">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered mb-0 custab">
                      <thead>
                        <tr>
                          <th>Minggu</th>
                          <th>BCWP</th>
                          <th>CPI</th>
                          <th>ACWP</th>
                          <th>EAC</th>
                          <th>Persentase EAC</th>
                          <th>Keterangan CPI</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php 

                            foreach ($data['pengawasan'] as $d) {
                              echo '<tr>';
                                
                                echo '<td>'.$d['pengawasan_minggu'].'</td>';
                                echo '<td>'.$helper->convertAngkatoValue($d['pengawasan_bcwp']).'</td>';
                                if ($d['pengawasan_cpi'] < 1) {
                                  echo '<td style="color:red !important;">'.$d['pengawasan_cpi'].'</td>';
                                }else {
                                  echo '<td style="color:green !important;">'.$d['pengawasan_cpi'].'</td>';
                                }
                                echo '<td>'.$helper->convertAngkatoValue($d['pengawasan_acwp']).'</td>';
                                echo '<td>'.$helper->convertAngkatoValue($d['pengawasan_eac']).'</td>';
                                echo '<td>'.$d['pengawasan_percen_eac'].' %</td>';
                                echo '<td>'.$d['pengawasan_ket_kin_biaya'].'</td>';
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

