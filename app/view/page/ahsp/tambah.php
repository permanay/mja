<?php
    require_once('../../../controller/AhspController.php');
    $data = $AhspController->tambah();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $AhspController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $AhspController->initial; ?></a></li>
            <li class="active"><span>Tambah</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
      <div class="col-md-10">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">Tambah Data <?php echo $AhspController->initial; ?></h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-wrap">
                    <form data-toggle="validator" role="form" action="<?php echo $AhspController->path_controller; ?>" method="POST" id="form_id">

                      <input type="hidden" name="post_type" value="tambah">
                      <input type="hidden" name="id" value="0">
                      <input type="hidden" name="func" value="save">

                      <div class="form-group">
                        <label for="ahsp_nama" class="control-label mb-10">Nama Analisa</label>
                        <input type="text" class="form-control" name="ahsp_nama" data-error="Data nama analisa harus diisi" required>
                        <div class="help-block with-errors"></div>
                      </div>

                      <!-- bahan baku -->
                      <hr style="margin-top: 20px;margin-bottom: 10px;border-top: 2px solid #eeeeee;">
                      <h6>Bahan Baku</h6>
                      <div class="col-md-12" style="padding: 15px 0 0 0;">
                        <div id="input_bhnbku">
                          <div id="ipt_bhnnku1">
                            <!-- baris bahan baku -->
                            <div class="col-md-7" style="padding-left: 0; ">
                              <div class="form-group">
                                <label for="bhnbku_id1" class="control-label mb-10">Bahan Baku</label>
                                <select class="select2" data-style="form-control btn-default btn-outline" name="bhnbku[]" id="bhnbku_id1" data-error="Data bahan baku harus diisi" required>
                                  <?php
                                    foreach ($data['bhnbku'] as $v) {
                                      echo '<option value="'.$v['bhnbku_id'].'">'.ucfirst($v['bhnbku_nama']).'</option>';
                                    }
                                  ?>
                                </select>
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                            <div class="col-md-4" style="padding-left: 0px; ">
                              <div class="form-group">
                                <label for="detahspbb_koeff1" class="control-label mb-10">Koeff</label>
                                <input type="number" class="form-control" name="detahspbb[]" id="detahspbb_koeff1" data-error="Data koeff bahan baku harus diisi" required step="0.0001">
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
                            <div class="col-md-1" style="padding-right: 0; padding-left: 0px;margin-top: 32px;">
                              <button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInput('1');"><i class="icon-close"></i></button>
                            </div>
                            <!-- baris bahan baku -->
                          </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px;">
                            <button class="btn btn-info btn-outline btn-icon right-icon" id="tambah_bhnbku"> <i class="fa fa-plus"></i><span>Bahan Baku</span></button>
                        </div>
                      </div>
                      <!-- bahan baku -->

                      <!-- upah -->
                      <div class="col-md-12" style="padding:0; ">
                      <hr style="margin-top: 20px;margin-bottom: 10px;border-top: 2px solid #eeeeee;">
                      </div>
                      <h6>Upah</h6>
                      <div class="col-md-12" style="padding: 15px 0 0 0; ">
                          <!-- baris upah -->
                          <div id="input_upah">
                            <div id="ipt_upah1">
                              <div class="col-md-7" style="padding-left: 0; ">
                                <div class="form-group">
                                  <label for="upah_id1" class="control-label mb-10">Tenaga Kerja</label>
                                  <select class="select2" data-style="form-control btn-default btn-outline" name="upah[]" id="upah_id1" data-error="Data tenaga kerja harus diisi" required>
                                    <?php
                                      foreach ($data['upah'] as $v) {
                                        echo '<option value="'.$v['upah_id'].'">'.ucfirst($v['jbtn_nama']).'</option>';
                                      }
                                    ?>
                                  </select>
                                  <div class="help-block with-errors"></div>
                                </div>
                              </div>
                              <div class="col-md-4" style="padding-left: 0px; ">
                                <div class="form-group">
                                  <label for="detahspupah_koeff1" class="control-label mb-10">Koeff</label>
                                  <input type="number" class="form-control" name="detahspupah[]" id="detahspupah_koeff1" data-error="Data koeff upah harus diisi" required step="0.0001">
                                  <div class="help-block with-errors"></div>
                                </div>
                              </div>
                              <div class="col-md-1" style="padding-right: 0; padding-left: 0px;margin-top: 32px;">
                                <button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInputu('1');"><i class="icon-close"></i></button>
                              </div>
                            </div>
                          </div>
                          <!-- baris upah -->
                          <div class="col-md-12" style="padding-left: 0px;">
                              <button class="btn btn-info btn-outline btn-icon right-icon" id="tambah_upah"> <i class="fa fa-plus"></i><span>Upah</span></button>
                          </div>
                          <!-- baris upah -->
                      </div>
                      <div class="col-md-12" style="padding:0; ">
                      <hr style="margin-top: 20px;margin-bottom: 10px;border-top: 2px solid #eeeeee;">
                      </div>
                      <!-- upah -->

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
  $(document).ready(function(){

    num_input = 2;
    num_input_upah = 2;

    $(function() {
        "use strict";
    });

    $( "#tambah_bhnbku" ).click(function() {
        
        html = '';
        html = html + '<div id="ipt_bhnnku'+ num_input +'">';
        html = html + '<div class="col-md-7" style="padding-left: 0; ">';
          html = html + '<div class="form-group">';
            html = html + '<select class="select2" data-style="form-control btn-default btn-outline" name="bhnbku[]" id="bhnbku_id'+ num_input +'" data-error="Data bahan baku harus diisi" required>';
              <?php
                foreach ($data['bhnbku'] as $v) {
                  echo 'html = html + \'<option value="'.$v['bhnbku_id'].'">'.ucfirst($v['bhnbku_nama']).'</option>\';';
                }
              ?>
            html = html + '</select>';
            html = html + '<div class="help-block with-errors"></div>';
          html = html + '</div>';
        html = html + '</div>';
        html = html + '<div class="col-md-4" style="padding-left: 0px; ">';
          html = html + '<div class="form-group">';
            html = html + '<input type="number" class="form-control" name="detahspbb[]" id="detahspbb_koeff'+ num_input +'" data-error="Data koeff bahan baku harus diisi" required step="0.0001">';
            html = html + '<div class="help-block with-errors"></div>';
          html = html + '</div>';
        html = html + '</div>';
        html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
          html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInput(\''+ num_input +'\');"><i class="icon-close"></i></button>';
        html = html + '</div>';
        html = html + '</div>';

        $( "#input_bhnbku" ).append(html);

        num_input = num_input +1;

        $(".select2").select2();
        $("#form_id").validator('update');  

        return false;
    });

    $.fn.deleteInput = function(id) {    
        $( "#ipt_bhnnku" + id ).remove();
        $("#form_id").validator('update');  
        return false;
    }

    $( "#tambah_upah" ).click(function() {
        
        html = '';
        html = html + '<div id="ipt_upah'+ num_input_upah +'">';
        html = html + '<div class="col-md-7" style="padding-left: 0; ">';
          html = html + '<div class="form-group">';
            html = html + '<select class="select2" data-style="form-control btn-default btn-outline" name="upah[]" id="upah_id'+ num_input_upah +'" data-error="Data tenaga kerja harus diisi" required>';
              <?php
                foreach ($data['upah'] as $v) {
                  echo 'html = html + \'<option value="'.$v['upah_id'].'">'.ucfirst($v['jbtn_nama']).'</option>\';';
                }
              ?>
            html = html + '</select>';
            html = html + '<div class="help-block with-errors"></div>';
          html = html + '</div>';
        html = html + '</div>';
        html = html + '<div class="col-md-4" style="padding-left: 0px; ">';
          html = html + '<div class="form-group">';
            html = html + '<input type="number" class="form-control" name="detahspupah[]" id="detahspupah_koeff'+ num_input_upah +'" data-error="Data koeff upah harus diisi" required step="0.0001">';
            html = html + '<div class="help-block with-errors"></div>';
          html = html + '</div>';
        html = html + '</div>';
        html = html + '<div class="col-md-1" style="padding-right: 0; padding-left: 0px;">';
          html = html + '<button class="btn btn-danger btn-icon-anim btn-square btn-lg" style="margin-top: 0px;height: 41px !important;width: 41px !important;" onclick="$(this).deleteInputu(\''+ num_input_upah +'\');"><i class="icon-close"></i></button>';
        html = html + '</div>';
        html = html + '</div>';

        $( "#input_upah" ).append(html);

        num_input_upah = num_input_upah +1;

        $(".select2").select2();
        $("#form_id").validator('update');  

        return false;
    });

    $.fn.deleteInputu = function(id) {    
        $( "#ipt_upah" + id ).remove();
        $("#form_id").validator('update');  
        console.log('delete');
        return false;
    }

  });
</script>
<!-- JavaScript -->
 
</body>
</html>
