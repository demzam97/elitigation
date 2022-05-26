<?php
$r=$_POST['r'];
$qryFrm1 = $this->db->query("select * from sc_tbl_casetypelevel3 where caseTypelevel2_id ='$r' and status = '1' ORDER BY caseTypelevel3 ASC");
$fields1 = $qryFrm1->result();
?>
<label>Case Level 3 </label><select name="level3" id="level3" class="levels">
<option value="0" disabled="disabled" selected="selected">Select One</option>

<?php
foreach($fields1 as $ind=>$fld1)
{
	?>
    
   <option value="<?php echo $fld1->id;?>"> <?php echo $fld1->caseTypelevel3;?></option>
    <?php
}
?>
</select>



<script type="text/javascript">
  $(function() {
    $('#other').hide(); 
    $('#level3').change(function(){
        if($('#level3').val() == '400') {
            $('#other').show(); 
        } else {
            $('#other').hide(); 
        } 
    });
});
</script>