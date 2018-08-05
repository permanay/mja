    <?php
        require_once('../../../controller/KegiatanHarianController.php');
        require_once('../../../../helper/Helper.php');
        $data = $KegiatanHarianController->index();
        $dproyek = $KegiatanHarianController->dproyek[0];
        $page = $KegiatanHarianController->page;
    ?>
    <!-- Header -->
    <?php require_once('../../layouts/header.php');  ?>
    <!-- Header -->    

    <!-- Main Content -->
    <div class="container-fluid pt-10 pl-5">
        <!-- Row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default card-view pl-0 pr-0">
                    <div class="panel-heading" style="padding: 10px 15px;">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark pl-10">Proyek <?php echo $dproyek['pryk_nama']; ?> </h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        
                        <!-- menuproyek -->
                        <?php require_once('../../layouts/menuproyek.php');  ?>
                        <!-- menuproyek -->

                        <!-- Proyek Content -->
                        <div style="background-color: #ffffff;color: #ffffff;">
                            <div style="padding: 10px 10px;background-color: #282e3f;" class="mb-10">
                                <h5 style="color: #fff;">Kegiatan Harian Proyek</h5>   
                            </div>
                            <div class="bodi" style="padding: 10px 20px;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button id="tmbl-tambah" class="btn btn-tambah btn-lable-wrap left-label mt-10 mb-10" alt="default" data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Kegiatan Harian</span></button>
                                        <div class="table-wrap mb-20">
                                            <div class="table-responsive">
                                              <table class="table table-hover table-bordered mb-0 custab">
                                                <thead>
                                                  <tr>
                                                    <th>Tanggal</th>
                                                    <th>Pekerjaan</th>
                                                    <th>Bahan Baku</th>
                                                    <th>Tenaga Kerja</th>
                                                    <th>Risiko</th>
                                                    <th>Cuaca</th>
                                                    <th>Catatan</th>
                                                    <th>Aksi</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                      foreach ($data['kegiatan_harian'] as $d) {

                                                        echo '<tr>';
                                                          echo '<td>'.$helper->formatDateId($d['kgtnhari_tanggal']).'</td>';
                                                          echo '<td>';
                                                          $n = 1;
                                                          foreach ($d['pekerjaan'] as $v) {
                                                            if ($n != count($d['pekerjaan'])) {
                                                              echo $n.'. '.ucfirst($v['pek_nama']).'<br>';  
                                                            }else{
                                                              echo $n.'. '.ucfirst($v['pek_nama']);  
                                                            }
                                                            $n++;
                                                          }
                                                          echo '</td>';
                                                          echo '<td>';
                                                          $n = 1;
                                                          foreach ($d['bahan_baku'] as $v) {
                                                            if ($n != count($d['bahan_baku'])) {
                                                              echo $n.'. '.$v['bhnbku_nama'].' '.$v['kgtnbhnbku_jumlah'].' '.$v['bhnbku_satuan'].'<br>';
                                                            }else{
                                                              echo $n.'. '.$v['bhnbku_nama'].' '.$v['kgtnbhnbku_jumlah'].' '.$v['bhnbku_satuan'];  
                                                            }
                                                            $n++;
                                                          }
                                                          echo '</td>';
                                                          echo '<td>';
                                                          $n = 1;
                                                          foreach ($d['tenaga_kerja'] as $v) {
                                                            if ($n != count($d['tenaga_kerja'])) {
                                                              echo $n.'. '.ucfirst($v['jbtn_nama']).' '.$v['kgtntenker_jumlah'].' orang'.'<br>';
                                                            }else{
                                                              echo $n.'. '.ucfirst($v['jbtn_nama']).' '.$v['kgtntenker_jumlah'].' orang';  
                                                            }
                                                            $n++;
                                                          }
                                                          echo '</td>';
                                                          echo '<td>';
                                                          $n = 1;
                                                          foreach ($d['risiko'] as $v) {
                                                            if ($n != count($d['risiko'])) {
                                                              echo $n.'. '.ucfirst($v['rsko_nama']).'<br>';
                                                            }else{
                                                              echo $n.'. '.ucfirst($v['rsko_nama']);  
                                                            }
                                                            $n++;
                                                          }
                                                          echo '</td>';
                                                          echo '<td>';
                                                          echo '- Pagi '.$d['kgtnhari_cuaca_pagi'].'<br>';
                                                          echo '- Siang '.$d['kgtnhari_cuaca_siang'].'<br>';
                                                          echo '- Sore '.$d['kgtnhari_cuaca_sore'].'<br>';
                                                          echo '</td>';
                                                          echo '<td>'.$d['kgtnhari_catatan'].'</td>';
                                                          echo '<td class="text-nowrap">';
                                                            
                                                            echo '<button alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-warning btn-icon-anim btn-square mr-5" onclick="$(this).kgtnhari(\''.$d['kgtnhari_id'].'\');"><i class="fa fa-pencil"></i></button>';
                                                            echo '<button class="btn btn-danger btn-icon-anim btn-square" onclick="$(this).delete(\''.$d['kgtnhari_id'].'\');"><i class="fa fa-trash-o"></i></button>';
                                                            
                                                          echo '</td>';
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
                        <!-- Proyek Content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- Main Content -->

    <!-- Modal -->
    <div id="responsive-modal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="modal-judul" style="font-size: 14px;">Tambah Kegiatan Harian</h5>
                </div>
                <form data-toggle="validator" id="form_id" role="form" action="<?php echo $KegiatanHarianController->path_controller; ?>" method="POST">
                <div class="modal-body" style="font-size: 12px;">
                    
                        <input type="hidden" name="post_type" id="post_type" value="tambah">
                        <input type="hidden" name="pryk_id" value="<?php echo $dproyek['pryk_id']; ?>">
                        <input type="hidden" name="kgtnhari_id" id="kgtnhari_id">
                        <input type="hidden" name="func" value="save">

                        <div class="form-group">
                          <label for="kgtnhari_tanggal" class="control-label mb-10">Tanggal Pelaksanaan</label>
                          <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" name="kgtnhari_tanggal" id="kgtnhari_tanggal" data-error="Data tanggal pelaksanaan harus diisi" required/>
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="col-xs-12" style="padding: 0px;">
                          <hr style="margin-top: 0;margin-bottom: 10px;border-top: 1px solid #e5e5e5;">
                        </div>
                        <!-- input pekerjaan harian -->
                        <div id="input_pek">
                          <div id="ipt_pek1">
                            <div class="col-md-11" style="padding-left: 0px;">
                              <div class="form-group">
                                  <label for="pek_kgtnhari1" class="control-label mb-10">Pekerjaan yang dilaksanakan:</label>
                                  <select class="form-control select2" name="pek_kgtnhari[]" id="pek_kgtnhari1" style="font-size: 12px;">
                                      <?php 
                                          foreach ($data['struktur_pekerjaan'] as $d) {
                                              echo '<option value="'.$d['strkpek_id'].'">'.ucfirst($d['pek_nama']).'</option>';
                                          }
                                      ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-1" style="padding-right: 0; padding-left: 0px;margin-top: 32px;">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px;">
                            <button class="btn btn-sm btn-info btn-outline btn-icon right-icon" id="tambah_pekhari" style="padding: 5px;"> <i class="fa fa-plus"></i><span>Pekerjaan</span></button>
                        </div>
                        <!-- input pekerjaan harian -->
                        <div class="col-xs-12" style="padding: 0px;">
                          <hr style="margin-top: 10px;margin-bottom: 10px;border-top: 1px solid #e5e5e5;">
                        </div>
                        <!-- input bahan baku harian -->
                        <div id="input_bhnbku">
                          <div id="ipt_bhnbku1">
                            <div class="col-md-7" style="padding-left: 0px;">
                              <div class="form-group">
                                  <label for="bhnbku_kgtnhari1" class="control-label mb-10">Bahan baku yang digunakan:</label>
                                  <select class="form-control select2" name="bhnbku_kgtnhari[]" id="bhnbku_kgtnhari1" style="font-size: 12px;">
                                      <?php 
                                          foreach ($data['bahan_baku'] as $d) {
                                              echo '<option value="'.$d['bhnbku_id'].'">'.ucfirst($d['bhnbku_nama']).' ('.$d['bhnbku_satuan'].') </option>';
                                          }
                                      ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-4" style="padding-left: 0px;">
                              <div class="form-group">
                                  <label for="jumbhnbku_kgtnhari1" class="control-label mb-10">Jumlah:</label>
                                  <input type="number" class="form-control" name="jumbhnbku_kgtnhari[]" id="jumbhnbku_kgtnhari1" style="font-size: 12px;">
                              </div>
                            </div>
                            <div class="col-md-1" style="padding-right: 0; padding-left: 0px;margin-top: 32px;">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px;">
                            <button class="btn btn-sm btn-info btn-outline btn-icon right-icon" id="tambah_bhnbkuhari" style="padding: 5px;"> <i class="fa fa-plus"></i><span>Bahan Baku</span></button>
                        </div>
                        <!-- input bahan baku harian -->
                        <div class="col-xs-12" style="padding: 0px;">
                          <hr style="margin-top: 10px;margin-bottom: 10px;border-top: 1px solid #e5e5e5;">
                        </div>
                        <!-- input tenaga kerja harian -->
                        <div id="input_tenker">
                          <div id="ipt_tenker1">
                            <div class="col-md-7" style="padding-left: 0px;">
                              <div class="form-group">
                                  <label for="tenker_kgtnhari1" class="control-label mb-10">Tenaga Kerja yang Tersedia:</label>
                                  <select class="form-control select2" name="tenker_kgtnhari[]" id="tenker_kgtnhari1" style="font-size: 12px;">
                                      <?php 
                                          foreach ($data['jabatan'] as $d) {
                                              echo '<option value="'.$d['jbtn_id'].'">'.ucfirst($d['jbtn_nama']).'</option>';
                                          }
                                      ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-4" style="padding-left: 0px;">
                              <div class="form-group">
                                  <label for="jumtenker_kgtnhari1" class="control-label mb-10">Jumlah:</label>
                                  <input type="number" class="form-control" name="jumtenker_kgtnhari[]" id="jumtenker_kgtnhari1" style="font-size: 12px;">
                              </div>
                            </div>
                            <div class="col-md-1" style="padding-right: 0; padding-left: 0px;margin-top: 32px;">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px;">
                            <button class="btn btn-sm btn-info btn-outline btn-icon right-icon" id="tambah_tenkerhari" style="padding: 5px;"> <i class="fa fa-plus"></i><span>Tenaga Kerja</span></button>
                        </div>
                        <!-- input tenaga kerja harian -->
                        <div class="col-xs-12" style="padding: 0px;">
                          <hr style="margin-top: 10px;margin-bottom: 10px;border-top: 1px solid #e5e5e5;">
                        </div>
                        <!-- input risiko harian -->
                        <div id="input_risk">
                          <div id="ipt_risk1">
                            <div class="col-md-11" style="padding-left: 0px;">
                              <div class="form-group">
                                  <label for="risk_kgtnhari1" class="control-label mb-10">Risiko yang terjadi:</label>
                                  <select class="form-control select2" name="risk_kgtnhari[]" id="risk_kgtnhari1" style="font-size: 12px;">
                                      <?php 
                                          foreach ($data['risiko'] as $d) {
                                              echo '<option value="'.$d['rsko_id'].'">'.ucfirst($d['rsko_nama']).'</option>';
                                          }
                                      ?>
                                  </select>
                              </div>
                            </div>
                            <div class="col-md-1" style="padding-right: 0; padding-left: 0px;margin-top: 32px;">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px;">
                            <button class="btn btn-sm btn-info btn-outline btn-icon right-icon" id="tambah_riskhari" style="padding: 5px;"> <i class="fa fa-plus"></i><span>Risiko</span></button>
                        </div>
                        <!-- input risiko harian -->

                        <div class="col-xs-12" style="padding: 0px;">
                          <hr style="margin-top: 10px;margin-bottom: 10px;border-top: 1px solid #e5e5e5;">
                        </div>
                        <div class="col-xs-12" style="padding: 0px;">
                          <div class="col-xs-4" style="padding: 0px;">
                            <div class="form-group">
                              <label for="kgtnhari_cuaca_pagi" class="control-label mb-10">Cuaca Pagi</label>
                              <select class="form-control" data-style="btn-default btn-outline" name="kgtnhari_cuaca_pagi" id="kgtnhari_cuaca_pagi" style="font-size: 12px;">
                                <option value="Cerah">Cerah</option>
                                <option value="Mendung">Mendung</option>  
                                <option value="Hujan">Hujan</option>  
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="form-group">
                              <label for="kgtnhari_cuaca_siang" class="control-label mb-10">Cuaca Siang</label>
                              <select class="form-control" data-style="btn-default btn-outline" name="kgtnhari_cuaca_siang" id="kgtnhari_cuaca_siang" style="font-size: 12px;">
                                <option value="Cerah">Cerah</option>
                                <option value="Mendung">Mendung</option>  
                                <option value="Hujan">Hujan</option>  
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-4" style="padding: 0px;">
                            <div class="form-group">
                              <label for="kgtnhari_cuaca_sore" class="control-label mb-10">Cuaca Sore</label>
                              <select class="form-control" data-style="btn-default btn-outline" name="kgtnhari_cuaca_sore" id="kgtnhari_cuaca_sore" style="font-size: 12px;">
                                <option value="Cerah">Cerah</option>
                                <option value="Mendung">Mendung</option>  
                                <option value="Hujan">Hujan</option>  
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px;">
                          <div class="form-group">
                              <label for="strkpek_volume" class="control-label mb-10">Catatan:</label>
                              <textarea class="form-control" name="kgtnhari_catatan" id="kgtnhari_catatan" style="font-size: 12px;"></textarea>
                          </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-anim" id="btnTambah"><i class="icon-rocket"></i><span class="btn-text">Simpan</span></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Footer -->
    <?php require_once('../../layouts/footer.php');  ?>
    
    <!-- Footer -->

    <!-- JavaScript -->
    <script type="text/javascript">
        $('.tultip').tooltip({
            trigger: 'hover',
            placement: 'top',
            animate: true,
            delay: 100,
            container: 'body'
        });

        $('#datetimepicker1').datetimepicker({
          useCurrent: false,
          format: 'YYYY-MM-DD',
          icons: {
                      time: "fa fa-clock-o",
                      date: "fa fa-calendar",
                      up: "fa fa-arrow-up",
                      down: "fa fa-arrow-down"
                  },
        }).data("DateTimePicker").date(moment());

        // pekhari tambah
        num_input = 2;

        $( "#tambah_pekhari" ).click(function() {
            
            html = '';
            html = html + '<div id="input_pek">';
              html = html + '<div id="ipt_pek'+ num_input +'">';
                html = html + '<div class="col-md-11" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<select class="form-control select2" name="pek_kgtnhari[]" id="pek_kgtnhari'+ num_input +'" style="font-size: 12px;">';
                          <?php 
                              foreach ($data['struktur_pekerjaan'] as $d) {
                                  echo 'html = html + \'<option value="'.$d['strkpek_id'].'">'.ucfirst($d['pek_nama']).'</option>\';';
                              }
                          ?>
                      html = html + '</select>';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                  html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInput(\''+ num_input +'\');"><i class="icon-close"></i></button>';
                html = html + '</div>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_pek" ).append(html);

            num_input = num_input +1;

            $(".select2").select2();
            $("#form_id").validator('update'); 

            return false;
        });

        $.fn.deleteInput = function(id) {    
            $( "#ipt_pek" + id ).remove();
            $("#form_id").validator('update');  
            return false;
        }

        // tambah pek hari

        // tambah bhnbku hari
        num_input_bhnbku = 2;

        $( "#tambah_bhnbkuhari" ).click(function() {
            
            html = '';

            html = html + '<div id="input_bhnbku">';
              html = html + '<div id="ipt_bhnbku'+ num_input_bhnbku +'">';
                html = html + '<div class="col-md-7" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<select class="form-control select2" name="bhnbku_kgtnhari[]" id="bhnbku_kgtnhari'+ num_input_bhnbku +'" style="font-size: 12px;">';
                          <?php 
                              foreach ($data['bahan_baku'] as $d) {
                                  echo 'html = html + \'<option value="'.$d['bhnbku_id'].'">'.ucfirst($d['bhnbku_nama']).' ('.$d['bhnbku_satuan'].')</option>\';';
                              }
                          ?>
                      html = html + '</select>';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-4" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<input type="number" class="form-control" name="jumbhnbku_kgtnhari[]" id="jumbhnbku_kgtnhari'+ num_input_bhnbku +'" style="font-size: 12px;">';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                  html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInputBhnBku(\''+ num_input_bhnbku +'\');"><i class="icon-close"></i></button>';
                html = html + '</div>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_bhnbku" ).append(html);

            num_input_bhnbku = num_input_bhnbku +1;

            $(".select2").select2();
            $("#form_id").validator('update'); 

            return false;
        });

        $.fn.deleteInputBhnBku = function(id) {    
            $( "#ipt_bhnbku" + id ).remove();
            $("#form_id").validator('update');  
            return false;
        }

        // tambah bhnbku hari

        // tambah tenker hari
        num_input_tenker = 2;

        $( "#tambah_tenkerhari" ).click(function() {
            
            html = '';

            html = html + '<div id="input_tenker">';
              html = html + '<div id="ipt_tenker'+ num_input_tenker +'">';
                html = html + '<div class="col-md-7" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<select class="form-control select2" name="tenker_kgtnhari[]" id="tenker_kgtnhari'+ num_input_tenker +'" style="font-size: 12px;">';
                          <?php 
                              foreach ($data['jabatan'] as $d) {
                                  echo 'html = html + \'<option value="'.$d['jbtn_id'].'">'.ucfirst($d['jbtn_nama']).'</option>\';';
                              }
                          ?>
                      html = html + '</select>';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-4" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<input type="number" class="form-control" name="jumtenker_kgtnhari[]" id="jumtenker_kgtnhari'+ num_input_tenker +'" style="font-size: 12px;">';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                  html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInputTenker(\''+ num_input_tenker +'\');"><i class="icon-close"></i></button>';
                html = html + '</div>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_tenker" ).append(html);

            num_input_tenker = num_input_tenker +1;

            $(".select2").select2();
            $("#form_id").validator('update'); 

            return false;
        });

        $.fn.deleteInputTenker = function(id) {    
            $( "#ipt_tenker" + id ).remove();
            $("#form_id").validator('update');  
            return false;
        }

        // tambah tenker hari

        // risk hari tambah
        num_input_risk = 2;

        $( "#tambah_riskhari" ).click(function() {
            
            html = '';
            html = html + '<div id="input_risk">';
              html = html + '<div id="ipt_risk'+ num_input_risk +'">';
                html = html + '<div class="col-md-11" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<select class="form-control select2" name="risk_kgtnhari[]" id="risk_kgtnhari'+ num_input_risk +'" style="font-size: 12px;">';
                          <?php 
                              foreach ($data['risiko'] as $d) {
                                  echo 'html = html + \'<option value="'.$d['rsko_id'].'">'.ucfirst($d['rsko_nama']).'</option>\';';
                              }
                          ?>
                      html = html + '</select>';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                  html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInputRisk(\''+ num_input_risk +'\');"><i class="icon-close"></i></button>';
                html = html + '</div>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_risk" ).append(html);

            num_input_risk = num_input_risk +1;

            $(".select2").select2();
            $("#form_id").validator('update'); 

            return false;
        });

        $.fn.deleteInputRisk = function(id) {    
            $( "#ipt_risk" + id ).remove();
            $("#form_id").validator('update');  
            return false;
        }

        // risk hari tambah

        $('#tmbl-tambah').click(function() {
            $('#modal-judul').html("Tambah Kegiatan Harian");
        });

        // edit kegiatan hari
        $.fn.kgtnhari = function(id) {   
                
            $('#kgtnhari_id').val(id);
            $('#modal-judul').html("Ubah Kegiatan Harian");
            $('#post_type').val("ubah");

            if (num_input > 2) {
              for (var i = 2; i < num_input; i++) {
                $( "#ipt_pek" + i ).remove();  
              }
            }

            if (num_input_bhnbku > 2) {
              for (var i = 2; i < num_input_bhnbku; i++) {
                $( "#ipt_bhnbku" + i ).remove();  
              }
            }

            if (num_input_tenker > 2) {
              for (var i = 2; i < num_input_tenker; i++) {
                $( "#ipt_tenker" + i ).remove();  
              }
            }

            if (num_input_risk > 2) {
              for (var i = 2; i < num_input_risk; i++) {
                $( "#ipt_risk" + i ).remove();  
              }
            }

            var form_data = {            
              id:id
            };

            $.ajax({
                type: "POST",
                url: "<?php echo $KegiatanHarianController->path_controller; ?>?func=cariKegiatanHarian",
                data: form_data,
                success: function(response)
                {
                    var obj = response;
                    var stringify = JSON.parse(obj);

                    if (stringify.length > 0) {

                      $('#kgtnhari_tanggal').val(stringify[0]['kgtnhari_tanggal']);
                      $('#kgtnhari_cuaca_pagi').val(stringify[0]['kgtnhari_cuaca_pagi']);
                      $('#kgtnhari_cuaca_siang').val(stringify[0]['kgtnhari_cuaca_siang']);
                      $('#kgtnhari_cuaca_sore').val(stringify[0]['kgtnhari_cuaca_sore']);
                      $('#kgtnhari_catatan').val(stringify[0]['kgtnhari_catatan']);

                      var pekerjaan = stringify[0]['pekerjaan'];
                      if (pekerjaan.length > 1) {
                        
                        $('#pek_kgtnhari1').val(pekerjaan[0]['strkpek_id']).trigger('change');

                        for (var i = 1; i < pekerjaan.length; i++) {
                          inisialisasiPek(num_input);

                          $('#pek_kgtnhari'+num_input).val(pekerjaan[i]['strkpek_id']).trigger('change');

                          num_input = num_input +1;

                        }

                      } if(pekerjaan.length > 0 && pekerjaan.length < 2){
                        $('#pek_kgtnhari1').val(pekerjaan[0]['strkpek_id']).trigger('change');
                      }else{
                        num_input = 2;  
                      }

                      var bahan_baku = stringify[0]['bahan_baku'];
                      if (bahan_baku.length > 1) {
                        
                        $('#bhnbku_kgtnhari1').val(bahan_baku[0]['bhnbku_id']).trigger('change');
                        $('#jumbhnbku_kgtnhari1').val(bahan_baku[0]['kgtnbhnbku_jumlah']);

                        for (var i = 1; i < bahan_baku.length; i++) {
                          inisialisasiBhnbku(num_input_bhnbku);

                          $('#bhnbku_kgtnhari'+num_input_bhnbku).val(bahan_baku[i]['bhnbku_id']).trigger('change');
                          $('#jumbhnbku_kgtnhari'+num_input_bhnbku).val(bahan_baku[i]['kgtnbhnbku_jumlah']);

                          num_input_bhnbku = num_input_bhnbku +1;

                        }

                      } if(bahan_baku.length > 0 && bahan_baku.length < 2){
                        $('#bhnbku_kgtnhari1').val(bahan_baku[0]['bhnbku_id']).trigger('change');
                        $('#jumbhnbku_kgtnhari1').val(bahan_baku[0]['kgtnbhnbku_jumlah']);
                      } else{
                        num_input_bhnbku = 2;  
                      }

                      var tenaga_kerja = stringify[0]['tenaga_kerja'];
                      if (tenaga_kerja.length > 1) {
                        
                        $('#tenker_kgtnhari1').val(tenaga_kerja[0]['jbtn_id']).trigger('change');
                        $('#jumtenker_kgtnhari1').val(tenaga_kerja[0]['kgtntenker_jumlah']);

                        for (var i = 1; i < tenaga_kerja.length; i++) {
                          inisialisasiTenker(num_input_tenker);

                          $('#tenker_kgtnhari'+num_input_tenker).val(tenaga_kerja[i]['jbtn_id']).trigger('change');
                          $('#jumtenker_kgtnhari'+num_input_tenker).val(tenaga_kerja[i]['kgtntenker_jumlah']);

                          num_input_tenker = num_input_tenker +1;

                        }

                      } if(tenaga_kerja.length > 0 && tenaga_kerja.length < 2){
                        $('#tenker_kgtnhari1').val(tenaga_kerja[0]['jbtn_id']).trigger('change');
                        $('#jumtenker_kgtnhari1').val(tenaga_kerja[0]['kgtntenker_jumlah']);
                      } else{
                        num_input_tenker = 2;  
                      }

                      var risiko = stringify[0]['risiko'];
                      if (risiko.length > 1) {
                        
                        $('#risk_kgtnhari1').val(risiko[0]['rsko_id']).trigger('change');

                        for (var i = 1; i < risiko.length; i++) {
                          inisialisasiRisk(num_input_risk);

                          $('#risk_kgtnhari'+num_input_risk).val(risiko[i]['rsko_id']).trigger('change');

                          num_input_risk = num_input_risk +1;

                        }

                      } if(risiko.length > 0 && risiko.length < 2){
                        $('#risk_kgtnhari1').val(risiko[0]['rsko_id']).trigger('change');
                      }else{
                        num_input_risk = 2;  
                      }

                      $("#form_id").validator('update');               

                    }else{
                      num_input = 2;
                      num_input_bhnbku = 2;
                      num_input_tenker = 2;
                      num_input_risk = 2;
                    }
                    
                } 
            });

        }

        function inisialisasiPek(no) {
            html = '';
            html = html + '<div id="input_pek">';
              html = html + '<div id="ipt_pek'+ no +'">';
                html = html + '<div class="col-md-11" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<select class="form-control select2" name="pek_kgtnhari[]" id="pek_kgtnhari'+ no +'" style="font-size: 12px;">';
                          <?php 
                              foreach ($data['struktur_pekerjaan'] as $d) {
                                  echo 'html = html + \'<option value="'.$d['strkpek_id'].'">'.ucfirst($d['pek_nama']).'</option>\';';
                              }
                          ?>
                      html = html + '</select>';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                  html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInput(\''+ no +'\');"><i class="icon-close"></i></button>';
                html = html + '</div>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_pek" ).append(html);

            $(".select2").select2();
            $("#form_id").validator('update'); 
        }

        function inisialisasiBhnbku(no) {
            html = '';

            html = html + '<div id="input_bhnbku">';
              html = html + '<div id="ipt_bhnbku'+ no +'">';
                html = html + '<div class="col-md-7" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<select class="form-control select2" name="bhnbku_kgtnhari[]" id="bhnbku_kgtnhari'+ no +'" style="font-size: 12px;">';
                          <?php 
                              foreach ($data['bahan_baku'] as $d) {
                                  echo 'html = html + \'<option value="'.$d['bhnbku_id'].'">'.ucfirst($d['bhnbku_nama']).' ('.$d['bhnbku_satuan'].')</option>\';';
                              }
                          ?>
                      html = html + '</select>';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-4" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<input type="number" class="form-control" name="jumbhnbku_kgtnhari[]" id="jumbhnbku_kgtnhari'+ no +'" style="font-size: 12px;">';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                  html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInputBhnBku(\''+ no +'\');"><i class="icon-close"></i></button>';
                html = html + '</div>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_bhnbku" ).append(html);

            $(".select2").select2();
            $("#form_id").validator('update');
        }

        function inisialisasiTenker(no) {
            html = '';

            html = html + '<div id="input_tenker">';
              html = html + '<div id="ipt_tenker'+ no +'">';
                html = html + '<div class="col-md-7" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<select class="form-control select2" name="tenker_kgtnhari[]" id="tenker_kgtnhari'+ no +'" style="font-size: 12px;">';
                          <?php 
                              foreach ($data['jabatan'] as $d) {
                                  echo 'html = html + \'<option value="'.$d['jbtn_id'].'">'.ucfirst($d['jbtn_nama']).'</option>\';';
                              }
                          ?>
                      html = html + '</select>';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-4" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<input type="number" class="form-control" name="jumtenker_kgtnhari[]" id="jumtenker_kgtnhari'+ no +'" style="font-size: 12px;">';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                  html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInputTenker(\''+ no +'\');"><i class="icon-close"></i></button>';
                html = html + '</div>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_tenker" ).append(html);

            $(".select2").select2();
            $("#form_id").validator('update');
        }

        function inisialisasiRisk(no) {
            html = '';
            html = html + '<div id="input_risk">';
              html = html + '<div id="ipt_risk'+ no +'">';
                html = html + '<div class="col-md-11" style="padding-left: 0px;">';
                  html = html + '<div class="form-group">';
                      html = html + '<select class="form-control select2" name="risk_kgtnhari[]" id="risk_kgtnhari'+ no +'" style="font-size: 12px;">';
                          <?php 
                              foreach ($data['risiko'] as $d) {
                                  echo 'html = html + \'<option value="'.$d['rsko_id'].'">'.ucfirst($d['rsko_nama']).'</option>\';';
                              }
                          ?>
                      html = html + '</select>';
                  html = html + '</div>';
                html = html + '</div>';
                html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
                  html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInputRisk(\''+ no +'\');"><i class="icon-close"></i></button>';
                html = html + '</div>';
              html = html + '</div>';
            html = html + '</div>';

            $( "#input_risk" ).append(html);

            $(".select2").select2();
            $("#form_id").validator('update'); 
        }

        // edit kegiatan hari

        $.fn.delete = function(id) {    

          swal({   
              title: "Apakah anda yakin mengahapus data ini?",   
              type: "warning",   
              showCancelButton: true,   
              cancelButtonText: "Batal",   
              confirmButtonColor: "#f8b32d",   
              confirmButtonText: "Hapus",   
              closeOnConfirm: false 
          }, function(){   

              var form_data = {            
                  id:id,
                  pryk_id:<?php echo $dproyek['pryk_id']; ?>
              };
              $.ajax({
                  type: "POST",
                  url: "<?php echo $KegiatanHarianController->path_controller; ?>?func=hapus",
                  data: form_data,
                  success: function(response)
                  {
                      var res = response.split(",");
                      if (res[0] == 'gagal') {
                          swal({   
                              title: "",   
                              type: "error",
                              text: res[1],   
                              timer: 2000,   
                              showConfirmButton: false 
                          });
                      }else{
                          swal({   
                              title: "",   
                              type: "success",
                              text: res[1],   
                              timer: 3000,   
                              showConfirmButton: false 
                          });
                          setTimeout(' window.location.href = "index.php?id=<?php echo $_GET['id']; ?>"; ',2000);      
                      }
                      
                  } 
              });
          });
          return false;
          
        }

        $(document).ready(function() {
            "use strict";

            <?php 
              if (isset($_SESSION["notification_message"]) && !empty($_SESSION["notification_message"])) {
            ?>
                  $.toast().reset('all');
                  $("body").removeAttr('class');

                  var itext = "<?php echo $_SESSION["notification_message"]; ?>";

                  <?php 
                      if ($_SESSION["notification_result"] != 'berhasil') {
                  ?>
                          var type = "error";
                  <?php 
                      }else{
                  ?>
                          var type = "success";
                  <?php 
                      }

                      unset($_SESSION["notification_result"]);
                      unset($_SESSION["notification_message"]);
                  ?>

                  $.toast({
                          heading: 'Pemberitahuan',
                          text: itext,
                          position: 'top-right',
                          loaderBg:'#fec107',
                          icon: type,
                          hideAfter: 3500, 
                          stack: 6
                        });
                  

                  return false;
                  
            <?php
              }
            ?>
        });
    </script>
    <!-- JavaScript -->
 
</body>
</html>