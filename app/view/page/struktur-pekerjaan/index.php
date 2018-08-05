    <?php
        require_once('../../../controller/StrukpekController.php');
        $data = $StrukpekController->index();
        $dproyek = $StrukpekController->dproyek[0];
        $page = $StrukpekController->page;
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
                                <h5 style="color: #fff;">Struktur Pekerjaan</h5>   
                            </div>
                            <div class="bodi" style="padding: 10px 20px;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <button id="tmbl-tambah" class="btn btn-tambah btn-lable-wrap left-label mt-10 mb-10" alt="default" data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Struktur Pekerjaan</span></button>
                                        <div class="table-wrap mb-20">
                                            <div class="table-responsive">
                                              <table class="table table-hover table-bordered mb-0 custab">
                                                <thead>
                                                  <tr>
                                                    <th>No</th>
                                                    <th>Nama Pekerjaan</th>
                                                    <th>Volume</th>
                                                    <th>Satuan</th>
                                                    <th class="text-nowrap">Aksi</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                      foreach ($data['struktur_pekerjaan'] as $d) {
                                                        if ($d['strkpek_status'] == 'top') {
                                                          $d['strkpek_volume'] = "";
                                                          $d['pek_satuan'] = "";
                                                        }
                                                        echo '<tr>';
                                                          echo '<td>'.$d['strkpek_no'].'</td>';
                                                          if ($d['strkpek_status'] == 'top') {
                                                            echo '<td style="font-weight: bold;">'.ucfirst($d['pek_nama']).'</td>';
                                                          }else{
                                                            echo '<td>'.ucfirst($d['pek_nama']).'</td>';
                                                          }
                                                          
                                                          echo '<td>'.$d['strkpek_volume'].'</td>';
                                                          echo '<td>'.$d['pek_satuan'].'</td>';
                                                          echo '<td class="text-nowrap">';
                                                          
                                                          echo '<button alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-warning btn-icon-anim btn-square mr-5" onclick="$(this).ubah(\''.$d['strkpek_id'].'\');"><i class="fa fa-pencil"></i></button>';
                                                          echo '<button class="btn btn-danger btn-icon-anim btn-square" onclick="$(this).delete(\''.$d['strkpek_id'].'\');"><i class="fa fa-trash-o"></i></button>';
                                                          
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
                    <h5 class="modal-title" id="modal-judul">Tambah Struktur Pekerjaan</h5>
                </div>
                <form data-toggle="validator" role="form" action="<?php echo $StrukpekController->path_controller; ?>" method="POST">
                <div class="modal-body">
                    
                        <input type="hidden" name="post_type" id="post_type" value="tambah">
                        <input type="hidden" name="pryk_id" value="<?php echo $dproyek['pryk_id']; ?>">
                        <input type="hidden" name="strkpek_id" id="strkpek_id">
                        <input type="hidden" name="func" value="save">

                        <div class="form-group">
                            <label for="pek_id_pendahulu" class="control-label mb-10">Induk Pekerjaan:</label>
                            <select class="form-control select2" name="pek_id_pendahulu" id="pek_id_pendahulu">
                                <option>--Pilih--</option>
                                <?php 
                                    foreach ($data['struktur_pekerjaan'] as $d) {
                                        echo '<option value="'.$d['strkpek_id'].'">'.$d['strkpek_no'].' '.ucfirst($d['pek_nama']).'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pek_id" class="control-label mb-10">Pekerjaan:</label>
                            <select class="form-control select2" name="pek_id" id="pek_id" data-error="Data pekerjaan harus diisi" required>
                                <option></option>
                                <?php 
                                    foreach ($data['pekerjaan'] as $d) {
                                        echo '<option value="'.$d['pek_id'].'">'.ucfirst($d['pek_nama']).'</option>';
                                    }
                                ?>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="strkpek_volume" class="control-label mb-10">Volume:</label>
                            <input type="number" class="form-control" name="strkpek_volume" id="strkpek_volume" step="0.0001">
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
                $('#modal-judul').html("Tambah Struktur Pekerjaan");
            });

            $.fn.ubah = function(id) {   
                $('#modal-judul').html("Ubah Struktur Pekerjaan");
                $('#strkpek_id').val(id);
                $('#post_type').val("ubah");
                
                var form_data = {            
                  id:id
                };

                $.ajax({
                    type: "POST",
                    url: "<?php echo $StrukpekController->path_controller; ?>?func=cari",
                    data: form_data,
                    success: function(response)
                    {
                        var obj = response;
                        var stringify = JSON.parse(obj);
                        for (var i = 0; i < stringify.length; i++) {
                            if (stringify[i]['pek_id_pendahulu'] != null) {
                                $('#pek_id_pendahulu').val(stringify[i]['pek_id_pendahulu']).trigger('change');
                                $('#pek_id').val(stringify[i]['pek_id']).trigger('change');
                            }else{
                              $('#pek_id').val(stringify[i]['pek_id']).trigger('change');
                            }
                            $('#strkpek_id').val(stringify[i]['strkpek_id']);
                            $('#strkpek_volume').val(stringify[i]['strkpek_volume']);
                            $('#strkpek_satuan').val(stringify[i]['strkpek_satuan']);
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
                      id:id,
                      pryk_id:<?php echo $dproyek['pryk_id']; ?>
                  };
                  $.ajax({
                      type: "POST",
                      url: "<?php echo $StrukpekController->path_controller; ?>?func=hapus",
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
