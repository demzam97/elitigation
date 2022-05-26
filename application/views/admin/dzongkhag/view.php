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
<b><div class="panel-heading no-collapse">Dzongkhag</div></b>
<table class="table table-bordered table-striped">
<tr>
 <th width="7%">No</th>
 <th>Name</th>
 <th width="15%">Action</th>
 </tr>
 <?php
 $i = 0 + $this->uri->segment(4);
 foreach ($dzongkhag as $row){
 $i++;
 echo "<tr>";
 echo    "<td width=5%>$i</td>";
 echo    "<td>$row->Name</td>";
echo    "<td>";
 ?>
 <a href="<?php echo site_url('admin/dzongkhag/edit')?>?id=<?php echo $row->DzongkhagID; ?>"i class="fa fa-pencil"> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="<?php echo site_url('admin/dzongkhag/delete')?>?id=<?php echo $row->DzongkhagID; ?>" class="fa fa-trash-o" onclick="return confirm('Are you sure to Delete this ?');"> Delete</a>
 <?php
 echo "</td>";
 
 echo  "</tr>";
 }
 ?>
</table>  

<?php echo $this->pagination->create_links() ?>


<a href="<?php echo site_url('admin/dzongkhag/add_new');?>" class="btn btn-primary pull-right">Add New</a>
 
