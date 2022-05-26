
<script type="text/javascript" src="scripts/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
function confirm_delete() {
confirm("Delete Case Type ?");
}
</script>
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
	
	
	 $('#level12').change(function(){
        $.ajax({
            url: "index.php/registration/getFilter22",
            type: "post",
            data: {q: $(this).find("option:selected").val()},
			dataType: "html",
            success: function(data){
                //adds the echoed response to our container
                $("#clevel22").html(data);
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
			$('#caseFilterMain').submit();
			return true;
		}
   });

	

	
	
});

		</script>
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
#editBox2
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
.levels
{
   max-width:250px;
   min-width:250px;
   margin-left:30px;
}
</style>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Registration</h1>
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a> </li>
            <li>Registration</li>
			<li class="active">Registered Case</li>
        </ul>
	</div>
<!--End Breadcrumb-->

<div class="main-content">

   <?php $case_id=$id; ?>
 
   <div id='editBox'>
  <span style="width:100%;">
      <strong>Edit Case Detail</strong>
      <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="closeEdit();"/>
  </span>
  <hr />
  <form name="caseFilter" id="caseFilterMain" method="post" action="<?php echo site_url('registration/updateCaseType'); ?>">
  <input type="hidden" name="caseid" id="caseid" value="<?php echo $case_id; ?>" />
          <div id="clevel1">
<label>Case Level 1 </label><select name="level1" id="level1" class="levels" >
      <option value="0" disabled="disabled" selected="selected"  >Select One</option>
      <?php
	  foreach($case_type1 as $case1)
	  {?>
	    <option value="<?php echo $case1->id?>"><?php echo $case1->caseTypelevel1?></option>
	  <?php
	  }
	  ?>
      </select>
      </div> <br />
      <div id="clevel2">
      <label>Case Level 2 </label><select name="level2" id="level2" class="levels"> 
      <option value="0" disabled="disabled" >Select Level 1</option>
      </select>
      </div> <br />
      <div id="clevel3">
      <label>Case Level 3 </label><select name="level3" id="level3" class="levels">
      <option value="0">Select Level 2</option>
      </select>

      </div>
      <br />
      <!-- <div id="other" style="display: none;">                  
                  <label>Other Case CL3</label>                  
                     <input type="text" name="othercl3" id="othercl3" class="form-control">                 
                  </div>  -->
      <br />
     	 
       <input type="submit" id="addCase" value="Add" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
      <input type="button" value="Cancel" class="btn btn-primary pull-right" onclick="closeEdit();"/>
         
      </form>
</div>


   <div id='editBox2'>
  <span style="width:100%;">
      <strong>Edit Case Detail</strong>
      <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="closeEdit2();"/>
  </span>
  <hr />
  <form name="caseFilter" method="post" action="<?php echo site_url('registration/updateCaseType'); ?>" id="caseFilter">
  <input type="hidden" name="id" value="<?php echo $case_id; ?>" />
          <div id="clevel1">
<label>Case Level 1 </label><select name="level1" id="level1" class="levels">
      <option value="0" disabled="disabled" selected="selected">Select One</option>
      <?php
	  foreach($case_type1 as $case1)
	  {?>
	    <option value="<?php echo $case1->id?>"><?php echo $case1->caseTypelevel1?></option>
	  <?php
	  }
	  ?>
      </select>
      </div> <br />
      <div id="clevel2">
      <label>Case Level 2 </label><select name="level2" class="levels"> 
      <option value="0" disabled="disabled" >Select Level 1</option>
      </select>
      </div> <br />
      <div id="clevel3">
      <label>Case Level 3 </label><select name="level3" id="level3" class="levels">
      <option value="0" disabled="disabled" >Select Level 2</option>
      </select>
      </div>
       <br />
      <!-- <div id="other" style="display: none;">                  
                  <label>Other Case CL3</label>                  
                     <input type="text" name="othercl3" id="othercl3" class="form-control">                 
                  </div> --> 
      <br />
     	
       <input type="submit" value="Update" class="btn btn-primary pull-right" style="margin-left:20px;"/> 
      <input type="button" value="cancel" class="btn btn-primary pull-right" onclick="closeEdit2();"/>
         
      </form>
</div>

 <form name="frm1" id="frmRe" method="post" action="index.php/registration/update_registration" onsubmit="return validate()">
 <input type="hidden" name="reg_id" value="<?php echo $id; ?>" />
  <div style="border:1px solid #aaa; border-radius:5px; padding:10px;">      
        <div class="form-group">
        <label>Case Type &nbsp;&nbsp;</label>
         <input type="button" value="Add" class="btn btn-default" onclick="showEdit()" style="width:70px; height:30px; line-height:20px;"/><br />
         <br />
       <table style="width:40%; ">
        <td><?php
                  $case_types=array();
                              $case_types=$this->public->get_case_casetype($case_id);
                  if(empty($case_types))
                  {
                   echo "No Case Type Assigned!";
                  }
                  else
                  {
                     $i=1;
                  foreach($case_types as $types)
                   { 
                     $var = $types->case_type_id;
                     if(is_numeric($var)) 
                     {
                      echo $i."-&nbsp;".$this->public->getLevel3Name($types->case_type_id)."&nbsp;<a href='".site_url('registration/deleteCaseTypeCaseAssign/'.$types->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></span></a><br>";
                     }
                    else
                     {
                  echo $i."-&nbsp;".$types->case_type_id."&nbsp;<a href='".site_url('registration/deleteCaseTypeCaseAssign/'.$types->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></span></a><br>";
                     }
                      
                    $i++;
                   }
                  }
                  ?></td>
                  
         </table>
         <br>
         <label>Case Title <font color="red">*</font>&nbsp;&nbsp;&nbsp;: </label>
        <input type="text" name="case_Title" id="case_Title" class="form-control" style="width:40%; margin:0px;" value="<?php echo $case_title; ?>" required="required"/><br />
        <br />
         
      
         
       
        <br />
        </div>
   </div>
   <br />
          
        
          
          
          <?php if($registration_status==0 or $registration_status==1 ){ ?>
		  <div style="display:block; border:1px solid #aaa; border-radius:5px; padding:10px;" id="one">
          <?php } else { ?>
          <div style="display:none; border:1px solid #aaa; border-radius:5px; padding:10px;" id="one">
          <?php } ?>
         
          <div class="form-group">
            <label>Judge:</label><br />
            <select class="form-control" style="width:40%;" name="reg_judge" id="reg_judge ">
            <option value="0">Select Judge</option>
            <?php foreach($judges as $judge):?>
            <option value="<?php echo $judge->id; ?>" <?php if($judge==$judge->id){ ?> selected<?php } ?>><?php echo $judge->judge_name; ?></option>
            <?php endforeach; ?>
            </select><!--<a id="add_rtio_type2" class="btn btn-default" style="float:right; margin-top:-35px; ">Add More</a>-->
          </div>
          <div id="rtio_type2">
   
   		  </div>
          
         
          
          <div class="form-group" id="bench_clerk">
            <label>Clerk / Registrar:</label><br />
            <select class="form-control" style="width:40%;" name="reg_clerk" id="reg_clerk ">
            <option value="0">Select Clerk</option>
            <?php 
			  $court=$this->session->userdata('court_id');
			  $qryFrm9 = $this->db->query("select * from sc_tbl_user_profile where (user_type=3 or user_type=5 or user_type=7 or user_type=10) AND bench='$benche' AND court='$court'");
			  $fields9 = $qryFrm9->result();
			  foreach($fields9 as $ind=>$fld9){	
			  ?>
            <option value="<?php echo $fld9->id; ?>"><?php echo $fld9->judge_name; ?></option>
            <?php } ?>
            </select>
          </div>
          
          </div>
      
          <div>
          <br />
              <input type="submit" value="Update" class="btn btn-primary">
              <a href="index.php/registration" class="btn btn-danger">Cancel</a>
          </div>
          <br />
        </form>

 </div>






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



function showEdit2()
{
	document.getElementById( 'editBox2' ).style.display = 'block';
}

function closeEdit2()
{
	document.getElementById( 'editBox2' ).style.display = 'none';
}

</script>
<script type="text/javascript" src="css/jquery.js"></script>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript">

 $('document').ready(function(){
    
    
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
       </script>