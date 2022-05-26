<?php
error_reporting(0);
ini_set('display_errors', 0);
?>
<div class="content">
  <?php if ($this->session->flashdata('asset_class')) : ?>
    <div class="msg <?php echo $this->session->flashdata('asset_class') ?>"> <span><?php echo $this->session->flashdata('asset_msg') ?></span></div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('save')) : ?>
    <div class="msg <?php echo $this->session->flashdata('save') ?>"> <span><?php echo $this->session->flashdata('save_msg') ?></span></div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('update')) : ?>
    <div class="msg <?php echo $this->session->flashdata('update') ?>"> <span><?php echo $this->session->flashdata('update_msg') ?></span></div>
  <?php endif; ?>
  <b>
    <div class="panel-heading no-collapse">USERS</div>
  </b>
  <div class="panel-heading no-collapse" style="float:right; width:100%;">
    <form method="post" action="<?php echo site_url('admin/user/TypeSearchUser'); ?>" id="typeSearch" style="display:block;">

      <span style="float:right;">


        <button class="btn btn-default" type="submit" id="search_button"><i class="fa fa-search"></i> Search</button>
      </span>
      <span style="float:right; width:20%; width:400px;">
        <input type="text" name="userName" class="form-control_admin" placeholder="Enter Username or Employee ID" style="width:100%;" />
      </span>
    </form>
    <form method="post" action="<?php echo site_url('admin/user/searchUser'); ?>" id="filterSearch" style="display:none;">
      <span style="float:right;">
        <button class="btn btn-default" type="submit" id="search_button"><i class="fa fa-search"></i> Search</button>
      </span>
      <span style="float:right;  width:300px;">
        <select class="form-control_admin" name="user_type" style="width:90%;">
          <option value="0" selected="selected">Select User Type</option>
          <?php $uTypes = $this->admin->get_user_role();

          foreach ($uTypes as $uType) { ?>
            <option value="<?php echo $uType->id; ?>"><?php echo $uType->role_name; ?></option>
          <?php
          } ?>
        </select>
      </span>
      <span style="float:right; width:300px;">
        <select class="form-control_admin" name="court_id" style="width:90%;">
          <option value="0" selected="selected">Select Court</option>
          <?php $cTypes = $this->admin->get_court_profile();

          foreach ($cTypes as $cType) { ?>
            <option value="<?php echo $cType->id; ?>"><?php echo $cType->court_name; ?></option>
          <?php
          } ?>
        </select></span>


    </form>
    <hr style="border-top:1px solid #fff; width:100%; float:right;" />
    <span style="float:right;">
      <input type="checkbox" id="filterShearchCheck" /> <strong>Use Filter&nbsp;&nbsp;&nbsp;&nbsp;</strong>
    </span>

    <br />
  </div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>SL.No</th>
        <th>Name</th>
        <th>Username</th>
        <th>eMail</th>
        <th>Contact No.</th>
        <th>User Type</th>
        <th>Court Name</th>
        <th width="25%">Action </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        $i = 0 + $this->uri->segment(4);
        foreach ($users as $row) {
          $i++;
          echo "<tr>";
          echo    "<td>$i</td>";
          echo    "<td>$row->judge_name</td>";
          echo    "<td>$row->user_name</td>";
          echo    "<td>$row->email</td>";
          echo    "<td>$row->contact</td>";
          echo    "<td>" . $this->admin->get_usertype($row->user_type) . "</td>";
          echo    "<td>" . $this->admin->get_court_name($row->court) . "</td>";
          echo    "<td>";
        ?>
          <a href="<?php echo site_url('admin/user/edit_users') ?>?id=<?php echo $row->id; ?>" i class="fa fa-pencil"> Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="<?php echo site_url('admin/user/transfer') ?>?id=<?php echo $row->id; ?>" i class="fa fa-file"> Transfer</a>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="<?php echo site_url('admin/user/delete') ?>?id=<?php echo $row->id; ?>" class="fa fa-trash-o" id="<?php echo $row->id; ?>" onclick="return confirm('Are you sure to Delete this ?');"> Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="<?php echo site_url('admin/user/reset_pass') ?>?id=<?php echo $row->id; ?>" class="fa fa-undo" title="Reset Password">Reset Password</a>
        <?php
          echo "</td>";
          echo  "</tr>";
        }
        ?>
      </tr>
    </tbody>
  </table>
  <?php echo $this->pagination->create_links() ?>

  <a href="<?php echo site_url('admin/user/add_users') ?>" class="btn btn-primary pull-right">Add New</a>


  <script>
    $(document).ready(function() {

      $("#filterShearchCheck").change(function() {

        var filterShearch = $("#filterShearchCheck");

        if (filterShearch.is(":checked")) {
          $('#filterSearch').css('display', 'block');
          $('#typeSearch').css('display', 'none');
        } else {
          $('#filterSearch').css('display', 'none');
          $('#typeSearch').css('display', 'block');
        }
        return false;
      });

    });
  </script>
