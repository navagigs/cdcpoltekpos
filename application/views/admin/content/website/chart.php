<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Grafik</h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li class="active"><?php echo $breadcrumb; ?></li>
    </ol>   
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="block-flat">
                <div class="content">
                    <!-- ========== Flashdata ========== -->
                    <?php if ($this->session->flashdata('success') || $this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-check sign"></i><?php echo $this->session->flashdata('warning'); ?>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-warning sign"></i><?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <!-- ========== End Flashdata ========== -->
                    <!-- ========== Button ========== -->
                     <form role="form" action="<?php echo base_url();?>adminkarir/chart" method="post" enctype="multipart/form-data" data-parsley-validate="">
                        <div class='btn-navigation'> 
                        </div>
                        <div class='row'>
                            <div class='btn-search'>Mulai</div>
                            <div class='col-md-3 col-sm-12'>
                                    <input type="date"  name="dari" class="form-control" value="<?php echo $dari;?>"/>
                            </div>
                            <div class='btn-search'>Sampai Dengan</div>
                            <div class='col-md-3 col-sm-12'>
                                    <input type="date"  name="sampai" class="form-control" value="<?php echo $sampai;?>"/>
                            </div>

                            <div class='col-md-3 col-sm-12'>
                                <input type="submit" class="btn btn-primary" value="Cari">
                            </div>
                        </div>
                    </form>
                    <!-- ========== End Button ========== -->

<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>templates/admin/js/highcharts.js"></script>
<script src="<?php echo base_url();?>templates/admin/js/exporting.js"></script>

 <script type="text/javascript">
    var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'grafik',
            type: 'column'
         },   
         title: {
            text: 'Grafik Apply Job Perusahaan'
         },
         xAxis: {
            categories: ['Perusahaan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Apply'
           }
         },
            series:             
            [     <?php   
                                $dari = $this->input->post('dari');
                                $sampai = $this->input->post('sampai');
        $sql = $this->db->query("SELECT * FROM company");
        foreach ($sql->result() as $row){      
        $sql_jumlah = $this->db->query("SELECT count(apply_id) as jml FROM apply WHERE company_id='$row->company_id'

            AND apply_created between '$dari' and '$sampai'");
        foreach ($sql_jumlah->result() as $row2){                
                  }             

            ?>        
           
                  {
                      name: '<?php echo $row->company_name; ?>',
                      data: [<?php echo $row2->jml; ?>]
                  },
                    
                  <?php } ?>   
            ]
      });
   });  
</script>
 <script type="text/javascript">
    var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'grafik2',
            type: 'column'
         },   
         title: {
            text: 'Grafik Apply Job Jurusan'
         },
         xAxis: {
            categories: ['Jurusan']
         },
         yAxis: {
            title: {
               text: 'Jumlah Apply'
           }
         },
              series:             
            [           
           <?php   
        $sql = $this->db->query("SELECT * FROM department");
        foreach ($sql->result() as $row){      
        $sql_jumlah = $this->db->query("SELECT 
            count(a.apply_id) as jml,
            e.department_id as department_id

            FROM apply a 
            LEFT JOIN member d ON  a.member_id=d.member_id
            LEFT JOIN department e ON  d.department_id=e.department_id

            WHERE d.department_id='$row->department_id'

            AND a.apply_created between '$dari' and '$sampai'

            ");
        foreach ($sql_jumlah->result() as $row2){  }             

            ?>        
           
                  {
                      name: '<?php echo $row->department_name; ?>',
                      data: [<?php echo $row2->jml; ?>]
                  },
                    
                  <?php } ?> 
            ]
      });
   });  
</script>
<div id='grafik'></div> 
<div id='grafik2'></div> 

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
<?php } ?>