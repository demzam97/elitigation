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
 <b><div class="panel-heading no-collapse">Gewog</div></b>
<div  class="pull-right"><input  type="text" name="gewog_search" id="gewog_search" class="form-control" placeholder="Type Gewog Name..."/></div><br /><br />
<table class="table table-bordered table-striped">
 <tr>
 <th width="7%">No</th>
 <th>Dzongkhag Name</th>
 <th>Gewog Name</th>
 <th width="15%">Action</th>
 </tr>
<tbody id="main-tbody">
 <?php
 $i = 0 + $this->uri->segment(4);
 foreach ($gewog as $row){
 $i++;
 echo "<tr>";
 echo    "<td>$i</td>";
 echo    "<td>".$this->admin->get_Dzongkhag($row->DzongkhagID)."</td>";
 echo    "<td>".$row->Name."</td>";
 echo    "<td>";
 ?>
 <a href="<?php echo site_url('admin/gewog/edit')?>?id=<?php echo $row->GewogID; ?>"i class="fa fa-pencil"> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="<?php echo site_url('admin/gewog/delete')?>?id=<?php echo $row->GewogID; ?>" class="fa fa-trash-o" onclick="return confirm('Are you sure to Delete this ?');"> Delete</a>
 <?php
 echo "</td>";

 echo  "</tr>";
 }
 ?>
</tbody>
</table> 

<?php echo $this->pagination->create_links() ?>

<a href="<?php echo site_url('admin/gewog/add_new');?>" class="btn btn-primary pull-right">Add New</a>

<script type="text/javascript">
 $('document').ready(function(){
	 $('#all').css('display','none');
	 
	 $('#gewog_search').keyup(function(){
 		//$('.param').css('color','#000');
	 	var val = $(this).val();
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('admin/gewog/search');?>",
			data: {"value":val},
			dataType : 'html',
			success: function(msg){
						//$('#'+val).css('color','#960');
						$('#all').show();
						$('#main-tbody').html(msg);		
						//$('.pagination').css('display', 'none');			
				}
			});
	 });	 	 	 
 });
 </script> 
