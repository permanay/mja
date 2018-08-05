<?php
    require_once('../../../controller/PegawaiController.php');
    $data = $PegawaiController->ubah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $PegawaiController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $PegawaiController->initial; ?></a></li>
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
              <h6 class="panel-title txt-dark">Tambah Data <?php echo $PegawaiController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $PegawaiController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="ubah">
                      <input type="hidden" name="<?php echo $PegawaiController->table_primary; ?>" value="<?php echo $data[$PegawaiController->table_data][0][$PegawaiController->table_primary]; ?>">
                      <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="peg_nama" class="control-label mb-10">Nama Lengkap</label>
                        <input type="text" class="form-control" name="peg_nama" data-error="Data nama lengkap harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['peg_nama']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="peg_email" class="control-label mb-10">Email</label>
                        <input type="email" class="form-control" name="peg_email" data-error="Data email salah" required value="<?php echo $data[$PegawaiController->table_data][0]['peg_email']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="peg_no_tlp" class="control-label mb-10">No Telepon</label>
                        <input type="text" class="form-control" name="peg_no_tlp" data-error="Data no telepon harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['peg_no_tlp']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="peg_domisili" class="control-label mb-10">Domisili</label>
                        <input type="text" class="form-control" name="peg_domisili" data-error="Data domisili harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['peg_domisili']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="peg_status" class="control-label mb-10">Status</label>
                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="peg_status" data-error="Data status harus diisi" required>
                          <?php 
                            if ($data[$PegawaiController->table_data][0]['peg_status'] != 'Tetap') {
                              echo '<option value="Tetap" >Tetap</option>';
                              echo '<option value="Kontrak" selected>Kontrak</option>';
                            }else{
                              echo '<option value="Tetap" selected>Tetap</option>';
                              echo '<option value="Kontrak">Kontrak</option>';
                            }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="jbtn_id" class="control-label mb-10">Jabatan</label>
                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="jbtn_id" data-error="Data jabatan harus diisi" required>
                          <?php
                            foreach ($data['jabatan'] as $v) {
                              if ($data[$PegawaiController->table_data][0]['jbtn_id'] == $v['jbtn_id']) {
                                echo '<option value="'.$v['jbtn_id'].'" selected>'.$v['jbtn_nama'].'</option>';
                              }else{
                                echo '<option value="'.$v['jbtn_id'].'">'.$v['jbtn_nama'].'</option>';
                              }
                              
                            }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="peg_hak_akses" class="control-label mb-10">Hak Akses</label>
                        <div>
                          <input id="peg_hak_akses" type="checkbox" data-off-text="Tidak" data-on-text="Ya" class="bs-switch" name="peg_hak_akses" data-error="Data hak akses harus diisi">
                        </div>  
                      </div>
                      <div id="user" style="display: inherit;">
                        <div class="form-group">
                          <label for="pgna_username" class="control-label mb-10">Username</label>
                          <input type="text" class="form-control" name="pgna_username" id="pgna_username" data-error="Data username harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['pgna_username']; ?>">
                          <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                          <label for="pgna_sandi" class="control-label mb-10">Sandi</label>
                          <input type="password" class="form-control" name="pgna_sandi" id="pgna_sandi" data-error="Data sandi harus diisi" required value="<?php echo $data[$PegawaiController->table_data][0]['pgna_sandi']; ?>">
                          <div class="help-block with-errors"></div>
                        </div>
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
<script type="text/javascript">
  /* Bootstrap switch Init*/
  <?php
    if ($data[$PegawaiController->table_data][0]['peg_hak_akses'] != '1') {
        echo "$('.bs-switch').bootstrapSwitch('state', false);";
        echo "$('#user').css('display','none');";
    }else{
        echo "$('.bs-switch').bootstrapSwitch('state', true);";
        echo "$('#user').css('display','inherit');";
    }
  ?>

  $('#peg_hak_akses').on('switchChange.bootstrapSwitch', function () {
    var hak = $('#peg_hak_akses').bootstrapSwitch('state');
    console.log(hak);
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

</script>
<!-- JavaScript -->
 
</body>
</html>
