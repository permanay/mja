    <?php
        require_once('../../../controller/HargasatController.php');
        require_once('../../../../helper/Helper.php');
        $data = $HargasatController->index();
        $dproyek = $HargasatController->dproyek[0];
        $page = $HargasatController->page;
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
                                <h5 style="color: #fff;"><?php echo $HargasatController->initial; ?></h5>   
                            </div>
                            <div class="bodi" style="padding: 10px 20px;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- bahan baku -->
                                        <div class="panel panel-default card-view panel-refresh">
                                          <div class="refresh-container">
                                            <div class="la-anim-1"></div>
                                          </div>
                                          <div class="panel-heading">
                                            <div class="pull-left">
                                              <h6 class="panel-title txt-dark" style="font-style: normal;">Bahan Baku</h6>
                                            </div>
                                            <div class="pull-right">
                                              <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_1" aria-expanded="false">
                                                <i class="zmdi zmdi-chevron-down"></i>
                                                <i class="zmdi zmdi-chevron-up"></i>
                                              </a>
                                            </div>
                                            <div class="clearfix"></div>
                                          </div>
                                          <div  id="collapse_1" class="panel-wrapper collapse">
                                            <div class="panel-body isi-body">
                                              <button id="tmbl-tambah" class="btn btn-tambah btn-lable-wrap left-label mt-10 mb-10" alt="default" data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Bahan Baku</span></button>

                                              <div class="table-wrap mb-20">
                                                <div class="table-responsive">
                                                  <table class="table table-hover table-bordered mb-0 custab">
                                                    <thead>
                                                      <tr>
                                                        <th>No</th>
                                                        <th>Nama Bahan Baku</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th class="text-nowrap">Aksi</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php 
                                                        $no = 1;
                                                        foreach ($data['bahan_baku'] as $d) {
                                                      ?>
                                                          <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $d['bhnbku_nama']; ?></td>
                                                            <td><?php echo $d['bhnbku_satuan']; ?></td>
                                                            <td><?php echo $helper->convertAngkatoRp($d['bhnbku_harga']); ?></td>
                                                            <td class="text-nowrap">
                                                              <button alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-warning btn-icon-anim btn-square mr-5" onclick="$(this).ubah(<?php echo $d['bhnbku_id']; ?>);"><i class="fa fa-pencil"></i></button>
                                                              <button class="btn btn-danger btn-icon-anim btn-square" onclick="$(this).delete(<?php echo $d['bhnbku_id']; ?>);"><i class="fa fa-trash-o"></i></button>
                                                            </td>
                                                          </tr>
                                                      <?php 
                                                          $no++;
                                                        }
                                                      ?>      
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- bahan baku -->

                                        <!-- upah -->
                                        <div class="panel panel-default card-view panel-refresh">
                                          <div class="refresh-container">
                                            <div class="la-anim-1"></div>
                                          </div>
                                          <div class="panel-heading">
                                            <div class="pull-left">
                                              <h6 class="panel-title txt-dark" style="font-style: normal;">Upah</h6>
                                            </div>
                                            <div class="pull-right">
                                              <a class="pull-left inline-block mr-15" data-toggle="collapse" href="#collapse_2" aria-expanded="false">
                                                <i class="zmdi zmdi-chevron-down"></i>
                                                <i class="zmdi zmdi-chevron-up"></i>
                                              </a>
                                            </div>
                                            <div class="clearfix"></div>
                                          </div>
                                          <div  id="collapse_2" class="panel-wrapper collapse">
                                            <div class="panel-body isi-body">
                                              <button id="tmbl-tambah2" class="btn btn-tambah btn-lable-wrap left-label mt-10 mb-10" alt="default" data-toggle="modal" data-target="#responsive-modal2" class="model_img img-responsive"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Upah</span></button>

                                              <div class="table-wrap mb-20">
                                                <div class="table-responsive">
                                                  <table class="table table-hover table-bordered mb-0 custab">
                                                    <thead>
                                                      <tr>
                                                        <th>No</th>
                                                        <th>Nama Jabatan</th>
                                                        <th>Satuan</th>
                                                        <th>Harga</th>
                                                        <th class="text-nowrap">Aksi</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php 
                                                        $no = 1;
                                                        foreach ($data['upah'] as $z) {
                                                      ?>
                                                          <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $z['jbtn_nama']; ?></td>
                                                            <td><?php echo $z['upah_satuan']; ?></td>
                                                            <td><?php echo $helper->convertAngkatoRp($z['upah_harga']); ?></td>
                                                            <td class="text-nowrap">
                                                              <button alt="default" data-toggle="modal" data-target="#responsive-modal2" class="btn btn-warning btn-icon-anim btn-square mr-5" onclick="$(this).ubah2(<?php echo $z['upah_id']; ?>);"><i class="fa fa-pencil"></i></button>
                                                              <button class="btn btn-danger btn-icon-anim btn-square" onclick="$(this).delete2(<?php echo $z['upah_id']; ?>);"><i class="fa fa-trash-o"></i></button>
                                                            </td>
                                                          </tr>
                                                      <?php 
                                                          $no++;
                                                        }
                                                      ?>      
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- upah -->
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
    <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="modal-judul">Tambah Bahan Baku</h5>
                </div>
                <form data-toggle="validator" role="form" action="<?php echo $HargasatController->path_controller; ?>" method="POST">
                <div class="modal-body">
                    
                        <input type="hidden" name="post_type" id="post_type" value="tambah">
                        <input type="hidden" name="pryk_id" value="<?php echo $dproyek['pryk_id']; ?>">
                        <input type="hidden" name="bhnbku_id" id="bhnbku_id">
                        <input type="hidden" name="func" value="save">

                        <div class="form-group">
                            <label for="bhnbku_nama" class="control-label mb-10">Nama Bahan Baku:</label>
                            <input type="text" class="form-control" name="bhnbku_nama" id="bhnbku_nama" data-error="Data nama bahan baku harus diisi" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="strkpek_satuan" class="control-label mb-10">Satuan:</label>
                            <input type="text" class="form-control" name="bhnbku_satuan" id="bhnbku_satuan" data-error="Data satuan harus diisi" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="bhnbku_harga" class="control-label mb-10">Harga (Rp):</label>
                            <input type="number" class="form-control" name="bhnbku_harga" id="bhnbku_harga" data-error="Data harga harus diisi" required>
                            <div class="help-block with-errors"></div>
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

    <!-- Modal -->
    <div id="responsive-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="modal-judul">Tambah Upah</h5>
                </div>
                <form data-toggle="validator" role="form" action="<?php echo $HargasatController->path_controller; ?>" method="POST">
                <div class="modal-body">
                    
                        <input type="hidden" name="post_type" id="post_type2" value="tambah">
                        <input type="hidden" name="pryk_id" value="<?php echo $dproyek['pryk_id']; ?>">
                        <input type="hidden" name="upah_id" id="upah_id">
                        <input type="hidden" name="func" value="save2">

                        <div class="form-group">
                            <label for="jbtn_id" class="control-label mb-10">Nama Jabatan:</label>
                            <select class="selectpicker" data-style="form-control btn-default btn-outline" name="jbtn_id" id="jbtn_id" data-error="Data jabatan harus diisi" required>
                              <?php
                                foreach ($data['jabatan'] as $v) {
                                  echo '<option value="'.$v['jbtn_id'].'">'.$v['jbtn_nama'].'</option>';
                                }
                              ?>
                              
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="upah_satuan" class="control-label mb-10">Satuan:</label>
                            <input type="text" class="form-control" name="upah_satuan" id="upah_satuan" data-error="Data satuan harus diisi" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="upah_harga" class="control-label mb-10">Harga (Rp):</label>
                            <input type="number" class="form-control" name="upah_harga" id="upah_harga" data-error="Data harga harus diisi" required>
                            <div class="help-block with-errors"></div>
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

        $(document).ready(function() {
            "use strict";
            
            $('#tmbl-tambah').click(function() {
                $('#modal-judul').html("Tambah Bahan Baku");
                $('#post_type').val("tambah");
                $('#bhnbku_id').val("");
                $('#bhnbku_nama').val("");
                $('#bhnbku_satuan').val("");
                $('#bhnbku_harga').val("");
            });

            $('#tmbl-tambah2').click(function() {
                $('#modal-judul').html("Tambah Upah");
                $('#post_type2').val("tambah");
                $('#upah_id').val("");
                $('#jbtn_id').val("");
                $('#upah_satuan').val("");
                $('#upah_harga').val("");
            });

            $.fn.ubah = function(id) {   
                $('#modal-judul').html("Ubah Bahan Baku");
                $('#bhnbku_id').val(id);
                $('#post_type').val("ubah");
                
                var form_data = {            
                  id:id
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo $HargasatController->path_controller; ?>?func=cari",
                    data: form_data,
                    success: function(response)
                    {
                        var obj = response;
                        var stringify = JSON.parse(obj);
                        for (var i = 0; i < stringify.length; i++) {
                            $('#bhnbku_id').val(stringify[i]['bhnbku_id']);
                            $('#bhnbku_nama').val(stringify[i]['bhnbku_nama']);
                            $('#bhnbku_satuan').val(stringify[i]['bhnbku_satuan']);
                            $('#bhnbku_harga').val(stringify[i]['bhnbku_harga']);
                        }
                    } 
                });

            }

            $.fn.ubah2 = function(id) {   
                $('#modal-judul').html("Ubah Upah");
                $('#upah_id').val(id);
                $('#post_type2').val("ubah");
                
                var form_data = {            
                  id:id
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo $HargasatController->path_controller; ?>?func=cari2",
                    data: form_data,
                    success: function(response)
                    {
                        var obj = response;
                        var stringify = JSON.parse(obj);
                        for (var i = 0; i < stringify.length; i++) {
                            $('#upah_id').val(stringify[i]['upah_id']);
                            $('#jbtn_id').val(stringify[i]['jbtn_id']);
                            $('.selectpicker').selectpicker('refresh');
                            $('#upah_satuan').val(stringify[i]['upah_satuan']);
                            $('#upah_harga').val(stringify[i]['upah_harga']);
                        }
                    } 
                });

            }

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
                      id:id
                  };
                  $.ajax({
                      type: "POST",
                      url: "<?php echo $HargasatController->path_controller; ?>?func=hapus",
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

            $.fn.delete2 = function(id) {    

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
                      id:id
                  };
                  $.ajax({
                      type: "POST",
                      url: "<?php echo $HargasatController->path_controller; ?>?func=hapus2",
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
