<?php
    require_once('../../../controller/KlienController.php');
    $data = $KlienController->index();
?>

<!-- Header -->
<?php require_once('../../layouts/header.php');  ?>
<!-- Header -->    

<!-- Main Content -->
<div class="container-fluid">
    
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"><?php echo $KlienController->initial; ?></h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.php"><?php echo $KlienController->initial; ?></a></li>
            <li class="active"><span>Data</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->

    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark pt-5">Data <?php echo $KlienController->initial; ?></h6>
                    </div>
                    <div style="float: right;">
                      <a href="tambah.php"><button class="btn btn-primary btn-sm btn-icon left-icon"> <i class="fa fa-plus"></i> <span>Tambah</span></button></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display pb-30" >
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <?php
                                              foreach ($KlienController->table_title as $t) {
                                                echo '<th>'.$t.'</th>';
                                              }
                                            ?>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>                                      
                                          <?php 
                                              $no = 1;
                                              foreach ($data[$KlienController->table_data] as $d) {
                                          ?>
                                                  <tr>
                                                      <td><?php echo $no; ?></td>
                                                      <?php
                                                        foreach ($KlienController->table_field as $f) {
                                                          if ($f != "pgna_status") {
                                                            echo '<td>'.$d[$f].'</td>';
                                                          }else{
                                                            if ($d[$f] != "1") {
                                                              echo '<td>Tidak Aktif</td>';
                                                            }else{
                                                              echo '<td>Aktif</td>';
                                                            }
                                                          }
                                                          
                                                          
                                                        }
                                                      ?>
                                                      <td>
                                                        <a href="ubah.php?id=<?php echo $d[$KlienController->table_primary]; ?>"><button class="btn btn-warning btn-icon-anim btn-square"><i class="fa fa-pencil"></i></button></a>
                                                        <button class="btn btn-danger btn-icon-anim btn-square" onclick="$(this).delete('<?php echo $d[$KlienController->table_primary]; ?>');"><i class="fa fa-trash-o"></i></button>
                                                        
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

      /*SweetAlert Init*/

      $(function() {
          "use strict";
          
          var SweetAlert = function() {};

          //examples 
          SweetAlert.prototype.init = function() {},
          //init
          $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert;
          
          $.SweetAlert.init();
      });

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
                  url: "<?php echo $KlienController->path_controller; ?>?func=hapus",
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
                          setTimeout(' window.location.href = "index.php"; ',2000);      
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
