    <?php
        require_once('../../../controller/ProyekController.php');
        require_once('../../../../helper/Helper.php');
        $data = $ProyekController->index();
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
                <li class="active"><span>Data</span></li>
              </ol>
            </div>
            <!-- /Breadcrumb -->
        </div>
        <!-- /Title -->
        
        <!-- Row -->
        <div class="row">
            <div class="col-sm-12 pl-5 mt-0 mb-10">
                <a href="tambah.php" class="btn btn-primary btn-lable-wrap left-label"> <span class="btn-label"><i class="fa fa-plus"></i> </span><span class="btn-text">Proyek</span></a>
            </div>
        </div>
        <div class="row">

            <?php 
                $no = 1;
                foreach ($data[$ProyekController->table_data] as $d) {
            ?>

                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-primary contact-card card-view">
                        <div class="panel-heading" style="background-color: #5d5b5b;">
                            <div class="pull-left" style="width: 100%;">
                                <div class="pull-left user-img-wrap mr-15">
                                    <img class="card-user-img img-circle pull-left" src="../../../../assets/img/icon-proyek.png" alt="user" style="background-color: #9e9999;" />
                                </div>
                                <div class="pull-left user-detail-wrap">    
                                    <a href="../general/proyek.php?id=<?php echo $d['pryk_id']; ?>">
                                    <span class="block card-user-name">
                                        <?php echo $d['pryk_nama']; ?>
                                    </span>
                                    </a>
                                    <span class="block card-user-desn">
                                        <?php echo $d['pryk_lokasi']; ?>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12" style="margin-left: 78px;">
                                        <a href="../general/proyek.php?id=<?php echo $d['pryk_id']; ?>" class="btn btn-default btn-xs" style="padding: 0 10px;display: inline;">Lihat</a>
                                        <!-- <button class="btn btn-info btn-xs" style="padding: 0 10px;display: inline;background: #139ac5;border: solid 1px #139ac5;">Ubah</button> -->
                                        <button class="btn btn-warning btn-xs" style="padding: 0 10px;display: inline;background: #da3e16;border: 1px solid #da3e16;">Hapus</button>
                                    </div>
                                        
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body row">
                                <div class="user-others-details pl-15 pr-15" style="font-size: 13px;">
                                    <div class="mb-5" >
                                        <i class="zmdi zmdi-card inline-block" style="width: 15px;"></i>
                                        <span class="inline-block txt-dark">Kode <?php echo $d['pryk_kode']; ?></span>
                                    </div>
                                    <div class="mb-5">
                                        <i class="zmdi zmdi-balance inline-block" style="width: 15px;"></i>
                                        <span class="inline-block txt-dark">Konstruksi <?php echo $d['pryk_jenis_proyek']; ?></span>
                                    </div>
                                    <div class="mb-5">
                                        <i class="zmdi zmdi-account inline-block" style="width: 15px;"></i>
                                        <span class="inline-block txt-dark">Klien <?php echo $d['klien_nama']; ?></span>
                                    </div>
                                    <div class="mb-5">
                                        <i class="zmdi zmdi-money inline-block" style="width: 15px;"></i>
                                        <span class="inline-block txt-dark">Nilai Kontrak <?php echo $helper->convertAngkatoRp($d['pryk_nilai_kontrak']); ?></span>
                                    </div>
                                    <div class="mb-5">
                                        <i class="zmdi zmdi-alarm inline-block" style="width: 15px;"></i>
                                        <span class="inline-block txt-dark">Durasi <?php echo $d['pryk_durasi']; ?> Hari</span>
                                    </div>
                                    <div class="mb-5">
                                        <i class="zmdi zmdi-calendar inline-block" style="width: 15px;"></i>
                                        <span class="inline-block txt-dark">Mulai <?php echo $helper->formatDateId($d['pryk_tgl_mulai']); ?></span>
                                    </div>
                                    <div class="mb-5">
                                        <i class="zmdi zmdi-calendar inline-block" style="width: 15px;"></i>
                                        <span class="inline-block txt-dark">Selesai <?php echo $helper->formatDateId($d['pryk_tgl_selesai']); ?></span>
                                    </div>
                                    <div class="mb-5">
                                        <i class="zmdi zmdi-run inline-block" style="width: 15px;"></i>
                                        <span class="inline-block txt-dark">Status <?php echo $d['pryk_status']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

            <?php
                  $no++;
                }
            ?>
        </div>
        <!-- Row -->
        
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
                      url: "<?php echo $ProyekController->path_controller; ?>?func=hapus",
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
