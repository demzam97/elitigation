<?php ini_set('memory_limit', '3000M'); ?>
<style>
  #lawBox {
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
    max-height: 500px;
    overflow: auto;
    height: auto;
  }
</style>
<div class="content">
  <!--Breadcrumb-->
  <div class="header">
    <h1 class="page-title">Feed Back</h1>
  </div>
  <!--End Breadcrumb-->
  <?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
    </div>
  <?php } ?>
  <div class="main-content">
    <table class="table table-bordered table-striped">
      <thead>
        <?php if (count($feedback) == 0) { ?>
          <tr>
            <th colspan="6"><strong>No Records ...</strong></td>
          </tr>
        <?php } else { ?>
          <tr>
            <th width="1%">Sl.No</th>
            <th>Date</th>
            <th>Registration No.</th>
            <th>Case Title</th>
            <th>Name</th>
            <th>Judgement Copy</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody id="main-tbody">
        <?php $i = 1;
          foreach ($feedback as $case) { ?> 
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $case->created_on; ?></td> 
            <td><?php echo $this->elat->get_caseno_1($case->case_id);?></td>
            <td><?php echo $this->elat->get_casetitle_1($case->case_id);?></td>
            <td><?php echo $this->elat->get_elat_username($case->ceeated_by);?></td>
            <td><?php 
            if($case->judgement =='0') { echo "Not Sent";} else { echo "Sent"; }
            ?> &nbsp;&nbsp <?php echo $case->send_date; ?></td>
            <td>
             <a href="index.php/registration/view_elat_feedback/<?php echo $case->case_id; ?>"><i class="fa fa-camera"></i>View</a> 
            </td>
          </tr>
      <?php $i++;
          }
        } ?>
      </tbody>
    </table>
  </div>
</div>

<link rel="stylesheet" href="styles/jquery-ui.css" />
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
