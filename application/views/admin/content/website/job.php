<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Lowongan</h3>
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
                                <a class="btn btn-primary" href="<?php echo site_url();?>adminkarir/job/tambah"><i class="fa fa-plus-circle"></i> Tambah Lowongan</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>adminkarir/job"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th width="18%">POSISI LOWONGAN</th>
                                    <th width="15%">PERUSAHAAN</th>
                                    <th width="40%">DESKRIPSI</th>
                                    <th width="10%">TGL.DIBUAT</th>
                                    <th width="13%">AKSI</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php   
                                $i  = $page+1;
                                $like_job[$cari] = $q;
                            if ($jml_data > 0){
                                foreach ($this->ADM->grid_all_job('*', 'job_created', 'DESC', $batas, $page, '', $like_job) as $row){
                            ?>
                                <tr>
                                    <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->job_name;?></td>
                                    <td><?php echo $row->company_name;?></td>
                                    <td><b>Bertanggung Jawab : </b><br><?php echo $row->job_responsible;?>
                                        <br><b>Kualifikasi : </b><br><?php echo $row->job_qualifications;?></td>
                                    <td><?php echo dateIndo($row->job_created);?></td>
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
                                                    <a href="<?php echo site_url();?>adminkarir/job/edit/<?php echo $row->job_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->job_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->job_name; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'adminkarir/job/view', $id=""); }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<!-- ========== Modal Detail ========== -->
<div class="modal fade" id="mod-info" tabindex="-1" role="dialog">
   <div class="modal-dialog">
       <div class="modal-content">                
            <script type="text/javascript" src="<?php echo base_url();?>editor/ckeditor.js"></script>
            <script type="text/javascript">
            var editor = CKEDITOR.replace("berita_deskripsi",
                {
                    filebrowserBrowseUrl      : "<?php echo base_url();?>finder/ckfinder.html",
                    filebrowserImageBrowseUrl : "<?php echo base_url();?>finder/ckfinder.html?Type=Images",
                    filebrowserFlashBrowseUrl : "<?php echo base_url();?>finder/ckfinder.html?Type=Flash",
                    filebrowserUploadUrl      : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Files",
                    filebrowserImageUploadUrl : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Images",
                    filebrowserFlashUploadUrl : "<?php echo base_url();?>finder/core/connector/php/connector.php?command=QuickUpload&type=Flash",
                    filebrowserWindowWidth    : 900,
                    filebrowserWindowHeight   : 700,
                    toolbarStartupExpanded    : false,
                    height                    : 400 
                }
                );
            </script>   
         </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== End Modal Detail ========== -->

<!-- ========== Modal Konfirmasi ========== -->
<div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi</h4>
            </div>

            <div class="modal-body" style="background:#d9534f;color:#fff">
                Apakah Anda yakin ingin menghapus data ini?
            </div>

            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-danger" id="hapus-job">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>

        </div>
    </div>
</div>
<!-- ========== End Modal Konfirmasi ========== -->
<!-- ================================================== END VIEW ================================================== -->

<!-- ================================================== TAMBAH ================================================== -->
<?php } elseif ($action == 'tambah') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Tambah <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>adminkarir/job"><?php echo $breadcrumb; ?></a></li>
        <li class="active">Tambah</li>
    </ol>   
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>adminkarir/job/tambah" method="post" enctype="multipart/form-data"  parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y"> 
                                    <tr>
                                        <td>
                                            <label for="company_id" class="control-label">Perusahaan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM company", 'company_id', 'company_id', 'company_name', $company_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="job_name" class="control-label">Posisi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="job_name" type="text" id="job_name" required class="form-control input-sm" value="<?php echo $job_name;?>" size="80"  placeholder="Masukan Posisi Lowongan"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="job_responsible" class="control-label">Bertanggung jawab</label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="5" cols="20" id="job_responsible" name="job_responsible"></textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="job_qualifications" class="control-label">Kualifikasi</label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="5" cols="20" id="job_qualifications" name="job_qualifications" ></textarea>
                                            <?php echo $ckeditor2;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="job_images" class="control-label">Gambar </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control input-sm btn-sm" name="job_images" id="job_images"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="job_date" class="control-label">Terakhir apply</label>
                                        </td>
                                        <td>
                                            <input name="job_date" type="date" id="job_date" required class="form-control input-sm" value="<?php echo $job_date;?>" size="80"  placeholder="Masukan Tanggal terakhir apply"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>adminkarir/job'"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
<!-- ================================================== END TAMBAH ================================================== -->

<!-- ================================================== EDIT ================================================== -->
<?php } elseif ($action == 'edit') { ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Edit <small><?php echo $breadcrumb; ?></small></h3>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>admin"><i class='fa fa-home'></i> Dashboard</a></li>
        <li><a href="<?php echo base_url();?>adminkarir/job"><?php echo $breadcrumb; ?></a></li>
        <li class="active">Edit</li>
    </ol>   
</div>
<!-- End Breadcrumb -->
<!-- Content -->
<div class="cl-mcont">
    <div class="row">
        <div class="col-md-12">
            <div class="block-flat">
                <div class="content">
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>adminkarir/job/edit/<?php echo $job_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="job_id" value="<?php echo $job_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">  
                                    <tr>
                                        <td>
                                            <label for="company_id" class="control-label">Perusahaan <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <?php $this->ADM->combo_box("SELECT * FROM company", 'company_id', 'company_id', 'company_name', $company_id);?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="job_name" class="control-label">Posisi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="job_name" type="text" id="job_name" required class="form-control input-sm" value="<?php echo $job_name;?>" size="80"  placeholder="Masukan Posisi Lowongan"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="job_responsible" class="control-label">Bertanggung jawab</label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="5" cols="20" id="job_responsible" name="job_responsible"><?php echo $job_responsible;?></textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="job_qualifications" class="control-label">Kualifikasi</label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="5" cols="20" id="job_qualifications" name="job_qualifications" ><?php echo $job_qualifications;?></textarea>
                                            <?php echo $ckeditor2;?>
                                        </td>
                                    </tr>
                                <?php if ($job_images){?>
                                    <tr>
                                        <td>
                                            <label for="job_images" class="control-label">Gambar</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/job/kecil_".$job_images;?>" width="220"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="job_images" class="control-label">Edit Gambar</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control input-sm btn-sm" name="job_images"  id="job_images" />
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="job_images" class="control-label">Gambar </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control input-sm btn-sm" name="job_images" id="job_images"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td width="130">
                                            <label for="job_date" class="control-label">Terakhir apply</label>
                                        </td>
                                        <td>
                                            <input name="job_date" type="date" id="job_date" required class="form-control input-sm" value="<?php echo $job_date;?>" size="80"  placeholder="Masukan Tanggal terakhir apply"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>adminkarir/job'"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content --> 
<!-- ================================================== END EDIT ================================================== -->

<!-- ================================================== DETAIL ================================================== -->
<?php } elseif ($action == 'detail') { ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>templates/admin/css/formstyle.css"/>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail. Lowongan</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>ID job</strong></td>
                <td>: <strong><?php echo $job->job_id;?></strong></td>
            </tr>
            <tr>
                <td width="90">Posisi Lowongan</td>
                <td>: <?php echo $job->job_name;?></td>
            </tr>
            <tr class="awal">
                <td>Deskripsi</td>
                <td>:</td>
            </tr>
            <tr>
                <td colspan="2" ><textarea rows="20" cols="60" id="job_description" name="job_description" ><?php echo $job->job_description;?></textarea><?php echo $ckeditor;?></td>
            </tr>
        <?php if ($job->job_images){?>
            <tr class="awal">
                <td>images</td>
                <td>: <img src="<?php echo base_url()."assets/images/job/kecil_".$job->job_images;?>" width="200"/></td>
            </tr>  
        <?php } else { ?>
            <tr class="awal">
                <td>images</td>
                <td>: Tidak Ada images</td>
            </tr>  
        <?php } ?>
        </table>
     </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
</div>
<?php } ?>
<!-- ================================================== END DETAIL ================================================== -->
<!-- Include More Js For This Content -->  
<!-- For Validation -->
<script type="text/javascript" src="<?php echo base_url();?>templates/admin/js/jquery.parsley/parsley.js"></script>