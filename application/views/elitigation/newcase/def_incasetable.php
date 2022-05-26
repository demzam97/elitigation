<div class="container">
<?php error_reporting(E_ALL & ~E_NOTICE);?>
 <br /><br /><br />
 <?php $uid = $this->session->userdata('user_id');?>
 <h4>Incase Actvities</h4><br><br />
 <div class="table-responsive">
 <table class="table table-bordered table-sm table-striped">
  <thead class="thead-dark">
  <tr><td colspan="5"><i><b>Note:</b>&nbsp;&nbsp;<font color='red'>Incase Activties will be availabe once the case is registered.</font></i></td></tr>
    <tr>
      <th scope="col">Reg.No</th>
      <th scope="col">Case Title</th>
      <th scope="col">Judicial Process</th>
      <th scope="col">Form Used</th>
      <th scope="col">Activity Date</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  foreach($defendants as $def):
    $usercases = $this->elat->get_cases_public_caseid($def->caseid);
  $sl=1; 
  foreach($usercases as $row):
  if($row->reg_no != ''){
  ?>
   <tr>
      <td><?php echo $row->reg_no;?></td>
      <td><?php echo $row->case_title;?></td> 
      <td><?php $miscid = $this->public->get_misc_case_id($row->id);
	            if($miscid != ''){
                $judicials =$this->public->get_Activity_cases($miscid);
                $jc = count($judicials);
                if($jc != '0')
				    {
                     $i=1; foreach($judicials as $fld):
                     echo $i;echo ". "; echo $this->public->get_judicial_name($fld->judicial_process_id); echo "<br>";
                     $i++; endforeach;
                    }
                    else
                    {
                     echo "No Judicial Process";
                    }
				}
				else
				{
					echo "No Judicial Process";
				}
                ?>
              
      </td>
      <td>
      <?php 
      $miscid = $this->public->get_misc_case_id($row->id);
	  if($miscid != ''){
      $forms =$this->public->get_forms_cases($miscid);
      $jcf = count($forms);
      if($jcf != '0')
	     {
          $j=1; foreach($forms as $fld):
          echo $j;echo ". "; echo $this->public->get_form_name($fld->form_used); echo "<br>";
          $j++; endforeach;
         }
        else
         {
          echo "No Judicial Forms";
         }
	  }
      else
	  {
		 echo "No Judicial Forms"; 
	  }		  
      ?>
      </td>
      <td>
      <?php
      $miscid = $this->public->get_misc_case_id($row->id);
	  if($miscid != ''){
      $judicials =$this->public->get_Activity_cases($miscid);
      $jcount = count($judicials);
      if($jcount != '0')
	    {
         $i=1; foreach($judicials as $fld):
         echo $fld->activity_date; echo "<br>";
         $i++; endforeach; 
		}
		else
		{
			
		}
	  }
	  else
	  {}
      ?>
      </td>
    </tr>
    <?php
   }	
	 endforeach;
	 $sl++;
    endforeach; 
    ?>
    </tbody>
</table>
</div>

</div>
</body>
</html>


