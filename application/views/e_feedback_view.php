<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Feed Back</h1>
	</div>
     <!--End Breadcrumb-->
<div class="main-content">
<div class="container">
  
    <div class='column'>
      <div class='blue-column'>
      
      <?php foreach($feedback as $case) { ?> 
        <div class="form-group">
        <label for="party_type"><b>1. Did e-Litigation help you achieve the desired outcome?</b></label>
        <font color="blue"><?php echo $case->q1; ?></font>
        </div>
        <div class="form-group">
        <label for="party_type"><b>2. Explain why?</b></label>
        <font color="blue"><?php echo $case->q1ans; ?></font>
        </div>

        <div class="form-group">
        <label for="party_type"><b>3. Will you use e-Litigation in the future?</b></label>
        <font color="blue"><?php echo $case->q2; ?></font>
        </div>
        <div class="form-group">
        <label for="party_type"><b>4. Explain why?</b></label>
        <font color="blue"><?php echo $case->q2ans; ?></font>
        </div>

        <div class="form-group">
        <label for="party_type"><b>5. How easy is it to navigate the e-Litigation system?</b></label>
        <font color="blue"><?php echo $case->q3; ?></font>
        </div>
        <div class="form-group">
        <label for="party_type"><b>6. Explain why?</b></label>
        <font color="blue"><?php echo $case->q3ans; ?></font>
        </div>

        <div class="form-group">
        <label for="party_type"><b>7. Is the system User-friendly?</b></label>
        <font color="blue"><?php echo $case->q4; ?></font>
        </div>
        <div class="form-group">
        <label for="party_type"><b>8. Explain why?</b></label>
        <font color="blue"><?php echo $case->q4ans; ?></font>
        </div>

        <div class="form-group">
        <label for="party_type"><b>9. Why did you choose to go for e-Litigation?</b></label>
        <font color="blue"><?php echo $case->q5; ?></font>
        </div> 

        <div class="form-group">
        <button class="btn btn btn-outline-primary py-0"><a  href="<?php echo site_url('registration/send_judgement_copy/'.$case->case_id.'');?>">Send Judgment Copy to the Litigants</a></button>
        </div> 
    
    
    <hr>
    <form name="frm1" method="post" action="index.php/registration/accept_elat_feedback" >
    <input type="hidden" name="case_id" value="<?php echo $case->case_id;?>"
    <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Accept</button>
    </form>
      </div>
    </div>
    <?php  } 
     ?> 
    
  
</div>
</div>
</div>
<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>

<script type="text/javascript">
$(function() {
    $('#reject').click(function() {
        $('.txbx').attr('hidden',false);
    });           
    $('#register').click(function() {
        $('.txbx').attr('hidden',true);
    });
});
</script>
<style>
.row {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 100%;
}

.column {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  flex: 1;
}
</style>
