


<div id="litAdd">
 <span style="width:100%;">
      <strong>Add Litigant</strong>
      <img src="images/close.png" style="float:right; cursor:pointer; margin-top:-8px; margin-right:-8px;" onclick="addLitClose();"/>
  </span>
      <hr />
      <input type="hidden" value="<?php echo $case_id; ?>" name="caseLit" id="caseLit"/>
      <input type="hidden" id="reject" name="reject" /> 
      <input class="input-xlarge form-control" placeholder="Search by CID / Name" id="search_Lit_CID" name="search_CID" type="text" style="float:left !important; width:80%; margin:0px !important;">
        <button class="btn btn-default" type="button" id="search_button_lit" style="float:right !important; margin:0px !important;"><i class="fa fa-search"></i> Go</button>
     
     <br /><br />

     <div id="litResult" style="margin-top:10px;">
     
     </div>

    
    </div>