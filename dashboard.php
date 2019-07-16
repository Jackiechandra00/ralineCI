<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("assets/img/apple-icon.png")?>">
  <link rel="icon" type="image/png" href="<?php base_url("assets/img/favicon.png")?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    RALINE
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" />
  <link href="<?php echo base_url("assets/css/now-ui-dashboard.css"); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url("assets/demo/demo.css")?>" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <!-- <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a> -->
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
         <center>RALINE</center> 
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="<?php echo base_url("dashboard"); ?>">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Teacher/daftar_nilai"); ?>">
              <i class="now-ui-icons business_chart-bar-32"></i>
              <p>Daftar Nilai</p>
            </a>
          </li>
          <!-- <li>
            <a href="<?php echo base_url("Teacher/input_nilai"); ?>">
              <i class="now-ui-icons design-2_ruler-pencil "></i>
              <p>Input Nilai</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Teacher/input_absen"); ?>">
              <i class="now-ui-icons gestures_tap-01"></i>
              <p>Input Absensi</p>
            </a>
          </li> -->
          <li>
            <a href="<?php echo base_url("Teacher/daftar_absen"); ?>">
              <i class="now-ui-icons files_paper"></i>
              <p>Daftar Absensi</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Teacher/daftar_siswa"); ?>">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Daftar Siswa</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Teacher/daftar_guru"); ?>">
              <i class="now-ui-icons business_badge"></i>
              <p>Daftar Guru</p>
            </a>
          </li>
           <li>
            <a href="<?php echo base_url("Teacher/catatan"); ?>">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>Catatan</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Teacher/prestasi"); ?>">
              <i class="now-ui-icons business_bulb-63"></i>
              <p>Prestasi</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Teacher/ekskul"); ?>">
              <i class="now-ui-icons  design_palette"></i>
              <p>Ekskul</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Login/logout"); ?>">
              <i class="now-ui-icons sport_user-run"></i>
              <p>Keluar</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              <br>
              </div>
              <center>
                 <div class="col-md-6">
                    <div class="container" style="background: orange;height: 200px; color: white;">
                      <div class="container" style="background: white;font-color:blue;border-width: 1px;border-color: #d6d6c2;padding-top: 1em;padding-bottom: 1em;">
                          <h4 style="color: #006400;">Selamat Datang </br><?php echo $this->session->userdata('username') ?> di</h4>
                          <h2 style="color: #006400">Sistem Raport Online</h2>
                      </div>
                     </div>
                </div>
<br>
<br>

            
                         <!--    <table style="margin-top: 15px;">
                              <tr>
                                <br>
                                <td style="padding-left: 10px;">Guru Aktif :</td>
                              </tr>
                              <tr>
                                <br>
                                <td style="padding-left: 10px;"> Murid aktif</td>
                              </tr>
                            </table> -->
                
                   <!-- 

        <div class="col-md-6">
        <div class="container" style="background: #ffa500;height: 185px; color: white;">
          <table style="margin-top: 20px;">
            <tr>
              
            </tr>
            <tr>
              <td  style="padding-left: 10px;"><h4>Waktu Sekarang </h4></td>              
            </tr>
            <tr>
              <td style="padding-left: 10px;"><h5 id="time"></h5> </td>
            </tr>
            <tr>
              <td>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script type="text/javascript">
            var timestamp = '<?=time();?>';
            function updateTime(){
              $('#time').php(Date(timestamp));
              timestamp++;
            }
            $(function(){
              setInterval(updateTime, 1000);
            });
            </script>
              </td>
            </tr>
            
          </table>
        </div> -->
      </div>
    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-header panel-header-sm">
       
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">

  <!--   Core JS Files   -->
  <script src="<?php echo base_url("assets/js/core/jquery.min.js")?>"></script>
  <script src="<?php echo base_url("assets/js/core/popper.min.js")?>"></script>
  <script src="<?php echo base_url("assets/js/core/bootstrap.min.js")?>"></script>
  <script src="<?php echo base_url("assets/js/plugins/perfect-scrollbar.jquery.min.js")?>"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url("assets/js/plugins/chartjs.min.js")?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url("assets/js/plugins/bootstrap-notify.js")?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url("assets/js/now-ui-dashboard.min.js?v=1.3.0")?> type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url("assets/demo/demo.js")?>"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>