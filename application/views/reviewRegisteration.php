 <style>
#editBox
{
	display:none;
	top:100px !important;
	z-index:10;
	padding:10px;
	margin: 10px 20% 0 20%;
	width:450px;
	position:fixed;
	background:#fff;
	border:1px solid #BBB;
	box-shadow:0px 0px 30px #999;
	height:auto;
}
#judgeAdd
{
	display:none;
	top:100px !important;
	z-index:10;
	padding:10px;
	margin: 10px 20% 0 20%;
	width:450px;
	position:fixed;
	background:#fff;
	border:1px solid #BBB;
	box-shadow:0px 0px 30px #999;
	height:auto;
}
#litAdd
{
	display:none;
	top:80px !important;
	z-index:10;
	padding:10px;
	margin: 10px 20% 0 20%;
	width:450px;
	position:fixed;
	background:#fff;
	border:1px solid #BBB;
	box-shadow:0px 0px 30px #999;
	height:auto;
	max-height:500px;
}
.levels
{
   max-width:250px;
   min-width:250px;
   margin-left:30px;
}
#lawView
{
   display: none;
    top: 100px !important;
    z-index: 10;
    padding: 10px;
    margin: 10px 30% 0px 30%;
    width: 600px;
    position: fixed;
    background: #fff;
    border: 1px solid #BBB;
    box-shadow: 0px 0px 30px #999;
	max-height:500px;
	overflow:auto;
    height: auto;
}

#lawBox
{
   display: none;
    top: 100px !important;
    z-index: 10;
    padding: 10px;
    margin: 10px 20% 0 20%;
    width: 600px;
    position: fixed;
    background: #fff;
    border: 1px solid #BBB;
    box-shadow: 0px 0px 30px #999;
	max-height:500px;
	overflow:auto;
    height: auto;
}
#litBox table
{
	min-width:100% !important;
}

.addLaw
{
	display:none;
}

.case_lit_del
{
	display:none !important;
}

.review_lit_del
{
	display:block !important;
}
</style>


<script type="text/javascript" src="css/jquery.js"></script>
<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Review Case Registeration</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">
<!-------------------------------REVIEW CASES---------------------------->
  <form method="post" action="<?php echo site_url('registration/ReviewCaseRegisteration'); ?>">
	<div class="panel panel-default">
  <?php
  foreach($cases as $case)
  {
	  ?><?php $case_id_current=$case->id; ?>
    
      <input type="hidden" value="<?php echo $case->id; ?>" name="case_id" />
		<table class="table table-bordered table-striped">
            <tr>
                
                <td width="20%"><strong>Case Title</strong></td>
                <td width="25%"><input type="text" class="form-control" value="<?php echo $case->case_title; ?>" name="case_title" id="case_title"></td>
                <td width="20%"><strong>Misc No</strong></td>
                <td width="25%"><?php echo $case->misc_case_no; ?></td>
            </tr>
            <tr>
                <td><strong>Application Date</strong></td>
                <td><?php echo date('d-m-y',strtotime($case->application_date)); ?></td>
                <td><strong>Appealent Court</strong></td>
                <td><?php 
				$appealent_Court=$this->public->getAppealentCourt($case->id);
				echo $this->public->get_CourtName($appealent_Court); ?></td>
            </tr>
             <tr>
                <td><strong>Clerk Assigned</strong></td>
                <td>
                <?php echo $this->public->get_UserName($case->clerk); ?>
                </td>
                <td colspan="2" rowspan="2">
                <div id="litBox">
    <?php
	$this->load->view('caseActivity_Lits');
	?>
</div>
                
                </td>
                
            </tr>
            
             <tr>
                <td><strong>Judges Present</strong><input type="button" id="add_judge_btn" class="css_btn_class" style="width:70px; height:30px; line-height:20px; float:right; text-align:center;" value="Add"></td>
                <td>
                <div class="form-group">
                <select class="form-control"  name="review_judges[]" >
                <option value="0" disabled selected>Select One</option>
                <?php foreach($judges as $judge):?>
                <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
                <?php endforeach; ?>
                </select>
              </div>
                 <div id="judge_box">
   
   		         </div>
                </td>
            </tr>
             <tr>
                <td width="20%"><strong>Case Overview</strong></td>
                <td width="25%"><textarea class="form-control" name="case_review" id="case_review"> </textarea></td>
                <td width="20%"><strong>Review Date</strong></td>
                <td width="25%"><input type="text" name="review_date" class="datepicker" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" /></td>
            </tr>
		</table>
       
       
       
       
        
         
        <?php
  } ?>
</div>

    
    <div class="form-group" style="text-align:center; ">
        
            <input type="radio" name="reg_status" value="1" onClick="showhidediv(this);"  id="radio1"/><label for="radio1" style="font-size:14px; font-weight:bold; color:#666;">&nbsp;Register</label>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="reg_status" value="2" onClick="showhidediv(this);"  id="radio2" /><label for="radio2" style="font-size:14px; font-weight:bold; color:#666;">&nbsp;Dismiss</label>
           
          </div>
          
          
          
          <!----------------------------------FOR REGISTERATION----------------------->
          
          
           <div style="display:none; border:1px solid #ddd; border-radius:5px; padding:10px;" id="one">
           <table style="width:100%;">
          <tr>
          <td style="width:50%;">
          <div class="form-group">
            <label>Registration Date:</label><br />
            <input type="text" name="reg_date" id="start_dt2" name="app_date" class="datepicker" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
          </div>
          <div class="form-group">
            <label>Registration Number:</label><br />
            <input type="text" name="reg_number" id="reg_number" style="width:80%;" value="<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" class='form-control' />
              <div id="showExistReg"></div>      
          </div> 
          <div class="form-group">
            <label> Bench Assigned: <strong><?php echo $this->public->get_Bench($case->bench); ?></strong></label><br />
            
          </div>
          </td>
              <td valign="top">
                <table class="table table-bordered table-striped" >
                 <tr>
                    <td>
                        Assign Lawyer &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Add" class="css_btn_class" onclick="showLawyer()">
                     </td>
                     </tr>
                     <tr>
                     <td id="showLawyer">
                      <?php $this->load->view('lawyerRegForm'); ?>
                     </td>
                 </tr>
                 </table>
              </td>
          </tr>
          </table>
            <div style="text-align:center;">
          <br />
              <input type="submit" value="Save" class="save_Form btn btn-primary">
              <a href="index.php/registration/registry_view" class="btn btn-danger">Cancel</a>
              
          </div>
          
          </div>
          
          
          <!-------------------------FOR NOT REGISTERED--------------->
          <div style="display:none; border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%;"  id="two">
          <table class="blank_tbl" style="float:left; width100%;">
            <tr>
             <td>
                  <div class="form-group">
                    <label>Reasons For Not Registering:</label>
                    <textarea name="notreg_reason" class='form-control' style="width:70%;"></textarea>
                   
                  </div>
              </td>
           
          <td>
              <div class="form-group">
                <label>Dismissal Order Number:</label>
                <input type="text" name="notreg_dis_no" id="notreg_dis_no"  value="<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" class='form-control' style="width:70%;"/>
                 <div id="showExistDiss"></div> 
              </div>
          </td>
         </tr>
         <tr>
           <td>
          <div class="form-group">
            <label>Dismissal Order Date:</label><br />
            <input type="text" name="notreg_dis_date" id="start_dt3" class="datepicker" style="width:65%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
          </div>
          </td>
          <td>
          </td>
         </tr>
         </table>
             
           <div id="rtio_type3" style="float:right; width:50%;">
   
   		  </div>
          <div style="text-align:center; float:left; width:100%;">
          <br />
              <input type="submit" value="Save" class="save_Form btn btn-primary" >
              <a href="index.php/registration/registry_view" class="btn btn-danger">Cancel</a>
          </div>
          
          
          </form>
         
          </div>
      <!-- End For Not Registered -->
        
          
          
    <!------------------------------------------REVIEW END----------------->


<div id="div_rtio_type3" style="display:none">
<table class="blank_tbl">
<tr>
	<td width="20%"><label>Judge Name:</label>
    </td>
    <td width="70%">
	<select class="form-control" style="width:80%;" name="sign[ste][1][]">
 	<option value="0" selected>Select One</option>
	<?php foreach($judges as $user):?>
	<option value="<?php echo $user->id; ?>"><?php echo $user->judge_name; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
	<td width="10%" style="text-align:center !important;"><a href="#" class="remove_table" style="float:left;"><img src='<?php echo base_url('images/cross.png');?>'/></a></td>
</tr>
</table>
</div>


<div id="add_judge" style="display:none">
<table class="blank_tbl">
<tr>
    <td width="70%">
	<select class="form-control" style="width:100%;" name="review_judges[]">
 	<option value="0" selected>Select One</option>
	<?php foreach($judges as $user):?>
	<option value="<?php echo $user->id; ?>"><?php echo $user->judge_name; ?></option>
	<?php endforeach; ?>
	</select>
    </td>
	<td width="10%" style="text-align:center !important;"><a href="#" class="remove_table" style="float:left;"><img src='<?php echo base_url('images/cross.png');?>'/></a></td>
</tr>
</table>
</div>

<?php $this->load->view('LitAdd'); ?>




<div id="lawBox">

<?php
$this->load->view('reviewLawyerReg');
?>
</div>
</div>

<div id="conRemoveLaw" title="Delete Item ?">
    <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
        <input type="hidden" value='' id="del_law" name="del_id">
        Are you sure?</p>
</div>


<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function () {
	
	
		 $('#level1').change(function(){
        $.ajax({
            url: "index.php/registration/getFilter2",
            type: "post",
            data: {q: $(this).find("option:selected").val()},
			dataType: "html",
            success: function(data){
                //adds the echoed response to our container
                $("#clevel2").html(data);
            }
        });
    });
	
	
	$('#addCase').click(function(e){
	 e.preventDefault();
	 var level3 = $('#level3 option:selected').val();
	   if(level3=='0' || level3=='')
        {
			alert("Please select all the case levels!");
			return false;
		}
		else
		{
			$('#caseFilter').submit();
			return true;
		}
   });
   
   
   $('#add_judge_btn').click(function(e) {
	$('#judge_box').append($('#add_judge').html());
	return false;
});


$('.remove_table').live('click', function(){
	$(this).parents('table .blank_tbl').remove();
	return false;
});
		
		
		$('#add_rtio_type3').click(function(e) {
	$('#rtio_type3').append($('#div_rtio_type3').html());
	return false;
	});




$(function() {
var date = new Date();
var currentMonth = date.getMonth();
var currentDate = date.getDate();
var currentYear = date.getFullYear();

$('.datepicker').datepicker({
maxDate: new Date(currentYear, currentMonth, currentDate),
dateFormat: "dd-mm-yy"
});


});




});
</script>

<script type="text/javascript">

function showSaveButton()
    {
        document.getElementById( 'div_save' ).style.display = 'block';
    }
	
function showEdit()
{
	document.getElementById( 'editBox' ).style.display = 'block';
}

function closeEdit()
{
	document.getElementById( 'editBox' ).style.display = 'none';
}


function addJudge()
{
	document.getElementById( 'judgeAdd' ).style.display = 'block';
}

function addJudgeClose()
{
	document.getElementById( 'judgeAdd' ).style.display = 'none';
}
function addLit()
{
	document.getElementById( 'litAdd' ).style.display = 'block';
}

function addLitClose()
{
	document.getElementById( 'litAdd' ).style.display = 'none';
}

function closeVLaw()
{
	document.getElementById('lawView').style.display='none';
}

	function showLawyer()
	{
		 document.getElementById( 'lawBox' ).style.display = 'block';
	}
	
	function hideLawyer()
	{
		document.getElementById( 'lawBox' ).style.display = 'none';
	}
	
function showhidediv( rad )
    {
        var rads = document.getElementsByName( rad.name );
        document.getElementById( 'one' ).style.display = ( rads[0].checked ) ? 'block' : 'none';
        document.getElementById( 'two' ).style.display = ( rads[1].checked ) ? 'block' : 'none';
    }
</script>



<script type="text/javascript" charset="utf-8">
$(document).ready(function () {
		
	$(".viewLaw").live("click",function(event){
	   event.preventDefault();
        var element = $(this);
        var del_id = element.attr("id");
		
		  $.ajax({
            url: "index.php/registration/showLawyer",
            type: "post",
            data: {"l_id":del_id
				   },
			dataType: "html",
            success: function(data){
                //adds the echoed response to our container
				
                $("#lawView").html(data);
				    $('#lawView').css('display', 'block');
            }
        });
        
    });	
	
	 $(".delTemLaw").live("click",function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        $('#del_law').val(del_id);
        $( "#conRemoveLaw" ).dialog( "open" );
 
        return false;
    });
	
	
	 $( "#conRemoveLaw" ).dialog({
            autoOpen: false,
            resizable: false,
            height:170,
            modal: true,
            hide: 'Slide',
            buttons: {
                "Delete": function() {
                    var del_id = {id : $("#del_law").val()};
					  	$.ajax({
                        type: "POST",
                        url : "<?php echo site_url('registration/delete_temp_Lawyer')?>",
                        data: del_id,
                        success: function(msg){
                            $('#showLawyer').html(msg);
                            $('#conRemoveLaw' ).dialog( "close" );
                            //$( ".selector" ).dialog( "option", "hide", 'slide' );
                        }
                    });
 
                    },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
		
		
		
	
});
</script>

    
     
     
      <script type="text/javascript">
            $(document).ready(function(){

	 
	 
				  $("#search_button_lit").click(function(){
                     search();
                  });
				  
                 function search(){
 
                      var title=$("#search_Lit_CID").val();
                      var case_id=$("#caseLit").val(); 
					  var s_check=$("#s_check:checked").val();
					  
					  
                      if(title!=""){
                         $.ajax({
                            type:"post",
                            url:"index.php/registration/getLitAssign",
                            data:{'g' : title,
                                  'case_id' : case_id,
								  's_check' : s_check
                                 },
							
                            success:function(data){
                                $("#litResult").html(data);
                                $("#search_CID").val("");
                             }
                          });
                      }                      
                 }
 
 
  $(".addLaw").live("click",function(){
        var element = $(this);
        var litID = element.attr("id");
        var info = 'id=' + litID;
        $('#LitigantID').val(litID);
        $( "#lawBox" ).css( "display", "block" );
 
        return false;
    });
	
	

 

                  
            });
        </script>
        
        
        
        
          <script type="text/javascript">
  
  $(document).ready(function () {
	  
$('#addLaw').submit(function(event){
	
	event.preventDefault();
	$( "#lawBox" ).css( "display", "none" );
	
  $.ajax({
    url: 'index.php/registration/assignCaseActivityLitLawyer',
    type: 'post',
    dataType:'html',   //expect return data as html from server
   data: $('#addLaw').serialize(),
   success: function(response, textStatus, jqXHR){
	  
      $('#litBox').html(response);   //select the id and put the response in the html
    },
   error: function(jqXHR, textStatus, errorThrown){
      console.log('error(s):'+textStatus, errorThrown);
   }
 });
 });
 
 
 $('#editTitle').click(function(e) {
 
      e.preventDefault();
	  
      $('#caseTitle').css('display','none');
	  $('#editCaseTitle').css('display','block');
});

$('#saveTitle').click(function(e) {
	    e.preventDefault();
     var newtitle=$('#newCaseTitle').val();
	 var case_id=<?php echo $case_id; ?>;
	 if(newtitle=='')
	 {
		 alert("Title cannot be empty.");
	 }
	 else
	 {
		
								 
		  $.ajax({
                            type:"post",
                            url:"index.php/registration/updateCaseTitle",
                            data:{'newtitle' : newtitle,
							'case_id':case_id
                                 },
							
                            success:function(msg){
								
								 $('#caseTitleBox').html(msg);
								  $('#caseTitle').css('display','block');
	                             $('#editCaseTitle').css('display','none');
								 
	                    
                               }
                          });
	 }
});
 	
});
 
	 </script>