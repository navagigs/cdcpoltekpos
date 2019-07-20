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
					<form id="login-form">
					
						<div class="modal-body pb-5">
					
							<h4 class="text-center heading mt-10 mb-20">Sign-in Member</h4>
						
							<button class="btn btn-facebook btn-block">Sign-in with Facebook</button>
							
							<div class="modal-seperator">
								<span>or</span>
							</div>
							
							<div class="form-group"> 
								<input id="login_username" class="form-control" placeholder="username" type="text"> 
							</div>
							<div class="form-group"> 
								<input id="login_password" class="form-control" placeholder="password" type="password"> 
							</div>
			
							<div class="form-group">
								<div class="row gap-5">
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="checkbox-block fa-checkbox"> 
											<input id="remember_me_checkbox" name="remember_me_checkbox" class="checkbox" value="First Choice" type="checkbox"> 
											<label class="" for="remember_me_checkbox">remember</label>
										</div>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-6 text-right"> 
										<button id="login_lost_btn" type="button" class="btn btn-link">forgot pass?</button>
									</div>
								</div>
							</div>
						
						</div>
						
						<div class="modal-footer">
						
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block">Sign-in Member</button>
								</div>
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block btn-inverse" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							<div class="text-left">
								No account? 
								<button id="login_register_btn" type="button" class="btn btn-link">Register</button>
							</div>
							
						</div>
					</form>
					<!-- End # Login Form -->
								
					<!-- Begin | Lost Password Form -->
					<form id="lost-form" style="display:none;">
						<div class="modal-body pb-5">
						
							<h3 class="text-center heading mt-10 mb-20">Forgot password</h3>
							<div class="form-group mb-10"> 
								<input id="lost_email" class="form-control" type="text" placeholder="Enter Your Email">
							</div>
							
							<div class="text-center">
								<button id="lost_login_btn" type="button" class="btn btn-link">Sign-in</button> or 
								<button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
							</div>
							
						</div>
						
						<div class="modal-footer mt-10">
							
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6">
									<button type="submit" class="btn btn-primary btn-block">Submit</button>
								</div>
								<div class="col-xs-6 col-sm-6">
									<button type="submit" class="btn btn-primary btn-inverse btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							
						</div>
						
					</form>
					<!-- End | Lost Password Form -->
								
					<!-- Begin | Register Form -->
					<form id="register-form" style="display:none;">
					
						<div class="modal-body pb-5">
						
							<h3 class="text-center heading mt-10 mb-20">Register</h3>
							
							<button class="btn btn-facebook btn-block">Register with Facebook</button>
							
							<div class="modal-seperator">
								<span>or</span>
							</div>
							
							<div class="form-group"> 
								<input id="register_username" class="form-control" type="text" placeholder="Username"> 
							</div>
							<div class="form-group"> 
								<input id="register_address" class="form-control" type="text" placeholder="Institution"> 
							</div>

							<div class="form-group"> 
								<input id="register_email" class="form-control" type="email" placeholder="Email">
							</div>
							<div class="form-group"> 
								<input id="register_phone" class="form-control" type="text" placeholder="Phone"> 
							</div>
							<div class="form-group"> 
								<input id="register_address" class="form-control" type="text" placeholder="Address"> 
							</div>

							<div class="form-group"> 
								<input id="register_password" class="form-control" type="password" placeholder="Password">
							</div>
							
							

						</div>
							
						<div class="modal-footer mt-10">
						
							<div class="row gap-10">
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-block">Register</button>
								</div>
								<div class="col-xs-6 col-sm-6 mb-10">
									<button type="submit" class="btn btn-primary btn-inverse btn-block" data-dismiss="modal" aria-label="Close">Cancel</button>
								</div>
							</div>
							
							<div class="text-left">
									Already have account? <button id="register_login_btn" type="button" class="btn btn-link">Sign-in</button>
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
								<a class="navbar-logo" href="index.php">
									<img src="images/logo-white.png" alt="Logo" />
								</a>
							</div>
							<div class="flex-columns">
								<div class="pull-right">
								
									<div class="navbar-mini">
										<ul class="clearfix">
										
										
											<li class="user-action">
												<a data-toggle="modal" href="#loginModal" class="btn">Sign up/in</a>
											</li>

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
										<li><a href="index.php">Home</a>
											
										</li>
										<li><a href="package_list.php">Package</a>
											
										</li>
										<li><a href="about.php">About Us</a></li>
										<li><a href="event.php">Event</a>
											
										</li>
										
										<li><a href="contact.php">Contact us</a></li>
									</ul>
								</div><!--/.nav-collapse -->
								
							</div>
							
							<div class="col-sm-3">
							
								<div class="navbar-phone"><i class="fa fa-phone"></i> Call us: +66 28 878 5452</div>
							
							</div>

						</div>
						
					</div>
				
				</div>

				<div id="slicknav-mobile"></div>
				
			</nav>
			<!-- end Navbar (Header) -->

		</header>