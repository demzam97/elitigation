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
 <b><div class="panel-heading no-collapse">Case Type</div></b>
<table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>sl.No.</th>
                  <th>Name</th>
                  <th>Description</th>                 
                  <th>Action</th>
                              
                </tr>
              </thead>
              <tbody>
              <tr>
                 <?php
 $i = 0 + $this->uri->segment(4);
 foreach ($case_type as $row){
 $i++;
 echo "<tr>";
 echo    "<td width=5%>$i</td>";
 echo    "<td>$row->caseType</td>";
  echo    "<td>$row->caseType_Description</td>";
 echo    "<td>";
 ?>
 <a href="<?php echo site_url('admin/case_type/edit')?>?id=<?php echo $row->id; ?>"i class="fa fa-pencil"> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="<?php echo site_url('admin/case_type/delete')?>?id=<?php echo $row->id; ?>" class="fa fa-trash-o" onclick="return confirm('Are you sure to Delete this ?');"> Delete</a>
 <?php
 echo "</td>";
 echo  "</tr>";
 }
 ?>
 </tr>
  </tbody>
 </table>
 <div style="width:88%; margin-left:6%">
<?php echo $this->pagination->create_links() ?>
</div>
<div align="right" style="width:88%; margin-left:6%;">
<a href="<?php echo site_url('admin/case_type/add_new');?>">
<input type="button" value="Add New" style="width:90px; height:30px;" /></a>
</div> 
</div>
