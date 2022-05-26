<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Dashboard</h1>
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> </li>
			<li class="active">Dashboard</li>
        </ul>
	</div>
<!--End Breadcrumb-->

<div class="main-content">   
<div class="panel panel-default">

<table class="table table-bordered table-striped">
	<tbody>
		<tr>
			<td>Number of Dzongkhag Inserted</td>
			<td width="10%"><?php echo count($dzongkhag); ?></td>
		</tr>
		<tr>
			<td>Number of Dungkhag Inserted</td>
			<td><?php echo count($dungkhag); ?></td>
		</tr>
		 <tr>
			<td>Number of Gewog Inserted</td>
			<td><?php echo count($gewog); ?></td>
		</tr>
		<tr>
			<td>Number of Village Inserted</td>
			<td><?php echo count($village); ?></td>
		</tr>
		<tr>
			<td>Number of Users</td>
			<td><?php echo count($users); ?></td>
		</tr>
		<tr>
			<td>Number of Cases</td>
			<td><?php echo count($cases); ?></td>
		</tr>
	</tbody>
</table>
</div>
</div>