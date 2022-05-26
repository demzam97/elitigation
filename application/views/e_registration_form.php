<style>
    #lawBox {
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
        max-height: 500px;
        overflow: auto;
        height: auto;
    }
</style>
<div class="content">
    <!--Breadcrumb-->
    <div class="header">
        <h1 class="page-title">Registration</h1>
    </div>
    <!--End Breadcrumb-->

    <div class="main-content">
        <div style=" border-radius:5px; padding:15px; height:auto; float:left; width:100%; margin-bottom:10px; border:1px solid #ddd;">

            <form name="frm1" method="post" action="index.php/registration/add_elat_registration" enctype="multipart/form-data" onsubmit="return validate()">
                <input type="hidden" name="court" value="<?php echo $this->session->userdata('court_id'); ?>" />
                <input type="hidden" name="elatcaseid" value="<?php echo $ecaseid; ?>" />
                <input type="hidden" name="eemail" value="<?php echo $emailid; ?>" />
                <input type="hidden" name="hearing_time" value="<?php echo $hearingtime; ?>" />
                <input type="hidden" name="appno" value="<?php echo $appno; ?>" />
                <input type="hidden" name="pstatus" value="<?php echo $pstatus; ?>" />


                <div style=" border-radius:5px; padding:10px;">

                    <table class="blank_tbl">
                        <tr>
                        </tr>
                        <tr>
                            <td width="15%">

                                <label>Miscellaneous Number:</label>
                            </td>
                            <td width="20%">
                                <input type="text" name="misc_case" id="misc_case" class="form-control" style="width:80%;" value="<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" />

                                <div id="showExist">


                                </div>
                            </td>
                            <td width="15%">
                                <label>Date:</label>
                            </td>
                            <td width="20%">
                                <input type="date" id="start_dt" name="app_date" class="datepicker" value="<?php echo $appdate; ?>" style=" width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
                            </td>
                        </tr>
                        <tr>
                            <td>

                                <label>Case Title<font color="red">*</font>: </label>
                            </td>
                            <td>
                                <input type="text" name="case_title" id="case_title" class="form-control" style="width:80%;" value="" required="required"/>

                            </td>
                            <td>
                                <label>Miscellaneous Hearing Date:</label>
                            </td>
                            <td>
                               <input type="date" id="start_dt" class="datepicker" name="hearing_date" value="<?php echo $hearingdate; ?>" style=" width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
                            </td>
                        </tr>
                    </table>
                </div>

                <hr />


                <div style="float:right; width:58%; padding:10px;">
                    Petitioner / Plaintiff : &nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <a id="create-daily" class="btn btn-default">Add</a> -->

                    <br />
                    <br />
                    <div id="show">
                        <?php $this->load->view('temp_litigantName_elat'); ?>
                    </div>

                </div>

                <div style="float:left; padding:10px; min-width:38%;">
                    <label>Miscellaneous Hearing Judges:</label>&nbsp;&nbsp;&nbsp;&nbsp;<a id="add_rtio_type1" class="btn btn-default">Add </a>
                    <br />
                    <br />
                    <div class="form-group" style="display:none;">

                        <select class="form-control" name="hearing" style="width:70%;">
                            <option value="0" disabled selected>Select One</option>
                            <?php foreach ($judges as $judge) : ?>
                                <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div id="rtio_type1">

                    </div>

                </div>


        </div>
        <br />


        <div class="form-group" style="text-align:center; ">

            <input type="radio" name="reg_status" value="1" onClick="showhidediv(this);" id="radio1" /><label for="radio1" style="font-size:14px; font-weight:bold; color:#666;">&nbsp;Register</label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="reg_status" value="2" onClick="showhidediv(this);" id="radio2" /><label for="radio2" style="font-size:14px; font-weight:bold; color:#666;">&nbsp;Dismiss</label>

        </div>
        <div style="display:none; border:1px solid #ddd; border-radius:5px; padding:10px;" id="one">
            <table style="width:100%;">
                <tr>
                    <td style="width:50%;">

                        <div class="form-group">
                            <label>Registration Number:</label><br />
                            <input type="text" name="reg_number" id="reg_number" style="width:80%;" value="<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" class='form-control' />
                            <div id="showExistReg"></div>
                        </div>

                        <div class="form-group">
                            <label>Registration Date:</label><br />
                            <input type="date" id="start_dt" class="datepicker" name="reg_date" required="required" value="" style=" width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
                        </div>

                        <div class="form-group">
                            <label>Assign Bench:</label><br />
                            <select name="bench" style="width:80%;" class='form-control'>

                                <?php foreach ($benches as $bench) : ?>
                                    <option value="<?php echo $bench->id; ?>"><?php echo $bench->bench_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </td>
                    <td valign="top">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>
                                    Assign Lawyer &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="Add" class="css_btn_class" onclick="showLawyer()">
                                </td>
                            </tr>
                            <tr>
                                <td id="showLawyer">
                                    <?php $this->load->view('lawyerRegForm'); ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div style="text-align:center;">
                <br />
                <input type="submit" value="Save" class="save_Form btn btn-primary">
                <a href="index.php/registration/registry_view" class="btn btn-danger">Cancel</a>

            </div>

        </div>
        <!-- For Not Registered-->
        <div style="display:none; border:1px solid #ddd; border-radius:5px; padding:10px; float:left; width:100%;" id="two">
            <table class="blank_tbl" style="float:left; width:50%;">
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Reasons For Not Registering:</label>
                            <textarea name="notreg_reason" class='form-control' style="width:70%;"></textarea>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Dismissal Order Number:</label>
                            <input type="text" name="notreg_dis_no" id="notreg_dis_no" value="<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" class='form-control' style="width:70%;" />
                            <div id="showExistDiss"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label>Dismissal Order Date:</label><br />
                            <input type="date" name="notreg_dis_date" id="start_dt3" min="<?php $date = date("Y/m/d");
                                                                                            echo date('Y-m-d', strtotime($date . ' - 10 days')); ?>" onkeydown="return false" style="width:65%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
                        </div>
                    </td>
                    </td>
                </tr>
            </table>
            <div class="form-group" style="float:right; width:50%;">
                <table class="blank_tbl">
                    <tr>
                        <td colspan="2" style="text-align:center;">
                            <strong>Signed By Judge</strong>
                            <input type="button" id="add_rtio_type3" value="Add" class="css_btn_class" style="width:70px; height:30px; line-height:20px; float:right;">
                            <br /><br />
                        </td>
                    </tr>
                    <tr>

                </table>
            </div>

            <div id="rtio_type3" style="float:right; width:50%;">

            </div>
            <div style="text-align:center; float:left; width:100%;">
                <br />
                <input type="submit" value="Save" class="save_Form btn btn-primary">
                <a href="index.php/registration/registry_view" class="btn btn-danger">Cancel</a>
            </div>

        </div>
        <!-- End For Not Registered -->

        <br />
        </form>




    </div>

    <div id="div_rtio_type3" style="display:none">
        <table class="blank_tbl">
            <tr>
                <td width="20%"><label>Judge Name:</label>
                </td>
                <td width="70%">
                    <select class="form-control" style="width:80%;" name="sign[ste][1][]">
                        <option value="0" selected>Select One</option>
                        <?php foreach ($judges as $user) : ?>
                            <option value="<?php echo $user->id; ?>"><?php echo $user->judge_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td width="10%" style="text-align:center !important;"><a href="#" class="remove_table" style="float:left;"><img src='<?php echo base_url('images/cross.png'); ?>' /></a></td>
            </tr>
        </table>
    </div>

    <div id="div_rtio_type1" style="display:none">
        <table class="table table-bordered ">
            <tr>
                <td width="90%">
                    <select class="form-control" name="hjudge[step][1][]">
                        <option value="0" disabled selected>Select One</option>
                        <?php foreach ($judges as $judge) : ?>
                            <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                <td width="10%" style="text-align:center !important;"><a href="#" class="remove_table" style="float:left;"><img src='<?php echo base_url('images/cross.png'); ?>' /></a></td>
            </tr>
        </table>
    </div>


    <div id="div_rtio_type4" style="display:none">
        <table class="table">
            <tr>
                <td width="80%"><label>Judge:</label>
                    <select class="form-control" style="width:42%;" name="judge[st][1][]">
                        <option value="0" disabled selected>Select One</option>
                        <?php foreach ($judges as $judge) : ?>
                            <option value="<?php echo $judge->id; ?>"><?php echo $judge->judge_name; ?></option>
                        <?php endforeach; ?>
                    </select>
                <td width="5%"><a href="#" class="remove_table" style="float:left;">Remove</a></td>
            </tr>
        </table>
    </div>

    <div id="lawBox">

        <?php
        $this->load->view('lawyerForm');
        ?>
    </div>



    <div id="form_input" title="Insert/Edit Item">
        <table>


            <tr>
                <td><input class="input-xlarge form-control" placeholder="Search by CID / Name" id="search_CID" name="search_CID" type="text"></td>
                <td>&nbsp;&nbsp;<button class="btn btn-default" type="button" id="search_button"><i class="fa fa-search"></i> Go</button></td>
            </tr>
            <form action="<?php echo site_url('registration/insert_liti_id_elat'); ?>" id="addLits" method="post">
                <input type="hidden" name="ecaseid" value="<?php echo $ecaseid; ?>" />
                <tr>
                    <td colspan="2">
                        <br /><input type="radio" Name="s_check" value="ind" id="s_check" checked="checked" /><label for="ind">Individual</label>&nbsp;&nbsp;&nbsp;<input type="radio" Name="s_check" value="org" id="s_check" /><label for="org">Organization</label>
                        <br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr id="main-body">

                </tr>
            </form>
        </table>
    </div>

    <div id="dialog-confirm" title="Delete Item ?">
        <p>
            <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            <input type="hidden" value='' id="del_id" name="del_id">
            Are you sure?
        </p>
    </div>

    <div id="conRemoveLaw" title="Delete Item ?">
        <p>
            <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            <input type="hidden" value='' id="del_law" name="del_id">
            Are you sure?
        </p>
    </div>

    <link rel="stylesheet" href="styles/jquery-ui.css" />
    <link rel="stylesheet" href="styles/ui.theme.css" type="text/css" />
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Eccepts only number
            $('#misc_case').bind('keypress', function(e) {
                var k = e.which;
                var ok = k >= 48 && k <= 57 || k == 8; // 0-9

                if (!ok) {
                    e.preventDefault();
                }

            });
            //End


            $(function() {
                $("#dialog:ui-dialog").dialog("destroy");

                $("#dialog-confirm").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 170,
                    modal: true,
                    hide: 'Slide',
                    buttons: {
                        "Delete": function() {
                            var del_id = {
                                id: $("#del_id").val()
                            };
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('registration/delete_temp_LitiID') ?>",
                                data: del_id,
                                success: function(msg) {
                                    $('#show').html(msg);
                                    $('#dialog-confirm').dialog("close");
                                    $('#lawBox').load('index.php/registration/lawRefresh');
                                    //$( ".selector" ).dialog( "option", "hide", 'slide' );
                                }
                            });

                        },
                        Cancel: function() {
                            $(this).dialog("close");
                        }
                    }
                });


                $("#conRemoveLaw").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 170,
                    modal: true,
                    hide: 'Slide',
                    buttons: {
                        "Delete": function() {
                            var del_id = {
                                id: $("#del_law").val()
                            };
                            $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('registration/delete_temp_Lawyer') ?>",
                                data: del_id,
                                success: function(msg) {
                                    $('#showLawyer').html(msg);
                                    $('#conRemoveLaw').dialog("close");
                                    //$( ".selector" ).dialog( "option", "hide", 'slide' );
                                }
                            });

                        },
                        Cancel: function() {
                            $(this).dialog("close");
                        }
                    }
                });



                $("#form_input").dialog({
                    autoOpen: false,
                    height: 350,
                    width: 500,
                    modal: false,
                    hide: 'Slide',
                    buttons: {
                        "Add": function() {
                            var form_data = {
                                liti_id: $('#liti_id').val(),
                                liti_type: $('#liti_type').val(),
                                ajax: 1
                            };

                            if ($('#liti_id').val() == "") {
                                $('#search_CID').focus();
                                $('#search_CID').style.borderColor = "#cc0000";
                                return false;
                            }

                            if ($('#search_CID').val() == "") {
                                $('#search_CID').focus();
                                $('#search_CID').style.borderColor = "#cc0000";
                                return false;
                            }

                            if ($('#liti_type').val() == 0) {
                                $('#liti_type').focus();
                                $('#liti_type').style.borderColor = "#cc0000";
                                return false;
                            }
                            $.ajax({
                                url: "<?php echo site_url('registration/insert_liti_id') ?>",
                                type: 'POST',
                                data: form_data,
                                success: function(msg) {
                                    $('#show').html(msg),
                                        $('#liti_id').val(''),
                                        $('#liti_type').val(''),

                                        $('#liti_id').attr("disabled", false);
                                    $('#liti_type').attr("disabled", false);
                                    $('#form_input').dialog("close");
                                    $('#lawBox').load('index.php/registration/lawRefresh');

                                }

                            });




                        },
                        Cancel: function() {
                            $('#liti_id').val(''),
                                $('#liti_type').val(''),
                                $(this).dialog("close");
                        }
                    },
                    close: function() {
                        $('#liti_id').val('');
                        $('#liti_type').val('');

                    }
                });

                $("#create-daily")
                    .button()
                    .click(function() {
                        $("#form_input").dialog("open");
                    });
            });

            $(".delbutton").live("click", function() {
                var element = $(this);
                var del_id = element.attr("id");
                var info = 'id=' + del_id;
                $('#del_id').val(del_id);
                $("#dialog-confirm").dialog("open");


                return false;
            });



            $('#Law_search').click(function() {
                var val = $('#LawName').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('registration/search_lawyer_info'); ?>",
                    data: {
                        "value": val
                    },
                    dataType: 'html',
                    success: function(msg) {
                        $('#lawForm').html(msg);

                    }
                });

            });





            $(".delTemLaw").live("click", function() {
                var element = $(this);
                var del_id = element.attr("id");
                var info = 'id=' + del_id;
                $('#del_law').val(del_id);
                $("#conRemoveLaw").dialog("open");

                return false;
            });


            $('#add_rtio_type3').click(function(e) {
                $('#rtio_type3').append($('#div_rtio_type3').html());
                return false;
            })

            $('#add_rtio_type2').click(function(e) {
                $('#rtio_type2').append($('#div_rtio_type4').html());
                return false;
            })

            $('#add_rtio_type1').click(function(e) {
                $('#rtio_type1').append($('#div_rtio_type1').html());
                return false;
            })

            $('#add_rtio_type').click(function(e) {
                $('#rtio_type').append($('#div_rtio_type').html());
                return false;
            })

            $('.remove_table').live('click', function() {
                $(this).parents('table').remove();
                return false;
            });


            $('#search_button').click(function() {
                var val = $('#search_CID').val();
                var schk = $("#s_check:checked").val();
                //alert(val);		
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('registration/search_lititgant_by_cid'); ?>",
                    data: {
                        "value": val,
                        "schk": schk
                    },
                    dataType: 'html',
                    success: function(msg) {
                        $('#' + val).css('color', '#960');
                        $('#main-body').html(msg);

                    }
                });
            });




            $('#addLaw').submit(function(event) {
                event.preventDefault();
                var check = $('#litig').val();
                if (check == '' || check == null) {
                    $('#litMsg').css('display', 'block');
                    return false;
                } else {
                    var lawyer_data = $('#addLaw').serialize();
                    $.ajax({
                        url: "index.php/registration/assignLitLawyer",
                        type: "post",
                        data: lawyer_data,
                        dataType: "html",
                        success: function(data) {
                            //adds the echoed response to our container
                            $('#lawBox').css('display', 'none');
                            $("#showLawyer").html(data);
                        }
                    });
                }
            });


            $('#Law_search').click(function() {
                var val = $('#LawName').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('registration/search_lawyer_info'); ?>",
                    data: {
                        "value": val
                    },
                    dataType: 'html',
                    success: function(msg) {
                        $('#lawForm').html(msg);

                    }
                });

            });

            $(function() {
                var date = new Date();
                var currentMonth = date.getMonth();
                var currentDate = date.getDate();
                var currentYear = date.getFullYear();

                $('.datepicker').datepicker({
                    maxDate: new Date(currentYear, currentMonth, currentDate),
                    dateFormat: "dd-mm-yy"
                });


            });


            $("#misc_case").focusout(function() {
                var misc_no = $('#misc_case').val();
                if (misc_no == "") {
                    $("#showExist").html("");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('registration/CheckExistMis'); ?>",
                        data: "misc_no=" + misc_no,
                        success: function(html) {
                            $("#showExist").html(html).show();
                        }
                    });
                }
            });


            $("#reg_number").focusout(function() {
                var reg_number = $('#reg_number').val();
                if (reg_number == "") {
                    $("#showExistReg").html("");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('registration/CheckExistReg'); ?>",
                        data: "reg_number=" + reg_number,
                        success: function(html) {
                            $("#showExistReg").html(html).show();
                        }
                    });
                }
            });



            $("#notreg_dis_no").keyup(function() {
                var notreg_dis_no = $('#notreg_dis_no').val();
                if (notreg_dis_no == "") {
                    $("#showExistDiss").html("");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('registration/CheckExistDiss'); ?>",
                        data: "notreg_dis_no=" + notreg_dis_no,
                        success: function(html) {
                            $("#showExistDiss").html(html).show();
                        }
                    });
                }
            });



        });
    </script>

    <script type="text/javascript">
        function showhidediv(rad) {
            var rads = document.getElementsByName(rad.name);
            document.getElementById('one').style.display = (rads[0].checked) ? 'block' : 'none';
            document.getElementById('two').style.display = (rads[1].checked) ? 'block' : 'none';
        }

        function showLawyer() {
            document.getElementById('lawBox').style.display = 'block';
        }

        function hideLawyer() {
            document.getElementById('lawBox').style.display = 'none';
        }

        function validate() {
            $('.save_Form').css('display', 'none');
            if (document.frm1.court.value == 0 || document.frm1.misc_case.value == "<?php echo $this->session->userdata('court_abb'); ?>-<?php echo date('y'); ?>-" || document.frm1.app_date.value == "" || document.frm1.hearing_date.value == "" || document.frm1.hearing_date.value == "") {
                alert("Some Required Fields are missing!");
                $('.save_Form').css('display', 'block');
                return false;
            } else {
                return true;
            }

        }
    </script>
