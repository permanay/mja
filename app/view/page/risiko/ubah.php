<?php
    require_once('../../../controller/RisikoController.php');
    $data = $RisikoController->ubah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $RisikoController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $RisikoController->initial; ?></a></li>
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
              <h6 class="panel-title txt-dark">Ubah Data <?php echo $RisikoController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $RisikoController->path_controller; ?>" method="POST">

                      <input type="hidden" name="post_type" value="ubah">
                      <input type="hidden" name="<?php echo $RisikoController->table_primary; ?>" value="<?php echo $data[$RisikoController->table_data][0][$RisikoController->table_primary]; ?>">
                      <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="pek_id" class="control-label mb-10">Pekerjaan</label>
                        <select class="select2" data-style="form-control btn-default btn-outline" name="pek_id" id="pek_id" data-error="Data pekerjaan harus diisi" required>
                          <?php
                            foreach ($data['pekerjaan'] as $v) {
                              if ($v['pek_id'] != $data[$RisikoController->table_data][0]['pek_id']) {
                                echo '<option value="'.$v['pek_id'].'">'.ucfirst($v['pek_nama']).'</option>';
                              }else{
                                echo '<option value="'.$v['pek_id'].'" selected>'.ucfirst($v['pek_nama']).'</option>';
                              }
                              
                            }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="rsko_nama" class="control-label mb-10">Nama Risiko</label>
                        <input type="text" class="form-control" name="rsko_nama" data-error="Data nama risiko harus diisi" required value="<?php echo $data[$RisikoController->table_data][0]['rsko_nama']; ?>">
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="rsko_nilai_dampak" class="control-label mb-10">Dampak</label>
                        <select class="selectpicker" data-style="form-control btn-default btn-outline" name="rsko_nilai_dampak" data-error="Data dampak risiko harus diisi" required>
                          <option value="0,8" <?php if ($data[$RisikoController->table_data][0]['rsko_nilai_dampak'] == '0,8') { echo 'selected';} ?>>Menyebabkan kematian, kerugian yang sangat besar</option>
                          <option value="0,6" <?php if ($data[$RisikoController->table_data][0]['rsko_nilai_dampak'] == '0,6') { echo 'selected';} ?>>Kecelakaan berat, kehilangan kemampuan operasi/ produksi, kerugian materi yang tinggi</option>
                          <option value="0,4" <?php if ($data[$RisikoController->table_data][0]['rsko_nilai_dampak'] == '0,4') { echo 'selected';} ?>>Diharuskan penanganan secara medis, kerugian materi yang cukup tinggi</option>
                          <option value="0,2" <?php if ($data[$RisikoController->table_data][0]['rsko_nilai_dampak'] == '0,2') { echo 'selected';} ?>>Bantuan kecelakaan awal, kerugian materi yang medium</option>
                          <option value="0,05" <?php if ($data[$RisikoController->table_data][0]['rsko_nilai_dampak'] == '0,05') { echo 'selected';} ?>>Tanpa kecelakaan manusia, kerugian materi</option>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="jbtn_id" class="control-label mb-10">Peanggung Jawab</label>
                        <select class="select2" data-style="form-control btn-default btn-outline" name="jbtn_id" id="jbtn_id" data-error="Data jabatan harus diisi" required>
                          <?php
                            foreach ($data['jabatan'] as $v) {
                              if ($v['jbtn_id'] != $data[$RisikoController->table_data][0]['jbtn_id']) {
                                echo '<option value="'.$v['jbtn_id'].'">'.ucfirst($v['jbtn_nama']).'</option>';
                              }else{
                                echo '<option value="'.$v['jbtn_id'].'" selected>'.ucfirst($v['jbtn_nama']).'</option>';
                              }
                              
                            }
                          ?>
                        </select>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="form-group">
                        <label for="rsko_pengendalian" class="control-label mb-10">Tindakan Pengendalian</label>
                        <textarea class="form-control" name="rsko_pengendalian" data-error="Data pengendalian risiko harus diisi" required><?php echo $data[$RisikoController->table_data][0]['rsko_pengendalian']; ?></textarea>
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
