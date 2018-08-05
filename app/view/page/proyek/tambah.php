<?php
    require_once('../../../controller/ProyekController.php');
    $data = $ProyekController->tambah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $ProyekController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $ProyekController->initial; ?></a></li>
            <li class="active"><span>Tambah</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Tambah Data <?php echo $ProyekController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $ProyekController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="tambah">
                      <input type="hidden" name="id" value="0">
                      <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="peg_id" class="control-label mb-10">Manajer Proyek</label>
                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="peg_id" data-error="Data manajer proyek harus diisi" required>
                          <?php
                            foreach ($data['pegawai'] as $v) {
                              echo '<option value="'.$v['peg_id'].'">'.$v['peg_nama'].'</option>';
                            }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="klien_id" class="control-label mb-10">Klien</label>
                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="klien_id" data-error="Data klien harus diisi" required>
                          <?php
                            foreach ($data['klien'] as $v) {
                              echo '<option value="'.$v['klien_id'].'">'.$v['klien_nama'].'</option>';
                            }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pryk_kode" class="control-label mb-10">Kode Proyek</label>
                        <input type="text" class="form-control" name="pryk_kode" data-error="Data kode proyek harus diisi" data-mask="99/aaa/aaa/aaa/9999"  required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pryk_nama" class="control-label mb-10">Nama Proyek</label>
                        <input type="text" class="form-control" name="pryk_nama" data-error="Data nama proyek harus diisi" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pryk_tgl_kontrak" class="control-label mb-10">Tanggal Kontrak</label>
                        <div class='input-group date' id='datetimepicker1'>
                          <input type='text' class="form-control" name="pryk_tgl_kontrak" data-error="Data tanggal proyek harus diisi" required/>
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pryk_nilai_kontrak" class="control-label mb-10">Nilai Kontrak</label>
                        <input type="text" class="form-control" name="pryk_nilai_kontrak" data-error="Data nilai kontrak harus diisi" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pryk_jenis_proyek" class="control-label mb-10">Jenis Proyek</label>
                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="pryk_jenis_proyek" data-error="Data jenis proyek harus diisi" required>
                          <option value="Gedung">Gedung</option>
                          <option value="Perumahan">Perumahan</option>  
                          <option value="Teknik Sipil">Teknik Sipil</option>  
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pryk_lokasi" class="control-label mb-10">Lokasi</label>
                        <input type="text" class="form-control" name="pryk_lokasi" data-error="Data lokasi harus diisi" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pryk_durasi" class="control-label mb-10">Durasi</label>
                        <input type="text" class="form-control" name="pryk_durasi" data-error="Data durasi harus diisi" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pryk_tgl_mulai" class="control-label mb-10">Tanggal Mulai</label>
                        <div class='input-group date' id='datetimepicker2'>
                          <input type='text' class="form-control" name="pryk_tgl_mulai" data-error="Data tanggal proyek harus diisi" required/>
                          <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </span>
                        </div>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group mb-0">
                        <a href="index.php" class="btn btn-primary">Batal</a>
                        <button type="submit" class="btn btn-success btn-anim" id="btnTambah"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /Row -->
    
</div>
<!-- Main Content -->

<!-- Footer -->
<?php require_once('../../layouts/footer.php');  ?>
<!-- Footer -->

<!-- JavaScript -->
<!-- Form Picker Init JavaScript -->
<script type="text/javascript">
  $('.bs-switch').bootstrapSwitch('state', true);

  $('#peg_hak_akses').on('switchChange.bootstrapSwitch', function () {
    var hak = $('#peg_hak_akses').bootstrapSwitch('state');
    if (hak) {
      $('#user').css('display','inherit');
      $('#pgna_username').prop('required',true);
      $('#pgna_sandi').prop('required',true);
    }else{
      $('#user').css('display','none');
      $('#pgna_username').removeAttr('required');
      $('#pgna_sandi').removeAttr('required');
    }
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
    }).data("DateTimePicker").date(moment());

    $('#datetimepicker2').datetimepicker({
      useCurrent: false,
      format: 'YYYY-MM-DD',
      icons: {
                  time: "fa fa-clock-o",
                  date: "fa fa-calendar",
                  up: "fa fa-arrow-up",
                  down: "fa fa-arrow-down"
              },
    }).data("DateTimePicker").date(moment());
  });

</script>
<!-- JavaScript -->
 
</body>
</html>
