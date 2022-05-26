<div class="container">
<?php error_reporting(E_ALL & ~E_NOTICE);?>
 <br /><br /><br />
 <?php $uid = $this->session->userdata('user_id');?>
 <div class="table-responsive">
<h4>Court Documents</h4>
<i><b>Note:</b>&nbsp;&nbsp;<font color='red'>Court Orders and other documents issued by the court can be found here.</font></i>
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Reg.No</th>
      <th scope="col">Case Title</th>
      <th scope="col">Document Type</th>
      <th scope="col">Document Name</th>
      <th scope="col">Issue Date</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   foreach($misccaseid as $def):
    $courtorders = $this->elat->get_court_orders_def($def->id);
 $i=1; foreach($courtorders as $row):?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $this->elat->get_regno($row->misc_caseid);?></td>
      <td><?php echo $this->elat->get_casetitle_1($row->misc_caseid);;?></td>
      <td><?php echo $row->document_type;?></td>
      <td>
      <?php 
       echo $row->document_copy;?>
      &nbsp;&nbsp;
      <a href="<?php echo site_url('publicregistration/viewFile/'.$row->document_copy.'');?>" target="_blank">
      <i class="fa fa-download" style="color:green;"></i>
      </a>
      </td>
      <td>
      <?php echo $row->issue_date;?>
      </td>
      
    </tr>
    <?php $i++; endforeach;
   endforeach;
   ?>
    </tbody>
</table>
</div>

</div>
</body>
</html>


