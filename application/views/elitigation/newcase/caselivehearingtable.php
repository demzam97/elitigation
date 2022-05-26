<div class="container">
 <br /><br /><br />
 <?php $uid = $this->session->userdata('user_id');?>

 <br /><br />
 <div class="table-responsive">
<h4>Live Hearing</h4>
<i><b>Note:</b>&nbsp;&nbsp;<font color='red'>The Active Link for the scheduled Court Hearing will be shown below.</font></i>
<table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sl.No</th>
      <th scope="col">Reg.No</th>
      <th scope="col">Case Title</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Status</th>
      <th scope="col">URL</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($usercases as $row):
    $liveurl = $this->elat->get_live_details($row->misc_case_id)
    ?>
   <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $row->reg_no;?></td>
      <td><?php echo $row->case_title;?></td>
      <td><?php
       foreach($liveurl as $liv):
        echo $liv->meeting_date; echo "<br>";
       endforeach;
      ?></td>
      <td>
      <?php
       foreach($liveurl as $liv):
        echo $liv->start_time; echo "<br>";
       endforeach;
      ?>
      </td>
      <td>
      </td>
      <td>
      <?php
       foreach($liveurl as $liv):?>
         <a href="<?php echo $liv->url; ?>" target="_blank"><?php echo $liv->url; ?></a>
        <?php echo "<br>";
       endforeach;
      ?>
      </td>
    </tr>
    <?php $i++; endforeach;?>
    </tbody>
</table>
</div>

</div>
</body>
</html>


