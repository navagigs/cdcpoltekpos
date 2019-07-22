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
							
								<h3>Profile</h3>
								
								<p>Edit Profile Anda.</p>
								
							</div>


							<form action="<?php echo base_url(); ?>account/profile/edit" method="POST" enctype="multipart/form-data">
				              
				              <div class="form-group"> 
				                Username
				                <input id="member_username" name="member_username" class="form-control" type="text" placeholder="Username" value="<?php echo $member->member_username; ?>" readonly> 
				              </div>

				              <div class="form-group"> 
				                Nama
				                <input id="member_name" name="member_name" class="form-control" type="text" placeholder="Nama" value="<?php echo $member->member_name; ?>" required> 
				              </div>
				              <div class="form-group"> 
				                Alamat
				                <input id="member_address" name="member_address" class="form-control" type="text" placeholder="Alamat" value="<?php echo $member->member_address; ?>" required> 
				              </div>
				              
				              <div class="form-group"> 
				                Email
				                <input id="member_email" name="member_email" class="form-control" type="email" placeholder="Email" required  value="<?php echo $member->member_email; ?>">
				              </div>
				              
				              <div class="form-group"> 
				                Nomor Telepon
				                <input id="member_phone" name="member_phone" class="form-control" type="text" placeholder="Nomor Telepon"  value="<?php echo $member->member_phone; ?>">
				              </div>

				              <div class="form-group"> 
				                Jurusan
                                 <?php $this->ADM->combo_box("SELECT * FROM department", 'department_id', 'department_id', 'department_name', $member->department_id);?>
				              </div>
              				<?php if ($member->member_images){?>
						              <div class="form-group">
                                            <img src="<?php echo base_url()."assets/images/member/kecil_".$member->member_images;?>" style="width:120px;"/>
						              </div>
						              <div class="form-group"> 
						                Edit Foto
											<input type="file" name="member_images" class="form-control">
						              </div>
                                <?php } else {?>
						              <div class="form-group"> 
						               Foto
											<input type="file" name="member_images" required class="form-control">
						              </div>
                                <?php } ?>
								<input type="submit" name="simpan" value="Edit Profile" class="btn btn-primary mt-5">

							</form>
							
						</div>
					</div>
					
				</div>
				
				
				
			
			</div>
			

		</div>
		<!-- end Main Wrapper -->
<?php } ?>