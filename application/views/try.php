<link rel="stylesheet" href="styles/jquery-ui.css"/>
<link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script>
    $(function() {
	    $( "#dialog:ui-dialog" ).dialog( "destroy" );
 
        $( "#dialog-confirm" ).dialog({
            autoOpen: false,
            resizable: false,
            height:140,
            modal: true,
            hide: 'Slide',
            buttons: {
                "Delete": function() {
                    var del_id = {id : $("#del_id").val()};
					  	$.ajax({
                        type: "POST",
                        url : "<?php echo site_url('element/delete_temp_gewogvillage')?>",
                        data: del_id,
                        success: function(msg){
                            $('#show').html(msg);
                            $('#dialog-confirm' ).dialog( "close" );
                            //$( ".selector" ).dialog( "option", "hide", 'slide' );
                        }
                    });
 
                    },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
	
        $( "#form_input" ).dialog({
            autoOpen: false,
            height: 200,
            width: 380,
            modal: false,
            hide: 'Slide',
            buttons: {
                "Add": function() {
                    var form_data = {
                        id: $('#id').val(),
						gewog: $('#gewog').val(),
						village: $('#village').val(),
                        ajax:1
                    };
 
                    if($('#gewog').val() == ""){
					$('#gewog').focus();
 					$('#gewog').style.borderColor="#cc0000";
					return false;
					}
 
                  $.ajax({
                    url : "<?php echo site_url('element/submit_tempGewogVillage')?>",
                    type : 'POST',
                    data : form_data,
                    success: function(msg){
					$('#show').html(msg),
                    $('#id').val(''),
                    $('#gewog').val(''),
					$('#village').val(''),
                    $('#gewog').attr("disabled",false);
					$('#village').attr("disabled",false);
                    $( '#form_input' ).dialog( "close" )
					
                    }
					
                  });
  				  
            },
                Cancel: function() {
                    $('#id').val(''),
                    $('#gewog').val('');
					$('#village').val('');
                    $( this ).dialog( "close" );
                }
            },
            close: function() {
                $('#id').val(''),
                $('#gewog').val('');
				$('#village').val('');
            }
        });
 
    $( "#create-daily" )
            .button()
            .click(function() {
                $( "#form_input" ).dialog( "open" );
            });
    });
	
	$(".delbutton").live("click",function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        $('#del_id').val(del_id);
        $( "#dialog-confirm" ).dialog( "open" );
 
        return false;
    });
 	
    </script>
<div class="content">

<!--Breadcrumb-->
   <div class="header">
		<h1 class="page-title">Registration</h1>
	</div>
<!--End Breadcrumb-->

<div class="main-content">
<input type="button" id="create-daily" value="Add Gewog/Village" >
</div>

<div id="form_input" title="Insert/Edit Item">
      <table>
        <?php echo form_open('registration/ssss'); ?>
        <input type="hidden" value='' id="id" name="id">
        <tr>
         <td>dsfasdfsda</td>
        </tr>
      </table>
    </div>