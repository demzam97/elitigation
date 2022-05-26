
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
</style>


          
<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Case Activities</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content"> 

   

  <div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
<table style="width:100%; float:left;" cellspacing="10px" class="table table-bordered table-striped">
<tr>
   <td width="15%" ><strong>Case Title:</strong></td>
   <td width="40%">
   <div  id="caseTitleBox">
   <div id="caseTitle"><?php echo $case_title; ?><a href="#" style="float:right; margin:10px;" id="editTitle"><i class="fa fa-pencil"></i> Edit</a></div>
   
           <div id="editCaseTitle" style="display:none;"><input type="text" value="<?php echo $case_title; ?>" name="newCaseTitle" id="newCaseTitle" class='form-control' style="width:100%;"/><a href="#" style="float:right; margin:10px; background:#06C; color:#fff; padding:5px 10px; border-radius: 3px;" id="saveTitle">Save</a></div>
   </div>
   </td>
   <td width="15%"><strong>Application Date:</strong></td><td><?php echo $app_date; ?></td>
   </tr>
   <tr>
   <td><strong>Registeration No:</strong></td><td><?php echo $reg_no; ?></td>
   <td><strong>Registeration Date:</strong></td><td><?php echo $reg_date; ?></td>
   </tr>
   <tr>
   <td><strong>Hearing Date:</strong></td><td><?php echo $hearing_date; ?></td>
   <td><strong>Judge:</strong><input type="button" value="Add" class="css_btn_class" onclick="addJudge()" style="width:70px; height:30px; line-height:20px; float:right;"/></td><td><?php foreach($aJudges as $aj){ echo $this->public->get_UserName($aj->judge_id)."<a href='".site_url('registration/deleteCaseJudgeIncase/'.$aj->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></a><br>"; } ?></td>
   </tr>
</table>

<table style="width:48%; float:left; " cellspacing="10px" class="table table-bordered table-striped">
<tr>
   <td><strong>Case Type</strong><input type="button" value="Add" class="css_btn_class" onclick="showEdit()" style="width:70px; height:30px; line-height:20px; float:right;"/></td>
     
   <?php 
   if(empty($case_types))
   {
	   echo "<tr><td>No Case Type Selected!</td></tr>";
   }
   else
   {
    $i=1;
            foreach($case_types as $types)
            {
              $var = $types->case_type_id;
                     if(is_numeric($var)) 
                     {
                  echo $i."- ".$this->public->getLevel3Name($types->case_type_id)."<a href='".site_url('registration/deleteCaseTypeCaseIncase/'.$types->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></span></a><br>";
                     }
                    else
                     {
                  echo $i."- ".$types->case_type_id."<a href='".site_url('registration/deleteCaseTypeCaseIncase/'.$types->id)."' onclick='return confirm(\"Are you sure?\")'><img src='".base_url()."/images/cross.png' style='width:10px; float:right; margin-top:5px;'></span></span></a><br>";
                     }
                      
                    $i++;
                   }
                  }
                  ?></td>
                      
                   </tr>
		  
</table>
<div id="litBox">
    <?php
	$this->load->view('caseActivity_Lits');
	?>
</div>
</div>
<br />

<br />
<?php $this->load->view('LitAdd'); ?>
    
 <div id="judgeAdd">
 <span style="width:100%;">
      <strong>Assign Judge</strong>
      <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="addJudgeClose();"/>
  </span>
      <hr />
      <form action="<?php echo site_url('registration/addCaseJudge');?>" method="post">
      <input type="hidden" value="<?php echo $case_id; ?>" name="cid" />
      <label>Select Judge : </label>
      <select name="newJudge" class="levels">
      <option value="" selected="selected" disabled="disabled">Select One</option>
      <?php
	  foreach($judges as $jd)
	  {?>
         <option value="<?php echo $jd->id; ?>"><?php echo $this->public->get_UserName($jd->id);?></option>
      <?php
	  }?>
      </select><br /><br />
      <input type="submit" value="Update" class="btn btn-primary pull-left" style="margin-left:275px;"/> 
      <input type="button" value="cancel" class="btn btn-primary pull-right" onclick="addJudgeClose();"/>
      </form>
    </div>
    
    
    
    
<div id="lawBox">

<?php
$this->load->view('case_activityLawyerAdd');
?>
</div>



<div id='editBox'>
  <span style="width:100%;">
      <strong>Select Case Type</strong>
      <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="closeEdit();"/>
  </span>
  <hr />
  <form name="caseFilter" id="caseFilter" method="post" action="<?php echo site_url('registration/updateCaseTypeIncase'); ?>">
  <input type="hidden" name="caseid" value="<?php echo $case_id; ?>" />
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
      <option value="0" disabled="disabled" selected="selected">Select Level1 One</option>
      </select>
      </div> <br />
      <div id="clevel3">
      <label>Case Level 3 </label><select name="level3" id="level3" class="levels">
      <option value="0" disabled="disabled" selected="selected">Select Level2 One</option>
      </select>
      
      </div>
       <br />
      <div id="other" style="display: none;">                  
                  <label>Other Case CL3</label>                  
                     <input type="text" name="othercl3" id="othercl3" class="form-control">                 
                  </div>  
              
     <br />
      <br />
       <input type="submit" id="addCase" value="Update" class="btn btn-primary pull-left" style="margin-left:275px;"/> 
      <input type="button" value="cancel" class="btn btn-primary pull-right" onclick="closeEdit();"/>
         
      </form>
</div>

	
<?php if(count($judicials)==0){} else { ?>
<table class="table table-bordered table-striped" style=" float:left;">
        <thead>
        	<tr>
				<th>Sl.No</th>
                <th>Judicial Process</th>
                <th>Activity Date</th>
                <th>Forms Used</th>
                <th>Live Hearing</th>
                <th width="20%">Action</th>
            </tr>
         </thead>
         <tbody>
         <?php $i=1; foreach($judicials as $fld): ?>
         	<tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $this->public->get_judicial_name($fld->judicial_process_id); ?></td>
             <td><?php echo $fld->activity_date; ?></td>
			 <td><?php 
			        $j_form=$this->public->getJudicialForms($case_id,$fld->id);
			 if(empty($j_form))
			 {
				 echo "No Form Selected";
			 }
			 else
			 {
				 foreach($j_form as $jfm)
				 {
				   echo $this->public->get_form_name($jfm->form_used)."<br>";
				 }
			 }
			 ?>
			 
			 </td>
             <td>
             <a href="index.php/registration/livemeet/<?php echo $fld->judicial_process_id; ?>/<?php echo $case_id; ?>/<?php echo "c"; ?>"><i class="fa fa-video-camera" aria-hidden="true"></i>&nbsp;Configure</a><br /><br />
             </td>
             <td>
                 <a href="index.php/registration/edit_caseActivity/<?php echo $fld->id; ?>"><i class="fa fa-pencil"></i> Edit</a>
                 <a href="index.php/registration/delete_judicialProcess/<?php echo $fld->id; ?>" onclick="return confirm('Are you sure to delete?');"><img src="images/cross.png" style="height:12px;"> Delete</a>
                
                </tr>
         <?php $i++; endforeach; ?>
         </tbody>
</table>

<div style="float:left;min-height:50px !important; width:100%;">
<div style="float:right;"><a href="index.php/registration/judgement/<?php echo $case_id; ?>" class="btn btn-danger pull-right"> Case Complete</a> </div>
<?php } ?>

<div style="float:left;">
<a href="index.php/registration/insert_case_activity/<?php echo $case_id; ?>" class="btn btn-primary pull-left">Add Judicial Process</a>
</div>
</div>



<div id="lawView">

</div>
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
	
	
	
});
</script>

    
     
     
      <script type="text/javascript">
            $(document).ready(function(){

	 
	 
		$("#search_button_lit").click(function(){
                     search();
                  });
				  
                 function search(){
 
                      var title=$("#search_Lit_CID").val();
                      //alert(title);
                      var case_id=$("#caseLit").val(); 
		    var s_check=$("#s_check:checked").val();
		    var reject=$("#reject").val();				  
					  
                      if(title!=""){
                         $.ajax({
                            type:"post",
                            url:"index.php/registration/getLitIncase",
                            data:{'g' : title,
                                  'case_id' : case_id,
				's_check' : s_check,'reject' : reject
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