<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Miscellaneous Activities</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 
	<div class="search-well">
                <form method="post" action="index.php/registration/view_miscellaneous" class="form-inline" style="margin-top:0px;">
                    <input class="input-xlarge form-control" placeholder="Search by Miscellaneous No" name="search_any" type="text" size="30">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>Go</button>
                </form>
      </div>

	<div class="panel panel-default">
		<table  class="table table-bordered">
            		<?php echo form_open("registration/add_miscellaneous"); ?>
					<div class="col-md-6 form-group">
						<label for="applicant">Applicant</label><br/>
						<?php 
						if(!empty($_REQUEST)){
							$this->session->set_flashdata('applicant_id',$applicant_id);
							$lid = $this->session->flashdata('applicant_id');

                             
                            echo $this->public->get_ApplicantName($lid);

							}
						?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a id="applicant_add" class="btn btn-success">Add Applicant</a>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-6 form-group">
					    <label for="application_date">Application Date</label><br />
					    <input type="hidden"  name="applicant_id" value="<?php echo $this->session->flashdata('applicant_id'); ?>"/>


					    <input type="date"  name="application_date" value="<?php echo set_value('application_date'); ?>" class="form-control" required/>
					</div>
					<div class="col-md-6 form-group">
						<label for="miscellaneous_activity_type">Miscellaneous Activity Type</label>
							<select name="miscellaneous_activity_type" class='form-control'>
								<option value="0" selected>--Select one---</option>
								<?php foreach($miscellaneous_activity_type as $misc_activity):?>
					            <option value="<?php echo $misc_activity->id; ?>"><?php echo $misc_activity->description; ?></option>
					            <?php endforeach; ?>
							</select>
					</div>
					<div class="col-md-6 form-group">
						<label for="miscellaneous_no">Miscellaneous No</label>
						<input type="text" name="miscellaneous_no" value="<?php echo set_value('miscellaneous_no'); ?>" class="form-control" placeholder="Miscellaneous No" required>
					</div>
					
					<div class="col-md-6 form-group">
						<label for="case_title">Issue</label>
						<input type="text"  name="case_title" value="<?php echo set_value('case_title'); ?>" class="form-control" placeholder="Case Title" >
					</div>
					<div class="col-md-6 form-group">
						<label for="miscellaneous_hearing">Miscellaneous Hearing Date</label>
						<input type="date" name="miscellaneous_hearing" value="<?php echo set_value('miscellaneous_hearing'); ?>" class="form-control" required>
					</div>
					<div class="col-md-6 form-group">
						<label for="hearing_judge">Hearing Judge</label>
							<select name="hearing_judge" class="form-control">
								<option value="0" selected>--Select hearing judge---</option>
								<?php foreach($judges as $judge):?>
					            <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
					            <?php endforeach; ?>
							</select>
					</div>
					
					<div class="col-md-6 form-group">
			            <label>Assigned to which bench:</label><br />
			            <select name="bench"  class='form-control'>
				            <option value="0" selected>Select One</option>
				            <?php foreach($benches as $bench):?>
				            <option value="<?php echo $bench->id; ?>"><?php echo $bench->bench_name; ?></option>
			            <?php endforeach; ?>
			            </select>	
		          </div>
					<div class="col-md-6 col-md-offset-3 form-group">
						<label>Approve</label>
						<input type="radio" name="approve" value="1">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label>Dismiss</label>
						<input type="radio" name="approve" value="0">
					</div>
					<div class="col-md-6 form-group">
						<label for="order_no">Order No</label>
						<input type="text" name="order_no" value="<?php echo set_value('order_no'); ?>" class="form-control" placeholder="Order No" required>
					</div>
					<div class="col-md-6 form-group">
						<label for="order_date">Order Date</label>
						<input type="date" name="order_date" value="<?php echo set_value('order_date'); ?>" class="form-control" placeholder="Order Date" required>
					</div>
					<div class="col-md-12 form-group">
						<label for="remarks">Remarks</label>
						<textarea name="remarks" id="remarks" class="form-control" cols="30" rows="10"></textarea>
					</div>
					<div class="form-group col-md-6 col-md-offset-4">
						<input type="submit" name="submit" value="Submit" class="btn btn-primary">
              			<a href="index.php/registration/registry_view" class="btn btn-danger">Cancel</a>
					</div>
				</form>
        </table>
    </div>
</div>
<div id="searchform" title="Search for applicant or litigant entry">
	<table class="table table-bordered">
		<?php echo form_open('registration/insert_liti_id'); ?>
			<div class="col-md-6 form-group">
				<input class="form-control" placeholder="Search by CID / Name" id="search_applicant" name="search_applicant" type="text">
			</div>
		    <button class="btn btn-default" type="button" id="search_button"><i class="fa fa-search"></i>Go</button>
		<?php echo form_close();?>
		<div id="main-body">
			
		</div>
	</table>
</div>
<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script>
	$(function() {
			$("#remarks").val();
            $("#applicant_add").click(function(){
            	$("#searchform").dialog('open');
        	});
            $("#searchform").dialog({
            	autoOpen : false,
            	modal : true,
            	height: 550,
            	width: 900,
            	hide:'Slide',
            	buttons:{
			            'Cancel':function(){
			            		$("#searchform").dialog('close');
			            	}
			            }
        });
        $('#search_button').click(function()
			 {
			 	var val = $('#search_applicant').val();
				//alert(val);		
				$.ajax({
					type: "POST",
					url : "<?php echo site_url('registration/search_applicant');?>",
					data: {"value":val
						   },
					dataType : 'html',
					success: function(msg){	
								$('#'+val).css('color','#960');
								$('#main-body').html(msg);	
						}
					});
		 });
       
    });
</script>
