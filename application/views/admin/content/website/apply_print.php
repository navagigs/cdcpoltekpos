  <script> window.print();
</script>
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
                        <td>
                         <table class="table">
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