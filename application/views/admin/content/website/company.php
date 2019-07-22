<!-- ================================================== VIEW ================================================== -->
<?php if ($action == 'view' || empty($action)){ ?>
<!-- Breadcrumb -->
<div class="page-head">
    <h3>Perusahaan</h3>
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
                                <a class="btn btn-primary" href="<?php echo site_url();?>adminkarir/company/tambah"><i class="fa fa-plus-circle"></i> Tambah Perusahaan</a>
                            </div>  
                            <div class='pull-right'>
                                <a class="btn btn-primary" href="<?php echo site_url();?>adminkarir/company"><i class="fa fa-times-circle"></i> Bersihkan Pencarian</a>
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
                                    <th width="48%">NAMA PERUSAHAAN</th>
                                    <th width="20%">BIDANG</th>
                                    <th width="20%">ALAMAT</th>
                                    <th width="10%">AKSI</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php   
                                $i  = $page+1;
                                $like_company[$cari] = $q;
                            if ($jml_data > 0){
                                foreach ($this->ADM->grid_all_company('*', 'company_created', 'DESC', $batas, $page, '', $like_company) as $row){
                            ?>
                                <tr>
                                    <td align="center"><?php echo $i;?></td>
                                    <td><?php echo $row->company_name;?></td>
                                    <td><?php echo $row->company_field;?></td>
                                    <td><?php echo $row->company_address;?></td>
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
                                                    <a href="<?php echo site_url();?>adminkarir/company/edit/<?php echo $row->company_id; ?>" title="Edit"><i class='fa fa-pencil'></i> Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" data-id="<?php echo $row->company_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" title="Hapus <?php echo $row->company_name; ?>"><i class='fa fa-trash-o'></i> Hapus</a>
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
                                <?php if ($jml_halaman > 1) { echo pages($halaman, $jml_halaman, 'adminkarir/company/view', $id=""); }?>
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
                <a href="javascript:;" class="btn btn-danger" id="hapus-company">Ya</a>
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
        <li><a href="<?php echo base_url();?>adminkarir/company"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>adminkarir/company/tambah" method="post" enctype="multipart/form-data"  parsley-validate novalidate>
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y"> 
                                    <tr>
                                        <td width="130">
                                            <label for="company_name" class="control-label">Nama <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="company_name" type="text" id="company_name" required class="form-control input-sm" value="<?php echo $company_name;?>" size="80"  placeholder="Masukan Nama Perusahaan"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_field" class="control-label">Bidang</label>
                                        </td>
                                        <td>
                                            <input name="company_field" type="text" id="company_field" required class="form-control input-sm" value="<?php echo $company_field;?>" size="80"  placeholder="Masukan Bidang Perusahaan"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_description" class="control-label">Deskripsi</label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" rows="20" cols="20" id="company_description" name="company_description" >
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="company_logo" class="control-label">Logo </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control input-sm btn-sm" name="company_logo" id="company_logo"  />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_year" class="control-label">Tahun</label>
                                        </td>
                                        <td>
                                            <input name="company_year" type="text" id="company_year" required class="form-control input-sm" value="<?php echo $company_year;?>" size="80"  placeholder="Masukan Tahun Perusahaan"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_address" class="control-label">Alamat</label>
                                        </td>
                                        <td>
                                            <input name="company_address" type="text" id="company_address" required class="form-control input-sm" value="<?php echo $company_address;?>" size="80"  placeholder="Masukan Alamat Perusahaan"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_contact" class="control-label">Kontak</label>
                                        </td>
                                        <td>
                                            <input name="company_contact" type="text" id="company_contact" required class="form-control input-sm" value="<?php echo $company_contact;?>" size="80"  placeholder="Masukan Kontak"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_web" class="control-label">Website</label>
                                        </td>
                                        <td>
                                            <input name="company_web" type="text" id="company_web" required class="form-control input-sm" value="<?php echo $company_web;?>" size="80"  placeholder="Masukan Website"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>adminkarir/company'"/>
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
        <li><a href="<?php echo base_url();?>adminkarir/company"><?php echo $breadcrumb; ?></a></li>
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
                    <form role="form" class="form-horizontal" action="<?php echo site_url();?>adminkarir/company/edit/<?php echo $company_id; ?>" method="post" enctype="multipart/form-data" parsley-validate novalidate>
                        <input type="hidden" name="company_id" value="<?php echo $company_id;?>" />
                        <div class="table-responsive">
                            <table class="table no-border hover">
                                <tbody class="no-border-y">  
                                    <tr>
                                        <td width="130">
                                            <label for="company_name" class="control-label">Nama <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="company_name" type="text" id="company_name" required class="form-control input-sm"  value="<?php echo $company_name;?>" size="80" placeholder="Masukan Nama Perusahaan" />
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td width="130">
                                            <label for="company_field" class="control-label">Bidang <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <input name="company_field" type="text" id="company_field" required class="form-control input-sm"  value="<?php echo $company_field;?>" size="80" placeholder="Masukan Nama Perusahaan" />
                                        </td>
                                    </tr>  
                                    <tr>
                                        <td width="130">
                                            <label for="company_description" class="control-label">Deskripsi <span class="required">*</span></label>
                                        </td>
                                        <td>
                                            <textarea rows="20" cols="20" id="company_description" name="company_description" >
                                                <?php echo $company_description;?>
                                            </textarea>
                                            <?php echo $ckeditor;?>
                                        </td>
                                    </tr>
                                <?php if ($company_logo){?>
                                    <tr>
                                        <td>
                                            <label for="company_logo" class="control-label">Logo</label>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url()."assets/images/company/kecil_".$company_logo;?>" width="220"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="company_logo" class="control-label">Edit Logo</label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control input-sm btn-sm" name="company_logo"  id="company_logo" />
                                        </td>
                                    </tr>
                                <?php } else {?>
                                    <tr>
                                        <td>
                                            <label for="company_logo" class="control-label">Logo </label>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control input-sm btn-sm" name="company_logo" id="company_logo"  />
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                        <td width="130">
                                            <label for="company_year" class="control-label">Tahun</label>
                                        </td>
                                        <td>
                                            <input name="company_year" type="text" id="company_year" required class="form-control input-sm" value="<?php echo $company_year;?>" size="80"  placeholder="Masukan Tahun Perusahaan"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_address" class="control-label">Alamat</label>
                                        </td>
                                        <td>
                                            <input name="company_address" type="text" id="company_address" required class="form-control input-sm" value="<?php echo $company_address;?>" size="80"  placeholder="Masukan Alamat Perusahaan"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_contact" class="control-label">Kontak</label>
                                        </td>
                                        <td>
                                            <input name="company_contact" type="text" id="company_contact" required class="form-control input-sm" value="<?php echo $company_contact;?>" size="80"  placeholder="Masukan Kontak"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="130">
                                            <label for="company_web" class="control-label">Website</label>
                                        </td>
                                        <td>
                                            <input name="company_web" type="text" id="company_web" required class="form-control input-sm" value="<?php echo $company_web;?>" size="80"  placeholder="Masukan Website"/>
                                        </td>
                                </tbody>
                            </table>
                        </div>
                        <div class='center'>
                            <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Data">
                            <input class="btn btn-default" type="reset" name="batal" value="Batalkan" onclick="location.href='<?php echo site_url(); ?>adminkarir/company'"/>
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
    <h4 class="modal-title">Detail. Perusahaan</h4>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="form_detail">
            <tr class="awal">
                <td><strong>ID company</strong></td>
                <td>: <strong><?php echo $company->company_id;?></strong></td>
            </tr>
            <tr>
                <td width="90">Nama Perusahaan</td>
                <td>: <?php echo $company->company_name;?></td>
            </tr>
            <tr class="awal">
                <td>Deskripsi</td>
                <td>:</td>
            </tr>
            <tr>
                <td colspan="2" ><textarea rows="20" cols="60" id="company_description" name="company_description" ><?php echo $company->company_description;?></textarea><?php echo $ckeditor;?></td>
            </tr>
        <?php if ($company->company_logo){?>
            <tr class="awal">
                <td>Logo</td>
                <td>: <img src="<?php echo base_url()."assets/images/company/kecil_".$company->company_logo;?>" width="200"/></td>
            </tr>  
        <?php } else { ?>
            <tr class="awal">
                <td>Logo</td>
                <td>: Tidak Ada Logo</td>
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