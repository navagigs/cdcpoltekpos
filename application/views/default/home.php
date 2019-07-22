<!doctype html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>CDC Poltekpos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS Plugins -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>templates/default/bootstrap/css/bootstrap.min.css" media="screen"> 
  <link href="<?php echo base_url(); ?>templates/default/css/animate.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>templates/default/css/main.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>templates/default/css/component.css" rel="stylesheet">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,300italic,300' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600,600italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- CSS Custom -->
  <link href="<?php echo base_url(); ?>templates/default/css/style.css" rel="stylesheet">
  
</head>

<body>

<!-- start Container Wrapper -->
  <div class="container-wrapper">

    <!-- start Header -->
    <header id="header">
    
      <!-- start Navbar (Header) -->
      <nav class="navbar navbar-primary navbar-fixed-top navbar-sticky-function">

        <div class="navbar-top">
        
          <div class="container">
            
            <div class="flex-row flex-align-middle">
              <div class="flex-shrink flex-columns">
                <a class="navbar-logo" href="<?php echo base_url(); ?>">
                  <img src="<?php echo base_url(); ?>templates/default/images/logo-white.png" alt="Logo" />
                </a>
              </div>
              <div class="flex-columns">
                <div class="pull-right">
                
                  <div class="navbar-mini">
                    <ul class="clearfix">
                    <?php if ($this->session->userdata('logged_in2') == TRUE) { ?>
                      <li class="dropdown bt-dropdown-click hidden-xs">
                        <a id="language-dropdown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <i class="ion-social-usd hidden-xss"></i> Setting
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="language-dropdown">
                          <li><a href="<?php echo base_url(); ?>account/profile"><i class="ion-social-yen"></i> Profile</a></li>
                          <li><a href="<?php echo base_url(); ?>account/cv"><i class="ion-social-usd"></i> Curriculum Vitae</a></li>
                          <li><a href="<?php echo base_url(); ?>account/apply"><i class="ion-social-euro"></i> Pengumuman</a></li>
                        </ul>
                      </li>
                      <li class="user-action">
                        <a data-toggle="modal" href="<?php echo base_url(); ?>account/logout" class="btn">Logout</a>
                      </li>
                      
                      <?php } else { ?>
                      <li class="user-action">
                        <a data-toggle="modal" href="#loginModal" class="btn">Sign up/in</a>
                      </li>
                      <?php } ?>

                    </ul>
                  </div>
            
                </div>
              </div>
            </div>

          </div>
          
        </div>
        
        <div class="navbar-bottom hidden-sm hidden-xs">
        
          <div class="container">
          
            <div class="row">
            
              <div class="col-sm-9">
                
                <div id="navbar" class="collapse navbar-collapse navbar-arrow">
                  <ul class="nav navbar-nav" id="responsive-menu">
                    <li><a href="<?php echo base_url();?>home">Home</a></li>
                    <li><a href="<?php echo base_url();?>lowongan">Lowongan</a></li>
                    <li><a href="<?php echo base_url();?>perusahaan">Perusahaan</a></li>
                  </ul>
                </div><!--/.nav-collapse -->
                
              </div>
              
              <div class="col-sm-3">
              
                <div class="navbar-phone"><i class="fa fa-phone"></i> Telepon: (022) 2009562</div>
              
              </div>

            </div>
            
          </div>
        
        </div>

        <div id="slicknav-mobile"></div>
        
      </nav>
      <!-- end Navbar (Header) -->

    </header>

    <div class="clear"></div>
  <!-- <div id="introLoader" class="introLoading"></div> -->
  
    <?php $this->load->view($content);?>
  <!-- BEGIN # MODAL LOGIN -->
  <div class="modal fade modal-login modal-border-transparent" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <button type="button" class="btn btn-close close" data-dismiss="modal" aria-label="Close">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
        
        <div class="clear"></div>
        
        <!-- Begin # DIV Form -->
        <div id="modal-login-form-wrapper">
          
          <!-- Begin # Login Form -->
          <form action="<?php echo base_url(); ?>account/login_process" method="POST" id="login-form">
          
            <div class="modal-body pb-5">
          
              <h4 class="text-center heading mt-10 mb-20">Sign-in</h4>
              
              <div class="form-group"> 
                <input id="member_username" name="member_username" required class="form-control" placeholder="username" type="text"> 
              </div>
              <div class="form-group"> 
                <input id="member_password" name="member_password" required class="form-control" placeholder="password" type="password"> 
              </div>
      
              <div class="form-group">
                <div class="row gap-5">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <!-- <div class="checkbox-block fa-checkbox"> 
                      <input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
                      <label class="" for="remember_me_checkbox">remember</label>
                    </div> -->
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 text-right"> 
                    <!-- <button id="login_lost_btn" type="button" class="btn btn-link">forgot pass?</button> -->
                  </div>
                </div>
              </div>
            
            </div>
            
            <div class="modal-footer">
            
              <div class="row gap-10">
                <div class="col-xs-6 col-sm-6 mb-10">
                  <input type="submit" class="btn btn-primary btn-block" name="masuk" value="Sign-in">
                </div>
                <div class="col-xs-6 col-sm-6 mb-10">
                  <button type="submit" class="btn btn-primary btn-block btn-inverse" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
              </div>
              <div class="text-left">
                Belum mempunyai Akun? 
                <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
              </div>
              
            </div>
          </form>
          <!-- End # Login Form -->
                
                
          <!-- Begin | Register Form -->
          <form action="<?php echo base_url(); ?>account/signup_process" id="register-form" style="display:none;" method="POST">
          
            <div class="modal-body pb-5">
            
              <h3 class="text-center heading mt-10 mb-20">Register</h3>
              
              <div class="form-group"> 
                Nama
                <input id="member_name" name="member_name" class="form-control" type="text" placeholder="Nama"  required> 
              </div>
              
              <div class="form-group"> 
                Username
                <input id="member_username" name="member_username" class="form-control" type="text" placeholder="Username" required> 
              </div>
              
              <div class="form-group"> 
                Password
                <input id="member_password" name="member_password" class="form-control" type="password" placeholder="Password" required>
              </div>
              
              <div class="form-group"> 
                Email
                <input id="member_email" name="member_email" class="form-control" type="email" placeholder="Email" required>
              </div>
              
              <div class="form-group"> 
                Nomor Telepon
                <input id="member_phone" name="member_phone" class="form-control" type="text" placeholder="Nomor Telepon">
              </div>

              <div class="form-group"> 
                Jurusan
                <select name="department_id" class="form-control" required> 
                   <option value="">- Pilih -</option>
                  <?php $q = $this->db->query("SELECT * FROM department ORDER BY department_id ASC");
                        foreach ($q->result() as $row) { ?>
                          <option value="<?php echo $row->department_id; ?>"><?php echo $row->department_name; ?></option>
                  <?php  } ?>
                </select>
              </div>

            </div>
              
            <div class="modal-footer mt-10">
            
              <div class="row gap-10">
                <div class="col-xs-6 col-sm-6 mb-10">
                  <input type="submit"  name="simpan" class="btn btn-primary btn-block" value="Register">
                </div>
                <div class="col-xs-6 col-sm-6 mb-10">
                  <button type="submit"class="btn btn-primary btn-inverse btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
                </div>
              </div>
              
              <div class="text-left">
                  Sudah mempunyai akun? <button id="register_login_btn" type="button" class="btn btn-link">Login</button>
              </div>
              
            </div>
              
          </form>
          <!-- End | Register Form -->
                
        </div>
        <!-- End # DIV Form -->
                
      </div>
    </div>
  </div>
  <!-- END # MODAL LOGIN -->
  
 

    <footer class="footer">
      
      <div class="container">
      
        <div class="main-footer">
        
          <div class="row">
        
            <div class="col-xs-12 col-sm-5 col-md-3">
              
              <p class="copy-right">&#169; Copyright 2019 CDC Poltekpos</p>
              
            </div>
            
           
                
              </div>

            </div>
            
          </div>

        </div>
        
      </div>
      
    </footer>
    
  </div>  <!-- end Container Wrapper -->
 

 
  <!-- start Back To Top
  <div id="back-to-top">
     <a href="#"><i class="fa fa-angle-up"></i></a>
  </div>
 end Back To Top -->


<?php if ($this->session->flashdata('success') || $this->session->flashdata('warning')) { ?>
<?php if ($this->session->flashdata('success')) { ?>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->session->flashdata('success'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php } else  { ?>

 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo $this->session->flashdata('warning'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } }?>

<!-- JS -->
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/instagram.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/spin.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/select2.full.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery.responsivegrid.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/readmore.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/validator.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/jquery.raty.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>templates/default/js/customs.js"></script>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
</body>

<!-- Mirrored from crenoveative.com/envato/tour-packer/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Mar 2017 03:30:33 GMT -->
</html>