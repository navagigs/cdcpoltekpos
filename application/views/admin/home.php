<?php date_default_timezone_set('Asia/Jakarta'); session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>ADMINISTRATOR </title>
<link href="<?php echo base_url();?>templates/admin/js/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
<link href="<?php echo base_url();?>templates/admin/fonts/font-awesome-4/css/font-awesome.min.css" rel="stylesheet" />
<link href='<?php echo base_url();?>templates/admin/fonts/css/fonts.css' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url();?>templates/admin/js/jquery.nanoscroller/nanoscroller.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>templates/admin/css/style.css" rel="stylesheet" type="text/css" />    
<script src="<?php echo base_url();?>templates/admin/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/date/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/date/jquery-ui-1.8.17.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/behaviour/general.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.ui/jquery-ui.js"></script>
</head>
    
    <body>
        <!-- ==================== Navbar ==================== -->   
        <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-gear"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>ADMINISTRATOR</span></a>
                </div>
                <div class="navbar-collapse collapse">
                    <!-- ========== Navbar Left ========== -->
                    <ul class="nav navbar-nav left-nav">
                        <li class="active"><a href="<?php echo base_url();?>admin"><i class="fa fa-home"></i></a></li>
                       <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Large menu <b class="caret"></b></a>
                            <ul class="dropdown-menu col-menu-2">
                                <li class="col-sm-6 no-padding">
                                    <ul>
                                        <li class="dropdown-header"><i class="fa fa-group"></i>Users</li>
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="dropdown-header"><i class="fa fa-gear"></i>Config</li>
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li> 
                                    </ul>
                                </li>
                                <li  class="col-sm-6 no-padding">
                                    <ul>
                                        <li class="dropdown-header"><i class="fa fa-legal"></i>Sales</li>
                                        <li><a href="#">New sale</a></li>
                                        <li><a href="#">Register a product</a></li>
                                        <li><a href="#">Register a client</a></li> 
                                        <li><a href="#">Month sales</a></li>
                                        <li><a href="#">Delivered orders</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>-->
                    </ul>
                    <!-- ========== End Navbar Left ========== -->
                    <!-- ========== Navbar Right ========== -->
                    <ul class="nav navbar-nav navbar-right user-nav">
                        <li class="dropdown profile_menu">
                            <!-- dropdown -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img alt="Avatar" src="<?php echo base_url();?>templates/admin/images/avatar2.jpg" />
                                <span><?php echo $admin->admin_nama; ?></span> 
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url();?>" target="_blank">Lihat Website</a></li>
                                <!-- <li><a href="<?php echo site_url();?>admin/edit_password">Edit Password</a></li> -->
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url();?>internal/keluar">Logout</a></li>
                            </ul>
                        </li>
                    </ul>			
                    <ul class="nav navbar-nav navbar-right not-nav" >
                              
                             
                    </ul>
                </div><!-- /.nav-collapse animate-collapse -->
            </div><!-- /.container-fluid -->
        </div><!-- /.navbar -->
        <!-- ==================== End Navbar ==================== -->   
        
        <div id="cl-wrapper" class="fixed-menu">
            <!-- ==================== Sidebar ==================== -->
            <div class="cl-sidebar" data-position="right">
                <div class="cl-toggle"><i class="fa fa-bars"></i></div>
                <div class="cl-navblock">
                    <div class="menu-space">
                        <div class="content">
                            <div class="side-user">
                                <div class="avatar">
                                    <img src="<?php echo base_url();?>templates/admin/images/avatar1_50.jpg" alt="Avatar" />
                                </div>
                                <div class="info">
                                    <a href="#"><?php echo $admin->admin_nama; ?></a>
                                    <img src="<?php echo base_url();?>templates/admin/images/state_online.png" alt="Status" /> 
                                    <span>Online</span>
                                </div>
                            </div>
                            <ul class="cl-vnavigation">
                                <li><a href='<?php echo base_url();?>admin'><i class='fa fa-home'></i> <span>Dashboard</span></a></li>
                                <?php if($this->session->userdata('admin_level') == 1) { ?>
                                    <li><a href="<?php echo base_url();?>adminkarir/company"><i class='fa fa-building'></i> <span>Perusahaan</span></a></li>
                                    <li><a href="<?php echo base_url();?>adminkarir/job"><i class='fa fa-list-alt'></i> <span>Lowongan</span></a></li>
                                    <li><a href="<?php echo base_url();?>adminkarir/member"><i class='fa fa-user'></i> <span>Member</span></a></li>
                                    <li><a href="<?php echo base_url();?>adminkarir/apply"><i class='fa fa-pencil'></i> <span>Pelamar Kerja</span></a></li>
                                    <li><a href="<?php echo base_url();?>adminkarir/report"><i class='fa fa-file'></i> <span>Laporan</span></a></li>
                                    <li><a href="<?php echo base_url();?>adminkarir/chart"><i class='fa fa-bar-chart'></i> <span>Grafik</span></a></li>
                                    <li><a href="<?php echo base_url();?>pengaturan/pengguna"><i class='fa fa-users'></i> <span>Pengguna</span></a></li>
                                <?php } else { ?>
                                    <li><a href="<?php echo base_url();?>adminkarir/report"><i class='fa fa-file'></i> <span>Laporan</span></a></li>
                                    <li><a href="<?php echo base_url();?>adminkarir/chart"><i class='fa fa-bar-chart'></i> <span>Grafik</span></a></li>

                                <?php } ?>                      

                            </ul>
                        </div>
                    </div>
                    <div class="text-center collapse-button" style="padding:7px 9px;">
                        <button id="sidebar-collapse" class="btn btn-default" style="">
                            <i style="color:#000;" class="fa fa-angle-left"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- ==================== End Sidebar ==================== -->
	        
            <!-- ==================== Content ==================== -->
            <div class="container-fluid" id="pcont">
                <?php $this->load->view($content);?>
			</div>
            <!-- ==================== End Content ==================== -->
        </div>
        <script>
            $(function(){
		        $('#modal-konfirmasi').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    // Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
			        var id = div.data('id') 
                    var modal = $(this)
                    // Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal.
                    // DATA SEKOLAH
                    // MODUL WEB
                    modal.find('#hapus-company').attr("href","<?php echo site_url();?>adminkarir/company/hapus/"+id); 

                    modal.find('#hapus-sarana_kategori').attr("href","<?php echo site_url();?>site/sarana_kategori/hapus/"+id); 

                    modal.find('#hapus-sarana').attr("href","<?php echo site_url();?>site/sarana/hapus/"+id);
                    modal.find('#hapus-pengguna').attr("href","<?php echo site_url();?>pengaturan/pengguna/hapus/"+id); 
                    modal.find('#hapus-kelompok_pengguna').attr("href","<?php echo site_url();?>pengaturan/kelompok_pengguna/hapus/"+id); 
                });
            });
        </script>  
        <!-- Include Js Bootstrap -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript">
            $(document).ready(function(){
            //initialize the javascript
            App.init();
            App.dashBoard();        
        
            introJs().setOption('showBullets', false).start();
            });
        </script>
        <script src="<?php echo base_url();?>templates/admin/js/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.pie.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.resize.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.flot/jquery.flot.labels.js"></script> 
        
    </body>
</html>