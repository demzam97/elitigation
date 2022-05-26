<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Reports</h1>
	</div>
<!--End Breadcrumb-->
<?php $usertype=$this->session->userdata('user_type');?>
 <?php $court_type=$this->session->userdata('court_type');?>  
<div class="main-content">
	<div style="padding-left:100px;">
		<table>  
        
              <tbody>              
                <tr>                 
                  <td height="25"><a href="index.php/reports/monthly_case_count" title="Edit" target="_blank"><i class="fa fa-camera"> </i>&nbsp;&nbsp;Monthly Case Count</a></td>                         
                </tr>
               <tr>                 
                  <td height="25"><a href="index.php/reports/case_level_count/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Case Level Count</a></td>                
                </tr>
                <tr>                 
                  <td height="25"><a href="index.php/reports/stages_of_hearing/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Stages of Hearing</a></td>                         
                </tr>
               <tr>                 
                  <td height="25"><a href="index.php/reports/decided_case/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Decided Cases Within 108 days, Less Than 365 days and More Than 365 Days</a></td>                  

                </tr>
                <tr>                 
                  <td height="25"><a href="index.php/reports/judge_decided/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Case Decided by Judges</a></td>           
                </tr>
                 <tr>                  
                  <td height="25"><a href="index.php/reports/deposition_decided/" title="Edit" target="_blank"><i class="fa fa-camera">  </i> &nbsp;&nbsp;Case Count by Disposal Methods</a></td>           
                </tr>
                <tr>                  
                  <td height="25"><a href="index.php/reports/clerk_decided/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Case Count by Clerks</a></td>          
                </tr>    
                
                <tr>                  
                  <td height="25"><a href="index.php/reports/cl_1/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Case Count by Case Level I</a></td>          
                </tr> 
                                
                <tr>                  
                  <td height="25"><a href="index.php/reports/cl_2/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Case Count by Case Level II</a></td>          
                </tr>     
                <tr>                  
                  <td height="25"><a href="index.php/reports/cl_3/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Case Count by Case Level III</a></td>          
                </tr>   
                

                <?php if(($usertype == '6' ) || ($usertype == '11')): ?>			
                <tr>                  
                  <td height="25"><a href="index.php/reports/cj_general/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Overall Report</a></td>          
                </tr>   
                <?php elseif($this->session->userdata('court_type')=='1'):?>
                  <tr>                  
                  <td height="25"><a href="index.php/reports/supremebench/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Overall Report</a></td>          
                </tr>   
				<?php  else: ?>
				<tr>                  
                  <td height="25"><a href="index.php/reports/general/" title="Edit" target="_blank"><i class="fa fa-camera">  </i>&nbsp;&nbsp;Overall Report</a></td>          
                </tr>
                <?php endif; ?>

                <tr>
                <td height="25"><a href="index.php/reports/chart_pc" title="Edit" target="_blank"><i class="fa fa-camera"> </i>&nbsp;&nbsp;Pending Cases (Chart)</a></td>
                </tr>  
                <tr>  <td height="25"><a href="index.php/reports/chart_rc" title="Edit" target="_blank"><i class="fa fa-camera"> </i>&nbsp;&nbsp;Registered Cases (Chart)</a></td></tr>  
                <tr>  <td height="25"><a href="index.php/reports/chart_dc" title="Edit" target="_blank"><i class="fa fa-camera"> </i>&nbsp;&nbsp;Decided Cases (Chart)</a></td></tr>      
                                
              </tbody>
		</table>
</div>
</div>
