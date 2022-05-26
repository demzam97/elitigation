<div class="content">

<!--Breadcrumb-->
   <div class="header">
    <h1 class="page-title">Review Registration</h1>
    
  </div>
<!--End Breadcrumb-->

<div class="main-content"> 

  <div class="panel panel-default">
    <table class="table table-bordered table-striped">
              <thead>
              <?php              
              if(count($registration)==0) { ?>
              <tr>
                  <th colspan="6"><strong>Record Not Found...</strong></td>
              </tr>
              <?php } else { ?>
                <tr>
                  <th width="7%">Sl.No</th>
                
                  <th>Misc Case No</th>
                  <th>Misc.Case date</th>
                  <th width="30%">Case Title</th>
                  <th>Review Activity</th>
                  <th width="10%">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              <?php $i=1; foreach($registration as $reg) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
               
                  <td><?php echo $reg->misc_case_no; ?></td>
                  <td><?php echo $reg->misc_hearing_date?></td>
                  <td><?php echo $reg->case_title; ?></td>
                  <td><a href="index.php/registration/insert_review_activities/<?php echo $reg->id;?>" title="View">Insert Review Activities</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                  <td><a href="index.php/registration/view_case/<?php echo $reg->id; ?>" title="View">View</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <!--<a href="index.php/registration/review_case" title="Review">Review</a>--></td>
                </tr>
              <?php $i++; } } ?>
              </tbody>
    </table>
</div>

</div>

