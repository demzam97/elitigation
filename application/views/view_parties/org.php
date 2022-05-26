<div class="content">
<!--Breadcrumb-->
   <div class="header">
    <h1 class="page-title">Party Details</h1>
    <ul class="breadcrumb">
      <li class="active">Applicant Detail</li>
        </ul>
   </div>
<!--End Breadcrumb-->
<div class="main-content"> 
<table style="width:100%;" cellspacing="10px" class="table table-bordered table-striped">
<?php foreach($details as $dt) { ?>
<tr>
<td><b>Organization Name:</b></td><td><?php echo $dt->org_name;?></td>
<td><b>Organization Type:</b></td>
<td><?php $ot = $dt->org_type;
      if($ot == '1'){ echo "Government Agency"; }
      if($ot == '2'){ echo "Private Company"; }
      if($ot == '3'){ echo "International Company"; }
      if($ot == '4'){ echo "Corporation"; }
      if($ot == '5'){ echo "Civil Society Organization"; }
?></td>
<td><b>License No / Registration No:</b></td><td><?php echo $dt->licenseno;?></td>
</tr>
<tr>
<td><b>P.O. Box:</b></td><td><?php echo $dt->po_box;?></td>
<td><b>Office Phone:</b></td><td><?php echo $dt->phone;?></td>
<td><b>Office Fax:</b></td><td><?php echo $dt->fax;?></td>
</tr>
<tr>
<td><b>Contact Person:</b></td><td><?php echo $dt->contact_person;?></td>
<td><b>Contact Person's Mobile No:</b></td><td><?php echo $dt->contactperson_mobile;?></td>
<td><b>Contact Person's Email ID:</b></td><td><?php echo $dt->contactperson_email;?></td>
</tr>
<tr>
<td><b>Office Address:</b></td><td><?php echo $dt->office_address;?></td>
<td><b>Contact Person's CID:</b><?php echo $dt->cid;?></td>
<td></td><td></td><td></td>
</tr>
<?php } ?>
</table>
      <hr>
 </div>


 