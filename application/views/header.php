<!doctype html>
<html lang="en"><head>
<base href="<?php echo base_url() ?>" />
    <meta charset="utf-8">
    <title>Case Management System</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css" /> 
    <link rel="stylesheet" type="text/css" href="css/tab.css" /> 
    <link rel="stylesheet" href="stylesheets/box.css" type="text/css" />
    
       <link rel="stylesheet" href="stylesheets/box.css" type="text/css" />
          <link rel="stylesheet" href="css/colorbox.css" type="text/css" />
          <link rel="stylesheet" href="css/style.css" type="text/css" />
    
     <script type="text/javascript" src="scripts/jquery-1.7.2.min.js"></script> 
     <script type="text/javascript" src="scripts/jquery.colorbox-min"></script> 
    
    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>
    
   
    <script type="text/javascript" src="scripts/ajax.js"></script>
     <script type="text/javascript" src="scripts/ajax_admin.js"></script>
    
	<script src="lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
	
	
        $(function() {
            $(".knob").knob();
        });
    </script>
    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
	<script type="text/javascript">
	$(document).ready(function(e) {
        $('.msg').click(function(e) {
			$(this).parents('.first').fadeOut();
        });
		
		 $('.close').click(function(e) {
			$(this).parents('.first').fadeOut();
        });
		
    });
</script>
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

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="" href="index.html">
          <span class="navbar-brand">
          <img src="<?php echo base_url();?>/images/logo.png" style="height:100px; float:left;">
          <div style="float:left; margin-top:10px;">
          <strong>Case Management System</strong> <br>
          <span style=" font-size:16px; line-height:35px;">Royal Court of Justice, JUDICIARY OF BHUTAN</span>
          </div>
          </span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px; padding:5px; margin-right:50px; margin-top:5px; font-size:12px";>
        <div style="float:right; color:#fff; text-align:right;">
         <span class="glyphicon glyphicon-user padding-right-small" style="position:relative; height:10px;"></span> <?php echo $this->session->userdata('user_name'); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $this->public->get_UserType($this->session->userdata('user_type'));?><br>
          <?php if($this->session->userdata('user_id')!=1){ echo $this->public->get_CourtName($this->session->userdata('court_id'));?>, <?php echo $this->public->get_UserDzongkhag($this->session->userdata('user_id')); } ?><br>
         <a href="index.php/welcome/changePassword" class="logout">Change Password&nbsp;&nbsp;<img src="<?php echo base_url();?>/images/logout.png" style="height:11px; margin-top:-3px;"></a>
         | <a href="index.php/welcome/log_out" class="logout">Log Out&nbsp;&nbsp;<img src="<?php echo base_url();?>/images/logout.png" style="height:11px; margin-top:-3px;"></a>
         
        </div>
        
        
          <!--<ul id="main-menu" class="nav navbar-nav navbar-right">
          
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php  $this->session->userdata('user_name'); ?>
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="#">My Account</a></li>
                <li class="divider"></li>
                <li><a href="index.php/welcome/log_out">Logout</a></li>
              </ul>
            </li>
          </ul>-->

        </div>
      </div>
    </div>
    

    <div class="sidebar-nav">
    <ul>
     <?php if($this->session->userdata('user_type')==1 || $this->session->userdata('user_type')==17) { ?>
    <?php if($title=="Dashboard") { ?>
    <li style="border-top: 1px solid #c8c8cb;"  >
    <?php } else { ?>
        <li style="border-top: 1px solid #c8c8cb;"  >
        <?php } ?>
    
    <a href="index.php/user_dashboard" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Dashboard</a></li>
    <li><a data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>General Masters<i class="fa fa-collapse"></i></a></li>
        <li>
        <?php if($title=="Master") { ?>
        <ul class="legal-menu nav nav-list collapse in">
        <?php } else { ?>
        <ul class="legal-menu nav nav-list collapse">
        <?php } ?>
             <li ><a href="<?php echo site_url('admin/user')?>"><span class="fa fa-caret-right"></span>Users</a></li>
             <?php if($this->session->userdata('user_type')==1) { ?>
            <li ><a href="<?php echo site_url('admin/user_type')?>"><span class="fa fa-caret-right"></span>User Type</a></li>
            <li ><a href="<?php echo site_url('admin/dzongkhag')?>"><span class="fa fa-caret-right"></span>Dzongkhag/Thromde</a></li>
            <li ><a href="<?php echo site_url('admin/dungkhag')?>"><span class="fa fa-caret-right"></span>Dungkhag</a></li>
            <li ><a href="<?php echo site_url('admin/gewog')?>"><span class="fa fa-caret-right"></span>Gewog</a></li>
            <li ><a href="<?php echo site_url('admin/village')?>"><span class="fa fa-caret-right"></span>Village</a></li>
             <?php } ?>
    </ul></li>      
    <?php if($this->session->userdata('user_type')==1) { ?>
      <li><a data-target=".judicial-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i>Judicial Masters<i class="fa fa-collapse"></i></a></li>
        <li>
          <?php if($title=="JMaster") { ?>
        <ul class="judicial-menu nav nav-list collapse in">
        <?php } else { ?>
         <ul class="judicial-menu nav nav-list collapse">
        <?php } ?>        
        <li ><a href="<?php echo site_url('admin/litigant_type')?>"><span class="fa fa-caret-right"></span>Litigant Type</a></li>
        <li ><a href="<?php echo site_url('admin/forms')?>"><span class="fa fa-caret-right"></span>Forms</a></li>
         <li ><a href="<?php echo site_url('admin/article')?>"><span class="fa fa-caret-right"></span>Articles/Sections</a></li>
         <li ><a href="<?php echo site_url('admin/bench')?>"><span class="fa fa-caret-right"></span>Bench</a></li>
        <li ><a href="<?php echo site_url('admin/judicial_process')?>"><span class="fa fa-caret-right"></span>Judicial Process</a></li>
        <li ><a href="<?php echo site_url('admin/enforcement_type')?>"><span class="fa fa-caret-right"></span>Enforcement</a></li>
        <li ><a href="<?php echo site_url('admin/sentence_type')?>"><span class="fa fa-caret-right"></span>Sentence</a></li>
        <li ><a href="<?php echo site_url('admin/document_type')?>"><span class="fa fa-caret-right"></span>Document</a></li>
        <li ><a href="<?php echo site_url('admin/judgement_type')?>"><span class="fa fa-caret-right"></span>Judgement</a></li>
        <li ><a href="<?php echo site_url('admin/disposal_type')?>"><span class="fa fa-caret-right"></span>Disposal</a></li>
        <li ><a href="<?php echo site_url('admin/court_profile')?>"><span class="fa fa-caret-right"></span>Court Profile</a></li>
        <li ><a href="<?php echo site_url('admin/court_type')?>"><span class="fa fa-caret-right"></span>Court</a></li>
        <li ><a href="<?php echo site_url('admin/acts')?>"><span class="fa fa-caret-right"></span>Acts</a></li>
        <li ><a href="<?php echo site_url('admin/case_ground')?>"><span class="fa fa-caret-right"></span>Case Ground</a></li> 
        <li ><a href="<?php echo site_url('admin/case_status')?>"><span class="fa fa-caret-right"></span>Case Status</a></li>           
        <li ><a href="<?php echo site_url('admin/case_type_1')?>"><span class="fa fa-caret-right"></span>Case Level 1</a></li>
       <li ><a href="<?php echo site_url('admin/case_type_2')?>"><span class="fa fa-caret-right"></span>Case Level 2</a></li>
        <li ><a href="<?php echo site_url('admin/case_type_3')?>"><span class="fa fa-caret-right"></span>Case Level 3</a></li>     
        </ul>
        </li>
    <?php } 
     }
    ?>
   
    <?php if($this->session->userdata('user_type')==4) { ?>
    
    <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/registry_view" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
    <li><a href="index.php/registration/insert_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i>Registration</a></li>
    <li><a href="index.php/registration/jitsi_live" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="red">Live Stream</font></b></a></li>
        <li><a href="index.php/registration/e_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="blue">eRegistration</font></b>
        <?php
        $courtid = $this->session->userdata('court_id');
        $elat = count($this->elat->get_cases_header($courtid));
        if($elat >='1'){ ?> <font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font><?php } ?>
         </a></li>
    <li><a href="index.php/registration/miscellaneous_activities" class="nav-header"><i class="fa fa-fw fa-reg" aria-hidden="true"></i>Miscellaneous Activities</a></li>
    <li><a href="index.php/registration/decided_case" class="nav-header"><i class="fa fa-fw fa-case-closed"></i>Decided Case</a></li>
    <li><a href="index.php/registration/appealed_case" class="nav-header"><i class="fa fa-fw fa-case-appeal"></i>Appealed Case</a></li>
    <li><a href="index.php/registration/case_notregistered" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Dismissed Case</a></li>
    <li><a href="index.php/registration/add_litigant" class="nav-header"><i class="fa fa-fw fa-case-lit"></i>Add Litigant</a></li>
    <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
    <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
    <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
	<?php } ?>

  <?php if($this->session->userdata('user_type')==8) { ?>
    
    <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/registry_view" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
    <li><a href="index.php/registration/insert_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i>Registration</a></li>
    <li><a href="index.php/registration/jitsi_live" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="red">Live Stream</font></b></a></li>
        <li><a href="index.php/registration/e_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="blue">eRegistration</font></b>
        <?php
        $courtid = $this->session->userdata('court_id');
        $elat = count($this->elat->get_cases_header($courtid));
        if($elat >='1'){ ?> <font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font><?php } ?>
         </a></li>
    <li><a href="index.php/registration/miscellaneous_activities" class="nav-header"><i class="fa fa-fw fa-reg" aria-hidden="true"></i>Miscellaneous Activities</a></li>
    <li><a href="index.php/registration/decided_case" class="nav-header"><i class="fa fa-fw fa-case-closed"></i>Decided Case</a></li>
    <li><a href="index.php/registration/appealed_case" class="nav-header"><i class="fa fa-fw fa-case-appeal"></i>Appealed Case</a></li>
    <li><a href="index.php/registration/case_notregistered" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Dismissed Case</a></li>
    <li><a href="index.php/registration/add_litigant" class="nav-header"><i class="fa fa-fw fa-case-lit"></i>Add Parties</a></li>
    <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
    <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
    <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
  <?php } ?>
  <?php if($this->session->userdata('user_type')==9) { ?>
    
    <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/registry_view" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
    <li><a href="index.php/registration/miscellaneous_activities" class="nav-header"><i class="fa fa-fw fa-reg" aria-hidden="true"></i>Miscellaneous Activities</a></li>
    <li><a href="index.php/registration/insert_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i>Registration</a></li>
    <li><a href="index.php/registration/jitsi_live" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="red">Live Stream</font></b></a></li>
        <li><a href="index.php/registration/e_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="blue">eRegistration</font></b>
<?php $courtid = $this->session->userdata('court_id');
    $elat = count($this->elat->get_cases_header($courtid));
    if($elat >='1'){ ?> ssss<font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font><?php }
    ?>
</a></li>
  
    <li><a href="index.php/registration/decided_case" class="nav-header"><i class="fa fa-fw fa-case-closed"></i>Decided Case</a></li>
    <li><a href="index.php/registration/appealed_case" class="nav-header"><i class="fa fa-fw fa-case-appeal"></i>Appealed Case</a></li>
    <li><a href="index.php/registration/case_notregistered" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Dismissed Case</a></li>
    <li><a href="index.php/registration/add_litigant" class="nav-header"><i class="fa fa-fw fa-case-lit"></i>Add Litigant</a></li>
    <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
    <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
    <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
  <?php } ?>
    <?php if($this->session->userdata('user_type')==5) { ?>
     <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
     <li><a href="index.php/registration/jitsi_live" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="red">Live Stream</font></b></a></li>
        
     <li><a href="index.php/registration/incase_activity" class="nav-header"><i class="fa fa-fw fa-case-activity"></i>Incase Activity</a></li>
    <?php
   if($this->session->userdata('court_type')=='1')
   {?>
     <li><a href="index.php/registration/review_activity" class="nav-header"><i class="fa fa-fw fa-case-activity"></i>Review Activity</a></li>
     <?php
   }?>
     <li><a href="index.php/registration/decided_case" class="nav-header"><i class="fa fa-fw fa-case-closed"></i>Decided Case</a></li>
     <li><a href="index.php/registration/appealed_case" class="nav-header"><i class="fa fa-fw fa-case-appeal"></i>Appealed Case</a></li>
    <li><a href="index.php/registration/case_notregistered" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Dismissed Case</a></li>
   	 <li><a href="index.php/registration/enforcement" class="nav-header"><i class="fa fa-fw fa-case-lock"></i>Enforcement</a></li>
     <li><a href="index.php/registration/collection_view" class="nav-header"><i class="fa fa-fw fa-case-col"></i>Collection</a></li>
     <li><a href="index.php/registration/add_litigant" class="nav-header"><i class="fa fa-fw fa-case-lit"></i>Add Parties</a></li>
     <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
     <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
     <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
	<?php } ?>
    
     <?php if($this->session->userdata('user_type')==3 ) { ?>
     <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/user_dashboard" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
     <li><a href="index.php/registration/incase_activity" class="nav-header"><i class="fa fa-fw fa-case-activity"></i>Incase Activity</a></li>
     <li><a href="index.php/registration/jitsi_live" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="red">Live Stream</font></b></a></li>
      <?php
	 if($this->session->userdata('court_type')=='1')
	 {?>
     <li><a href="index.php/registration/review_activity" class="nav-header"><i class="fa fa-fw fa-case-activity"></i>Review Activity</a></li>
     <li><a href="index.php/registration/case_notregistered" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Dismissed Case</a></li>
      <li><a href="index.php/registration/case_remanded" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Remand Cases</a></li>
      <li><a href="index.php/registration/case_withdrawn" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Withdrawn Cases</a></li>
     <?php
	 }?>
     <li><a href="index.php/registration/decided_case" class="nav-header"><i class="fa fa-fw fa-case-closed"></i>Decided Case</a></li>
     <li><a href="index.php/registration/appealed_case" class="nav-header"><i class="fa fa-fw fa-case-appeal"></i>Appealed Case</a></li>
    
      	 <li><a href="index.php/registration/enforcement" class="nav-header"><i class="fa fa-fw fa-case-lock"></i>Enforcement</a></li>
     <li><a href="index.php/registration/collection_view" class="nav-header"><i class="fa fa-fw fa-case-col"></i>Collection</a></li>
     <li><a href="index.php/registration/add_litigant" class="nav-header"><i class="fa fa-fw fa-case-lit"></i>Add Parties</a></li>
     <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
     <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
     <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
    <?php } ?>
    <?php if($this->session->userdata('user_type')==2) { ?>
    <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/judge_dashboard" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
    <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/approved_case" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Approved Cases</a></li>
    <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
    <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
    <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
    <?php } ?>
    
    
    <?php if($this->session->userdata('user_type')==7) 
	   { ?>
        <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/hybrid_dash" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
        <li><a href="index.php/registration/miscellaneous_activities" class="nav-header"><i class="fa fa-fw fa-reg" aria-hidden="true"></i>Miscellaneous Activities</a></li>
        <li><a href="index.php/registration/insert_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i>Registration</a></li>
        <li><a href="index.php/registration/jitsi_live" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="red">Live Stream</font></b></a></li>
        <li><a href="index.php/registration/e_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="blue">eRegistration</font></b>
        <?php
        $courtid = $this->session->userdata('court_id');
        $elat = count($this->elat->get_cases_header($courtid));
        if($elat >='1'){ ?> <font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font><?php } ?>
         </a></li>
        <li><a href="index.php/registration/incase_activity" class="nav-header"><i class="fa fa-fw fa-case-activity"></i>Incase Activity</a></li>
        <li><a href="index.php/registration/decided_case" class="nav-header"><i class="fa fa-fw fa-case-closed"></i>Decided Case</a></li>
        <li><a href="index.php/registration/appealed_case" class="nav-header"><i class="fa fa-fw fa-case-appeal"></i>Appealed Case</a></li>
       <li><a href="index.php/registration/case_notregistered" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Dismissed Case</a></li>
        <li><a href="index.php/registration/enforcement" class="nav-header"><i class="fa fa-fw fa-case-lock"></i>Enforcement</a></li>
       <li><a href="index.php/registration/collection_view" class="nav-header"><i class="fa fa-fw fa-case-col"></i>Collection</a></li>
       <li><a href="index.php/registration/add_litigant" class="nav-header"><i class="fa fa-fw fa-case-lit"></i>Add Parties</a></li>
       <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
       <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
       <li><a href="<?php echo site_url('reports/index');?>" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>

	
	<?php } ?>
   <?php if($this->session->userdata('user_type')==10) 
     { ?>
        <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/hybrid_dash" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
        <li><a href="index.php/registration/insert_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i>Registration</a></li>
        <li><a href="index.php/registration/jitsi_live" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="red">Live Stream</font></b></a></li>
        <li><a href="index.php/registration/e_registration" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="blue">eRegistration</font></b>
        <?php
        $courtid = $this->session->userdata('court_id');
        $elat = count($this->elat->get_cases_header($courtid));
        if($elat >='1'){ ?><font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font><?php } ?>
         </a></li>
        <li><a href="index.php/registration/incase_activity" class="nav-header"><i class="fa fa-fw fa-case-activity"></i>Incase Activity</a></li>
        <li><a href="index.php/registration/decided_case" class="nav-header"><i class="fa fa-fw fa-case-closed"></i>Decided Case</a></li>
        <li><a href="index.php/registration/appealed_case" class="nav-header"><i class="fa fa-fw fa-case-appeal"></i>Appealed Case</a></li>
       <li><a href="index.php/registration/case_notregistered" class="nav-header"><i class="fa fa-fw fa-case-diss"></i>Dismissed Case</a></li>
        <li><a href="index.php/registration/enforcement" class="nav-header"><i class="fa fa-fw fa-case-lock"></i>Enforcement</a></li>
       <li><a href="index.php/registration/collection_view" class="nav-header"><i class="fa fa-fw fa-case-col"></i>Collection</a></li>
       <li><a href="index.php/registration/add_litigant" class="nav-header"><i class="fa fa-fw fa-case-lit"></i>Add Parties</a></li>
       <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
       <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
       <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
<?php } ?>

    <?php if($this->session->userdata('user_type')==6) { ?>
     	    <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/judge_dashboard" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
     	    <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
	    <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
	    <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
    <?php } ?>
      <?php if($this->session->userdata('user_type')==11) { ?>
          <li style="border-top: 1px solid #c8c8cb;"><a href="index.php/registration/judge_dashboard" class="nav-header"><i class="fa fa-fw fa-question-circle"></i>Dashboard</a></li>
          <li><a href="<?php echo site_url('casecal');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Calendar</a></li>
      <li><a href="<?php echo site_url('registration/litigantCase');?>" class="nav-header"><i class="fa fa-fw fa-case-cal"></i>Litigant Cases</a></li>
      <li><a href="index.php/Reports/index" class="nav-header"><i class="fa fa-fw fa-case-rep"></i>Reports</a></li>
    <?php } 
     if($this->session->userdata('user_type') != 1) {
     ?>
     <li><a href="index.php/registration/e_feedback" class="nav-header"><i class="fa fa-fw fa-reg"></i><b><font color="blue">Feedback</font></b>
        <?php
        $courtid = $this->session->userdata('court_id');
        $elat = count($this->elat->get_feedback_header($courtid));
        if($elat >='1'){ ?> <font color="red"><i class="fa fa-bell blink_me" aria-hidden="true"></i></font><?php } ?>
         </a></li>
       <?php } ?>
	</ul>
    </div>
<style type="text/css">
  .blink_me {
  animation: blinker 1s linear infinite;
}
@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>

