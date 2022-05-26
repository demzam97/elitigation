
<?php
$gewog=$_GET['q'];
$qryFrm1 = $this->db->query("select * from sc_tbl_master_gewog where DzongkhagID ='$gewog'");
$fields1 = $qryFrm1->result();
?>
<select class="form-control" style="width:40%" name="gewog" onChange="get_Village(this.value)">
<option selected value="">Select One</option>
<?php foreach($fields1 as $ind=>$fld1): ?>
<option value="<?php echo $fld1->GewogID; ?>"><?php echo $fld1->Name; ?></option>
<?php endforeach; ?>           
</select>