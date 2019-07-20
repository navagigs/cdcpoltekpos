<?php if ($action == 'view' || empty($action)){ ?>
<div class="main-wrapper">
		
			<!-- start end Page title -->
			<div class="page-title" style="background-image:url('<?php echo base_url(); ?>templates/default/images/01.jpg');');">
				
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
							<h1 class="hero-title">Lowongan</h1>
						</div>
						
					</div>

				</div>
				
			</div>
			<!-- end Page title -->
			
			<div class="content-wrapper">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-sm-4 col-md-3">
							
							<aside class="sidebar with-filter">
							
           					 <form action="<?php echo base_url();?>lowongan" method="POST">
								<div class="sidebar-search-wrapper bg-light-2">
								
									<div class="sidebar-search-header">
										<h4>Cari Lowongan</h4>
									</div>
									
									<div class="sidebar-search-content">

										<div class="form-group">
                  							<input type="text" name="q" value="<?php echo $q; ?>" class="form-control" placeholder="Lowongan Pekerjaan" >
										</div>
                 						 <input type="submit" class="btn btn-primary btn-block" value="Cari">
									</div>
									
								</div>
								
								</form>
							</aside>
							
							
						</div>
						
						<div class="col-sm-8 col-md-9">
							
							<div class="package-list-item-wrapper on-page-result-page">
							
							 <?php
                        		$i  = $page+1;
                            	$like_pencarian['job_name'] = $q;
                            	if ($jml_data > 0) {
                          		foreach ($this->ADM->grid_all_job('', 'job_created', 'DESC', $batas, $page, '', $like_pencarian) as $row){
                    			?>
								<div class="package-list-item clearfix">
									<div class="image">
										<img src="<?php echo base_url(); ?>assets/images/job/<?php echo $row->job_image; ?>" alt="<?php echo $row->job_name; ?>" />
										<div class="absolute-in-image">
											
										</div>
									</div>
									
									<div class="content">
										<h5><?php echo $row->job_name; ?> <button class="btn"><i class="fa fa-heart-o"></i></button></h5>
										<div class="row gap-10">
											<div class="col-sm-12 col-md-9">
												
												<b>Kualifikasi</b><p class="line18"><?php echo $row->job_qualifications; ?></p>
												
												<ul class="list-info">
													<li><span class="icon"><i class="fa fa-map-marker"></i></span> <span class="font600">Perusahaan: </span> <?php echo $row->company_name;?> - <?php echo $row->company_address;?></li>
													
												</ul>
												
											</div>
											<div class="col-sm-12 col-md-3 text-right text-left-sm">
												
												<a href="<?php echo base_url(); ?>lowongan/detail/<?php echo $row->job_id; ?>" class="btn btn-primary btn-sm">Detail</a>
												
											</div>
										</div>
									</div>
									
								</div>
								
								 <?php $i++; }  ?> 
		                    <?php   } else {?>
		                     <center><h4>Data Tidak Ada></h4></center>
		                    <?php } ?>
								
							
							<div class="pager-wrappper clearfix">
			
								<div class="pager-innner">
								
									<div class="flex-row flex-align-middle">
											
										<div class="flex-column flex-sm-12">
											Total <?php echo $jml_data;?>
										</div>
										
										<div class="flex-column flex-sm-12">
											<nav class="pager-right">
												<ul class="pagination"> 
													<?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'lowongan/index', $id=""); }?>
												</ul>
											</nav>
										</div>
									
									</div>
									
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			

		</div>

<?php } elseif ($action == 'detail') { ?>
<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">

						<div  role="main">
	
							<div class="section-title text-left">
								
								<h3>Posisi : <?php echo $job->job_name; ?></h3>
								
							</div>
							
							<div class="payment-container">
									<div class="payment-box">
									
										<div class="payment-header clearfix">
										
											<div class="number">
												>
											</div>

											<div class="row gap-10">
											
												<div class="col-sm-9">
													<h5 class="heading mt-0">Bertanggung jawab</h5>
												</div>

											</div>

										</div>
										
										<div class="payment-content">
										
											<div class="payment-content">
												<p><?php echo $job->job_responsible; ?></p>
											</div>
											
										</div>
										
									</div>
									<div class="payment-box">
									
										<div class="payment-header clearfix">
										
											<div class="number">
												>
											</div>

											<div class="row gap-10">
											
												<div class="col-sm-9">
													<h5 class="heading mt-0">Kualifikasi</h5>
												</div>

											</div>

										</div>
										
										<div class="payment-content">
										
											<div class="payment-content">
												<p><?php echo $job->job_qualifications; ?></p>
											</div>
											
										</div>
										
									</div>
												
									
									
									
									<div class="payment-box">
									
										<div class="payment-header clearfix">
										
											<div class="number">
												>
											</div>
											
											<h5 class="heading mt-0">Informasi Perusahaan</h5>

										</div>
										
										<div class="payment-content">

											<table width="100%">
												<tr>
													<td width="10%">Nama </td>
													<td width="2%">:</td>
													<td><?php echo $job->company_name; ?></td>
												</tr>
												<tr>
													<td width="10%">Bidang </td>
													<td width="2%">:</td>
													<td><?php echo $job->company_field; ?></td>
												</tr>
												<tr>
													<td width="10%">Deskripsi </td>
													<td width="2%">:</td>
													<td><?php echo $job->company_description; ?></td>
												</tr>
												<tr>
													<td width="10%">Alamat </td>
													<td width="2%">:</td>
													<td><?php echo $job->company_address; ?></td>
												</tr>
												<tr>
													<td width="10%">Kontak </td>
													<td width="2%">:</td>
													<td><?php echo $job->company_contact; ?></td>
												</tr>
												<tr>
													<td width="10%">Website </td>
													<td width="2%">:</td>
													<td><a href="http://<?php echo $job->company_web; ?>"><?php echo $job->company_web; ?></a></td>
												</tr>
											</table>
										</div>
											</div>

										</div>
										
									</div>
									
									<div class="row mt-20">
												
										<div class="col-sm-8 col-md-6">
										<?php
										$now = date("Y-m-d");
										if($job->job_date >= $now ) { 

											// $where['member']		= $data['member'];
											// $jml_pengguna				= $this->ADM->count_all_admin($where);
										?>

										<form action="<?php echo base_url()?>account/applyjob" method="POST">
											<input type="hidden" name="job_id" value="<?php echo $job->job_id;?>">
											<input type="hidden" name="company_id" value="<?php echo $job->company_id;?>">
											<input type="submit" name="apply" class="btn btn-primary" value="apply Job">
										</form>

										<?php } else { ?>
											<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Sudah ditutup, karena waktu apply sudah lewat.</div>
										<?php } ?>
										</div>
										
									</div>
									
								
							</div>
							
						</div>

						

					</div>
				
				</div>
					
			</div>

		</div>
		<!-- end Main Wrapper -->


<?php } ?>