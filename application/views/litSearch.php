<?php
if($this->public->searchLitCount($g)==0)
{
	echo "Litigant Not Found - <a href='".site_url('registration/add_litigant')."' target='new' ><input type='button' value='Add' onClick='' class='css_btn_class'></a>";
}
else
{
	 $case=$this->public->searchLit($g);
	 foreach($case as $row)
	 {?>
	<form action="<?php echo site_url('registration/addLitCase'); ?>" method="post">
        <input type="hidden" name="caseID" value="<?php echo $case_id ; ?>"/>
         <input type="hidden" name="LitID" value="<?php echo $row->id ; ?>"/>
         <input type="hidden" name="reject"value="<?php echo $val; ?>" />
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
           <input type="submit" value="Add" class="btn btn-primary pull-right" style="margin-left:20px;" id="btn_add" /> 
           </td>
           </tr>
           </table>           
      </form>
      <br>
	 <?php
     }
}

?>

<script type="text/javascript">
$('document').ready(function(){
	
$("#btn_add").click(function(){
      if($('#litType').val() == "" ){
        alert("Type cannot be empty!!!");
	$('#litType').focus();
	return false;
	}
        return true;
    });

			
});
</script>