
 <strong>Lawyer View</strong><img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="closeVLaw();">
 <hr />
<?php
$t=$_POST['l_id'];
$qryFrm6 = $this->db->query("select * from sc_tbl_lawyer where id ='$t'");
$fields6 = $qryFrm6->result();
?>

<?php
foreach($fields6 as $ind=>$fld6)
{
	?>
   
   <table class="table table-bordered table-striped">
      <tr>
         <td>
           Name :
         </td>
         <td>
         <?php echo $fld6->L_Name; ?>
         </td>
         <td>
           CID :
         </td>
         <td>
         <?php echo $fld6->CID; ?>
         </td>
      </tr>
       <tr>
         <td>
           Qualification :
         </td>
         <td>
         <?php echo $fld6->Qualification; ?>
         </td>
         <td>
           Phone :
         </td>
         <td>
         <?php echo $fld6->Phone." |  ".$fld6->Mobile; ?>
         </td>
      </tr>
      <tr>
         <td>
           Firm Name :
         </td>
         <td>
         <?php echo $fld6->Firm; ?>
         </td>
         <td>
           Firm Address :
         </td>
         <td>
         <?php echo $fld6->Address; ?>
         </td>
      </tr>
   
   </table>
    <?php
}
?>
