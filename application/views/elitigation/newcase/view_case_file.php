
<div class="content">
<div class="main-content">
<div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
<?php
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'PDF')
     { ?>
       <object style="width: 100%; height: 650px; align:center" data="<?php echo base_url('/images/jforms/'.$filename);?>"></object>
    <?php }
    else {
   ?>
   <iframe src="https://docs.google.com/gview?url=https://cms.judiciary.gov.bt/elat/images/jforms/<?php echo $filename;?>&embedded=true"
        style="width: 100%; height: 650px; align:center">
            <p>Your browser does not support iframes.</p>
        </iframe>
   <?php 
	} 	
   ?>
</div>
</div>
