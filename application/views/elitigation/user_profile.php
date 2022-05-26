<br><br><br><br>
<?php $uid = $this->session->userdata('user_id');?>
<?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
        </div>
     <?php } ?>

  <?php $uid = $this->session->userdata('user_id'); ?>  
  <?php $eid = $this->user->get_user_email($uid); ?>


<!--BHUTANESE-->  
<?php $i=1; foreach($stuff as $single_stuff):?>
<?php 
if($eid ==  $single_stuff['email'])
{
?>
<!--bht-->
<div class="container">  
<div class="card text-center">
  <div class="card-header">
  <h4>User Profile</h4>
  </div>
  <div class="card-body">
        <dl class="dl-horizontal">
        <br>
                <p style="font-size: 15px;"><b>Name:</b> &nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['name'] );?></p>                  
                <p style="font-size: 15px;"><b>Date of Birth:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['dob'] );?></p>
                <p style="font-size: 15px;"><b>Thram No.:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['thram'] );?></p>
                <p style="font-size: 15px;"><b>House No.:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['houseno'] );?></p>
                <p style="font-size: 15px;"><b>Gewog:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['gewog'] );?></p>
                <p style="font-size: 15px;"><b>Village:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['village'] );?></p>
                <p style="font-size: 15px;"><b>Dzongkhag:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['dzongkhag'] );?></p>
                <p style="font-size: 15px;"><b>Occupation:</b>&nbsp;&nbsp;&nbsp;
                <?php 
                   if( $single_stuff['occupation']='1' )
                   echo 'Goverment Employee';
                   elseif( $single_stuff['occupation']='2' )
                   echo 'Private Employee';
                   elseif( $single_stuff['occupation']='3' )
                   echo 'Unemployed';
                ?>
                </p>
                <p style="font-size: 15px;"><b>Email ID:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['email'] );?></p>
                <p style="font-size: 15px;"><b>Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['mobile'] );?></p>
                <p style="font-size: 15px;"><b>Alternate Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['alternate_mobile'] );?></p>
                <p style="font-size: 15px;"><b>Address:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['cur_address_house'] );?>,
                <?php print_r ( $single_stuff['cur_address_street'] );?>,
                <?php print_r ( $single_stuff['cur_address_place'] );?>,
                <?php print_r ( $single_stuff['cur_address_country'] );?>
                </p>
                <button data-id="<?php print_r ( $single_stuff['id'] );?>" type="button" onclick="$('#dataid').val($(this).data('id')); $('#exampleModal').modal('show');" data-loading-text="Loading..." class="btn btn-primary">Edit</button>
        </dl> 
  </div>
  <div class="card-footer text-muted"></div>
</div>
</div>
<!--bhtend-->
<!--edit-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
<div class="modal-body">
<form action="<?php echo site_url('Registration/update_userprofilebht'); ?>" method="post" onsubmit="$('#loading').show();" enctype="multipart/form-data">
<input type="hidden" name="bhtid" id="bhtid" value="<?php print_r ( $single_stuff['id'] );?>">
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Occupation:</b></label>
    <div class="input-group"> 
    <select class="form-control input-group" name="occupation" id="occupation">  
       <option value="<?php print_r ( $single_stuff['occupation'] );?>">
                                  <?php 
                                  if( $single_stuff['occupation'] ='1' )
                                  echo 'Goverment Employee';
                                  elseif( $single_stuff['occupation'] ='2' )
                                  echo 'Private Employee';
                                  elseif( $single_stuff['occupation'] ='3' )
                                  echo 'Unemployed';                                 
                                  ?>
                             </option>
                             <option value="1">Goverment Employee</option>
                             <option value="2">Private Employee</option>
                             <option value="3">Unemployed</option>
                            </select> 
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Email ID:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="email" name="email" class="form-control input-group" required="required" id="email" value="<?php print_r ( $single_stuff['email'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Mobile No.:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="mobile" class="form-control input-sm" required="required" id="mobile" value="<?php print_r ( $single_stuff['mobile'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Alternate Mobile No.:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="alternate_mobile" class="form-control input-group" required="required" id="alternate_mobile" value="<?php print_r ( $single_stuff['alternate_mobile'] );?>">
    </div>
  </div>
  <br>
  <div class="card">
  <div class="card-body" style="background-color: #edecec;">
  <div class="row"><div class="col-md-12"><div class="md-form"><label for="cur_address"><b>Current Address<font color="red">*</font></b></label></div></div></div>
                <div class="row">
                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">House/Building Number<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_house" id="cur_address_house" value="<?php print_r ( $single_stuff['cur_address_house'] );?>" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Street Name<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_street" id="cur_address_street" value="<?php print_r ( $single_stuff['cur_address_street'] );?>" required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Place<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_place" id="cur_address_place" value="<?php print_r ( $single_stuff['cur_address_place'] );?>" required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Country<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_country" id="cur_address_country" value="<?php print_r ( $single_stuff['cur_address_country'] );?>" required autofocus/>
                        </div>
                    </div>
                </div>
  </div>
  </div>

</div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Save</button>
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
</form> 
<div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
</div>
</div>
</div>
<!--editend-->
<?php } ?> 
<?php $i++; endforeach;?>




<!--NONBHUTANESE-->
<?php $i=1; foreach($stuff1 as $single_stuff1):?>
<?php 
if($eid ==  $single_stuff1['email'])
{
?>
<!--nonbht-->
<div class="container">  
<div class="card text-center">
  <div class="card-header">
  <h4>User Profile</h4>
  </div>
  <div class="card-body">
        <dl class="dl-horizontal">
        <br>
                <p style="font-size: 15px;"><b>Name:</b> &nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['name'] );?></p>             
                <p style="font-size: 15px;"><b>Gender:</b>&nbsp;&nbsp;&nbsp;
                  <?php 
                   if( $single_stuff1['gender']='1' )
                   echo 'Male';
                   else echo 'Female';
                  ?>
                </p>     
                <p style="font-size: 15px;"><b>Date of Birth:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['dob'] );?></p>
                <p style="font-size: 15px;"><b>Passport/Document:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['wp_passport'] );?></p>
                <p style="font-size: 15px;"><b>Nationality:</b>&nbsp;&nbsp;&nbsp;
                <?php echo $this->public->get_CountryName($single_stuff1['nationality']); ?>
                </p>
                <p style="font-size: 15px;"><b>State/Province:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['state'] );?></p>
                <p style="font-size: 15px;"><b>District/City:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['district'] );?></p>
                <p style="font-size: 15px;"><b>Occupation:</b>&nbsp;&nbsp;&nbsp;
                <?php 
                   if( $single_stuff1['occupation']='1' )
                   echo 'Goverment Employee';
                   elseif( $single_stuff1['occupation']='2' )
                   echo 'Private Employee';
                   elseif( $single_stuff1['occupation']='3' )
                   echo 'Unemployed';
                  ?>
                </p>
                <p style="font-size: 15px;"><b>Email ID:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['email'] );?></p>
                <p style="font-size: 15px;"><b>Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['mobile'] );?></p>
                <p style="font-size: 15px;"><b>Alternate Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['alternate_mobile'] );?></p>
                <p style="font-size: 15px;"><b>Address:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['cur_address_house'] );?>,
                <?php print_r ( $single_stuff1['cur_address_street'] );?>,
                <?php print_r ( $single_stuff1['cur_address_place'] );?>,
                <?php print_r ( $single_stuff1['cur_address_country'] );?>
                </p>

                <button data-id="<?php print_r ( $single_stuff1['id'] );?>" type="button" onclick="$('#dataid').val($(this).data('id')); $('#exampleModal').modal('show');" data-loading-text="Loading..." class="btn btn-primary">Edit</button>
        </dl> 
  </div>
  <div class="card-footer text-muted"> 
  </div>
</div>
</div>
<!--edit-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
<div class="modal-body">
<form action="<?php echo site_url('Registration/update_userprofilenonbht'); ?>" method="post" onsubmit="$('#loading').show();" enctype="multipart/form-data">
<input type="hidden" name="nonbhtid" id="nonbhtid" value="<?php print_r ( $single_stuff1['id'] );?>">
 
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Occupation:</b></label>
    <div class="input-group">   
    <select class="form-control input-group" name="occupation" id="occupation">  
       <option value="<?php print_r ( $single_stuff1['occupation'] );?>">
                                  <?php 
                                  if( $single_stuff1['occupation'] ='1' )
                                  echo 'Goverment Employee';
                                  elseif( $single_stuff1['occupation'] ='2' )
                                  echo 'Private Employee';
                                  elseif( $single_stuff1['occupation'] ='3' )
                                  echo 'Unemployed';                                 
                                  ?>
                             </option>
                             <option value="1">Goverment Employee</option>
                             <option value="2">Private Employee</option>
                             <option value="3">Unemployed</option>
                            </select>
    </div>
  </div>
 <!-- <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Email ID:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="email" name="email" class="form-control input-group" required="required" id="email" value="<?php print_r ( $single_stuff1['email'] );?>" >
    </div>
  </div>-->
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Mobile No.:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="mobile" class="form-control input-group" required="required" id="mobile" value="<?php print_r ( $single_stuff1['mobile'] );?>" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Alternate Contact:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="alternate_mobile" class="form-control input-group" required="required" id="alternate_mobile" value="<?php print_r ( $single_stuff1['alternate_mobile'] );?>">
    </div>
  </div>
  <br>
  <div class="card">
  <div class="card-body" style="background-color: #edecec;">
  <div class="row"><div class="col-md-12"><div class="md-form"><label for="cur_address"><b>Current Address<font color="red">*</font></b></label></div></div></div>

                <div class="row">
                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">House/Building Number<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_house" id="cur_address_house" value="<?php print_r ( $single_stuff1['cur_address_house'] );?>" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Street Name<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_street" id="cur_address_street"value="<?php print_r ( $single_stuff1['cur_address_street'] );?>"  required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Place<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_place" id="cur_address_place" value="<?php print_r ( $single_stuff1['cur_address_place'] );?>" required autofocus/>
                        </div>
                    </div>

                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Country<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_country" id="cur_address_country" value="<?php print_r ( $single_stuff1['cur_address_country'] );?>" required autofocus/>
                        </div>
                    </div>
                </div>
  </div>
  </div>
  </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Save</button>
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
</div>  
</div>
</div>
<!--editend-->
<?php } ?> 
<?php $i++; endforeach;?>
<!--nonbhtend-->



<!--ORGANIZATION-->
<?php $i=1; foreach($stuff2 as $single_stuff2):?>
<?php 
if($eid ==  $single_stuff2['email'])
{
?>
<!--org-->
<div class="container">  
<div class="card text-center">
  <div class="card-header">
  <h4>User Profile</h4>
  </div>
  <div class="card-body">
        <dl class="dl-horizontal">
        <br>
                <p style="font-size: 15px;"><b>Organization Name:</b> &nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['org_name'] );?></p>
                <p style="font-size: 15px;"><b>Organization Type:</b> &nbsp;&nbsp;&nbsp;
                <?php 
                   if( $single_stuff2['org_type'] ='1' )
                   echo 'Government Agency';
                   elseif( $single_stuff2['org_type'] ='2' )
                   echo 'Private Company';
                   elseif( $single_stuff2['org_type'] ='3' )
                   echo 'International Company';
                 elseif( $single_stuff2['org_type'] ='4' )
                   echo 'Corporation';
                 elseif( $single_stuff2['org_type'] ='5' )
                   echo 'Civil Society Organization';
                  ?>
                </p>    
                <p style="font-size: 15px;"><b>License Number:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['licenseno'] );?></p>     
                <p style="font-size: 15px;"><b>PO Box:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['po_box'] );?></p>
                <p style="font-size: 15px;"><b>Phone Number:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['phone'] );?></p>
                <p style="font-size: 15px;"><b>Fax:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['fax'] );?></p>
                <p style="font-size: 15px;"><b>Office Address:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['office_address'] );?></p>
                <p style="font-size: 15px;"><b>Email ID:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['email'] );?></p>
                <p style="font-size: 15px;"><b>Contact Person:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['contact_person'] );?></p>
                <p style="font-size: 15px;"><b>Contact Person Mobile:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['contactperson_mobile'] );?></p>
                <p style="font-size: 15px;"><b>Alternate Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['alternate_mobile'] );?></p>
                <button data-id="<?php print_r ( $single_stuff2['id'] );?>" type="button" onclick="$('#dataid').val($(this).data('id')); $('#exampleModal').modal('show');" data-loading-text="Loading..." class="btn btn-primary">Edit</button>
        </dl> 
  </div>
  <div class="card-footer text-muted"></div>
</div>
</div>
<!--edit-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form action="<?php echo site_url('Registration/update_userprofile'); ?>" method="post" onsubmit="$('#loading').show();" enctype="multipart/form-data">

<input type="hidden" name="orgid" id="orgid" value="<?php print_r ( $single_stuff2['id'] );?>"> 
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Organization Name:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="org_name" class="form-control input-group" required="required" id="org_name" value="<?php print_r ( $single_stuff2['org_name'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Organization Type:<font color="red">*</font></b></label>
    <div class="input-group">   
     <select class="form-control input-group" name="org_type" id="org_type" required autofocus>
                             <option value="<?php print_r ( $single_stuff2['org_type'] );?>"><?php 
                                  if( $single_stuff2['org_type'] ='1' )
                                  echo 'Government Agency';
                                  elseif( $single_stuff2['org_type'] ='2' )
                                  echo 'Private Company';
                                  elseif( $single_stuff2['org_type'] ='3' )
                                  echo 'International Company';
                                  elseif( $single_stuff2['org_type'] ='4' )
                                  echo 'Corporation';
                                  elseif( $single_stuff2['org_type'] ='5' )
                                  echo 'Civil Society Organization';
                                  ?>
                             </option>
                             <option value="1">Government Agency</option>
                             <option value="2">Private Company</option>
                             <option value="3">International Company</option>
                             <option value="4">Corporation</option>
                             <option value="5">Civil Society Organization</option> 
                            </select> 
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>License Number:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="licenseno" class="form-control input-group" required="required" id="licenseno" value="<?php print_r ( $single_stuff2['licenseno'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>PO Box:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="po_box" class="form-control input-group" required="required" id="po_box" value="<?php print_r ( $single_stuff2['po_box'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Phone Number:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="phone" class="form-control input-group" required="required" id="phone" value="<?php print_r ( $single_stuff2['phone'] );?>">
    </div>
  </div>
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Fax:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="fax" class="form-control input-group" required="required" id="fax" value="<?php print_r ( $single_stuff2['fax'] );?>">
    </div>
  </div>
  <!-- <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Email ID:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="email" name="email" class="form-control input-group" required="required" id="email" value="<?php print_r ( $single_stuff2['email'] );?>">
    </div>
  </div>-->
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Contact Person:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="contact_person" class="form-control input-group" required="required" id="contact_person" value="<?php print_r ( $single_stuff2['contact_person'] );?>" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Contact Person's Mobile No.:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="contactperson_mobile" class="form-control input-group" required="required" id="contactperson_mobile" value="<?php print_r ( $single_stuff2['contactperson_mobile'] );?>" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Alternate Mobile No.:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="alternate_mobile" class="form-control input-group" required="required" id="alternate_mobile" value="<?php print_r ( $single_stuff2['alternate_mobile'] );?>" >
    </div>
  </div>
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Office Address:<font color="red">*</font></b></label>
    <div class="input-group">   
     <textarea class="form-control md-textarea" name="office_address" rows="3" id="office_address" value="<?php print_r ( $single_stuff2['office_address'] );?>" required="required" ><?php print_r ( $single_stuff2['office_address'] );?></textarea>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Save</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        
      </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   

  </div>
</div>
<!--editend-->
<!--orgend-->
<?php } ?> 
<?php $i++; endforeach;?>


<!--LAWYER-->
<?php $i=1; foreach($stuff3 as $single_stuff3):?>
<?php 
if($eid ==  $single_stuff3['email'])
{
?>
<!--lawyer-->
<div class="container">  
  <div class="card text-center">
  <div class="card-header">
  <h4>User Profile</h4>
  </div>
  <div class="card-body">
        <dl class="dl-horizontal">
        <br>
                <p style="font-size: 15px;"><b>Name:</b> &nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['L_Name'] );?></p>             
                <!--<p style="font-size: 15px;"><b>Gender:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['gender'] );?></p>     
                <p style="font-size: 15px;"><b>Date of Birth:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['dob'] );?></p>
                <p style="font-size: 15px;"><b>Thram No.:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['thram'] );?></p>
                <p style="font-size: 15px;"><b>House No.:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['houseno'] );?></p>
                <p style="font-size: 15px;"><b>Gewog:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['gewog'] );?></p>
                <p style="font-size: 15px;"><b>Village:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['village'] );?></p>
                <p style="font-size: 15px;"><b>Dzongkhag:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['dzongkhag'] );?></p>-->
                
                <p style="font-size: 15px;"><b>Bar Council License:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['license'] );?></p>
                <p style="font-size: 15px;"><b>Bar Council Certificate:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['barcouncilcertificate'] );?></p>
            <?php 
            if (strlen(( $single_stuff3['barcouncilcertificate'] )) > 0) {
            ?>
                <a href="/elitigation/images/<?php print_r ( $single_stuff3['barcouncilcertificate'] );?>"><i class="fa fa-camera"></i>&nbsp;View Certificate</a>

                <button data-id="<?php print_r ( $single_stuff3['id'] );?>" type="button" onclick="$('#dataid').val($(this).data('id')); $('#exampleModalup').modal('show');" data-loading-text="Loading..." class="btn btn-warning btn-xs">Upload New Certificate</button>

            <?php
            }
            else{
            ?>
            <?php
            }
            ?>
                
                <p style="font-size: 15px;"><b>Firm:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['Firm'] );?></p>
                <p style="font-size: 15px;"><b>Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['Mobile'] );?></p>
                <p style="font-size: 15px;"><b>Alternate Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['alternate_mobile'] );?></p>
                <p style="font-size: 15px;"><b>Email ID:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['email'] );?></p>
                <p style="font-size: 15px;"><b>Address:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['cur_address_house'] );?>
                <?php print_r ( $single_stuff3['cur_address_street'] );?>
                <?php print_r ( $single_stuff3['cur_address_place'] );?>
                <?php print_r ( $single_stuff3['cur_address_country'] );?></p>

                <button data-id="<?php print_r ( $single_stuff3['id'] );?>" type="button" onclick="$('#dataid').val($(this).data('id')); $('#exampleModal').modal('show');" data-loading-text="Loading..." class="btn btn-primary">Edit</button>
        </dl> 
  </div>
  <div class="card-footer text-muted"> 
  </div>
</div>
</div>
<!--upload-->
    <div class="modal fade" id="exampleModalup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Upload New Bar Council Certificate</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo site_url('Registration/update_userprofilelawcertificate'); ?>" method="post" onsubmit="$('#loading').show();" enctype="multipart/form-data">
      <input type="hidden" name="lawid" id="lawid" value="<?php print_r ( $single_stuff3['id'] );?>">
        <div class="card-body mx-xl-4">                          
        <label for="case_title"><b>Bar Council Certificate:</b></label>
        <div class="input-group">   
        <input type="file" name="barcouncilcertificate" class="form-control" id="fileUpload" >
        </div>
        </div>
        <div class="modal-footer">
         <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Save</button>
         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
    </div>
    </div>



<!--edit-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
<form action="<?php echo site_url('Registration/update_userprofilelaw'); ?>" method="post" onsubmit="$('#loading').show();" enctype="multipart/form-data">

<input type="hidden" name="lawid" id="lawid" value="<?php print_r ( $single_stuff3['id'] );?>"> 

  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Bar Council License:</b></label>
    <div class="input-group">   
     <input type="text" name="license" class="form-control" id="license" value="<?php print_r ( $single_stuff3['license'] );?>">
    </div>
  </div>
 <!-- <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Email ID:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="email" name="email" class="form-control" required="required" id="email" value="<?php print_r ( $single_stuff3['email'] );?>">
    </div>
  </div>-->
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Firm:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="Firm" class="form-control" required="required" id="Firm" value="<?php print_r ( $single_stuff3['Firm'] );?>" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Mobile No.:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="Mobile" class="form-control" required="required" id="Mobile" value="<?php print_r ( $single_stuff3['Mobile'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Alternate Mobile No.:</b></label>
    <div class="input-group">   
     <input type="number" name="alternate_mobile" class="form-control input-group" required="required" id="alternate_mobile" value="<?php print_r ( $single_stuff3['alternate_mobile'] );?>" >
    </div>
  </div>
  <br>
  <div class="card">
  <div class="card-body" style="background-color: #edecec;">
  <div class="row"><div class="col-md-12"><div class="md-form"><label for="cur_address"><b>Current Address<font color="red">*</font></b></label></div></div></div>
                <div class="row">
                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">House/Building Number<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_house" id="cur_address_house" value="<?php print_r ( $single_stuff3['cur_address_house'] );?>" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Street Name<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_street" id="cur_address_street" value="<?php print_r ( $single_stuff3['cur_address_street'] );?>" required autofocus/>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Place<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_place" id="cur_address_place" value="<?php print_r ( $single_stuff3['cur_address_place'] );?>" required autofocus/>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Country<font color="red">*</font></label>
                            <input type="text" class="form-control" name="cur_address_country" id="cur_address_country" value="<?php print_r ( $single_stuff3['cur_address_country'] );?>" required autofocus/>
                        </div>
                    </div>
                </div>
  </div>
  </div>

</div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Save</button>
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
    </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
 
</div>
</div>
<!--editend-->
<!--lawyerend-->
<?php } ?> 
<?php $i++; endforeach;?>
