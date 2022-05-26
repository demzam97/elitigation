<?php
		$g=$_POST['g'];
		$case_id=$_POST['case_id'];
		$s_check=$_POST['s_check'];
	

	 if($s_check=='ind')
	 {
			  $case=$this->public->searchLit($g);
			  if(!empty($case))
			  {
					 foreach($case as $row)
					 {?>
						<form action="<?php echo site_url('registration/addLitCaseAssignReview'); ?>" method="post">
						<input type="hidden" name="caseID" value="<?php echo $case_id ; ?>"/>
						 <input type="hidden" name="LitID" value="<?php echo $row->id ; ?>"/>
						  <table class='table table-bordered table-striped'>
						 <tr><td>Name:</td><td><?php echo $row->litigant_name; ?></td></tr>
						 <tr><td>CID:</td><td><?php echo $row->litigant_CID; ?></td></tr>
						 <tr><td>Type:</td><td>
						 <select name="litType" id="litType">
						 <option value="" selected disabled> Select One </option>
						 <?php 
						   foreach($lityps as $lit)
						   {?>
							 <option value="<?php echo $lit->id; ?>"><?php echo $lit->litigant_type;?></option>
						   <?php
						   }?>
						   </select>
						   <input type="submit" id ='submitForm' value="Add" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
						   </td>
						   </tr>
						   </table>           
					  </form>
					  <br>
					 <?php
					 }
			  }
			  else
			  {
				  echo "Litigant Not Found - <a href='".site_url('registration/add_litigant')."' target='new' ><input type='button' value='Add' onClick='' class='css_btn_class'></a>";
			  }
			 
	 }
	 if($s_check=='org')
	 {
			 $case=$this->public->searchOrg($g);
			  if(!empty($case))
			  {
			 foreach($case as $row)
			 {?>
				<form action="<?php echo site_url('registration/addLitCaseAssignReview'); ?>" method="post">
				<input type="hidden" name="caseID" value="<?php echo $case_id ; ?>"/>
				 <input type="hidden" name="LitID" value="<?php echo $row->id ; ?>"/>
				  <table class='table table-bordered table-striped'>
				 <tr><td>Name:</td><td><?php echo $row->Organization_Name; ?></td></tr>
				 <tr><td>CID:</td><td><?php echo $row->license_id; ?></td></tr>
				 <tr><td>Type:</td><td>
				 <select name="litType" id="litType">
				 <option value="" selected disabled> Select One </option>
				 <?php 
				   foreach($lityps as $lit)
				   {?>
					 <option value="<?php echo $lit->id; ?>"><?php echo $lit->litigant_type;?></option>
				   <?php
				   }?>
				   </select>
				   <input type="submit" id ='submitForm' value="Add" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
				   </td>
				   </tr>
				   </table>           
			  </form>
			  <br>
			 <?php
			 }
		}
		else
		{
			 echo "Litigant Not Found - <a href='".site_url('registration/add_litigant')."' target='new' ><input type='button' value='Add' onClick='' class='css_btn_class'></a>";
		}
	 }

?>

<script>
$('#submitForm').click(function(e){
	if($('#litType').val()=='')
	{
		alert('select Litigant Type!');
		return false;
	}
	else
	{
		return true;
	}
	
});
</script>