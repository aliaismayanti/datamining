<?php
  include('../../cekadmin.php');

  include('../../connection.php');

//   $message = '';
    
//   include_once 'dataset_button.php';

//   $query = "SELECT * FROM data_mahasiswa";
//   $result = mysqli_query($connection, $query);
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Aplikasi Klasifikasi Mahasiswa Aktif</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../../assets/css/metisMenu.css">
        <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../../assets/css/slicknav.min.css">
        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        <!-- others css -->
        <link rel="stylesheet" href="../../assets/css/typography.css">
        <link rel="stylesheet" href="../../assets/css/default-css.css">
        <link rel="stylesheet" href="../../assets/css/styles.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- bootstrap 4 js -->
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/owl.carousel.min.js"></script>
        <script src="../../assets/js/metisMenu.min.js"></script>
        <script src="../../assets/js/jquery.slimscroll.min.js"></script>
        <script src="../../assets/js/jquery.slicknav.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <!-- <script>
            $(document).ready( function () {
                $('#table_id').DataTable();
            } );
        </script> -->

    </head>

    <body>
        <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
        <!-- preloader area start -->
        <div id="preloader">
            <div class="loader"></div>
        </div>
        <!-- preloader area end -->
        <!-- page container area start -->
        <div class="page-container">
            <!-- sidebar menu area start -->
            <div class="sidebar-menu">
                <div class="sidebar-header">
                    <?php
                        $sesi = $_SESSION['username'];
                        $query="SELECT level FROM user WHERE username='$sesi'";
                        $result=mysqli_query($connection,$query);
                        $row=mysqli_fetch_assoc($result);
                        $level=$row['level'];               
                    ?>
                    <div class="logo">
                        <h3><b><?php echo $level; ?></b></h3>
                    </div>
                </div>
                <div class="main-menu">
                    <div class="menu-inner">
                        <nav>
                            <ul class="metismenu" id="menu">
                                <li><a href="../"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                                <li class="active"><a href="../data_mahasiswa"><i class="ti-server"></i><span>Data Mahasiswa</span></a></li>
                                <li><a href="../partisi_data"><i class="ti-files"></i><span>Partisi Data</span></a></li>
                                <li><a href="../perhitungan"><i class="ti-pencil-alt"></i><span>Perhitungan</span></a></li>
                                <li><a href="../decision_tree"><i class="ti-vector"></i><span>Pohon Keputusan</span></a></li>
                                <li>
                                    <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Kinerja</span></a>
                                    <ul class="collapse">
                                        <li><a href="../perbandingan">Tabel Perbandingan</a></li>
                                        <li><a href="../tabel_penilaian">Tabel Penilaian</a></li>
                                    </ul>
                                </li>
                                <li><a href="../hasil_prediksi"><i class="ti-announcement"></i><span>Hasil Prediksi</span></a></li>
                                <li><a href="../../logout.php"></i><span>Log out</span></a></li>                       
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- sidebar menu area end -->
            <!-- main content area start -->
            <div class="main-content">
                <!-- header area start -->
                <div class="header-area">
                    <div class="row align-items-center">
                        <!-- nav and search button -->
                        <div class="col-md-6 col-sm-8 clearfix">
                            <div class="nav-btn pull-left">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <!-- profile info & task notification -->
                        <div class="col-md-6 col-sm-4 clearfix">
                            <ul class="notification-area pull-right">
                                <li id="full-view"><i class="ti-fullscreen"></i></li>
                                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- header area end -->
                <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Data Mahasiswa</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">
                            <ul class="user-profile pull-right">  
                                <li class="dropdown">
                                <?php
                                    $sesi = $_SESSION['username'];
                                    $query="SELECT nama_lengkap FROM user WHERE username='$sesi'";
                                    $result=mysqli_query($connection,$query);
                                    $row=mysqli_fetch_assoc($result);
                                    $namalengkap=$row['nama_lengkap'];               
                                ?>
                                    <div class="user-profile pull-right">
                                        <img class="avatar user-thumb" src="../../assets/images/author/avatar.png" alt="avatar">
                                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $namalengkap; ?></h4>
                                        <!-- <ul class="dropdown-menu">                         
                                            <li>
                                                <a href="../../logout.php">Log Out</a>
                                            </li>
                                        </ul> -->
                                        <!-- <div class="dropdown-menu">
                                            <a class="dropdown-item" href="logout.php">Log Out</a>
                                        </div> -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- page title area end -->
                <div class="main-content-inner">
                <!-- MAIN CONTENT GOES HERE -->
                <!-- Progress Table start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="pull-right">
                                <a class="btn btn-warning" href="../data_Mahasiswa"><i class="ti-angle-left"></i><h8> &nbspKembali</h8></a>
                            </div>
                            <h4 class="header-title">Tambah Data &nbsp;</h4>
                          <br><br>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <form action="add.php" method="post">
                                        <div id="form-group">
                                            <label for="count_add">Banyak Record yang Akan Ditambahkan</label>
                                            <input type="text" name="count_add" id="count_add" maxlength="2" pattern="[0-9]" class="form-control" required>
                                        </div>
                                        <br>
                                        <div class="form-group pull-right">
                                            <input type="submit" name="generate" value="Generate" class="btn btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
        </div>
    </div>
    <!-- main content area end -->
    <!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>© Copyright 2020. All right reserved.</p>
        </div>
    </footer>
    <!-- footer area end-->
    </div>
        <!-- page container area end -->
        
        <!-- jquery latest version -->
        <script src="../../assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- bootstrap 4 js -->
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/owl.carousel.min.js"></script>
        <script src="../../assets/js/metisMenu.min.js"></script>
        <script src="../../assets/js/jquery.slimscroll.min.js"></script>
        <script src="../../assets/js/jquery.slicknav.min.js"></script>

        <!-- start chart js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <!-- start highcharts js -->
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <!-- start zingchart js -->
        <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
        <script>
            zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
        </script>
        <!-- all line chart activation -->
        <script src="../../assets/js/line-chart.js"></script>
        <!-- all pie chart -->
        <script src="../../assets/js/pie-chart.js"></script>
        <!-- others plugins -->
        <script src="../../assets/js/plugins.js"></script>
        <script src="../../assets/js/scripts.js"></script>
    </body>

</html>
