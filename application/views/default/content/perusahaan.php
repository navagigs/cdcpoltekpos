<?php if ($action == 'view' || empty($action)){ ?>
<div class="main-wrapper">
		
			<!-- start end Page title -->
			<div class="page-title" style="background-image:url('<?php echo base_url(); ?>templates/default/images/01.jpg');');">
				
				<div class="container">
				
					<div class="row">
					
						<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
							<h1 class="hero-title">Perusahaan</h1>
						</div>
						
					</div>

				</div>
				
			</div>
			<!-- end Page title -->
			
			<div class="content-wrapper">
			
				<div class="container">
				
					<div class="row">
						
							<div class="GridLex-gap-20-wrappper package-grid-item-wrapper on-page-result-page alt-smaller">
						
								<div class="GridLex-grid-noGutter-equalHeight">
							
							 <?php
                        		$i  = $page+1;
                            	$like_pencarian['company_name'] = $q;
                            	if ($jml_data > 0) {
                          		foreach ($this->ADM->grid_all_company('', 'company_created', 'DESC', $batas, $page, '', $like_pencarian) as $row){
                    			?>

									<div class="GridLex-col-4_sm-6_xs-12 mb-20">
										<div class="package-grid-item"> 
											<a href="<?php echo base_url(); ?>perusahaan/detail/<?php echo $row->company_id; ?>">
												<div class="image">
													<img src="<?php echo base_url(); ?>assets/images/company/<?php echo $row->company_image; ?>" alt="<?php echo $row->company_name; ?>" />
													<div class="absolute-in-image">
														<div class="duration"><span><?php echo $row->company_field; ?></span></div>
													</div>
												</div>
												<div class="content clearfix">
													<h6><?php echo $row->company_name;?></h6>
												</div>
											</a>
										</div>
									</div>
								
								 <?php $i++; }  ?> 
		                    <?php   } else {?>
		                     <center><h4>Data Tidak Ada></h4></center>
		                    <?php } ?>
								
							<div class="pager-wrappper mt-30 clearfix">
			
								<div class="pager-innner">
								
									<div class="flex-row flex-align-middle">
										
										<div class="flex-column flex-sm-12">
											<nav class="pager-right">
												<ul class="pagination">
													<?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'perusahaan/index', $id=""); }?>
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
			

<?php } elseif ($action == 'detail') { ?>
<div class="content-wrapper">
			
				<div class="container">
			
					<div class="row">

						<div  role="main">
	
							<div class="section-title text-left">
								
								<h3><?php echo $company->company_name; ?></h3>
								
							</div>
							
							<div class="payment-container">	
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
													<td><?php echo $company->company_name; ?></td>
												</tr>
												<tr>
													<td width="10%">Bidang </td>
													<td width="2%">:</td>
													<td><?php echo $company->company_field; ?></td>
												</tr>
												<tr>
													<td width="10%">Deskripsi </td>
													<td width="2%">:</td>
													<td><?php echo $company->company_description; ?></td>
												</tr>
												<tr>
													<td width="10%">Alamat </td>
													<td width="2%">:</td>
													<td><?php echo $company->company_address; ?></td>
												</tr>
												<tr>
													<td width="10%">Kontak </td>
													<td width="2%">:</td>
													<td><?php echo $company->company_contact; ?></td>
												</tr>
												<tr>
													<td width="10%">Website </td>
													<td width="2%">:</td>
													<td><a href="http://<?php echo $company->company_web; ?>"><?php echo $company->company_web; ?></a></td>
												</tr>
											</table>
										</div>	

										</div>
										<div class="payment-box">
									
										<div class="payment-header clearfix">
										
											<div class="number">
												>
											</div>
											
											<h5 class="heading mt-0">Lowongan</h5>

										</div>
										
										<div class="payment-content">
											   <style>
											.table {
											  font-family: arial, sans-serif;
											  border-collapse: collapse;
											  width: 100%;
											}

											.table td, th {
											  border: 1px solid #dddddd;
											  text-align: left;
											  padding: 8px;
											}
											</style>
											 <table class="table">
				                                <tr>
				                                    <th width="3">NO</th>
				                                    <th width="35%">POSISI LOWONGAN</th>
				                                    <th width="35%">DESKRIPSI</th>
				                                    <th width="15%">TERAKHIR APPLY</th>
				                                    <th width="15%"></th>
				                               </tr>
				                            <tbody>
				                                <?php   
				                                $where['b.company_id'] = $company->company_id;
				                                $i  = $page+1;
				                            if ($jml_data > 0){
				                                foreach ($this->ADM->grid_all_job('*', 'job_created', 'DESC', $batas, $page, $where, '') as $row){
				                            ?>
				                                <tr>
				                                    <td align="center"><?php echo $i;?></td>
				                                    <td><?php echo $row->job_name;?></td>
				                                    <td><b>Bertanggung Jawab : </b><br><?php echo $row->job_responsible;?>
				                                        <br><b>Kualifikasi : </b><br><?php echo $row->job_qualifications;?></td>
				                                    <td><?php echo dateIndo($row->job_date);?></td>
				                                    <td>
										<?php
										$now = date("Y-m-d");
										if($row->job_date >= $now ) { 

											// $where['member']		= $data['member'];
											// $jml_pengguna				= $this->ADM->count_all_admin($where);
										?>

										<form action="<?php echo base_url()?>account/applyjob" method="POST">
											<input type="hidden" name="job_id" value="<?php echo $job->job_id;?>">
											<input type="hidden" name="company_id" value="<?php echo $job->company_id;?>">
											<input type="submit" name="apply" class="btn btn-primary" value="apply Job">
										</form>

										<?php } else { ?>
											<div class="alert alert-danger" role="alert"><i class="fa fa-info-circle"></i> Sudah ditutup</div>
										<?php } ?></td>
				                               </tr>
				                                <?php
				                                    $i++;
				                                } 
				                            } else {
				                                ?>
				                                <tr>
				                                    <td colspan="5">Belum ada data!.</td>
				                                </tr>
				                            <?php } ?>
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
		<!-- end Main Wrapper -->


<?php } ?>