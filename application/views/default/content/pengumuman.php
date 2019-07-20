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
							
								<h3>Pengumuman</h3>
								
								<p>Aktivitias apply job dan status penerimaan.</p>
								
							</div>
							
						</div>

						<table>
						  <tr>
						    <th width="5">No</th>
						    <th>Lowongan</th>
						    <th>Perusahaan</th>
						    <th>Status</th>
						    <th width="150">Tanggal Apply</th>
						  </tr>
						  <?php   
				            $i  = $page+1;
				            $like_apply[$cari] = $q;
				            if ($jml_data > 0){
				                foreach ($this->ADM->grid_all_apply('*', 'apply_created', 'DESC', $batas, $page, '', $like_apply) as $row){

				             if($row->apply_status == 'DITERIMA') {
				             	$btn = 'success';
				             } elseif($row->apply_status == 'TIDAK DITERIMA') {
				             	$btn = 'danger';
				             } else {

				             	$btn = 'warning';
				             }
				            ?>
						  	<tr>
						  		<td><?php echo $i; ?></td>
						  		<td><?php echo $row->job_name; ?></td>
						  		<td><?php echo $row->company_name; ?></td>
						  		<td><span class="label label-<?php echo $btn; ?>"><?php echo $row->apply_status; ?></span></td>
						  		<td><?php echo dateIndo($row->apply_created); ?></td>
						  	</tr>

						  
				            <?php  $i++;  }  } else {  ?>
				            Belum ada data!
				            <?php } ?>
						</table>
					
					</div>
					
				</div>
				
				
				
			
			</div>
			

		</div>
		<!-- end Main Wrapper -->
<?php } ?>