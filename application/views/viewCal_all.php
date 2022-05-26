<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Calendar </h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
      
       <table class="table table-bordered table-striped">
       	<thead>
        <tr>
       	   <th width="6%">Sl. No</th>
            <th>Hearing Date</th>
            <th>Hearing Time</th>
            <th>Title</th>
            <th>Hearings</th>
            <th>Court Name</th>
            <th>Judge Name</th>
        </tr>
       	</thead>
        <tbody>
	<?php $i=1; foreach($calenders as $calc): ?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $calc->event_date; ?></td>
		<td><?php echo $calc->event_time; ?></td>
		<td><?php echo $calc->title; ?></td>
		<td><?php echo $calc->event; ?></td>
		<td><?php echo $this->public->get_CourtName($calc->court_id); ?></td>
		<td><?php echo $this->public->get_UserName($calc->Judge_id); ?></td>
	</tr>
	<?php $i++; endforeach; ?>
        </tbody>
       </table>
    <br />
</div>
</div>


