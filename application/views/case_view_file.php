
     <style>
#editBox
{
	display:none;
	top:100px !important;
	z-index:10;
	padding:10px;
	margin: 10px 20% 0 20%;
	width:450px;
	position:fixed;
	background:#fff;
	border:1px solid #BBB;
	box-shadow:0px 0px 30px #999;
	height:auto;
}
#judgeAdd
{
	display:none;
	top:100px !important;
	z-index:10;
	padding:10px;
	margin: 10px 20% 0 20%;
	width:450px;
	position:fixed;
	background:#fff;
	border:1px solid #BBB;
	box-shadow:0px 0px 30px #999;
	height:auto;
}
#litAdd
{
	display:none;
	top:80px !important;
	z-index:10;
	padding:10px;
	margin: 10px 20% 0 20%;
	width:450px;
	position:fixed;
	background:#fff;
	border:1px solid #BBB;
	box-shadow:0px 0px 30px #999;
	height:auto;
	max-height:500px;
}
.levels
{
   max-width:250px;
   min-width:250px;
   margin-left:30px;
}
#lawView
{
   display: none;
    top: 100px !important;
    z-index: 10;
    padding: 10px;
    margin: 10px 30% 0px 30%;
    width: 600px;
    position: fixed;
    background: #fff;
    border: 1px solid #BBB;
    box-shadow: 0px 0px 30px #999;
	max-height:500px;
	overflow:auto;
    height: auto;
}

#lawBox
{
   display: none;
    top: 100px !important;
    z-index: 10;
    padding: 10px;
    margin: 10px 20% 0 20%;
    width: 600px;
    position: fixed;
    background: #fff;
    border: 1px solid #BBB;
    box-shadow: 0px 0px 30px #999;
	max-height:500px;
	overflow:auto;
    height: auto;
}
</style>


          
<div class="content">
<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Case Application Documents</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">

<?php 
if($type == 'PT'){
$filename;?>
<div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
<?php
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if($ext == 'JPG' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'PDF' || $ext == 'docx')
     { ?>
       <object width="800px" height="700px" data="<?php echo base_url('/images/petition_copy/'.$filename);?>"></object>
    <?php }
    else {
   ?>
   <iframe src="https://docs.google.com/gview?url=https://cms.judiciary.gov.bt/elat/images/petition_copy/<?php echo $filename;?>&embedded=true"
        style="width: 120%; height: 650px">
            <p>Your browser does not support iframes.</p>
        </iframe>
   <?php 
	} 	
   ?>
</div>
<?php 
	} 	

   if($type == 'CID'){
      $filename;?>
      <div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
      <?php
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           if($ext == 'JPG' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'PDF' || $ext == 'docx')
           { ?>
             <object width="800px" height="700px" data="<?php echo base_url('/images/cid_copy/'.$filename);?>"></object>
          <?php }
          else {
         ?>
         <iframe src="https://docs.google.com/gview?url=https://cms.judiciary.gov.bt/elat/images/petition_copy/<?php echo $filename;?>&embedded=true"
              style="width: 120%; height: 650px">
                  <p>Your browser does not support iframes.</p>
              </iframe>
         <?php 
         } 	
         ?>
      </div>
      <?php 
         } 	
	
if($type == 'JD'){
$filename;?>
<div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
<?php
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if($ext == 'JPG' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'PDF' || $ext == 'docx')
     { ?>
       <object width="800px" height="700px" data="<?php echo base_url('/images/juirisdication_copy/'.$filename);?>"></object>
    <?php }
    else {
   ?>
   <iframe src="https://docs.google.com/gview?url=https://cms.judiciary.gov.bt/elat/images/juirisdication_copy/<?php echo $filename;?>&embedded=true"
        style="width: 100%; height: 650px">
            <p>Your browser does not support iframes.</p>
        </iframe>		
	<?php 
	} 	
   ?>
</div>
<?php 
	} 	
	if($type == 'RD'){ echo $type;
$filename;?>
<div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
<?php
     echo $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if($ext == 'JPG' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'PDF' || $ext == 'docx')
     { ?>
       <object width="800px" height="700px" data="<?php echo base_url('/images/relevant_copy/'.$filename);?>"></object>
    <?php }
    else {
   ?>
   <iframe src="https://docs.google.com/gview?url=https://cms.judiciary.gov.bt/elat/images/relevant_copy/<?php echo $filename;?>&embedded=true"
        style="width: 100%; height: 650px">
            <p>Your browser does not support iframes.</p>
        </iframe>		
	<?php 
	} 	
   ?>
</div>
<?php 
	} 	
	
if($type == 'CS'){
$filename;?>
<div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
<?php
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if($ext == 'JPG' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'PDF' || $ext == 'docx')
     { ?>
       <object width="800px" height="700px" data="<?php echo base_url('/images/chargesheet/'.$filename);?>"></object>
    <?php }
    else {
   ?>
   <iframe src="https://docs.google.com/gview?url=https://cms.judiciary.gov.bt/elat/images/chargesheet/<?php echo $filename;?>&embedded=true"
        style="width: 120%; height: 650px">
            <p>Your browser does not support iframes.</p>
        </iframe>
   <?php 
	} 	
   ?>
</div>
<?php 
	} 	
   ?>
</div>
