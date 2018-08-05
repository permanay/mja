<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>PT. Mashalimanto Jaya Abadi</title>
        <meta name="description" content="Goofy is a Dashboard & Admin Site Responsive Template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Goofy Admin, Goofyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        
        <!-- vector map CSS -->
        <link href="../../../../vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../../vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        
        <!-- Custom CSS -->
        <link href="../../../../assets/dist/css/style.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            .sweet-alert p {
                color: red;
                font-size: 16px;
                text-align: center;
                font-weight: 300;
                position: relative;
                text-align: inherit;
                float: none;
                margin: 0;
                padding: 0;
                line-height: normal;
            }
            .sweet-alert h2 {
                font-size: 25px;
            }
        </style>
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->
        
        <div class="wrapper pa-0">
            
            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page" style="background-image: url(../../../../assets/img/background.jpg) !important;background-size: cover;background-repeat: no-repeat;background-position: center center;">
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float" style="background: #ffffff;box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.1);border-radius: 4px;padding: 20px 30px;">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="">
                                            <center>
                                            <img src="../../../../assets/img/logo-mja.png" class="text-center" alt="Logo" style="border-radius: 50%;width: 30%;">
                                            </center>
                                            <h3 class="text-center txt-dark mb-20" style="font-size: 23px;font-weight: bold;">PT. Mashalimanto Jaya Abadi</h3>
                                            <h6 class="text-center txt-grey nonecase-font">Masukan email, dan sandi baru akan dikirim ke email anda.</h6>
                                        </div>  
                                        <div class="form-wrap">
                                            <form action="#">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" required="required" id="email">
                                                </div>
                                                <div class="form-group text-center">
                                                    <label class="text-red" style="color: red;font-weight: bold;display: none;" id="pesan">Email harus diisi.</label>
                                                </div>
                                                
                                                <div class="form-group text-center">
                                                    <a href="index.php" class="btn btn-primary btn-rounded">Masuk</a>
                                                    <button type="button" class="btn btn-success  btn-rounded" id="btnKirim">Kirim</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->   
                </div>
                
            </div>
            <!-- /Main Content -->
        
        </div>
        <!-- /#wrapper -->
        
        <!-- JavaScript -->
        
        <!-- jQuery -->
        <script src="../../../../vendors/bower_components/jquery/dist/jquery.min.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="../../../../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../../../vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        
        <!-- Slimscroll JavaScript -->
        <script src="../../../../assets/dist/js/jquery.slimscroll.js"></script>

        <!-- Sweet-Alert  -->
        <script src="../../../../vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>
        
        <!-- Init JavaScript -->
        <script src="../../../../assets/dist/js/init.js"></script>

        <script type="text/javascript">
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

            $( "#btnKirim" ).click(function() {
                
                $("#pesan").html("");
                $("#pesan").css("display","none");

                var form_data = {
                  email: $("#email").val(),
                };

                if (form_data.email != "") {
                    console.log(form_data);
                    var action = "../../../controller/LoginController.php?func=lupasandi";
                    $.ajax({
                       type: "POST",
                       url: action,
                       data: form_data,
                       success: function(response)
                       {
                            console.log(response);

                            if (response === '1') {
                                setTimeout(' window.location.href = "index.php"; ',0);  
                            }else{
                                swal({   
                                    title: "Pemberitahuan",   
                                    text: "Email tidak terdaftar.",
                                    confirmButtonColor: "#2196F3",   
                                });
                                return false;
                            }
                          
                       } 
                    });
                    return false;
                }else{
                    $("#pesan").html("Email harus diisi.");
                    $("#pesan").css("display","inherit");
                }
                return false;

            });
        </script>

    </body>
</html>
