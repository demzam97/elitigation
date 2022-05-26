 <strong>Assign Lawyer</strong><img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="hideLawyer();">
 <hr />
<form method="post" id="addLaw">
   <?php
   $lits=array();
   $lits= $this->public->get_temp_litigantID();
   ?>

   <table class="blank_tbl">
     <tr>
       <td><label>Select Litigant: </label></td>
       <td><select name="litig" id="litig" class="input-xlarge form-control" style="width:100%;">
       <option value="" disabled="disabled" selected="selected">Select One</option>
   <?php
   foreach($lits as $lit)
   {
	  $check=$this->public->checkLit($lit->litigant);
	  if($check=='no')
	  {
   ?>
      <option value="<?php echo $lit->litigant;?>"><?php echo $this->public->get_ApplicantName($lit->litigant)." &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;".$this->public->get_litigant_type_name($lit->litigant_type); ?></option>
   <?php
	  }
	  else
	  {
		   ?>
      <option value="<?php echo $lit->litigant;?>"><?php echo $this->public->get_OrgName($lit->litigant)." &nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;".$this->public->get_litigant_type_name($lit->litigant_type); ?></option>
   <?php
	  }
   }
   ?>
  </select>
    <span id="litMsg" style="color:#F00; font-size:12px; display:none;">Please select a Litgant</span>
  </td>
  </tr>
  
     <tr>
       <td colspan="2">
         <input type="text" name="LawName" class="form-control" id="LawName" placeholder="Search Lawyer CID" style="width:70%; margin-right:0px !important; float:left;"/>
         <button class="btn btn-default" type="button" id="Law_search" style="float:left;"><i class="fa fa-search"></i> Go</button><br />
       </td>
     
     </tr>

  <tr>
    <td colspan="2" id="lawForm">
    <br />
      <table class="table table-bordered table-striped">
      <tr>
        <td>  <input type="hidden" name="checker" value="new" />
           <label>Name :<span style="color:#F00;">*</span></label><input type="text" name="lname" class="form-control" required>
        </td>
       
        <td>
         <label>CID : <span style="color:#F00;">*</span></label><input type="text" name="lcid" class="form-control" required>
        </td>
      </tr>
         <tr>
        <td>
        <label>Qualification :</label><input type="text" name="lqul" class="form-control">
        </td>
        <td>
        <label>Phone No <span style="color:#F00;">*</span>:</label><input type="text" name="lph" class="form-control" required>
        </td>
      </tr>
         <tr>
        <td>
        <label>Mobile No :</label><input type="text" name="lmob" class="form-control">
        </td>
        <td>
        <label>Firm Name :</label><input type="text" name="lfname" class="form-control">
        </td>
      </tr>
         <tr>
        <td>
          <label>Firm Address :</label><input type="text" name="lfadd" class="form-control">
        </td>
        <td>
        <input type="submit" value="Assign" class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" class="btn btn-danger"  onclick="hideLawyer();">
        </td>
      </tr>
    </table>



     </td>
        
     </tr>
     </table>
     </form>
     <script>
	 $('#addLaw').submit(function(event)
  {
	event.preventDefault();
	var check=  $('#litig').val();
	if(check=='' || check==null)
	{
		$('#litMsg').css('display','block');
		return false;
	}
	else
	{
	var lawyer_data=$('#addLaw').serialize();
        $.ajax({
            url: "index.php/registration/assignLitLawyer",
            type: "post",
            data: lawyer_data,
			dataType: "html",
            success: function(data){
                //adds the echoed response to our container
				$('#lawBox').css('display', 'none');
                $("#showLawyer").html(data);
            }
        });
	}
    });
	
	 $('#Law_search').click(function()
	 {
	 	var val = $('#LawName').val();
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/search_lawyer_info');?>",
			data: {"value":val
				  },
			dataType : 'html',
			success: function(msg){	
						$('#lawForm').html(msg);	
										
				}
			});
	 
	 });
	 </script>