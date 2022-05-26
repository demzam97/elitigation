<?php
$benche=$_GET['q'];
$court=$this->session->userdata('court_id');
$qryFrm1 = $this->db->query("select * from sc_tbl_user_profile where user_type=3 AND bench='$benche' AND court='$court'");
$fields1 = $qryFrm1->result();
?>
<label>Clerk:</label><br />
<select class="form-control" style="width:40%;" name="reg_clerk">
<option value="0">Select Clerk</option>
<?php foreach($fields1 as $ind=>$fld1): ?>
<option value="<?php echo $fld1->id; ?>"><?php echo $fld1->judge_name; ?></option>
<?php endforeach; ?>           
</select>