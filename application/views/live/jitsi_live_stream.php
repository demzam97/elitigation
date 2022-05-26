<!DOCTYPE html>
    <head>
        <title>Title Here</title>
		 <link rel="icon"  sizes="16x16" href="<?php echo base_url();?>uploads/logo.png">
        <meta charset="utf-8" />
		<link href="<?php echo base_url(); ?>optimum/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
		<link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.7/css/bootstrap.css"/>
    	<link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.7.7/css/react-select.css"/>

	
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="description" content="A complete and most powerful school system management system for all. Purchase and enjoy">
		<meta content=" Optimum Linkup - Online Education & Learning Courses HTML CSS Responsive Template" name="description">
		<meta name="author" content="Optimum Linkup Computers">
		<meta name="keywords" content="multi school system, multi branch school, ofine school, super school, html rtl, html dir rtl, 
		rtl website template, bootstrap 4 rtl template, rtl bootstrap template, admin panel template rtl, admin panel rtl, html5 rtl, academy training course css template, 
		classes online training website templates, courses training html5 template design, education training rwd simple template, educational learning management jquery html, 
		elearning bootstrap education template, professional training center bootstrap html, institute coaching mobile responsive template, 
		marketplace html template premium, learning management system jquery html, clean online course teaching directory template, 
		online learning course management system, online course website template css html, premium lms training web template, training course responsive website"/>
	
    </head>
    <body>
        <style type="text/css">
      
            .navbar-inverse {
                background-color: #313131;
                border-color: #404142;
            }
            .navbar-header h4 {
                margin: 0;
                padding: 15px 15px;
                color: #c4c2c2;
            }
            .navbar-right h5 {
                margin: 0;
                padding: 17px 5px;
                color: #c4c2c2;
            }
            .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form{
                border-color: transparent;
            }
        </style>
        <nav id="nav-tool" class="navbar navbar-inverse navbar-fixed-top" >
            <div class="container"><img src="<?php echo base_url();?>/images/logo_video.png" style="height:60px; float:left;">
                <div class="navbar-header">
				
                    <h4 style="color:white"><i class="fa fa-plus"></i> Host By : <?php echo $courtname;?> Court
					</h4>
                </div>
                <div class="navbar-form navbar-right">
                    <h5 style="color:white"> Case Title : <?php echo $casetitle; ?>
					
					</h5>
                </div>
            </div>
        </nav>
		
		<!-- Container That Render Jitsi -->
		<div id="container" style="width:100%;height:100vh">

	<!-- Meet Jitsi API -->	
	<script src="https://meet.jit.si/external_api.js"></script>
	<script>
		var domain = "meet.jit.si";
		var options = {
			userInfo : { 
				email : 'kuenley.k@gmail.com' , 
				displayName : '<?php echo $courtname;?> Court',
				moderator: true,
			},
			roomName: "<?php echo $jitsi_id;?>",
			width: "100%",
			height: "100%",
			parentNode: document.querySelector('#container'),
			configOverwrite: {},
			interfaceConfigOverwrite: {
				// filmStripOnly: true
			}
		}
		var api = new JitsiMeetExternalAPI(domain, options);
			api.executeCommand('subject', '<?php echo $casetitle; ?>');
	</script>
	
		
    </body>
</html>

    