<div class="panel panel-default card-view panel-refresh">
  <div class="refresh-container">
    <div class="la-anim-1"></div>
  </div>
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark" style="font-style: normal;">Jadwal Pelaksanaan Proyek</h6>
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
            <li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="tab_data_proyek" href="#data_proyek" style="font-size: 16px;">Data</a></li>
            <li role="presentation"><a data-toggle="tab" id="tab_analisis" role="tab" href="#analisis" aria-expanded="false" style="font-size: 16px;">Analisis CPM</a></li>
            <li role="presentation"><a data-toggle="tab" id="tab_gantt_chart" role="tab" href="#gantt_chart" aria-expanded="false" style="font-size: 16px;">Gantt Chart</a></li>
          </ul>
          <div class="tab-content" id="myTabContent_12">
            <div  id="data_proyek" class="tab-pane fade active in" role="tabpanel">
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
                          <th>Pendahulu</th>
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
                          ?>
                                <td><a href="#" id="tglmulai<?php echo $d['jdwl_id']; ?>" data-type="combodate" data-value="<?php echo $d['tgl_mulai']; ?>" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="<?php echo $d['jdwl_id']; ?>"  data-title="Tanggal Mulai"></a></td>
                          <?php
                                   
                                echo '<td>'.$d['tgl_selesai'].'</td>';   
                          ?>
                                <td><a href="#" id="durasi<?php echo $d['jdwl_id']; ?>" data-type="text" data-pk="<?php echo $d['jdwl_id']; ?>" data-value="<?php echo $d['jdwl_durasi']; ?>" data-title="Masukan Durasi"></a></td>

                                <td><a href="#" onclick="$(this).penpek('<?php echo $d['jdwl_id']; ?>');" data-toggle="modal" data-target="#responsive-modal" class="edit-pred" style="text-decoration: none;border-bottom: dashed 1px #0088cc;"><?php echo $d['jumlah_pendahulu'];?> pekerjaan</a></a></td>
                          <?php
                              echo '</tr>';    
                            }
                          ?>    
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <div  id="analisis" class="tab-pane fade" role="tabpanel">
              <div class="table-wrap mb-20">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered mb-0 custab">
                    <thead>
                      <tr>
                        <th>Kode</th>
                        <th>Pekerjaan</th>
                        <th>Durasi (minggu)</th>
                        <th>ES</th>
                        <th>EF</th>
                        <th>LF</th>
                        <th>LS</th>
                        <th>TF</th>
                        <th>FF</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $kode = 'A';
                          foreach ($data['cpm'] as $c) {
                        ?>
                            <tr>
                              <td><?php echo $kode; ?></td>
                              <td><?php echo $c['pek_nama']; ?></td>
                              <td><?php echo $c['durasi']; ?></td>
                              <td><?php echo $c['eeti']; ?></td>
                              <td><?php echo $c['eetj']; ?></td>
                              <td><?php echo $c['letj']; ?></td>
                              <td><?php echo $c['leti']; ?></td>
                              <td><?php echo $c['tf']; ?></td>
                              <td><?php echo $c['ff']; ?></td>
                            </tr>
                        <?php
                            $kode++;
                          }

                        ?>  
                    </tbody>
                  </table>
                </div>
              </div>
              <div id="mynetwork"></div>
            </div>
            <div  id="gantt_chart" class="tab-pane fade" role="tabpanel">
              <div style="height: 400px;">
                <div id="gantt_here" style='width:100%; height:100%;'></div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

