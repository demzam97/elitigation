<div class="content">
<?php if ($this->session->flashdata('asset_class')): ?>
 <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span></div>
 <?php endif; ?>
 <?php if ($this->session->flashdata('save')): ?>
<div class="msg <?php echo $this->session->flashdata('save') ?>"> <span><?php echo $this->session->flashdata('save_msg') ?></span></div>
 <?php endif; ?>
 <?php if ($this->session->flashdata('update')): ?>
<div class="msg <?php echo $this->session->flashdata('update') ?>"> <span><?php echo $this->session->flashdata('update_msg') ?></span></div>
  <?php endif; ?>
 <b><div class="panel-heading no-collapse">Court Profile</div></b>
<table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="7%">sl.No.</th>
                  <th>Dzongkhag</th>
                  <th>Dungkhag</th>
                  <th>Court</th>
                  <th>Name</th>
                  <th>Court Abbreviation</th>                 
                  <th width="15%">Action</th>
                              
                </tr>
              </thead>
              <tbody>
              <tr>
                 <?php
 $i = 0 + $this->uri->segment(4);
 foreach ($court_profile as $row){
 $i++;
 echo "<tr>";
 echo    "<td width=5%>$i</td>";
 echo    "<td>".$this->admin->get_Dzongkhag($row->dzongkhag_id)."</td>";
 if($row->dungkhag_id==0){
 echo "<td></td>";
 } else {
 echo    "<td>".$this->admin->get_Dungkhag($row->dungkhag_id)."</td>";
 }
 echo    "<td>".$this->admin->get_court_type($row->courttype_id)."</td>";
 echo    "<td>$row->court_name</td>";
  echo    "<td>$row->court_type_description</td>";
 echo    "<td>";
 ?>
 <a href="<?php echo site_url('admin/court_profile/edit')?>?id=<?php echo $row->id; ?>"i class="fa fa-pencil"> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="<?php echo site_url('admin/court_profile/delete')?>?id=<?php echo $row->id; ?>" class="fa fa-trash-o" onclick="return confirm('Are you sure to Delete this ?');"> Delete</a>
 <?php
 echo "</td>";
 echo  "</tr>";
 }
 ?>
 </tr>
  </tbody>
 </table>
<?php echo $this->pagination->create_links() ?>

<a href="<?php echo site_url('admin/court_profile/add_new');?>" class="btn btn-primary pull-right">Add New</a>
