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
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
 var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Sentimen Analisis PASLON 01 JOKOWI & MARUF AMIN'
         },
         xAxis: {
            categories: ['sentimen']
         },
         yAxis: {
            title: {
               text: 'Jumlah sentimen'
            }
         },
              series:             
            [
            <?php 
       
                          
                 $sql_jumlah   = "SELECT count(sentimen) as jumlah FROM table_dataset WHERE kategori='1' AND sentimen = '1'";        
                 $query_jumlah = mysqli_query($conn,$sql_jumlah) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }   
                            
                  ?>
                  {
                    name: '<?php echo 'Positif'; ?>',
                    color:'#3366ff',
                    data: [<?php echo $jumlah; ?>]
                   
                     
                  },
             

                    <?php 

         $brand=$ret['sentimen'];                     
             $sql_jumlah   = "SELECT count(sentimen) as jumlah FROM table_dataset WHERE kategori='1' AND sentimen = '-1'";        
             $query_jumlah = mysqli_query($conn,$sql_jumlah) or die(mysqli_error());
             while( $data = mysqli_fetch_array( $query_jumlah ) ){
                $jumlah = $data['jumlah'];                 
              }   
                        
              ?>
              {
                name: '<?php echo 'Negatif'; ?>',
                color: '#b30000',
                data: [<?php echo $jumlah; ?>]
                 
              },
     

                        <?php 
       
   
         $brand=$ret['sentimen'];                     
             $sql_jumlah   = "SELECT count(sentimen) as jumlah FROM table_dataset WHERE kategori='1' AND sentimen = '0'";        
             $query_jumlah = mysqli_query($conn,$sql_jumlah) or die(mysqli_error());
             while( $data = mysqli_fetch_array( $query_jumlah ) ){
                $jumlah = $data['jumlah'];                 
              }   
                        
              ?>
              {
                name: '<?php echo 'Netral'; ?>',
                color: '#8c8c8c',
                data: [<?php echo $jumlah; ?>]
                 
              },
             
            ]
      });
   }); 
</script>


 <script type="text/javascript">
 var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'containers',
            type: 'column'
         },   
         title: {
            text: 'Grafik Sentimen Analisis PASLON 02 PRABOWO & SANDIAGA UNO'
         },
         xAxis: {
            categories: ['sentimen']
         },
         yAxis: {
            title: {
               text: 'Jumlah sentimen'
            }
         },
              series:             
            [
            <?php 
       
                          
                 $sql_jumlah   = "SELECT count(sentimen) as jumlah FROM table_dataset WHERE kategori='2' AND sentimen = '1'";        
                 $query_jumlah = mysqli_query($conn,$sql_jumlah) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }   
                            
                  ?>
                  {
                    name: '<?php echo 'Positif'; ?>',
                    color: '#3385ff',
                    data: [<?php echo $jumlah; ?>]
                     
                  },
             

                    <?php 

         $brand=$ret['sentimen'];                     
             $sql_jumlah   = "SELECT count(sentimen) as jumlah FROM table_dataset WHERE kategori='2' AND sentimen = '-1'";        
             $query_jumlah = mysqli_query($conn,$sql_jumlah) or die(mysqli_error());
             while( $data = mysqli_fetch_array( $query_jumlah ) ){
                $jumlah = $data['jumlah'];                 
              }   
                        
              ?>
              {
                name: '<?php echo 'Negatif'; ?>',
                color: '#000000',
                data: [<?php echo $jumlah; ?>]
                 
              },
     

                        <?php 
       
   
         $brand=$ret['sentimen'];                     
             $sql_jumlah   = "SELECT count(sentimen) as jumlah FROM table_dataset WHERE kategori='2' AND sentimen = '0'";        
             $query_jumlah = mysqli_query($conn,$sql_jumlah) or die(mysqli_error());
             while( $data = mysqli_fetch_array( $query_jumlah ) ){
                $jumlah = $data['jumlah'];                 
              }   
                        
              ?>
              {
                name: '<?php echo 'Netral'; ?>',
                color:'#008000',
                data: [<?php echo $jumlah; ?>]
                 
              },
             
            ]
      });
   }); 
</script>





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
                            <a href="" data-toggle="modal" data-target="#myModals">Masuk</a>
                        </div><!-- .donate-btn -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .top-header-bar -->


            <!-- The Modal -->
            <div class="modal" id="myModals">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h6 class="modal-title"><img class="d-block" src="aset/images/logo.png" alt="logo"></h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                <form role="form" method="post">
                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                            <span class="input-group-text"style="background-color:#ff0000;"><i class="fa fa-user" style="color:white;"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username">
                        </div>

                        <div class="input-group mb-3 input-group-sm">
                            <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color:#ff0000;"><i class="fa fa-lock" style="color:white;"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <button class="btn btn-danger btn-sm" name="login"><i class="fa fa-sign-in"></i>&nbsp;Masuk</button>
                        </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
            </div>







        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                           <a class="d-block" href="index.html" rel="home"><img class="d-block" src="aset/images/logo.png" alt="logo"></a>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                <li class="current-menu-item"><a href="index.php">Sentimen Analisis</a></li>
                                <li><a href="" data-toggle="modal" data-target="#myModal">Daftar</a></li>  
                            </ul>
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

        <!-- The Modal -->
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h6 class="modal-title"><img class="d-block" src="aset/images/logo.png" alt="logo"></h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action=" "action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="email">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>

          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>

          <button type="submit" class="btn btn-info btn-xs" id="simpan" name="simpan"><font color="white">Daftar</font></button>
        </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
    </div>



    
<?php
if (isset($_POST['simpan'])) 
{

  $nama     = $_POST['nama'];
  $email    = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
 

	$add = "INSERT INTO tbl_pengunjung (id,nama,email,username,`password`)
	VALUES ('', '$nama', '$email', '$username', '$password')";
	$query = mysqli_query($conn, $add) or die(mysqli_error($conn));

	if($query){
	echo "<script>alert('Success! Anda sudah terdaftar silahkan Masuk');</script>";
	echo "<script>location='index.php';</script>";
    }
    else{
        echo "<script>alert('Anda gagal mendaftar');</script>";
        echo "<script>location='index.php';</script>"; 
    }
}

?>


	<?php
             if(isset($_POST['login']))
             {
             	$username = mysqli_real_escape_string($conn, $_POST['username']);
				$password = mysqli_real_escape_string($conn, $_POST['password']);
                $ambil = mysqli_query($conn,"SELECT * FROM tbl_pengunjung WHERE Username='$username' AND password='$password' ");
                $cocok = mysqli_num_rows($ambil);
                if ($cocok==1)
                {
                    
                    echo "<script>alert('Selamat Anda Berhasil Login');
                    document.location.href='home.php';</script>";
                }
                else{
                    echo "<script>alert('Gagal Login!');</script>";
                    // echo "<meta http-equiv='refresh' content='1;url=index.php'>";   
                }
             }

    ?>





    <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-content-wrap">
                <img src="aset/images/j.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h2>&nbsp;&nbsp;&nbsp;&nbsp;SISTEM SENTIMEN ANALISIS</h2>
                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemilihan Presiden Republik Indonesia 2019</h5>

                                    
                              
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>Analisis Sentimen Twitter ini berfungsi melihat tanggapan warganet secara keseluruhan dari 
                                        masing-masing penilaian calon presiden.</p>
                                </div><!-- .entry-content -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

            <div class="swiper-slide hero-content-wrap">
                <img src="aset/images/capres.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                <h2>&nbsp;&nbsp;&nbsp;&nbsp;SISTEM SENTIMEN ANALISIS</h2>
                                <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemilihan Presiden Republik Indonesia 2019</h5>
                                  
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4"><br>
                                    <p>Analisis Sentimen Twitter ini berfungsi melihat tanggapan warganet secara keseluruhan dari 
                                        masing-masing penilaian calon presiden.</p>
                                </div><!-- .entry-content -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

            <div class="swiper-slide hero-content-wrap">
                <img src="aset/images/i.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                <h2>&nbsp;&nbsp;&nbsp;&nbsp;SISTEM SENTIMEN ANALISIS</h2>
                                <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemilihan Presiden Republik Indonesia 2019</h5>
                                  
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>Analisis Sentimen Twitter ini berfungsi melihat tanggapan warganet secara keseluruhan dari 
                                        masing-masing penilaian calon presiden.</p>
                                </div><!-- .entry-content -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->
        </div><!-- .swiper-wrapper -->

        <div class="pagination-wrap position-absolute w-100">
            <div class="container">
                <div class="swiper-pagination"></div>
            </div><!-- .container -->
        </div><!-- .pagination-wrap -->

        <!-- Add Arrows -->
        <div class="swiper-button-next flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
        </div>

        <div class="swiper-button-prev flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
        </div>
    </div><!-- .hero-slider -->

    <div class="home-page-icon-boxes">
        <div class="container">
          <center> <h3>SENTIMEN ANALISIS TWITTER CALON PRESIDEN RI 2019</h3> </center><br>
          <p align="justify"> Respons warganet selama PILPRES RI 2019 tergambar dalam Analisis Sentimen Twitter yang dilakukan 
              dalam penelitian ini. hasilnya akan didapati hasil sentimen analisis terhadap kedua Paslon Presiden RI 2019.
              Pemilihan Presiden (Pilpres) setiap periodenya menjadi ajang pesta demokrasi
              terbesar di Indonesia. Pada tahun 2019 Indonesia akan menyelenggarakan lagi Pemilihan Presiden
              (Pilpres). Setiap momen pilplres diselenggarakan, terdapat juga banyak opini dari masyarakat untuk calon calon presiden yang 
              Salah satu opini yang masyarakat sampaikan adalah melalui Twitter. Kurangnya kesadaran masyarakat akan opini yang dibuat, tanpa
              mengetahui tentang positif atau negatifnya suatu opini tersebut menjadi landasan penelitian ini. Analisis sentimen merupakan bidang studi
              yang menganalisis suatu pendapat, opini,evaluasi, sentimen, sikap atau penilaian seseorang terhadap sebuah individu, produk,
              masalah, organisasi, peristiwa atau topik(Liu,2012). Analisis sentimen dilakukan pada penelitian ini karena pemilihan presiden akan
              menimbulkan banyak opini masyarakat. Hasil dari analisis sentimen nantinya akan berupa kesimpulan apakah suatu sentimen bernilai
              positif atau negatif. Penelitian ini juga nantinya bisa digunakan untuk memprediksi elektabilitas pasangan calon presiden yang akan maju pada
              pemilihan presiden 2019
          </p>
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    <div class="home-page-welcome">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="welcome-content">
                        <header class="entry-header">
                            <h2 class="entry-title">Pemilihan Umum Presiden Indonesia 2019</h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content mt-5">
                            <p align="justify">
                            Pemilihan Umum Presiden Indonesia 2019 adalah 
                            sebuah proses demokrasi untuk memilih Presiden dan Wakil 
                            Presiden Republik Indonesia periode 2019-2024.Pemilihan Umum 2019 adalah pemilihan legislatif dengan pemilihan 
                            presiden yang diadakan secara serentak. Hal ini dilakukan berdasarkan Putusan Mahkamah Konstitusi 
                            Nomor 14 / PUU 11/2013 tentang pemilu serentak, yang bertujuan untuk meminimalkan pembiayaan negara dalam 
                            pelaksanaan pemilu, meminimalisir politik biaya tinggi bagi peserta pemilu, serta politik uang yang 
                            melibatkan pemilih, penyalahgunaan kekuasaan atau mencegah politisasi birokrasi, dan merampingkan skema kerja 
                            pemerintah. 
                            </p>
                        </div><!-- .entry-content -->

                        <div class="entry-footer mt-5">
                          
                        </div><!-- .entry-footer -->
                    </div><!-- .welcome-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 mt-4 order-1 order-lg-2">
                <br><br><br>
                    <img src="aset/images/pres.jpg" alt="welcome">
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

   
    <div class="home-page-limestone">
        <div class="container">
            <div class="row align-items-end">
                <div class="coL-12 col-lg-12">
                    <div class="section-heading">
                        <h2 class="entry-title">Sentimen Analisis Twitter Capres & Cawapres RI 2019</h2>

                                 <div id='container'></div> <br><br><br><br>

                                 <div id='containers'></div>  


                    </div><!-- .section-heading -->
                </div><!-- .col -->
               
              
                            </div><!-- counter-box -->
                        </div><!-- .col -->
                    </div><!-- .milestones -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .our-causes -->


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

    <script type='text/javascript' src='aset/js/jquery.js'></script>
    <script type='text/javascript' src='aset/js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='aset/js/swiper.min.js'></script>
    <script type='text/javascript' src='aset/js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='aset/js/circle-progress.min.js'></script>
    <script type='text/javascript' src='aset/js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='aset/js/jquery.barfiller.js'></script>
    <script type='text/javascript' src='aset/js/custom.js'></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</body>
</html>