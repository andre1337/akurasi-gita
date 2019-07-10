<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"admin/konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sistem Sentimen Analis || Indonesia</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="aset/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="aset/css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="aset/css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="aset/css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="aset/css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="aset/style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
	*{margin:0px auto;}
	#wrapper{padding:1em 0;}
	#hasil{padding:.5em 0; text-align:center;}
	input#analyze{width:100%; font-size:30px; padding:.5em; border-radius:4px; border:1px solid #ccc;}
	
	img, button{transition:.25s ease; -moz-transition:.25s ease; -webkit-transition:.25s ease; -o-transition:.25s ease;}
	.hide{opacity:0;}

</style>
</head>
<body>
    <header class="site-header">
        <div class="top-header-bar">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                    <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                        <div class="header-bar-email">
                          <b> Sentimen Analisis PILPRES Indonesia 2019 </b>
                        </div><!-- .header-bar-email -->

                      
                    </div><!-- .col -->

                    <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                        <div class="donate-btn">
                            <a href="" data-toggle="modal" data-target="#myModals">KELUAR</a>
                        </div><!-- .donate-btn -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .top-header-bar -->


   







        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                           <a class="d-block" href="index.html" rel="home"><img class="d-block" src="aset/images/logo.png" alt="logo"></a>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                           
                        </nav><!-- .site-navigation -->

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .nav-bar -->
    </header><!-- .site-header -->


   

       


    <div class="home-page-welcome">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="welcome-content">
                        <header class="entry-header">
                            <h2 class="entry-title">Sistem Sentimen Analisis</h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content mt-5">
                            <p align="justify">
                            Masukkan Isi Komentar atau Pendapat Anda untuk melihat Kategori Sentimen Anda apakah Sentimen Positif,
                            Negatif atau Netral. hal ini juga berguna untuk anda agar lebih bijaksana menuliskan pendapat atau Komentar

                            </p>
                        </div><!-- .entry-content -->

                        <div class="entry-footer mt-5">
                          
                        </div><!-- .entry-footer -->
                    </div><!-- .welcome-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 mt-4 order-1 order-lg-2">
                <br><br><br>
                    <span class="btn btn-primary" id="refresh">
                      Refresh
                    </span>
                    <div class="form-group">
                    <label for="comment">Masukkan Teks :</label>
                    <textarea class="form-control" rows="5" id="analyze"></textarea>
                    </div>

                    *<font color="red">*Tekan Enter Untuk melihat Hasil </font>
                    
                    <div id="hasil"> 
                        <div id="out"></div>
                        <input type="hidden" name="unique_id" value="">
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container --><br><br>
    </div><!-- .home-page-icon-boxes -->

   


        <div class="footer-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Nadia Salsabil 2015230057
                        </p>
                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-bar -->
    </footer><!-- .site-footer -->




    <script>
	$(function(){
		$("#analyze").on("keypress",function(e){
			if(e.which == 13){
				$("img").removeClass("hide");
				$.ajax({
					url : "api.php",
					method : "GET",
					data : {q : $("#analyze").val()},
					dataType : "json"
				}).done(function(data){
					$("img").addClass("hide");
					if(data['error'] == 0){
						if(data['sentiment'] == 1){
							vclass = 'alert-success';
						}
						else{
							vclass = 'alert-warning';
						}
						$("#out").html("<div class='alert "+vclass+"'>"+data['message']+"</div>");
						$("input[name=unique_id]").val(data['unique_id']);
					}
					else{
						$("#out").html("<div class='alert alert-info'>"+data['message']+"</div>");
					}
				});
			}
		});

		$("#refresh").click(function(){
			location.reload();
		});
	});
</script>
    <script type='text/javascript' src='aset/js/jquery.js'></script>
    <script type='text/javascript' src='aset/js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='aset/js/swiper.min.js'></script>
    <script type='text/javascript' src='aset/js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='aset/js/circle-progress.min.js'></script>
    <script type='text/javascript' src='aset/js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='aset/js/jquery.barfiller.js'></script>
    <script type='text/javascript' src='aset/js/custom.js'></script>
    <script src="assets/jquery-1.12.3.min.js"></script>
    <script src="assets/less-1.3.3.min.js"></script>

</body>
</html>