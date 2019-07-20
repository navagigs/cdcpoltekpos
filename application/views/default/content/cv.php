<?php if ($action == 'view' || empty($action)){ ?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<!-- start Main Wrapper -->
		<div class="main-wrapper">
			
			<div class="content-wrapper">
	
				<div class="container">
					
					<div class="row">

						<div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 pb-20">
							
							<div class="section-title">
							
								<h3>Curriculum Vitae</h3>
								
								<p>Upload CV untuk jadi bahan pertimbangan perusahaan.</p>
								
							</div>


							<form action="<?php echo base_url(); ?>account/cv/tambah" method="POST" enctype="multipart/form-data">
								
								<input type="file" name="cv_file" required class="form-control">
								<input type="submit" name="simpan" value="Upload CV" class="btn btn-primary mt-5">

							</form>
							
						</div>

						<table>
						  <tr>
						    <th width="5">No</th>
						    <th>File</th>
						    <th width="150">Tanggal Upload</th>
						    <th width="10">Aksi</th>
						  </tr>
						  <?php
						  	$member = $this->session->userdata('member_id');
						  	$no =1;
						  	$q = $this->db->query("SELECT * FROM cv WHERE member_id=$member ORDER BY cv_id DESC");
						  	foreach ($q->result() as $row) {
						  ?>
						  	<tr>
						  		<td><?php echo $no; ?></td>
						  		<td><a href="<?php echo base_url();?>assets/files/download/<?php echo $row->cv_file; ?>"><?php echo $row->cv_file; ?></a></td>
						  		<td><?php echo dateIndo($row->cv_created); ?></td>
						  		<td><a href="<?php echo base_url();?>account/cv/hapus/<?php echo $row->cv_id; ?>">Hapus</a></td>
						  	</tr>

						  <?php 
							$no++;
							}

						  ?>
						</table>
					
					</div>
					
				</div>
				
				
				
			
			</div>
			

		</div>
		<!-- end Main Wrapper -->
<?php } ?>