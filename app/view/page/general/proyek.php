    <?php
        require_once('../../../controller/GeneralController.php');
        $data = $GeneralController->index();
        $dproyek = $GeneralController->dproyek[0];
        $page = $GeneralController->page;
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
                            <h6 class="panel-title txt-dark pl-10">Proyek <?php echo $dproyek['pryk_nama']; ?></h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                       
                        <!-- menuproyek -->
                        <?php require_once('../../layouts/menuproyek.php');  ?>
                        <!-- menuproyek -->

                        <!-- Proyek Content -->
                        <div style="background-color: #ffffff;color: #ffffff;">
                            <div style="padding: 10px 10px;background-color: #282e3f;" class="mb-20">
                                <h5 style="color: #fff;">Informasi Proyek</h5>   
                            </div>
                            <div class="bodi" style="padding: 10px 20px;">
                                <div class="row">
                                    <div class="col-sm-8 col-xs-12">
                                        <div class="form-wrap">
                                            <form data-toggle="validator" class="form-horizontal" role="form" action="<?php echo $GeneralController->path_controller; ?>" method="POST">

                                                <input type="hidden" name="post_type" value="ubah">
                                                <input type="hidden" name="pryk_id" value="<?php echo $dproyek['pryk_id']; ?>">
                                                <input type="hidden" name="func" value="save">

                                                <div class="form-group">
                                                    <label for="exampleInputuname_3" class="col-sm-3 control-label" style="font-weight: bold;">Manajer Proyek</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" disabled="disabled" value="<?php echo $dproyek['peg_nama']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="klien_id" class="col-sm-3 control-label" style="font-weight: bold;">Klien</label>
                                                    <div class="col-sm-9">
                                                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="klien_id" data-error="Data klien harus diisi" required>
                                                          <?php
                                                            foreach ($data['klien'] as $v) {
                                                                if ($v['klien_id'] != $dproyek['klien_id']) {
                                                                    echo '<option value="'.$v['klien_id'].'">'.$v['klien_nama'].'</option>';
                                                                }else{
                                                                    echo '<option value="'.$v['klien_id'].'" selected>'.$v['klien_nama'].'</option>';
                                                                }
                                                            }
                                                          ?>
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_kode" class="col-sm-3 control-label" style="font-weight: bold;">Kode Proyek</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="pryk_kode" data-error="Data kode proyek harus diisi" value="<?php echo $dproyek['pryk_kode']; ?>" data-mask="99/aaa/aaa/aaa/9999" required>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_nama" class="col-sm-3 control-label" style="font-weight: bold;">Nama Proyek</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="pryk_nama" data-error="Data nama proyek harus diisi" required value="<?php echo $dproyek['pryk_nama']; ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_tgl_kontrak" class="col-sm-3 control-label" style="font-weight: bold;">Tanggal Kontrak</label>
                                                    <div class="col-sm-9">
                                                        <div class='input-group date' id='datetimepicker1'>
                                                            <input type='text' class="form-control" name="pryk_tgl_kontrak" data-error="Data tanggal proyek harus diisi" value="<?php echo $dproyek['pryk_tgl_kontrak']; ?>" required/>
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_nilai_kontrak" class="col-sm-3 control-label" style="font-weight: bold;">Nilai Kontrak</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">Rp</div>
                                                            <input type="text" class="form-control" name="pryk_nilai_kontrak" data-error="Data nilai kontrak harus diisi" value="<?php echo $dproyek['pryk_nilai_kontrak']; ?>" required>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_jenis_proyek" class="col-sm-3 control-label" style="font-weight: bold;">Jenis Proyek</label>
                                                    <div class="col-sm-9">
                                                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="pryk_jenis_proyek" data-error="Data jenis proyek harus diisi" required>
                                                          <option value="Gedung" <?php if ($dproyek['pryk_jenis_proyek'] == 'Gedung') { echo "selected"; } ?>>Gedung</option>
                                                          <option value="Perumahan" <?php if ($dproyek['pryk_jenis_proyek'] == 'Perumahan') { echo "selected"; } ?>>Perumahan</option>  
                                                          <option value="Teknik Sipil" <?php if ($dproyek['pryk_jenis_proyek'] == 'Teknik Sipil') { echo "selected"; } ?>>Teknik Sipil</option>  
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_lokasi" class="col-sm-3 control-label" style="font-weight: bold;">Lokasi</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="pryk_lokasi" data-error="Data lokasi harus diisi" required value="<?php echo $dproyek['pryk_lokasi']; ?>">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_durasi" class="col-sm-3 control-label" style="font-weight: bold;">Durasi</label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="pryk_durasi" data-error="Data durasi harus diisi" required value="<?php echo $dproyek['pryk_durasi']; ?>">
                                                            <div class="input-group-addon">Hari</div>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_tgl_mulai" class="col-sm-3 control-label" style="font-weight: bold;">Tanggal Mulai</label>
                                                    <div class="col-sm-9">
                                                        <div class='input-group date' id='datetimepicker2'>
                                                            <input type='text' class="form-control" name="pryk_tgl_mulai" value="<?php echo $dproyek['pryk_tgl_mulai']; ?>" data-error="Data tanggal mulai proyek harus diisi" required/>
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pryk_status" class="col-sm-3 control-label" style="font-weight: bold;">Status Proyek</label>
                                                    <div class="col-sm-9">
                                                        <select class="selectpicker" data-style="form-control btn-default btn-outline" id="pryk_status" name="pryk_status" data-error="Data status proyek harus diisi" required>
                                                          <option value="Perencanaan" <?php if ($dproyek['pryk_status'] == 'Perencanaan') { echo "selected"; } ?>>Perencanaan</option>
                                                          <option value="Pelaksanaan" <?php if ($dproyek['pryk_status'] == 'Pelaksanaan') { echo "selected"; } ?>>Pelaksanaan</option>
                                                          <option value="Selesai" <?php if ($dproyek['pryk_status'] == 'Selesai') { echo "selected"; } ?>>Selesai</option>  
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="tlg_selesai" <?php if ($dproyek['pryk_status'] != 'Selesai') { echo 'style="display: none;"';} ?>>
                                                    <label for="pryk_tgl_selesai" class="col-sm-3 control-label" style="font-weight: bold;">Tanggal Selesai</label>
                                                    <div class="col-sm-9">
                                                        <div class='input-group date' id='datetimepicker3'>
                                                            <input type='text' class="form-control" id="pryk_tgl_selesai" name="pryk_tgl_selesai" value="<?php echo $dproyek['pryk_tgl_selesai']; ?>" data-error="Data tanggal selesai proyek harus diisi"/>
                                                            <span class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <button type="submit" class="btn btn-success btn-anim" id="btnTambah"><i class="icon-rocket"></i><span class="btn-text">Simpan Perubahan</span></button>
                                                    </div>
                                                </div>
                                            </form>
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

        $(document).ready(function() {
            "use strict";
            
            
            /* Datetimepicker Init*/
            $('#datetimepicker1').datetimepicker({
                useCurrent: false,
                format: 'YYYY-MM-DD',
                icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    },
            });

            $('#datetimepicker2').datetimepicker({
                useCurrent: false,
                format: 'YYYY-MM-DD',
                icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    },
            });

            $('#datetimepicker3').datetimepicker({
                useCurrent: false,
                format: 'YYYY-MM-DD',
                icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-arrow-up",
                        down: "fa fa-arrow-down"
                    },
            });

            $('#pryk_status').change(function() {
                var status = $('#pryk_status').val();
                if (status == "Selesai") {
                  $('#tlg_selesai').css('display','inherit');
                  $('#pryk_tgl_selesai').prop('required',true);
                }else{
                  $('#tlg_selesai').css('display','none');
                  $('#pryk_tgl_selesai').removeAttr('required');
                }
            });

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
