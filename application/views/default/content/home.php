 
    
    <!-- start Main Wrapper -->
    <div class="main-wrapper">
    
      <!-- start hero-header with windows height -->
      <div class="hero" style="background-image:url('<?php echo base_url(); ?>templates/default/images/01.jpg');">
        
        <div class="container">
        
          <div class="row">
          
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            
              <h1 class="hero-title">Career Development Center</h1>
              <p class="lead">POLITEKNIK POS INDONESIA</p>

            </div>
            
          </div>
          
          <div class="main-search-wrapper full-width">
            <form action="<?php echo base_url();?>lowongan" method="POST">
              <div class="col-sm-10 col-sm-offset-1 col-md-8">
              
                <div class="form-group ">
                  
                  <input type="text" name="q" class="form-control" placeholder="Lowongan Pekerjaan" >
                  
                </div>
              
              </div>
              
              
              <div class="column-item for-btn">
              
                <div class="form-group">
                
                  <input type="submit" class="btn btn-primary btn-block" value="Cari">
                  
                </div>
              
              </div>
              </form>
            </div>
            
          </div>
        
        </div>
        
      </div>
      <!-- end hero-header with windows height -->
      
      <div class="post-hero bg-light">
      
        <div class="container">
          
          <div class="row">
          
            <div class="col-sm-4">
              <div class="featured-count clearfix">
                <div class="icon"><i class="pe-7s-map-marker"></i></div>
                <div class="content">
                  <h6><?php echo $jml_data_company;?>+ Perusahaan</h6>
                  <span>Jumlah Perusahaan yang telah berkerja sama.</span>
                </div>
              </div>
            </div>
            
            <div class="col-sm-4">
              <div class="featured-count clearfix">
                <div class="icon"> <i class="pe-7s-user"></i></div>
                <div class="content">
                  <h6><?php echo $jml_data_job;?>+ Lowongan</h6>
                  <span>Jumlah Lowongan yang tersedia.</span>
                </div>
              </div>
            </div>
            
            <div class="col-sm-4">
              <div class="featured-count clearfix">
                <div class="icon"> <i class="pe-7s-smile"></i></div>
                <div class="content">
                  <h6><?php echo $jml_data_member;?>+ Member</h6>
                  <span>Jumlah Member yang terdaftar.</span>
                </div>
              </div>
            </div>
            
          </div>
          
        </div>
        
      </div>

      <section class="bg-light">
      
        <div class="container">
        
          <div class="row">
            
            <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
              
              <div class="section-title">
              
                <h3>LOWONGAN TERBARU</h3>
                <p>Cari lowongan pekerjaan terbaru.</p>
                
              </div>
              
            </div>
          
          </div>
          
          <div class="GridLex-gap-30-wrappper package-grid-item-wrapper">
            
            <div class="GridLex-grid-noGutter-equalHeight">
            <?php   
            $i  = $page+1;
            $like_job[$cari] = $q;
            if ($jml_data > 0){
                foreach ($this->ADM->grid_all_job('*', 'job_created', 'DESC', $batas, $page, '', $like_job) as $row){
            ?>
              <div class="GridLex-col-4_sm-6_xs-12 mb-30">
                <div class="package-grid-item"> 
                  <a href="<?php echo base_url(); ?>lowongan/detail/<?php echo $row->job_id; ?>">
                    <div class="image">
                      <img src="<?php echo base_url(); ?>assets/images/job/<?php echo $row->job_images; ?>" alt="<?php echo $row->job_name; ?>" style="width: 500px; height: 220px;" />
                      <div class="absolute-in-image">
                        <div class="duration"><span><?php echo dateIndo($row->job_date); ?></span></div>
                      </div>
                    </div>
                    <div class="content clearfix">
                      <h5><?php echo $row->job_name; ?></h5>
                      <div class="rating-wrapper">
                        <div class="raty-wrapper">
                         <span> <?php echo $row->company_name; ?></span>
                        </div>
                      </div>
                      <!-- <div class="absolute-in-content">
                        <span class="btn"><i class="fa fa-heart-o"></i></span>
                        <div class="price">$1422</div>
                      </div> -->
                    </div>
                  </a>
                </div>
              </div>
              
            <?php  $i++;  }  } else {  ?>
            Belum ada data!
            <?php } ?>
              
              
            </div>
          
          </div>
          
        </div>
        
      </section>
      
    
   <!--    
      <section class="bg-light">
      
        <div class="container">
        
          <div class="row">
            
            <div class="col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
              
              <div class="section-title">
              
                <h3>Testimonial</h3>
                <p>What our customers say about us</p>
              </div>
              
            </div>
          
          </div>
          
          <div class="testimonial-wrapper">
          
            <div class="row">
              
              <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="testimonial-item clearfix">
                  <div class="image">
                    <img src="<?php echo base_url(); ?>templates/default/images/man/01.jpg" alt="Man" />
                  </div>
                  <div class="content">
                    <h4>Antony Robert</h4>
                    <h6>From Spain</h6>
                    <p>She meant new their sex could defer child. An lose at quit to life do dull. Moreover end horrible endeavor entrance any families. Income appear extent on of thrown in admire.</p>
                  </div>
                </div>
              </div>
              
              <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="testimonial-item clearfix">
                  <div class="image">
                    <img src="<?php echo base_url(); ?>templates/default/images/man/02.jpg" alt="Man" />
                  </div>
                  <div class="content">
                    <h4>Mohammed Salem</h4>
                    <h6>From Turkey</h6>
                    <p>Consider now provided laughter boy landlord dashwood. Often voice and the spoke. No shewing fertile village equally prepare up females sentiments increasing particular.</p>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>
          
        </div>
        
      </section> -->
      
     
          
      
      <div class="overflow-hidden">
      
        <div class="instagram-wrapper">
          <div id="instagram" class="instagram"></div>
        </div>
        
      </div>
      
    </div>
    <!-- end Main Wrapper -->