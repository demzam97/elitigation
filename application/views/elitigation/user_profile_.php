<br>
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
                <p style="font-size: 15px;"><b>Gender:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['gender'] );?></p>     
                <p style="font-size: 15px;"><b>Date of Birth:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['dob'] );?></p>
                <p style="font-size: 15px;"><b>Thram No.:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['thram'] );?></p>
                <p style="font-size: 15px;"><b>House No.:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['houseno'] );?></p>
                <p style="font-size: 15px;"><b>Gewog:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['gewog'] );?></p>
                <p style="font-size: 15px;"><b>Village:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['village'] );?></p>
                <p style="font-size: 15px;"><b>Dzongkhag:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['dzongkhag'] );?></p>
                <p style="font-size: 15px;"><b>Occupation:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['occupation'] );?></p>
                <p style="font-size: 15px;"><b>Email ID:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['email'] );?></p>
                <p style="font-size: 15px;"><b>Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['mobile'] );?></p>
                <p style="font-size: 15px;"><b>Address:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff['cur_address'] );?></p>
                <button data-id="<?php print_r ( $single_stuff['id'] );?>" type="button" onclick="$('#dataid').val($(this).data('id')); $('#exampleModal').modal('show');" data-loading-text="Loading..." class="btn btn-primary">Edit</button>
        </dl> 
  </div>
  <div class="card-footer text-muted">
    
  </div>
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
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="dataid" value=""> 
<div class="row"> 
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Contact:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="mobile" class="form-control" required="required" id="mobile" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Occupation:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="occupation" class="form-control" required="required" id="occupation" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Address:<font color="red">*</font></b></label>
    <div class="input-group">   
     <textarea class="form-control md-textarea" name="cur_address" rows="3" id="cur_address" placeholder="House/Building Number,&#10;Country"></textarea>
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Document Name:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="document_name" class="form-control" required="required" id="fileUpload" >
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Save</button>
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
                <p style="font-size: 15px;"><b>Gender:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['gender'] );?></p>     
                <p style="font-size: 15px;"><b>Date of Birth:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['dob'] );?></p>
                <p style="font-size: 15px;"><b>Nationality:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['nationality'] );?></p>
                <p style="font-size: 15px;"><b>Party Type:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['party_type'] );?></p>
                <p style="font-size: 15px;"><b>Passport:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['wp_passport'] );?></p>
                <p style="font-size: 15px;"><b>State/Province:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['state'] );?></p>
                <p style="font-size: 15px;"><b>District/City:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['district'] );?></p>
                <p style="font-size: 15px;"><b>Occupation:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['occupation'] );?></p>
                <p style="font-size: 15px;"><b>Email ID:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['email'] );?></p>
                <p style="font-size: 15px;"><b>Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['mobile'] );?></p>
                <p style="font-size: 15px;"><b>Address:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff1['cur_address'] );?></p>

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
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="dataid" value=""> 

  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Name:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="name" class="form-control" required="required" id="name" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Gender:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="gender" class="form-control" required="required" id="gender" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Date of Birth:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="date" name="dob" class="form-control" required="required" id="dob" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Nationality:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="nationality" class="form-control" required="required" id="nationality" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Party Type:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="party_type" class="form-control" required="required" id="party_type" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Passport:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="wp_passport" class="form-control" required="required" id="wp_passport" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>State/Province:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="state" class="form-control" required="required" id="state" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>District/City:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="district" class="form-control" required="required" id="district" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Occupation:<font color="red">*</font></b></label>
    <div class="input-group">   
     <select class="form-control" name="occupation" id="occupation">
                              <option selected>Select Occupation</option>
                              <option value="1">Goverment Employee</option>
                              <option value="2">Private Employee</option>
                              <option value="3">Freelance Employee</option>
                             </select>

    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Email ID:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="email" name="email" class="form-control" required="required" id="email" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Contact:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="mobile" class="form-control" required="required" id="mobile" >
    </div>
  </div>
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Address:<font color="red">*</font></b></label>
    <div class="input-group">   
     <textarea class="form-control md-textarea" name="cur_address" rows="3" id="cur_address" placeholder="House/Building Number,&#10;Country"></textarea>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Save</button>
      </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
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
                <p style="font-size: 15px;"><b>Organization Type:</b> &nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['org_type'] );?></p>    <p style="font-size: 15px;"><b>License Number:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['licenseno'] );?></p>     
                <p style="font-size: 15px;"><b>PO Box:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['po_box'] );?></p>
                <p style="font-size: 15px;"><b>Phone Number:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['phone'] );?></p>
                <p style="font-size: 15px;"><b>Alternate Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['contactperson_mobile'] );?></p>
                <p style="font-size: 15px;"><b>Fax:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['fax'] );?></p>
                <p style="font-size: 15px;"><b>Email ID:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['email'] );?></p>
                <p style="font-size: 15px;"><b>Contact Person:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['contact_person'] );?></p>
                <p style="font-size: 15px;"><b>Office Address:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff2['office_address'] );?></p>

                <button data-id="<?php print_r ( $single_stuff2['id'] );?>" type="button" onclick="$('#dataid').val($(this).data('id')); $('#exampleModal').modal('show');" data-loading-text="Loading..." class="btn btn-primary">Edit</button>
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
<form action="<?php echo site_url('Registration/update_userprofile'); ?>" method="post" onsubmit="$('#loading').show();" enctype="multipart/form-data">

<input type="hidden" name="orgid" id="orgid" value="<?php print_r ( $single_stuff2['id'] );?>"> 
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Organization Name:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="orgname" class="form-control" required="required" id="orgname" value="<?php print_r ( $single_stuff2['org_name'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Organization Type:<font color="red">*</font></b></label>
    <div class="input-group">   
     <select class="form-control" name="org_type" id="org_type" required autofocus>
                             <option value=""><?php print_r ( $single_stuff2['org_type'] );?></option>
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
     <input type="number" name="licenseno" class="form-control" required="required" id="licenseno" value="<?php print_r ( $single_stuff2['licenseno'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>PO Box:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="po_box" class="form-control" required="required" id="po_box" value="<?php print_r ( $single_stuff2['po_box'] );?>">
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Phone Number:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="phone" class="form-control" required="required" id="phone" value="<?php print_r ( $single_stuff2['phone'] );?>">
    </div>
  </div>
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Contact Person's Mobile No.:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="contactperson_mobile" class="form-control" required="required" id="contactperson_mobile" value="<?php print_r ( $single_stuff2['contactperson_mobile'] );?>" >
    </div>
  </div>
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Fax:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="fax" class="form-control" required="required" id="fax" value="<?php print_r ( $single_stuff2['fax'] );?>">
    </div>
  </div>
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Email ID:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="email" name="email" class="form-control" required="required" id="email" value="<?php print_r ( $single_stuff2['email'] );?>">
    </div>
  </div>
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Contact Person:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="contact_person" class="form-control" required="required" id="contact_person" value="<?php print_r ( $single_stuff2['contact_person'] );?>" >
    </div>
  </div>
   <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Office Address:<font color="red">*</font></b></label>
    <div class="input-group">   
     <textarea class="form-control md-textarea" name="office_address" rows="3" id="office_address" value="<?php print_r ( $single_stuff2['office_address'] );?>"></textarea>
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
                <!--<p style="font-size: 15px;"><b>Name:</b> &nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['name'] );?></p>             
                <p style="font-size: 15px;"><b>Gender:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['gender'] );?></p>     
                <p style="font-size: 15px;"><b>Date of Birth:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['dob'] );?></p>
                <p style="font-size: 15px;"><b>Thram No.:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['thram'] );?></p>
                <p style="font-size: 15px;"><b>House No.:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['houseno'] );?></p>
                <p style="font-size: 15px;"><b>Gewog:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['gewog'] );?></p>
                <p style="font-size: 15px;"><b>Village:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['village'] );?></p>
                <p style="font-size: 15px;"><b>Dzongkhag:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['dzongkhag'] );?></p>-->


                <p style="font-size: 15px;"><b>Email ID:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['email'] );?></p>
                <p style="font-size: 15px;"><b>Bar Council License:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['license'] );?></p>
                <p style="font-size: 15px;"><b>Firm:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['Firm'] );?></p>
                <p style="font-size: 15px;"><b>Contact:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['Mobile'] );?></p>
                <p style="font-size: 15px;"><b>Address:</b>&nbsp;&nbsp;&nbsp;<?php print_r ( $single_stuff3['Address'] );?></p>

                <button data-id="<?php print_r ( $single_stuff3['id'] );?>" type="button" onclick="$('#dataid').val($(this).data('id')); $('#exampleModal').modal('show');" data-loading-text="Loading..." class="btn btn-primary">Edit</button>
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
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" id="dataid" value=""> 
<div class="row"> 
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Bar Council License:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="license" class="form-control" id="license" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Email ID:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="email" name="email" class="form-control" required="required" id="email" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Firm:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="Firm" class="form-control" required="required" id="Firm" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Contact:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="number" name="Mobile" class="form-control" required="required" id="Mobile" >
    </div>
  </div>
  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Address:<font color="red">*</font></b></label>
    <div class="input-group">   
     <textarea class="form-control md-textarea" name="cur_address" rows="3" id="cur_address" placeholder="House/Building Number,&#10;Country"></textarea>
    </div>
  </div>

  <div class="card-body mx-xl-4">                          
    <label for="case_title"><b>Document Name:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="text" name="document_name" class="form-control" required="required" id="fileUpload" >
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to Submit the Form');">Save</button>
      </div>
  </form> 
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>   
    </div>
  </div>
</div>
<!--editend-->
<!--lawyerend-->
<?php } ?> 
<?php $i++; endforeach;?>