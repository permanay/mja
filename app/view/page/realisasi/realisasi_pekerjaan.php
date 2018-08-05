<div class="panel panel-default card-view panel-refresh">
  <div class="refresh-container">
    <div class="la-anim-1"></div>
  </div>
  <div class="panel-heading">
    <div class="pull-left">
      <h6 class="panel-title txt-dark" style="font-style: normal;">Realisasi Pekerjaan Proyek</h6>
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
    <div style="width: 300px;margin-top: 15px;">
        <div class="form-group">
            <select class="form-control select2 reasel" name="realisasi_minggu" id="realisasi_minggu">
                <?php
                  foreach ($data['durasi'] as $v) {
                    if ($v['minggu'] != $data['minggu']) {
                      echo '<option value="'.$v['minggu'].'">Minggu ke-'.$v['minggu'].' ('.$helper->formatDateId($v['tgl_awal_minggu']).' - '.$helper->formatDateId($v['tgl_akhir_minggu']).')</option>';
                    }else{
                      echo '<option value="'.$v['minggu'].'" selected>Minggu ke-'.$v['minggu'].' ('.$helper->formatDateId($v['tgl_awal_minggu']).' - '.$helper->formatDateId($v['tgl_akhir_minggu']).')</option>';
                    }
                    
                  }
                ?>
            </select>
        </div>
    </div>

    <div class="panel-body isi-body">
        <div class="table-wrap mb-20">
            <div class="table-responsive">
              <table class="table table-hover table-bordered mb-0 custab">
                <thead>
                  <tr>
                    <th rowspan="2" style="font-size: 12px;">No</th>
                    <th colspan="3" style="font-size: 12px;">Pekerjaan</th>
                    <th colspan="3" style="font-size: 12px;">Realisasi Minggu Lalu</th>
                    <th colspan="3" style="font-size: 12px;">Realisasi Minggu Ini</th>
                    <th colspan="3" style="font-size: 12px;">Realisasi Sampai Minggu Ini</th>
                  </tr>
                  <tr>
                    <th style="font-size: 12px;">Nama</th>
                    <th style="font-size: 12px;">Volume</th>
                    <th style="font-size: 12px;">Bobot</th>
                    <th style="font-size: 12px;">Volume</th>
                    <th style="font-size: 12px;">Biaya Anggaran</th>
                    <th style="font-size: 12px;">Bobot</th>
                    <th style="font-size: 12px;">Volume</th>
                    <th style="font-size: 12px;">Biaya Anggaran</th>
                    <th style="font-size: 12px;">Bobot</th>
                    <th style="font-size: 12px;">Volume</th>
                    <th style="font-size: 12px;">Biaya Anggaran</th>
                    <th style="font-size: 12px;">Bobot</th>
                  </tr>
                </thead>
                <tbody style="font-size: 11px;">
                    <?php 
                      foreach ($data['realisasi'] as $d) {

                        echo '<tr>';
                        if ($d['strkpek_status'] != 'sub') {
                          echo '<td style="font-weight: bold;">'.$d['strkpek_no'].'</td>';
                          echo '<td style="font-weight: bold;">'.ucfirst($d['pek_nama']).'</td>';
                          echo '<td style="font-weight: bold;"></td>';
                          echo '<td style="font-weight: bold;">'.$d['jdwl_bobot'].'</td>';
                          echo '<td style="font-weight: bold;"></td>';
                          echo '<td style="font-weight: bold;">'.$helper->convertAngkatoRp($d['reapek_harga_lalu']).'</td>';
                          echo '<td style="font-weight: bold;">'.$d['reapek_bobot_lalu'].'</td>';
                          echo '<td style="font-weight: bold;"></td>';
                          echo '<td style="font-weight: bold;">'.$helper->convertAngkatoRp($d['reapek_harga']).'</td>';
                          echo '<td style="font-weight: bold;">'.$d['reapek_bobot'].'</td>';
                          echo '<td style="font-weight: bold;"></td>';
                          echo '<td style="font-weight: bold;">'.$helper->convertAngkatoRp($d['reapek_harga_sampai']).'</td>';
                          echo '<td style="font-weight: bold;">'.$d['reapek_bobot_sampai'].'</td>';
                        }else{
                          echo '<td>'.$d['strkpek_no'].'</td>';
                          echo '<td>'.ucfirst($d['pek_nama']).'</td>';
                          echo '<td>'.$d['strkpek_volume'].'</td>';
                          echo '<td>'.$d['jdwl_bobot'].'</td>';
                          echo '<td>'.$d['reapek_volume_lalu'].'</td>';
                          echo '<td>'.$helper->convertAngkatoRp($d['reapek_harga_lalu']).'</td>';
                          echo '<td>'.$d['reapek_bobot_lalu'].'</td>';
                    ?>
                          <td><a href="#" id="volrea<?php echo $d['strkpek_id']; ?>" data-type="text" data-pk="<?php echo $d['realisasi_id'].','.$d['strkpek_id'].','.$d['pryk_id']; ?>" data-value="<?php echo $d['reapek_volume']; ?>" data-title="Masukan Volume Kemajuan Pekerjaan"></a></td>
                    <?php
                          echo '<td>'.$helper->convertAngkatoRp($d['reapek_harga']).'</td>';
                          echo '<td>'.$d['reapek_bobot'].'</td>';
                          echo '<td>'.$d['reapek_volume_sampai'].'</td>';
                          echo '<td>'.$helper->convertAngkatoRp($d['reapek_harga_sampai']).'</td>';
                          echo '<td>'.$d['reapek_bobot_sampai'].'</td>';
                        } 
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

