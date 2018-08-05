<div class="panel panel-default card-view panel-refresh">
  <div class="refresh-container">
    <div class="la-anim-1"></div>
  </div>
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark" style="font-style: normal;">Biaya Aktual Pelaksanaan Proyek</h6>
    </div>
    <div class="pull-right">
      <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_2" aria-expanded="true">
        <i class="zmdi zmdi-chevron-down"></i>
        <i class="zmdi zmdi-chevron-up"></i>
      </a>
    </div>
    <div class="clearfix"></div>
  </div>
  <div  id="collapse_2" class="panel-wrapper collapse">
    <div class="panel-body isi-body">
        <div class="table-wrap mb-20">
            <div class="table-responsive">
              <table class="table table-hover table-bordered mb-0 custab">
                <thead>
                  <tr>
                    <th style="font-size: 12px;">Minggu Ke</th>
                    <th style="font-size: 12px;">Bobot Rencana Mingguan</th>
                    <th style="font-size: 12px;">Bobot Aktual Mingguan</th>
                    <th style="font-size: 12px;">Biaya Aktual</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                      foreach ($data['realisasi_biaya'] as $d) {

                        echo '<tr>';
                        echo '<td>'.$d['realisasi_minggu'].'</td>';
                        echo '<td>'.$d['bobot_rencana_minggu'].'</td>';
                        echo '<td>'.$d['bobot_aktual_minggu'].'</td>';

                    ?>
                        <td><a href="#" id="biaktu<?php echo $d['realisasi_id']; ?>" data-type="text" data-pk="<?php echo $d['realisasi_id'].','.$d['pryk_id']; ?>" data-value="<?php echo $d['realisasi_biaya_aktual']; ?>" data-title="Masukan Biaya Aktual"></a></td>
                    <?php

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