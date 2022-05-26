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
 <b><div class="panel-heading no-collapse">Case Type Level 3</div></b>
<table class="table table-bordered table-striped">
<tr>
 <th width="7%">No</th>
 <th>Case Type Level 2</th>
 <th>Name</th>
 <th>Description</th>
<th>status</th>
 <th width="15%">Action</th>
 </tr>
 <?php
 $i = 0 + $this->uri->segment(4);
 foreach ($case_type_3 as $row){
 $i++;
 echo "<tr>";
 echo    "<td width=5%>$i</td>";
 echo    "<td>".$this->admin->get_casel2($row->caseTypelevel2_id)."</td>";
 echo    "<td>$row->caseTypelevel3</td>";
 echo    "<td>$row->caseTypelevel3_description</td>";
?>
<td>
 <form action="<?php echo site_url('admin/case_type_3/activeinactive'); ?>" method="post">
 <input type="hidden" name="id" value="<?php echo $row->id;?>" />
 <input type="radio" name="activeinactive" value="1" onclick="submit();" <?php if($row->status == '1') { ?> checked <?php } ?> />&nbsp;<font color="green"><b>Active</b></font>
 &nbsp;&nbsp;&nbsp; 
 <input type="radio" name="activeinactive" value="0" onclick="submit();" <?php if($row->status == '0') { ?> checked <?php } ?>/>&nbsp;<font color="red"><b>Inactive</b></font>
 </form>
 </td>
 <?php
 echo    "<td>";
 ?>
 <a href="<?php echo site_url('admin/case_type_3/edit')?>?id=<?php echo $row->id; ?>"i class="fa fa-pencil"> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="<?php echo site_url('admin/case_type_3/delete')?>?id=<?php echo $row->id; ?>" class="fa fa-trash-o" onclick="return confirm('Are you sure to Delete this ?');"> Delete</a>
 <?php
 echo "</td>";
 
 echo  "</tr>";
 }
 ?>
</table>  
<?php echo $this->pagination->create_links() ?>

<a href="<?php echo site_url('admin/case_type_3/add_new');?>" class="btn btn-primary pull-right">Add New</a>
