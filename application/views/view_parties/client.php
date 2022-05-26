<div class="content">
<!--Breadcrumb-->
   <div class="header">
    <h1 class="page-title">Party Details</h1>
    <ul class="breadcrumb">
      <li class="active">Client Detail</li>
        </ul>
   </div>
<!--End Breadcrumb-->
<div class="main-content"> 
<table style="width:100%;" cellspacing="10px" class="table table-bordered table-striped">
<?php foreach($details as $dt) { ?>
<tr>
<td><b>CID:</b></td><td><?php echo $dt->cid;?></td>
<td><b>Name:</b></td><td><?php echo $dt->name;?></td>
<td><b>Gender:</b></td><td><?php echo $dt->gender;?></td>
</tr>
<tr>
<td><b>DOB:</b></td><td><?php echo $dt->dob;?></td>
<td><b>Thram Number:</b></td><td><?php echo $dt->thram;?></td>
<td><b>House Number:</b></td><td><?php echo $dt->houseno;?></td>
</tr>
<tr>
<td><b>Village:</b></td><td><?php echo $dt->village;?></td>
<td><b>Gewog:</b></td><td><?php echo $dt->gewog;?></td>
<td><b>Dungkhag:</b></td><td><?php echo $dt->dungkhag;?></td>
</tr>
<tr>
<td><b>Dzongkhag:</b></td><td><?php echo $dt->dzongkhag;?></td>
<td><b>Mobile No:</b></td><td><?php echo $dt->mobile;?></td>
<td><b>Alternate Contact No:</b></td><td><?php echo $dt->mobile2;?></td>

</tr>

<tr>
<td><b>Email ID:</b></td><td><?php echo $dt->email;?></td>
<td><b>Current Address:</b></td><td><?php echo $dt->cur_address;?></td>
<td></td><td></td>
</tr>
<?php } ?>
</table>
      <hr>
 </div>


 