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
           <li>
            <a href="<?php echo base_url("Adminis/admin"); ?>">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Adminis/daftar_guru"); ?>">
              <i class="now-ui-icons business_badge"></i>
              <p>Guru</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url("Adminis/daftar_siswa"); ?>">
              <i class="now-ui-icons education_hat"></i>
              <p>Siswa</p>
            </a>
          </li>
             <li class="active">
            <a href="<?php echo base_url("Adminis/akun"); ?>">
              <i class="now-ui-icons objects_key-25"></i>
              <p>Akun</p>
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
            <a class="navbar-brand" href="#pablo">Akun</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
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
                <h5 class="title">Daftar Akun</h5>
                <a href="<?php echo base_url('Adminis/tambah_akun')?>"><button class="btn btn-primary" type="submit">Tambah Akun</button>
                </a>
              </div>
               <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th class="text-center">
                        Username
                      </th>
                      <th>
                        Password
                      </th>
                      <th class="text-center">
                        Nama
                      </th>
                      <th class="text-center">
                        Jabatan
                      </th>
                      <th class="text-center">
                        Aksi
                      </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="text-center">
                          Jackie  
                        </td>
                        <td class="text-center">
                          Jackie123
                        </td>
                        <td class="text-center">
                         Jackie Chandra
                        </td>
                        <td class="text-center">
                          Guru
                        </td>
                       <td class="text-center">
                       <button class="btn" type="submit">Edit</button>&nbsp;&nbsp;<button class="btn" type="submit">Hapus</button>
                        </td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
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
</body>

</html>