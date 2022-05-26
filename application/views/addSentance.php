<link href="<?php echo base_url();?>BeatPicker/css/BeatPicker.min.css" rel="stylesheet">
<?php
$n=$_POST['n'];
$case_id=$_POST['case_id'];

$sentences=$this->public->get_sentence_type();

?>

  
   <div id="sentence_ADD">
       <?php $n=$n+1; ?>
    <div id="one<?php echo $n;?>" style=" padding:10px; border:1px solid #F90; margin-bottom:10px">
    <table class="table table-bordered table-striped" style="border:1px solid #F90;">
        <tr>
        	<td width="15%"><strong>Sentence Type:</strong></td>
        	<td>
            <select class="form-control" style="width:40%;" name="sentence_type[]" onchange="SentenceType<?php echo $n;?>(this.value)">
            <option value="0" selected>Select One</option>
            <?php foreach($sentences as $sent):?>
            <option value="<?php echo $sent->id; ?>"><?php echo $sent->sentence_type; ?></option>
            <?php endforeach ?>
            </select>
            </td>
        </tr>
      </table> 
       
     <table class="table table-bordered table-striped" >
     <tr>
     <td>
     <strong>Select Litigant for sentance :</strong>
     </td>
     <td>
     <?php
	   $Lits=$this->public->getAllCaseLitigant($case_id); 
	   if(empty($Lits))
           {
               echo "<tr> <td>No Litigant Added!</td></tr>";
           }
           else
           {?>
           
           <select name="litagent[]" class="form-control" style="width:400px;">
           <?php
                   foreach($Lits as $lit)
                   {
					   if($this->public->checkLit($lit->litigant)=='yes')
								  {
									  
									  		   	
										 echo "<option value='".$lit->id."'>";
										 echo $this->public->get_OrgName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span>";
										 echo "</option>";
									  
								  }
								  else
								  {
									  
									  		   	
										echo "<option value='".$lit->litigant."'>";
										 echo $this->public->get_LitigantName($lit->litigant)."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;<span style='color:#666; font-size:10px;'>".$this->public->get_LitigantType($lit->litigant_type)."</span>";
										  echo "</option>";
									  
								  }
								  
                   }
           }
	 ?>
     </select>
     </td>
     </tr>
     </table>

    
     <div id="sentence_one<?php echo $n;?>" style="display:none;"> 

      <table class="table table-bordered table-striped">   
      <tr>
        	<td width="15%"><strong>Year:</strong></td>
        	<td>
            <select name="year[]" id="year" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($j=1;$j<=100; $j++) { ?>
            <option><?php echo $j; ?></option>
            <?php } ?>
            </select>
            </td> 
        	<td width="15%"><strong>Month:</strong></td>
        	<td>
            <select name="month[]" id="month" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($k=1;$k<=100; $k++) { ?>
            <option><?php echo $k; ?></option>
            <?php } ?>
            </select>
            </td>
      </tr> 
      
      <tr>
        	<td width="15%"><strong>Day:</strong></td>
        	<td>
            <select name="day[]" id="day" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($l=1;$l<=100; $l++) { ?>
            <option><?php echo $l; ?></option>
            <?php } ?>
            </select>
            </td>
        	<td ><strong>Sentence Start Date:</strong></td>
        	<td>
            <input type="text"  name="start_date[]"  placeholder="yyyy-mm-dd"  data-beatpicker="true" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
            </td>
        </tr>
        
        <tr>
        	<td width="15%"><strong>Release Date:</strong></td>
        	<td>
            <input type="text" name="release_date[]"  placeholder="yyyy-mm-dd"  data-beatpicker="true" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
            </td>
        </tr>
        
    </table>
    </div>
    
       
     <div id="sentence_two<?php echo $n;?>" style="display:none;">  
      <table class="table table-bordered table-striped">   
      <tr>
        	<td width="15%"><strong>Amount:</strong></td>
        	<td>
            <input type="text" name="amount[]" class="form-control" style="width:40%">
            </td> 
      </tr> 
      <tr>
        	<td width="15%"><strong>Receipt No:</strong></td>
        	<td>
            <input type="text" name="receipt_no[]" class="form-control" style="width:40%">
            </td>
      </tr> 
        
    </table>
    
    </div>
    <script>
function SentenceType<?php echo $n;?>( id )
    {
        if(id==6){
			
			$( "ul.level-2" ).children().css( "background-color", "red" );
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="block";
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="none";
		}
		if(id==7){
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="block";
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="none";
		}
		if(id==10){
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="block";
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="none";
		}
		if(id==9){
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="block";
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="none";
		}
		if(id==8){
		document.getElementById( 'sentence_one<?php echo $n;?>' ).style.display ="none";
		document.getElementById( 'sentence_two<?php echo $n;?>' ).style.display ="none";
		}
		
    }
    </script>
 </div>   
 </div>
  <input type="button" style="float:right;" value="Add" id="addSentance<?php echo $n;?>"  class="btn btn-default pull-right" />
 <div id="addSent<?php echo $n;?>">

</div>


<script src="<?php echo base_url();?>BeatPicker/js/BeatPicker.min.js"></script>

<script>
$(document).ready(function(e) {
    if(<?php echo $n?>==2)
	{
		$('#addSentance').css('display','none');
	}
	else
	{
		$('#addSentance<?php echo $n-1?>').css('display','none');
	}
		$('#addSentance<?php echo $n;?>').click(function(e) {
			
			$.ajax({
					type: "POST",
					url : "<?php echo site_url('registration/addSentDetail');?>",
					data: {"n":<?php echo $n;?>,
					"case_id":<?php echo $case_id;?>},
					dataType : 'html',
					success: function(msg){	
								$('#addSent<?php echo $n;?>').html(msg);										
						}
				 });
					
		
		});
});
</script>