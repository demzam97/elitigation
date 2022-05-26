<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en"><head>
<base href="<?php echo base_url() ?>" />
    <meta charset="utf-8">
    <title>CMS-Login</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
         <a class="" href="index.html">
          <span class="navbar-brand">
          <img src="<?php echo base_url();?>/images/logo.png" style="height:100px; float:left;">
          <div style="float:left; margin-top:10px;">
          <strong>Case Management System</strong> <br>
          <span style=" font-size:16px; line-height:35px;">Royal Court of Justice, JUDICIARY OF BHUTAN</span>
          </div>
          </span></a>

        <div class="navbar-collapse collapse" style="height: 1px;">        </div>
      </div>
</div>
    
  <div class="dialog">
    <div class="panel panel-default" style="border:1px solid #ddd;">
        <p class="panel-heading no-collapse" style="background:#207D38; line-height:1em; margin:-1px; color:#fff; font-size:14px; font-weight:bold;">Change Password</p>
        <div class="panel-body">
        
  <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span>
      </div>
      <div class="card-body"> 
      <form method="post" action="<?php echo site_url();?>/welcome/passwordChangeCmis">
      <input type="hidden" class="form-control form-control-sm" id="userid" name="userid" value="<?php echo $userid; ?>">
        <div class="col-md-12">
       <div class="form-group" id="prime_cat">
           <albel>Username</albel>
            <input type="text" value="<?php echo $this->user->get_user_email($userid); ?>" name="username" class="form-control input-group-lg" placeholder="Username">  
       </div>	   
       <div class="form-group" id="prime_cat">
       <albel>New Password<font color="red">*</font></albel>
            <input type="text" value="<?php echo set_value('new_password'); ?>" name="new_password" class="form-control input-group-lg" placeholder="New Password" required="required">  
       </div>
	   <?php if(form_error('new_password')){echo "<span style='color:red'>".form_error('new_password')."</span>";} ?>
	   
       <div class="form-group" id="prime_cat">
       <albel>Confirm New Password<font color="red">*</font></albel>
            <input type="password" value="<?php echo set_value('confirm_password'); ?>" name="confirm_password" class="form-control input-group-lg" placeholder="Confirm Password" required="required">  
       </div>
	   <?php if(form_error('confirm_password')){echo "<span style='color:red'>".form_error('confirm_password')."</span>";} ?>

       <div class="form-group" id="prime_cat">
       <albel>e-Mail<font color="red">*</font></albel>
            <input type="email" value="" name="email" class="form-control input-group-lg" placeholder="Email" required="required">  
       </div>
       <?php if(form_error('email')){echo "<span style='color:red'>".form_error('email')."</span>";} ?>
       <albel>Mobile No.<font color="red">*</font></albel>
            <input type="text" value="" name="mobileno" class="form-control input-group-lg" placeholder="Mobile Number" required="required">  
       </div>
       
       <div class="form-group col-md-12">
       <br />
            <input  class="btn btn-primary" type="submit" value="Submit" onclick="return confirm('Are you sure to submit');">
        </div>
        </div>
       </form>
        </div>
    </div>


</div>

    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>
