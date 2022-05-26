<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>e-Litigation</title>
	<link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo base_url('styles/normalize.css')?>" type="text/css">
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
</head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" 
      crossorigin="anonymous"> 

<body>
<img src="<?php echo base_url('images/elitigation.png')?>" class="img-fluid" alt="Responsive image" >
<nav class="navbar navbar-expand-md navbar-light bg-success mb-3">
    <div class="container">
        <a href="<?php echo base_url ('login/userdashboard'); ?>" class="navbar-brand mr-3" style="color: white;">Dashboard</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">

                <a href="/elat/public/case/case_submission" class="nav-item nav-link" style="color: white;">Case Submission</a>
            </div>
            <div class="navbar-nav ml-auto">
            <?php $session = session(); ?>
            <h7><?php echo $session->get('user');?></h7>
                <a href="<?php echo site_url('login/logout');?>" class="nav-item nav-link" style="color: white;">Log Out</a>
            </div>
        </div>
    </div>    
</nav>
<div class="col-sm-12">
<div class="card">
<form action="<?php echo site_url('Case_submission/store_case'); ?>" method="post" enctype="multipart/form-data" onsubmit="$('#loading').show();">
<div class="row"> 
  <div class="card-body mx-xl-4">                          
    <div class="form-group col-md-14">
        <label for="court"><b>Court:<font color="red">*</font></b></label>
        <select class="form-control form-control" name="court" id="court">
        <!-- <select class="form-control form-control" name="court" id="court" required autofocus> -->
          <option value="">-- Select Court --</option>
          <?php foreach($courts as $row):?>
          <option value="<?php echo $row['id'];?>"><?php echo $row['court_name'];?></option>
          <?php endforeach;?>
        </select>

    </div>
    <div class="form-group col-md-14">
        <label for="case_title"><b>Case Title:<font color="red">*</font></b></label>
        <input type="text" class="form-control form-control" name="case_title">
    </div>
    <div class="form-group col-md-14">
        <label for="case_brief"><b>Case Brief:</b></label>
        <textarea class="form-control form-control" name="case_brief"  id="case_brief" rows="6"></textarea>
    </div>
  </div>

  <div class="card-body mx-xl-4">                          
    <div class="form-group col-md-14">
   (Defendents Details)
        <label for="Name"><b>Name:</b></label>
        <input type="text" class="form-control form-control" id="name" name="dname">
    </div>
    <div class="form-group col-md-14">
       <label for="CID"><b>CID:</b></label>
       <input type="text" class="form-control form-control" id="cid" name="cid">
    </div>
     <div class="form-group col-md-14">
       <label for="defendentcontact"><b>Contact No.:</b></label>
       <input type="text" class="form-control form-control" name="defendentcontact">
    </div>
    <div class="form-group col-md-14">
        <label for="address"><b>Address:</b></label>
        <textarea class="form-control form-control" name="address"  id="address" rows="2"></textarea>
    </div>
  </div>

  <div class="card-body mx-xl-4">
  <br>
    <div class="form-group col-md-14">
    <label for="case_title"><b>Upload Application Copy:<font color="red">*</font></b></label>
    <div class="input-group">   
     <input type="file" name="file" class="form-control" required="required" id="fileUpload" >
    </div>
    </div>

    <div class="form-group col-md-14">      
    <label for="case_title"><b>Hearing Option:<font color="red">*</font></b></label>
    <br>


    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="defaultUnchecked" name="hearingoption" value='R'>
    <label class="custom-control-label" for="defaultUnchecked">Remote Hearing</label>
    </div>
    <div class="custom-control custom-radio">
    <input type="radio" class="custom-control-input" id="defaultChecked" name="hearingoption" value='C'>
    <label class="custom-control-label" for="defaultChecked">Courtroom Hearing</label>
    </div>

    <br><button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit ?');">Submit</button>
    <button type="submit" class="btn btn-danger"><a href="" style="color: white;">Cancel</a></button>
    
  </div>
  <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
  <div id="loading" style="display:none">Please Wait...</div>
</div>
</form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js')?>"></script>
</body>
</html>
<style>
body {
background-image: url("<?php echo base_url('images/background.png')?>");
background-repeat: no-repeat;
background-color: #cccccc;
background-size: cover; 
} 
</style>
