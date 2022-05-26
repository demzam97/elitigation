<?php
$village=$_GET['qq'];
$qryFrm = $this->db->query("select * from sc_tbl_master_village where GewogID ='$village'");
$fields = $qryFrm->result();
?>
<select class="form-control" style="width:40%" name="village">
<option selected value="">Select One</option>
<?php foreach($fields as $ind=>$fld): ?>
<option value="<?php echo $fld->VillageID; ?>"><?php echo $fld->Name; ?></option>
<?php endforeach; ?>           
</select>