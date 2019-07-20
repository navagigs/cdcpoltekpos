<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Laporan</h3>
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
                     <form role="form" action="<?php echo base_url();?>adminkarir/report" method="post" enctype="multipart/form-data" data-parsley-validate="">
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

                                <a class="btn btn-default" href="<?php echo base_url();?>adminkarir/report_excel/<?php echo $dari;?>/<?php echo $sampai;?>"><i class="fa fa-print"></i> Print Excel</a>
                            </div>
                        </div>
                    </form>
                    <!-- ========== End Button ========== -->


							<table width="100%" border="1px">
                            <thead class="primary-emphasis" >
                                <tr>
        	                        <th width="30">#</th>
                                    <th>PENCARI KERJA</th>
                                    <th>JURUSAN</th>
                                    <th>LOWONGAN</th>
                                    <th>PERUSAHAAN</th>
                                    <th>TANGGAL APPLY</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php
                                $dari = $this->input->post('dari');
                                $sampai = $this->input->post('sampai');

                                    $no=1;             
                                    $query = $this->db->query("SELECT 
                                        a.apply_id  AS apply_id,
                                        a.job_id  AS job_id,
                                        a.apply_created AS apply_created,
                                        a.apply_status AS apply_status,
                                        a.apply_created AS apply_created,
                                        b.job_name AS job_name,
                                        b.job_responsible AS job_responsible,
                                        c.company_name AS company_name,
                                        d.member_name AS member_name,
                                        e.department_name AS department_name
                                        FROM apply a 
                                        LEFT JOIN job b ON  a.job_id=b.job_id
                                        LEFT JOIN company c ON  a.company_id=c.company_id
                                        LEFT JOIN member d ON  a.member_id=d.member_id
                                        LEFT JOIN department e ON  d.department_id=e.department_id
                                         WHERE apply_created between '$dari' and '$sampai'
                                         ORDER BY a.apply_id DESC");
                                        foreach ($query->result() as $row){ 
                                        if($row->apply_status == 'DITERIMA') {
							             	$btn = 'success';
							             } elseif($row->apply_status == 'TIDAK DITERIMA') {
							             	$btn = 'danger';
							             } else {

							             	$btn = 'warning';
							             }
                                        ?>
                                <tr>
        	                        <td align="center"><?php echo $no;?></td>
                                    <td><?php echo $row->member_name;?></td>
                                    <td><?php echo $row->department_name;?></td>
                                    <td><?php echo $row->job_name;?></td>
                                    <td><?php echo $row->company_name;?></td>
                                    <td><?php echo dateIndo1($row->apply_created);?></td>
						  			<td><span class="label label-<?php echo $btn; ?>"><?php echo $row->apply_status; ?></span></td>
                                   
                                </tr>
                                <?php $no++; } ?> 
                                <tr>
                                	<?php if(!empty($sampai)) { ?>
                                    <td colspan="7">Dari tanggal <b><?php echo dateIndo($dari); ?></b> sampai tanggal <b><?php echo dateIndo($sampai); ?></b>
                                    <?php } else { ?>
                                    <td colspan="7">Belum ada data dicari</b>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
<?php } ?>