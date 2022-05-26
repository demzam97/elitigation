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
		<h1 class="page-title">Assign Review Case</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">


<!-------------------------------REVIEW CASES---------------------------->

	<div class="panel panel-default">
  <?php
  foreach($cases as $case)
  {
	  ?>
      <form method="post" action="<?php echo site_url('registration/ReviewAssignClerk'); ?>">
      <input type="hidden" value="<?php echo $case->id; ?>" name="case_id" />
		<table class="table table-bordered table-striped">
            <tr>
                <td width="20%"><strong>Misc No</strong></td>
                <td width="25%"><?php echo $case->misc_case_no; ?></td>
                <td width="20%"><strong>Case Title</strong></td>
                <td width="25%"><input type="text" class="form-control" value="<?php echo $case->case_title; ?>" name="case_title" id="case_title"></td>
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
                <td><strong>Assign Clerk</strong></td>
                <td>
                <select name="clerk" id="clerk" class="form-control">
                <option value="0" selected disabled>Select Clerk</option>
                <?php 
				$clerks=$this->public->get_clerk_bench($this->session->userdata('bench'));
		         foreach($clerks as $clerk)
				 {
				?>             
                <option value="<?php echo $clerk->id; ?>"><?php echo $clerk->judge_name; ?></option>
                <?php
				 }?>
                 </select>
                </td>
                <td colspan="2">
                <div id="litBox">
    <?php
	$this->load->view('caseActivity_Lits');
	?>
</div>
                
                </td>
                
            </tr>
		</table>
        <input type="button" value="Cancel" class="btn btn-danger pull-right" style="margin-left:20px;"/>  

        <input type="submit" class="btn btn-primary pull-right" value="Assign" />
         </form>
        <?php
  } ?>

    </div>
    <!------------------------------------------REVIEW END----------------->

<?php $this->load->view('LitAdd'); ?>


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