<br><br><br><br>
<div class="container py-6">
<div class="row">

<div class="col-sm-12">
<div class="card">
<div class="card-body">
<h5 class="card-title font-weight-bold text-center">
<span class = "glyphicon glyphicon-ok form-control-feedback"></span>
&nbsp;&nbsp;Feedback Form </h5>
    <div class="row">
        <div class="col-md-8 col-xl-12"> 
           
<font color=red><?php echo validation_errors(); ?></font>
<form action="<?php echo site_url('publicregistration/store_feedback'); ?>" method="post" onsubmit="$('#loading').show();">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="user_id" value="<?php echo $uid; ?>">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="case_id" value="<?php echo $caseid; ?>">
<input type="hidden" class="form-control form-control-sm" id="user_type" name="court_id" value="<?php echo $courtid; ?>">

                <div class="row">
                        <div class="col-md-4">
                        <div class="md-form">
                             <label for="licenseno">1. Did e-Litigation help you achieve the desired outcome?<font color="red">*</font></label>
                             <div class="form-check">
                              <input class="form-check-input" type="radio" name="q1" id="exampleRadios1" value="Yes" required="required" >
                              <label class="form-check-label" for="q1">Yes</label>
                             </div>
                             <div class="form-check">
                               <input class="form-check-input" type="radio" name="q1" id="exampleRadios2" value="Satisfactory">
                               <label class="form-check-label" for="q1">Satisfactory</label>
                             </div>
                             <div class="form-check disabled">
                               <input class="form-check-input" type="radio" name="q1" id="exampleRadios3" value="No" >
                               <label class="form-check-label" for="q1">No</label></div>
                             </div>
                        </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="nationality">4. Explain why<font color="red">*</font></label>
                            <textarea class="form-control" name="q2ans" rows="2" required="required"></textarea>                         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="licenseno">7. Is the system User-friendly?<font color="red">*</font></label>
                             <div class="form-check">
                              <input class="form-check-input" type="radio" name="q4" id="exampleRadios1" value="Yes" required="required">
                              <label class="form-check-label" for="exampleRadios1">Yes</label>
                             </div>
                             <div class="form-check">
                               <input class="form-check-input" type="radio" name="q4" id="exampleRadios2" value="No">
                               <label class="form-check-label" for="exampleRadios2">No</label>
                             </div>
                        </div>
                    </div>                   
                </div>
                <div class="row">                   
                    <div class="col-md-4">
                        <div class="md-form">
                        <label for="nationality">2. Explain why<font color="red">*</font></label>
                        <textarea class="form-control" name="q1ans" rows="2" required="required"></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="phone">5. How easy is it to navigate the e-Litigation system?<font color="red">*</font></label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="q3" id="exampleRadios1" value="Easy" required="required">
                              <label class="form-check-label" for="exampleRadios1">Easy</label>
                             </div>
                             <div class="form-check">
                               <input class="form-check-input" type="radio" name="q3" id="exampleRadios2" value="Satisfactorily">
                               <label class="form-check-label" for="exampleRadios2">Satisfactory</label>
                             </div>
                             <div class="form-check disabled">
                               <input class="form-check-input" type="radio" name="q3" id="exampleRadios3" value="Difficult" >
                               <label class="form-check-label" for="exampleRadios3">Difficult</label>
                            </div>  
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                            <label for="fax">8. Explain why?<font color="red">*</font></label>
                            <textarea class="form-control" name="q4ans" rows="2" required="required"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-4">
                        <div class="md-form">
                             <label for="contact_person">3. Will you use e-Litigation in the future?<font color="red">*</font></label>
                             <div class="form-check">
                              <input class="form-check-input" type="radio" name="q2" id="exampleRadios1" value="Yes" required="required">
                              <label class="form-check-label" for="exampleRadios1">Yes</label>
                             </div>
                             <div class="form-check">
                               <input class="form-check-input" type="radio" name="q2" id="exampleRadios2" value="No">
                               <label class="form-check-label" for="exampleRadios2">No</label>
                             </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form">
                        <label for="fax">6. Explain why?<font color="red">*</font></label>
                        <textarea class="form-control" name="q3ans" rows="2" required="required"></textarea>
                        </div>
                    </div>
                     <div class="col-md-4">
                        <div class="md-form">
                             <label for="contactperson_email">9. Why did you choose to go for e-Litigation?<font color="red">*</font></label>
                             <textarea class="form-control" name="q5" rows="2" required="required"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <br>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Submit the Form');">Submit</button>
                    <button type="cancel" class="btn btn-danger"><a href="<?php echo site_url('welcome/index'); ?>" style="color: white;">Cancel</button></a>
                    </div>
                </div>
            <div id="loading" style="display:none"><font color = "red">Please Wait...</font></div>
            </form>
        </div>
    </div>

</div>
</div> 
</div>   

</div> 
</div>
