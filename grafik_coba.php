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
    <title>Sistem Sentimen Analis</title>

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
            text: 'Grafik Sentimen Analisis'
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
       
                          
                 $sql_jumlah   = "SELECT count(sentimen) as jumlah FROM tb_kategori WHERE label='positif' AND sentimen = 'positif'";        
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
             $sql_jumlah   = "SELECT count(sentimen) as jumlah FROM tb_kategori WHERE label='negatif' AND sentimen = 'negatif'";        
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
            text: 'Grafik Sentimen Analisis'
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
