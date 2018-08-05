<?php
    require_once('../../../controller/PenggunaController.php');
    $data = $PenggunaController->ubah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $PenggunaController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $PenggunaController->initial; ?></a></li>
            <li class="active"><span>Ubah</span></li>
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
              <h6 class="panel-title txt-dark">Ubah Data <?php echo $PenggunaController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $PenggunaController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="ubah">
                      <input type="hidden" name="<?php echo $PenggunaController->table_primary; ?>" value="<?php echo $data[$PenggunaController->table_data][0][$PenggunaController->table_primary]; ?>">
                      <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="pgna_username" class="control-label mb-10">Username</label>
                        <input type="text" class="form-control" name="pgna_username" id="pgna_username" data-error="Data username harus diisi" required value="<?php echo $data[$PenggunaController->table_data][0]['pgna_username']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pgna_sandi" class="control-label mb-10">Sandi</label>
                        <input type="password" class="form-control" name="pgna_sandi" id="pgna_sandi" data-error="Data sandi harus diisi" required value="<?php echo $data[$PenggunaController->table_data][0]['pgna_sandi']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="pgna_status" class="control-label mb-10">Status</label>
                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="pgna_status" data-error="Data status harus diisi" required>
                          <?php 
                            if ($data[$PenggunaController->table_data][0]['pgna_status'] != '0') {
                              echo '<option value="1" selected>Aktif</option>';
                              echo '<option value="0">Tidak Aktif</option>';
                            }else{
                              echo '<option value="1" >Aktif</option>';
                              echo '<option value="0" selected>Tidak Aktif</option>';
                            }
                          ?>
                        </select>
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
<script type="text/javascript">

</script>
<!-- JavaScript -->
 
</body>
</html>
