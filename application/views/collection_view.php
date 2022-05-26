<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Collections</h1>
		
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
<a href="index.php/registration/collection" class="btn btn-danger pull-right">Insert Collection</a>
<br /><br />
<table class="table table-bordered table-striped">
        <thead>
        	<tr>
				<th>Sl.No</th>
                <th>Collection Type</th>
                <th>Case No</th>
                <th>Litigant(Payer)</th>
                <th>Amount</th>
                <th>Receipt No</th>
                <th>Receipt Date</th>
                <th width="10%">Action</th>
            </tr>
         </thead>
         <tbody>
         <?php if(count($collections)==0) { ?>
         <tr>
         <td colspan="8"><h3>No Record Found...</h3></td>
         </tr>
         <?php } ?>
         <?php $i=1; foreach($collections as $fld): ?>
         	<tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $fld->collection_type; ?></td>
             <td><?php echo $fld->case_no; ?></td>
			 <td><?php echo $this->public->get_ApplicantName($fld->payer); ?></td>
             <td><?php echo $fld->amount; ?></td>
             <td><?php echo $fld->receipt_no; ?></td>
             <td><?php echo $fld->receipt_date; ?></td>
             <td><a href="index.php/registration/edit_collection/<?php echo $fld->id; ?>"><i class="fa fa-pencil"></i> Edit</a></td>
            </tr>
         <?php $i++; endforeach; ?>
         </tbody>
</table>

</div>