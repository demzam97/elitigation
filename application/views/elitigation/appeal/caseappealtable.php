<div class="container">
 <br /><br /><br />
 <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>
 <?php $uid = $this->session->userdata('user_id');?>
 <h4>Appeal Case</h4><br>
 <div class="table-responsive">
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Reg.No</th>
      <th scope="col">Case Title</th>
      <th scope="col">Disposal Type</th>
      <th scope="col">Judgment No.</th>
      <th scope="col">Judgment Date</th>
      <th scope="col"><i class="fa fa-cogs"></i> Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($usercases as $row):
    $miscid = $this->appeal->get_misc_case_id($row->id);
    $appeal_reg = $this->appeal->get_appeal_registration_user($miscid);
    $disposalid = $this->appeal->get_disposal_id($miscid);
    ?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->reg_no;?></td>
      <td><?php echo $row->case_title;?></td>
      <td>
      <?php echo $this->appeal->get_disposal_name($disposalid);?>
      </td>
      <td>
      <?php 
       $i=1; 
		foreach($appeal_reg as $appreg) { 
      echo $appreg->judgement_no;
    }
      ?>
      </td>
      <td><?php 
       $i=1; 
		foreach($appeal_reg as $appreg) { 
      echo $appreg->judgement_date;
    }
      ?></td>
      <td style="width: 5cm;"> 
      <?php 
      $appeal = $this->appeal->get_appealcases_public($miscid);
      if(count($appeal) <= '0') { ?>
      <a  href="<?php echo site_url('elatappeal/appealcase/'.$miscid.''); ?>">Appeal Case</a>
      <?php } else  { ?>
       <font color = 'blue'>Appealed on:<br> <?php foreach($appeal as $ap) { $apid = $ap->id; echo $ap->created_on; }?><br>
       <a  href="<?php echo site_url('elatappeal/view_appealcase/'.$apid.''); ?>">View</a>
      <?php } ?>
      </td>
    </tr>
    <?php $i++; endforeach;?>
    </tbody>
</table>
</div>
</div>


