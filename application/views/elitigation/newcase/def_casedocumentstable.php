<div class="container">
<?php error_reporting(E_ALL & ~E_NOTICE);?>
 <br /><br /><br />
 <?php $uid = $this->session->userdata('user_id');?>
 <h4>Court Documents</h4><br>
 <div class="table-responsive">
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Reg.No</th>
      <th scope="col">Case Title</th>
      <th scope="col">Document Type</th>
      <th scope="col">Document Name</th>
      <th scope="col">Issue Date</th>
      <th scope="col">Ack</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  foreach($defendants as $def):
  $courtorders = $this->elat->get_court_orders_def($def->caseid);
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
      <td>
      <form action="<?php echo site_url('publicregistration/ack_court_docs'); ?>" method="post">
      <input type="hidden" name="id" value="<?php echo $row->id;?>" />
      <input type="checkbox" id="defaultChecked" name="ack" value='1' <?php if($row->ack == '1') { ?> checked="checked" onclick="return false;" <?php } ?> onclick="submit();"/>
       </form>
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


