<?php
$r=$_POST['r'];
$qryFrm1 = $this->db->query("select * from sc_tbl_casetypelevel3 where caseTypelevel2_id ='$r' ORDER BY caseTypelevel3 ASC");
$fields1 = $qryFrm1->result();
?>
<label>Case Level 3 </label><select name="level23" id="level23" class="levels">
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