<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
    <!-- Breadcrumb -->
    <div class="page-head">
        <h3>Pelamar Kerja</h3>
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
                        <form action="" method="post" id="form">
                            <div class='btn-navigation'> 
                                <div class='pull-right'>
                                    <!-- <a class="btn btn-primary" href="<?php echo site_url();?>adminkarir/apply/tambah"><i class="fa fa-plus-circle"></i> Tambah Lowongan</a> -->
                                </div>  
                                <div class='pull-right'>
                                    <a class="btn btn-primary" href="<?php echo site_url();?>adminkarir/apply"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='btn-search'>Cari Berdasarkan :</div>
                                <div class='col-md-3 col-sm-12'>
                                    <div class='button-search'><?php array_pilihan('cari', $berdasarkan, $cari);?></div>
                                </div>
                                <div class='col-md-3 col-sm-12'>
                                    <div class="input-group">
                                        <input type="text" name="q" class="form-control" value="<?php echo $q;?>"/>
                                        <span class="input-group-btn">
                                            <button type="submit" name="kirim" class="btn btn-primary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- ========== End Button ========== -->
                        <!-- ========== Table ========== -->
                        <div class="table-responsive">
                            <table class="hover">
                                <thead class="primary-emphasis">
                                    <tr>
                                        <th width="30">#</th>
                                        <th width="20%">NAMA PELAMAR</th>
                                        <th width="28%">LOWONGAN</th>
                                        <th width="18%">PERUSAHAAN</th>
                                        <th width="10%">STATUS</th>
                                        <th width="10%">TGL.APPLY</th>
                                        <th width="10%">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   
                                    $i  = $page+1;
                                    $like_job[$cari] = $q;
                                    if ($jml_data > 0){
                                        foreach ($this->ADM->grid_all_apply('*', 'apply_created', 'DESC', $batas, $page, '', $like_job) as $row){

                                            if($row->apply_status == 'DITERIMA') {
                                                $btn = 'success';
                                            } elseif($row->apply_status == 'TIDAK DITERIMA') {
                                                $btn = 'danger';
                                            } else {

                                                $btn = 'warning';
                                            }
                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td><?php echo $row->member_name;?></td>
                                                <td><?php echo $row->job_name;?></td>
                                                <td><?php echo $row->company_name;?></td>
                                                <td><span class="label label-<?php echo $btn; ?>"><?php echo $row->apply_status; ?></span></td>
                                                <td><?php echo dateIndo($row->apply_created);?></td>
                                                <td align="center">
                                                    <!-- ========== EDIT DETAIL HAPUS ========== -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default btn-xs">Actions</button>
                                                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                            <li>
                                                                <a  href="<?php echo site_url();?>adminkarir/apply/detail/<?php echo $row->apply_id; ?>" title="Detail"><i class='fa fa-eye'></i> Detail</a>
                                                            </li>
                                                            <li>
                                                                <a  href="<?php echo site_url();?>adminkarir/apply_print/<?php echo $row->apply_id; ?>" title="Print"><i class='fa fa-print'></i> Print</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo site_url();?>adminkarir/apply/diterima/<?php echo $row->apply_id; ?>" title="Diterima"><i class='fa fa-check'></i> Diterima</a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo site_url();?>adminkarir/apply/ditolak/<?php echo $row->apply_id; ?>" title="Tidak Diterima"><i class='fa fa-close'></i> Tidak Diterima</a>
                                                            </li>
                                                        </ul>
                                                    </div>  
                                                    <!-- ========== End EDIT DETAIL HAPUS ========== -->
                                                </td>
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
                            <!-- ========== End Table ========== -->
                        </div>
                        <div id='pagination'>
                            <div class='pagination-left'>Total : <?php echo $jml_data;?></div>
                            <div class='pagination-right'>
                                <ul class="pagination">
                                    <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'adminkarir/apply/view', $id=""); }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- ================================================== DETAIL ================================================== -->
<?php } elseif ($action == 'detail') { ?>
    <!-- Breadcrumb -->
    <div class="page-head">
        <h3> Detail Pelamar Kerja</h3>
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
                  <h5><b>Data Pelamar</b></h5>
                  <table class="table">
                      <tr>
                        <td width="20%">Nama Pelamar</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->member_name; ?></td>
                    </tr>
                      <tr>
                        <td width="20%">Jurusan</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->department_name; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Email</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->member_email; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">No.Telepon</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->member_phone; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Alamat</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->member_address; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Lampiran</td>
                        <td width="1%">:</td>
                        <td><table>
                          <tr>
                            <th width="5">No</th>
                            <th>File</th>
                            <th width="150">Tanggal Upload</th>
                          </tr>
                          <?php
                            $no =1;
                            $q = $this->db->query("SELECT * FROM cv WHERE member_id=$apply->member_id ORDER BY cv_id DESC");
                            foreach ($q->result() as $row) {
                          ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><a target="_blank" href="<?php echo base_url();?>assets/files/download/<?php echo $row->cv_file; ?>"><?php echo $row->cv_file; ?></a></td>
                                <td><?php echo dateIndo($row->cv_created); ?></td>
                            </tr>

                          <?php 
                            $no++;
                            }

                          ?>
                        </table>
                        </td>
                    </tr>
                </table>
                  <h5><b>Data Lowongan</b></h5>
                  <table class="table">
                      <tr>
                        <td width="20%">Lowongan</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->job_name; ?></td>
                    </tr>
                      <tr>
                        <td width="20%">Deskripsi</td>
                        <td width="1%">:</td>
                        <td><b>Bertanggung Jawab : </b><br><?php echo $apply->job_responsible;?>
                            <br><b>Kualifikasi : </b><br><?php echo $apply->job_qualifications;?></td>
                    </tr>
                    <tr>
                        <td width="20%">Nama Perusahaan</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->company_name; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Bidang Perusahaan</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->company_field; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">Alamat Perusahaan</td>
                        <td width="1%">:</td>
                        <td><?php echo $apply->company_address; ?></td>
                    </tr>
                </table>
                  <h5><b>Status Lowongan</b></h5>
                  <table class="table">
                      <tr>
                        <td width="20%">Status</td>
                        <td width="1%">:</td>
                        <td><?php  if($apply->apply_status == 'DITERIMA') {
                                                $btn = 'success';
                                            } elseif($apply->apply_status == 'TIDAK DITERIMA') {
                                                $btn = 'danger';
                                            } else {

                                                $btn = 'warning';
                                            } ?>
                            <span class="label label-<?php echo $btn; ?>"><?php echo $apply->apply_status; ?></span>
                        </td>
                    </tr>
                </table>
                <a class="btn btn-primary" href="<?php echo site_url();?>adminkarir/apply"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Content -->
<?php } ?>