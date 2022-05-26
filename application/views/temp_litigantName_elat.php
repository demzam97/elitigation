<?php ini_set('memory_limit', '3000M');?>
<table class="table table-bordered table-striped" >
<?php $i=1; foreach($temp_litiID_elat as $tGV){ ?>

<?php if($i==1)
{?>
<tr>
<td><label><strong>Name</strong></label></td>
<td><label><strong>Type</strong> </label></td>
<!-- <td><label><strong>Option</strong></label></td> -->
</tr>

<?php } 
if($this->public->checkLit($tGV->litigant)=='yes')
{?>
	<tr>
	<td width="50%">
    <?php echo $this->public->get_OrgName($tGV->litigant); ?>
    <input type="hidden" name="liti[]" value="<?php echo $this->public->get_OrgName($tGV->litigant); ?>" class="form-control" style="width:80%;" readonly/>
    <input type="hidden" name="litigant[steps][1][]" value="<?php echo $tGV->litigant; ?>" /></td>
    <td width="40%">
    <?php echo $this->public->get_litigant_type_name($tGV->litigant_type); ?>
    <input type="hidden" name="litigant[]" value="<?php echo $this->public->get_litigant_type_name($tGV->litigant_type); ?>" class="form-control" style="width:60%;" readonly />
    <input type="hidden" name="litigant[steps][2][]" value="<?php echo $tGV->litigant_type; ?>" />
	</td>
	<!-- <td width="10%" style="text-align:center;"><?php  echo "<a class=\"delbutton\" id=\"$tGV->id\" href=\"#\"><img src='".base_url('/images/cross.png')."'/></a>"; ?></td>
    -->
    </tr><?php
}
else
{
?>
<tr>
	<td width="50%">
    <?php echo $this->public->get_ApplicantName($tGV->litigant); ?>
    <input type="hidden" name="liti[]" value="<?php echo $this->public->get_ApplicantName($tGV->litigant); ?>" class="form-control" style="width:80%;" readonly/>
    <input type="hidden" name="litigant[steps][1][]" value="<?php echo $tGV->litigant; ?>" /></td>
    <td width="40%">
    <?php echo $this->public->get_litigant_type_name($tGV->litigant_type); ?>
    <input type="hidden" name="litigant[]" value="<?php echo $this->public->get_litigant_type_name($tGV->litigant_type); ?>" class="form-control" style="width:60%;" readonly />
    <input type="hidden" name="litigant[steps][2][]" value="<?php echo $tGV->litigant_type; ?>" />
	</td>
	<!-- <td width="10%" style="text-align:center;"><?php  echo "<a class=\"delbutton\" id=\"$tGV->id\" href=\"#\"><img src='".base_url('images/cross.png')."'/></a>"; ?></td>
-->
</tr>
<?php }
 $i++;} ?>
</table>
