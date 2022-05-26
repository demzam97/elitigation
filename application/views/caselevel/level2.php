
<script type="text/javascript" charset="utf-8">
$(document).ready(function () {
	 $('#level2').change(function(){
        $.ajax({
            url: "index.php/registration/getFilter3",
            type: "post",
            data: {r: $(this).find("option:selected").val()},
			dataType: "html",
            success: function(data){
                //adds the echoed response to our container
                $("#clevel3").html(data);
            }
        });
    });
	
});

		</script>
<?php
$q=$_POST['q'];
$qryFrm1 = $this->db->query("select * from sc_tbl_casetypelevel2 where caseTypelevel1_id ='$q' and status = '1' ORDER BY caseTypeleve2 ASC");
$fields1 = $qryFrm1->result();
?>
<label>Case Level 2 </label><select name="level2" id="level2" class="levels">
<option value="0" disabled="disabled" selected="selected" >Select One</option>
<?php
foreach($fields1 as $ind=>$fld1)
{
	?>
    
   <option value="<?php echo $fld1->id;?>"> <?php echo $fld1->caseTypeleve2;?></option>
    <?php
}
?>
</select>