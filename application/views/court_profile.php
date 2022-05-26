<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Dashboard</h1>
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> </li>
			<li class="active">Court Profile</li>
        </ul>
	</div>
<!--End Breadcrumb-->

<div class="main-content">   
<form method="post" action="">
<div class="panel panel-default">

	<table class="table table-bordered table-striped">
	<tr>
		<td width="25%"><strong>Court Type:</strong></td>
		<td>
        <select class="form-control" style="width:300px;">
        <option>Supreme Court</option>
        <option>Hight Court</option>
        <option>Dzongkhag Court</option>
        <option>Dungkhag Court</option>
        </select>
        </td>
	</tr>
    <tr>
		<td><strong>Dzongkhag:</strong></td>
		<td>
        <select class="form-control" style="width:300px;">
        <option>Thimphu</option>
        <option>Paro</option>
        <option>Haa</option>
        <option>Punakha</option>
        </select>
        </td>
	</tr>
    <tr>
		<td><strong>Dungkhag:</strong></td>
		<td>
        <select class="form-control" style="width:300px;">
        <option>Thimphu</option>
        <option>Paro</option>
        <option>Haa</option>
        <option>Punakha</option>
        </select>
        </td>
	</tr>
    <tr>
		<td><strong>Court Name:</strong></td>
		<td><input type="text" class="form-control" style="width:300px;"></td>
	</tr>
    <tr>
		<td><strong>More than one Bench:</strong></td>
		<td><input type="radio" name="bench">&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="bench">&nbsp;No
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.html" class="btn btn-primary pull-right">Add Bench</a>
        </td>
	</tr>
    </table>
             
</div>
<input type="submit" value="Submit" class="btn btn-primary" /> 
</form>
</div>