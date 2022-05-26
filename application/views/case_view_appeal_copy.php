
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
		<h1 class="page-title">Case Documents</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">

<?php 
echo $filename;?>
<div style="border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%; margin-bottom:50px;">
<?php
     $ext = pathinfo($filename, PATHINFO_EXTENSION);
     if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'PDF')
     { ?>
       <object style="width: 100%; height: 650px; align:center" data="<?php echo base_url('/images/appeal_applicationcopy/'.$filename);?>"></object>
    <?php }
    else {
   ?>
   <iframe src="https://docs.google.com/gview?url=https://cms.judiciary.gov.bt/elat/images/appeal_applicationcopy/<?php echo $filename;?>&embedded=true"
	style="width: 100%; height: 650px; align:center">
            <p>Your browser does not support iframes.</p>
        </iframe>
   <?php 
	} 	
   ?>
</div>
</div>
