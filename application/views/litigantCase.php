

<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Search Litigant Involved Case</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
      <div class="search-well">
                <form class="form-inline" style="margin-top:0px;">
                    <input class="input-xlarge form-control" placeholder="Search by CID..." id="search_caseNo" name="search_caseNo" type="text">
                    <button class="btn btn-default" type="button" id="search_button" ><i class="fa fa-search"></i> Go</button>
                </form>
      </div>
       <table class="table table-bordered table-striped">
       	<thead>
        <tr>
       		<th width="15%">Registration No</th>
            <th width="20%">Issue</th>
            <th width="15%">Registration Date</th>
            <th width="20%">Defendant</th>
            <th width="20%">Respondent</th>
            <th width="15%">Clerk Assigned</th>
            <th width="15%">Court Name</th>
             <th width="15%">Case Status</th>
            <th>Option</th>
         
        </tr>
       	</thead>
        <tbody id="main-body">

        </tbody>
       </table>
    <br />
</div>


<script type="text/javascript">

$('document').ready(function(){

$('#all').css('display','none');


$('#search_button').click(search_case);
	 
	 function search_case()
	 {
	 	var val = $('#search_caseNo').val();		
		$.ajax({
			type: "POST",
			url : "<?php echo site_url('registration/searchLitigantCase');?>",
			data: {"value":val},
			dataType : 'html',
			success: function(msg){	
						$('#'+val).css('color','#960');
						$('#all').show();
						$('#main-body').html(msg);	
										
				}
			});
	 }
		
});



</script>