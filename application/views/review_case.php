<script type="text/javascript" src="css/jquery.js"></script>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Registration</h1>
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> </li>
            <li>Registration</li>
			<li class="active">Registration</li>
        </ul>
	</div>
<!--End Breadcrumb-->

<div class="main-content">  
<form method="post" action="" enctype="multipart/form-data"> 
 <table class="table table-bordered table-striped">
    <tr>
		<td width="25%"><strong>Activity Date:</strong></td>
		<td colspan="2">
        <input type="text" id="start_dt" name="act_date" class="datepicker" style="width:35%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
        </td>
	</tr>
    <tr>
		<td><strong>Activity Details:</strong></td>
		<td colspan="2">
        <textarea name="act_details" class="form-control" style="width:40%;"></textarea>
        </td>
	</tr>
    <tr>
		<td><strong>Finding:</strong></td>
		<td colspan="2"> 
        <textarea name="finding" class="form-control" style="width:40%;"></textarea>
        </td>
	</tr>
 
    <tr>
		<td width="25%"><strong>Activity by:</strong></td>
		<td colspan="2">
        <select style="width:40%;" class="form-control"> 
        <option value="0">Select One</option>
        </select>
        </td>
	</tr>
    
    <tr>
		<td></td>
		<td colspan="2">
        <input type="radio" name="review" value="1" onClick="showhidediv(this);">&nbsp;Review Complete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="review" value="2" onClick="showhidediv(this);">&nbsp;Review Ongoing
        </td>
	</tr>
    </table>
    
    <div id="one" style="display:none;">
    <table class="table table-bordered table-striped">
    <tr>
		<td width="25%"><strong>Presentation Date:</strong></td>
		<td colspan="2">
        <input type="text" id="start_dt1" name="pre_date" class="datepicker" style="width:35%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
        </td>
	</tr>
    
    <tr>
		<td width="25%"><strong>Judges Present:</strong></td>
		<td colspan="2">
        <select name="judge" class="form-control" style="width:40%;">
        <option value="0">Select One</option>
        </select>
        </td>
	</tr>
    
    <tr>
		<td width="25%"><strong>Instructions:</strong></td>
		<td colspan="2">
        <textarea name="instruct" class="form-control" style="width:40%;"></textarea>
        </td>
	</tr>
    
    <tr>
		<td width="25%"><strong>Case Registered:</strong></td>
		<td colspan="2">
        <input type="radio" name="reg_case" value="1">&nbsp;Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="reg_case" value="2">&nbsp;No
        </td>
	</tr>
    </table>
    </div>
    
    <div id="two" style="display:none;">
    <table class="table table-bordered table-striped">
    
    <tr>
		<td width="25%"><strong>Dismissal Order No:</strong></td>
		<td colspan="2">
        <input type="text" name="order_no" class="form-control" style="width:40%;" />
        </td>
	</tr>
    
    <tr>
		<td width="25%"><strong>Dismissal Order Date:</strong></td>
		<td colspan="2">
        <input type="text" id="start_dt3" name="order_date" class="datepicker" style="width:35%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
        </td>
	</tr>
    
    <tr>
		<td width="25%"><strong>Signed By:</strong></td>
		<td colspan="2">
        <select name="sign" class="form-control" style="width:40%;">
        <option value="0">Select One</option>
        </select>
        </td>
	</tr>
    
    <tr>
		<td width="25%"><strong>Reason:</strong></td>
		<td colspan="2">
        <textarea name="reason" class="form-control" style="width:40%;"></textarea>
        </td>
	</tr>
    
    </table>
    </div>

<input type="submit" value="Save" class="btn btn-primary" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Cancel" class="btn btn-primary" />
</form>
</div>

<script>
function showhidediv( rad )
    {
        var rads = document.getElementsByName( rad.name );
        document.getElementById( 'one' ).style.display = ( rads[0].checked ) ? 'block' : 'none';
		document.getElementById( 'two' ).style.display = ( rads[1].checked ) ? 'block' : 'none';
    }
</script>
