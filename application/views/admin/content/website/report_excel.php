<table width="100%" border="1px">
                            <thead class="primary-emphasis" >
                                <tr>
        	                        <th width="30">#</th>
                                    <th>PENCARI KERJA</th>
                                    <th>LOWONGAN</th>
                                    <th>PERUSAHAAN</th>
                                    <th>TANGGAL APPLY</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php

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
                                    <td><?php echo $row->job_name;?></td>
                                    <td><?php echo $row->company_name;?></td>
                                    <td><?php echo dateIndo1($row->apply_created);?></td>
						  			<td><span class="label label-<?php echo $btn; ?>"><?php echo $row->apply_status; ?></span></td>
                                   
                                </tr>
                                <?php } ?> 
                                <tr>
                                	<?php if(!empty($sampai)) { ?>
                                    <td colspan="6">Dari tanggal <b><?php echo dateIndo($dari); ?></b> sampai tanggal <b><?php echo dateIndo($sampai); ?></b>
                                    <?php } else { ?>
                                    <td colspan="6">Belum ada data dicari</b>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>