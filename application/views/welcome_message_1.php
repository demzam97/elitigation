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
        <p class="panel-heading no-collapse" style="background:#207D38; line-height:1em; margin:-1px; color:#fff; font-size:14px; font-weight:bold;">Sign In</p>
        <div class="panel-body">
        <div class="card">
  <div class="card-body">
    <h5 class="card-title"><b>You logged in for the First time, for security reasons please reset your password.</b></h5>
    <a href="<?php echo site_url ('welcome/changePasswordCmis/'.$uid); ?>" class="btn btn-primary">Change Password</a>
    
  </div>
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
