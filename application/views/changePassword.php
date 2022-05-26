<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Change Password</h1>
		
	</div>
<!--End Breadcrumb-->
<div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span></div>
<div class="main-content"> 
<br>
<form action="<?php echo site_url();?>/welcome/passwordChange" method="post">
      <table class="blank_tbl">
      <tbody>
      <tr>
      <td width="35%" style="text-align:right;">
            
            <label>Old Password : &nbsp;&nbsp;&nbsp;&nbsp;</label>
       </td>
       <td width="65%" >
            <input type="text" name="old_pass" class="form-control" style="width:50%;" required>
            <br>
       </td>
         </tr>
         <tr>
         <td style="text-align:right;">
            
            <label>New Password : &nbsp;&nbsp;&nbsp;&nbsp;</label>
       </td>
       <td>
            <input type="password" name="new_pass1" class="form-control" style="width:50%;" required>
            <br>
       </td>
       </tr>
       <tr>
        <td style="text-align:right;">
            
            <label>Confirm Password :&nbsp;&nbsp;&nbsp;&nbsp;</label>
       </td>
       <td>
            <input type="password" name="new_pass2" class="form-control" style="width:50%;" required>
            <br>
       </td>
       </tr>
       
       <tr>
        <td style="text-align:right;">
           
       </td>
       <td style="float:left; margin-left:100px;">
            <input type="Submit" value="Change" class="btn btn-primary">
            <input type="button"  value="Cancel" class="btn btn-danger">
            <br>
       </td>
       </tr>
       </tbody>
          </table>
    </form>  
</div>
</div>