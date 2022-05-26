<script type="text/javascript">
    function validate() {
        if (document.form1.usertype.value == 0) {
            document.form1.usertype.focus();
            document.form1.usertype.style.borderColor = "#cc0000";
            return false;
        }
        if (document.form1.name.value == "") {
            document.form1.name.focus();
            document.form1.name.style.borderColor = "#cc0000";
            return false;
        }
        if (document.form1.username.value == "") {
            document.form1.username.focus();
            document.form1.username.style.borderColor = "#cc0000";
            return false;
        }

        if (document.form1.uemail.value == "") {
            document.form1.uemail.focus();
            document.form1.uemail.style.borderColor = "#cc0000";
            return false;
        }

        if (document.form1.ucontact.value == "") {
            document.form1.ucontact.focus();
            document.form1.ucontact.style.borderColor = "#cc0000";
            return false;
        }

        var numbers = /^[-+]?[0-9]+$/;
        if (!document.form1.cid.value.match(numbers)) {
            alert('Please enter valid CID!');
            document.form1.cid.focus();
            error = true;
            document.form1.cid.style.borderColor = "#cc0000";
            return false;
        }
    }
</script>
<div class="content">
    <div class="dialog1">
        <div class="panel panel-default">
            <b>
                <p class="panel-heading no-collapse">Edit User</p>
            </b>
            <div class="panel-body">
                <form method="post" action="<?php echo site_url('admin/user/user_update'); ?>" name="form1" onSubmit="return validate()">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                    <div class="form-group">
                        <label><b>User Type</b></label>
                        <select name="usertype" id="usertype" class="form-control_admin span12">
                            <option value="<?php echo $usertype; ?>" selected><?php echo $this->admin->get_usertype($usertype); ?></option>
                            <?php foreach ($roles as $rr) { ?>
                                <option value="<?php echo $rr->id; ?>"><?php echo $rr->role_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><b>Name</b></label>
                        <input type="text" class="form-control_admin span12" name="name" id="name" value="<?php echo $name; ?>">
                    </div>
                    <div class="form-group">
                        <label><b>Username</b></label>
                        <input type="text" class="form-control_admin span12" name="username" id="username" value="<?php echo $username; ?>">
                    </div>
                    <div class="form-group">
                        <label><b>Court Name</b></label>
                        <select name="courtname" id="courtname" class="form-control_admin span12">
                            <option value="0" selected>---Select One---</option>
                            <?php foreach ($courts as $cort) { ?>
                                <option value="<?php echo $cort->id; ?>" <?php if ($court == $cort->id) { ?> selected <?php } ?>><?php echo $cort->court_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><b>Bench Name</b></label>
                        <select name="benchname" id="benchname" class="form-control_admin span12">
                            <option value="0" selected>---Select One---</option>
                            <?php foreach ($benches as $bench) { ?>
                                <option value="<?php echo $bench->id; ?>" <?php if ($ben == $bench->id) { ?> selected <?php } ?>><?php echo $bench->bench_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><b>CID</b></label>
                        <input type="text" class="form-control_admin span12" name="cid" id="cid" value="<?php echo $cid; ?>">
                    </div>
                    <div class="form-group">
                        <label><b>EID</b></label>
                        <input type="text" class="form-control_admin span12" name="eid" id="eid" value="<?php echo $eid; ?>">
                    </div>

                    <div class="form-group">
                        <label><b>eMail</b></label>
                        <input type="text" class="form-control_admin span12" name="uemail" id="uemail" value="<?php echo $email; ?>">
                    </div>

                    <div class="form-group">
                        <label><b>Contact Number</b></label>
                        <input type="text" class="form-control_admin span12" name="ucontact" id="ucontact" value="<?php echo $contact; ?>">
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" value="Update" </div>
                        <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
