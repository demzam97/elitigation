<div class="content">
<!--Breadcrumb-->
   <div class="header">
    <h1 class="page-title">Registration</h1>
    <ul class="breadcrumb">
      <li><a href="index.php/registration/user_dashboard">Home</a> </li>
            <li>Registration</li>
      <li class="active">Registration</li>
        </ul>
   </div>
<!--End Breadcrumb-->


<div class="main-content"> 
  <div class="search-well">
    <!--<table class="table table-bordered">
             <div class="form-group col-md-6">
              <label for="case_title">Case Title</label>
              <input type="text" class="form-control" name="case_title" placeholder="Search by Case Title">
            </div>
            <div class="form-group col-md-6">
              <label for="litigant_name">Litigant Name</label>
              <input type="text" class="form-control" name="litigant_name" placeholder="Search by Litigant Name">
            </div>
            <div class="form-group col-md-6">
              <label for="litigant_cid">Litigant CID</label>
              <input type="text"class="form-control" name="litigant_cid" placeholder="Search by Litigant CID">
            </div> 
            <div class="form-inline form-group col-md-6">
              <label for="registration_no">Registration No</label>
              <input type="text" class="form-control"name="registration_no" placeholder="Search by Registration No">
            </div>
              <button type="button" id="enf_search" class="btn btn-success fa fa-search">Search</button></table>-->
          <form method="post" action="index.php/registration/search_case_info" class="form-inline" style="margin-top:0px;">
              <input class="input-xlarge form-control" placeholder="Search by Registration No" name="search_case" type="text">
              <button class="btn btn-default" type="submit" id="search_case"><i class="fa fa-search"></i> Go</button>
          </form>
    </div>

    <hr>
  <h3>Enforcement Details</h3>
  <div class="panel panel-default">   
      <table id="case_table"class="table table-bordered table-striped">
          <thead>
            <?php 
            if(!empty($_POST)){

            if(count($enforcement_case)==0 ) { ?>
              <tr>
            <th colspan="6"><strong>Record Not Found...</strong></th>
              </tr>
              <?php } else { ?>
            <tr>
                <th width="10%">Case ID</th>
                <th width="25%">Issue</th>
                <th width="10%">Registration No</th>
                <th width="10%">Registration Date</th>
                <th width="10%">Judgement No</th>
                <th width="10%">Judgement By</th>
                <th width="10%">Judgement Date</th>
                <th width="10%">Litigants</th>
                <th width="5%">Opponent</th>
            </tr>
          </thead>
          <tbody>
            <?php }
                  $i=0;
          foreach($enforcement_case as $row) :
        echo "<tr>";
          echo" <td> ".$row->id."</td>
          <td>".$this->public->get_CaseName($row->id)."</td>
            <td>".$row->reg_no."</td>
            <td>".$row->reg_date."</td>";
             foreach($judgement as $judgement) :
              echo"<td>".$judgement->judgement_no."</td>
                  <td>".$this->public->get_UserName($this->public->get_signing_judge($judgement->id))."</td>
                 <td>".$judgement->judgement_date."</td>";
            endforeach; 
         ?>
            <td><?php echo (($this->public->get_case_applicant($row->id))!==NULL? $this->public->get_LitigantName($this->public->get_case_applicant($row->id)):"");?></td>
            <td><?php echo (($this->public->get_case_opponent($row->id))!=NULL ? $this->public->get_LitigantName($this->public->get_case_opponent($row->id)):"");?></td>
        <?php
          $i++;
          $this->session->set_userdata('caseinfo',$enforcement_case);
          endforeach; 
            }?>
        </tr>
          </tbody>
        </table>
  </div>
      <table class="table table-bordered table-striped">
      <?php echo form_open("registration/add_enforcement");
        ?>
        <div class="col-md-6 form-group">
          <label for="application_date">Application Date</label>
          <input type="date" class="form-control" name="application_date" value="<?php echo set_value('application_date'); ?>" placeholder="Application Date" required>
        </div>
        <div class="col-md-6 form-group">
          <label for="misc_hearing_date">Miscellaneous Hearing Date</label>
          <input type="date" class="form-control" name="misc_hearing_date" value="<?php echo set_value('misc_hearing_date'); ?>" required>
        </div>
        <div class="col-md-6 form-group">
          <label for="misc_no">Miscellaneous No</label>
          <input type="text" class="form-control" name="misc_no" value="<?php echo set_value('misc_no'); ?>" placeholder="Miscellaneous No" required>
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
        <div class="col-md-12 form-group">
            <label for="details">Details</label>
            <textarea name="details" value="<?php echo set_value('details'); ?>" class="form-control" cols="30" rows="10" required></textarea>
          </div>
      <hr>
      <div class="form-group col-md-6 col-md-offset-4">
            <input type="submit" name="enforce_case" value="Save" class="btn btn-primary">&nbsp;&nbsp;
            <a href="index.php/registration" class="btn btn-danger">Cancel</a>
        </div>
      <?php 
      echo form_close();?>
    </table>
 </div>


 