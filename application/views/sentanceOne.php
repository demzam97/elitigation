<link href="<?php echo base_url();?>BeatPicker/css/BeatPicker.min.css" rel="stylesheet">
<script type="text/javascript" src="scripts/jquery-1.7.2.min.js"></script>
      <table class="table table-bordered table-striped">   
      <tr>
        	<td width="15%"><strong>Year:</strong></td>
        	<td>
            <select name="year[]" id="year" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($j=1;$j<=100; $j++) { ?>
            <option><?php echo $j; ?></option>
            <?php } ?>
            </select>
            </td> 
        	<td width="15%"><strong>Month:</strong></td>
        	<td>
            <select name="month[]" id="month" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($k=1;$k<=100; $k++) { ?>
            <option><?php echo $k; ?></option>
            <?php } ?>
            </select>
            </td>
      </tr> 
      
      <tr>
        	<td width="15%"><strong>Day:</strong></td>
        	<td>
            <select name="day[]" id="day" class="form-control" style="width:80%">
            <option value="0">Select One</option>
            <?php for($l=1;$l<=100; $l++) { ?>
            <option><?php echo $l; ?></option>
            <?php } ?>
            </select>
            </td>
        	<td ><strong>Sentence Start Date:</strong></td>
        	<td>
            <input type="text"  name="start_date[]"  placeholder="Date"  data-beatpicker="true" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
            </td>
        </tr>
        <tr>
                <td width="15%"><strong>Release Date:</strong></td>
                <td>
                <input type="text" name="release_date[]"  placeholder="Date"  data-beatpicker="true" style="width:75%; height:34px; border:1px solid #ccc;border-radius:4px; padding:6px 12px;" />
                </td>
        </tr>
        
    </table>
    
    <script src="<?php echo base_url();?>BeatPicker/js/BeatPicker.min.js"></script>