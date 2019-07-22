<!-- Breadcrumb -->
<div class="page-head">
    <h3>Dashboard <small>Control Panel</small></h3>
    <ol class="breadcrumb">
        <li class="active"><i class='fa fa-home'></i> Dashboard</li>
    </ol>	
</div> 
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class='row'>
        <div class="col-md-12">
            <div class="block-flat">
                <div class="header">
				    <h4>Selamat datang di Halaman Administrator <?php echo $web->identitas_website;?></h4>
				</div>
				<div class="content">
                    <div class='blockquote'>
				        <div class='text-orange'><h5>Hallo, <?php echo $admin->admin_nama; ?></h5></div>
                        <p>Sistem informasi ini untuk administrator atau operator menjalankan data yang akan dibuat</p>
                    </div>
                </div>
            </div>
        </div><!-- /.col-md-12 --> 	
		<?php if ($this->session->userdata('logged_in') == TRUE && $this->session->userdata('admin_level') == '1') { ?>	
                    <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3><?php echo $jml_data_job;?></h3>
                                    <p>Lowongan</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-list-alt"></i>
                                </div>
                                <a href="<?php echo site_url();?>adminkarir/job" class="small-box-footer">
                                    Lihat Lowongan <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?php echo $jml_data_company;?></h3>
                                    <p>Perusahaan</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <a href="<?php echo site_url();?>adminkarir/company" class="small-box-footer">
                                    Lihat Perusahaan <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo $jml_data_apply;?></h3>
                                    <p> Pelamar</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-pencil"></i>
                                </div>
                                <a href="<?php echo site_url();?>adminkarir/apply" class="small-box-footer">
                                    Lihat Pelamar <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                                <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?php echo $jml_data_member;?></h3>
                                    <p>Member</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="<?php echo site_url();?>adminkarir/member" class="small-box-footer">
                                    Lihat Member <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
		<?php } ?>
    		</div>
        <div class="row">
        
    </div>
</div>
<!-- End Content -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/jquery.easypiechart/jquery.easy-pie-chart.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/js/bootstrap.slider/css/slider.css" />

	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.easypiechart/jquery.easy-pie-chart.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?php echo base_url();?>templates/admin/js/jquery.select2/select2.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/skycons/skycons.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>templates/admin/js/intro.js/intro.js" type="text/javascript"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>templates/admin/css/calendar.css" />

  