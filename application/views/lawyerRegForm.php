<?php
$this->db->select('*');
$this->db->from('sc_tbl_temp_lawyer_link');
$this->db->where('created_by', $this->session->userdata('user_id'));
 $query = $this->db->get();
 $ans=$query->result();
if(empty($ans))
{
	echo "<span style='color:#f00'> No Lawyer Assigned!</span>";
}
else
{  
$i=0;
	foreach($ans as $an)
	{
		$check=$this->public->checkLit($an->Lit_id);
	    
				if($i==0)
				{
					
				 ?>
				 
				 <table  class="table table-bordered table-striped" style="margin-bottom:-1px !important;">
				<tr>
				 <td style="width:40%;">
				<strong>Litigant Name </strong>
				  </td >
				  <td style="width:40%;">
				 <strong> Assigned Lawyer</strong>
				  </td>
					  <td style="width:20%;">
				 <strong> Option</strong>
				  </td>
				  </tr>
				  </table>
				 
				 <?php
				}
		  if($check=='no')
		  {
	   ?>
        <table  class="table table-bordered" style="margin-bottom:-1px !important;">
        <tr>
         <td style="width:40%;">
		  <input type="hidden" name="lawlit[]"  value="<?php echo $an->Lit_id;?>">
		   <?php echo $this->public->get_ApplicantName($an->Lit_id); ?>
          </td >
          <td style="width:40%;">
           <input type="hidden" name="lawTemp[]"  value="<?php echo $an->Lawyer_id;?>">
		      <?php echo $this->public->get_LawyerName($an->Lawyer_id); ?>
          </td>
          <td style="width:20%;">
           <a href="#" id="<?php echo $an->id;?>" class="delTemLaw">Remove</a>
          </td>
          </tr>
          </table>
          
          
	   <?php
		  }
		  else
		  {
			   ?>
		  <table  class="table table-bordered" style="margin-bottom:-1px !important;">
        <tr>
         <td style="width:40%;">
		  <input type="hidden" name="lawlit[]"  value="<?php echo $an->Lit_id;?>">
		    <?php echo $this->public->get_OrgName($an->Lit_id); ?>
          </td>
          <td style="width:40%;">
           <input type="hidden" name="lawTemp[]"  value="<?php echo $an->Lawyer_id;?>">
		   <?php echo $this->public->get_LawyerName($an->Lawyer_id); ?>
          </td>
            <td style="width:20%;">
           <a href="#" id="<?php echo $an->id;?>" class="delTemLaw">Remove</a>
          </td>
          </tr>
          </table>
	   <?php
		  }
		  $i++;
	}
        
}
?>

