<div class="content">

<!--Breadcrumb-->
   <div class="header">
    <h1 class="page-title">Registration</h1>
    <ul class="breadcrumb">
      <li><a href="index.html">Home</a> </li>
            <li>Registration</li>
      <li class="active">Registered Case</li>
        </ul>
  </div>
<!--End Breadcrumb-->

<div class="main-content">  
<?php echo form_open('registration/reassign_case_to'); ?>
      <div class="form-group">
          <input type="hidden" name="case_id" value="<?php echo $case_id;?>" />

            <label>Judge:</label><br />
            
            <select class="form-control" style="width:40%;" name="reg_judge" id="reg_judge ">
            <option value="0">Select Judge</option>
            <?php foreach($judges as $judge):?>




            <option value="<?php echo $judge->id; ?>" <?php if($judge==$judge->id){ ?> selected<?php } ?>><?php echo $judge->judge_name; ?></option>
            <?php endforeach; ?>
            </select><!--<a id="add_rtio_type2" class="btn btn-default" style="float:right; margin-top:-35px; ">Add More</a>-->
        </div>
      <div class="form-group" id="bench_clerk">
            <label>Clerk / Registrar:</label><br />
            <select class="form-control" style="width:40%;" name="reg_clerk" id="reg_clerk ">
            <option value="0">Select Clerk</option>
            <?php 
             $court=$this->session->userdata('court_id');
             $qryFrm9 = $this->db->query("select * from sc_tbl_user_profile where (user_type=3 or user_type=5 or user_type=7) AND bench='$benche' AND court='$court'");
             $fields9 = $qryFrm9->result();
             foreach($fields9 as $ind=>$fld9){ 
             ?>
            <option value="<?php echo $fld9->id; ?>"><?php echo $fld9->judge_name; ?></option>
            <?php } ?>
            </select>
        </div>
          
        <div>
          <br />
              <input type="submit" value="Update" class="btn btn-primary">
              <a href="index.php/registration" class="btn btn-danger">Cancel</a>
        </div>
    </form>

 </div>






