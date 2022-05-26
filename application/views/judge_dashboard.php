<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Dashboard</h1>	
        <div>
        <form method="post" action="">
        <table width="100%"><tr><td width="10%">
        <label>Search:</label></td><td width="40%"><select id="case" name="case" class="form-control" style="width:100%;">
        <option value="0" selected disabled>Select One</option>
        <option value="1">Registered / Dismissed Case</option>
        <option value="2">Active Case</option>
        <option value="3">Closed Case</option>
        <option value="4">Appealed Case</option>
        </select> 
        </td><td width="50%"><input type="button" name="submit" value="Search" class="btn btn-primary" id="search_button" /></td></tr></table>
        </form>
        </div>	
	</div>
    
<script type="text/javascript">
 $('document').ready(function(){
 $('#all').css('display','none');
 $('#search_button').click(search_case);
	 
	 function search_case()
	 {
	 	var val = $('#case').val();	
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/case_search');?>",
			data: {"value":val},
			dataType : 'html',
			success: function(msg){	
						$('#'+val).css('color','#960');
						$('#all').show();
						$('#main-tbody').html(msg);			
				}
			});
	 }
	 
	$('#case').bind('keypress', function(e){
		if(e.keyCode == 13){
			search_agency();
			e.preventDefault();
			return false;
		}
	});
	 	 	 	 
 });
 </script>
<!--End Breadcrumb--> 

<div class="main-content"> 
	<div class="panel panel-default">
    <ul class="tabs"> 
        <li class="active" rel="tab1">Registered Case</li>
        <!-- <li rel="tab2">Dismissed Case</li> -->
	</ul>
	    <div class="tab_container"> 
		    <div id="tab1" class="tab_content"> 
				<table class="table table-bordered table-striped">
		              <thead>
		              <?php if(count($registration)==0) { ?>
		              <tr>
		                  <td colspan="6"><strong>Record Not Found...</strong></td>
		              </tr>
		              <?php } else { ?>
		                <tr>
		                  <th width="7%">Sl.No</th>
		                  <th width="10%">Court</th>
		                  <th width="10%">Misc Case No</th>
		                  <th width="10%">Case No</th>
		                  <th width="12%">Registered Date</th>
		                  <th>Case Title</th>
		                  <th>Case Status</th>
		                  <th width="10%">Action</th>
		                  <th width="12%">Approve Status</th>
		                </tr>
		              </thead>
		              <tbody id="main-tbody">
		              <?php $i=1; foreach($registration as $reg) { ?>
		                <tr>
		                  <td><?php echo $i; ?></td>
		                  <td><?php if($reg->court_id==0 || $reg->court_id=="") {} else {
						  echo $this->public->get_CourtName($reg->court_id); }?></td>
		                  <td><?php echo $reg->misc_case_no; ?></td>
		                  <td><?php echo $reg->reg_no; ?></td>
		                  <td><?php echo $reg->reg_date; ?></td>
		                  <td><?php echo $reg->case_title; ?></td>
		                  <td>
						  <?php 
						  if($reg->status==1){ echo "<font color=#0099ff>Case Registered</font>"; }
						  if($reg->status==2){ echo "<font color=#0099ff>Case Registered</font>"; } 
						  if($reg->status==3){ echo "<font color=#0099ff>Active</font>"; }
						  if($reg->status==4){ echo "<font color=#0099ff>Case Closed</font>"; }
						  if($reg->status==5){ echo "<font color=#0099ff>Case Appealed</font>"; }
						  ?>
		                  </td>
		                  <td><a href="index.php/registration/view_case/<?php echo $reg->id; ?>" title="View"><i class="fa fa-camera"></i>View</a></td>
		                  <td>
		                  <?php 
						  if($reg->status==1 && $reg->approved==1 && $reg->reject!=1){ } 
						  if($reg->status==1 && $reg->approved==1 && $reg->reject==1){  } 
						  if($reg->status==1 && $reg->approved=="" && $reg->reject!=1){ } 
						  if($reg->status==1 && $reg->approved=="" && $reg->reject==1){ } 
						  if($reg->status==2 && $reg->approved==1 && $reg->reject!=1){  } 
						  if($reg->status==2 && $reg->approved==1 && $reg->reject==1){  } 
						  if($reg->status==2 && $reg->approved=="" && $reg->reject!=1){ } 
						  if($reg->status==2 && $reg->approved=="" && $reg->reject==1){ } 
						  if($reg->status==3 && $reg->approved==1){ } 
						  if($reg->status==3 && $reg->approved==""){} 
						  if($reg->status==4 && $reg->c_approved==1 && $reg->reject!=1){ echo "<font color=#009933>Approved</font>"; } 
						  if($reg->status==4 && $reg->c_approved==1 && $reg->reject==1){ echo "<font color=#ff0000>Rejected</font>"; } 
						  if($reg->status==4 && $reg->c_approved=="" && $reg->reject!=1){ echo "<font color=#990000>Not Approved</font>"; } 
						  if($reg->status==4 && $reg->c_approved=="" && $reg->reject==1){ echo "<font color=#ff0000>Rejected</font>"; } 
						  if($reg->status==5 && $reg->a_approved==1 && $reg->reject!=1){ echo "<font color=#009933>Approved</font>"; } 
						  if($reg->status==5 && $reg->a_approved==1 && $reg->reject==1){ echo "<font color=#ff0000>Rejected</font>"; } 
						  if($reg->status==5 && $reg->a_approved=="" && $reg->reject!=1){ echo "<font color=#990000>Not Approved</font>"; }
						  if($reg->status==5 && $reg->a_approved=="" && $reg->reject==1){ echo "<font color=#ff0000>Rejected</font>"; }
						  
						 
						  ?>
		                  </td>
		                 
		                </tr>
		              <?php $i++; } } ?>
		              </tbody>
				</table>
		    <?php echo anchor("registration/approved_case", '<span>View All</span>', 'class="btn btn-default" id="all"') ?>
		    </div>
		 
	   </div> 
	</div>
<?php echo anchor("registration/judge_dashboard", '<span>View All</span>', 'class="btn btn-primary" id="all"') ?> 
</div>

<style type="text/css">
.btn_approve{
background:#006699;
width:80px;
color:#FFFFFF;
border:1px solid #0099ff;
border-radius:5px;
}

</style>
<script type="text/javascript">
 $('document').ready(function(){
  $('#all').css('display','none');

	 $(".tab_content").hide();
	$(".tab_content:first").show(); 

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
	 
 });
</script>
