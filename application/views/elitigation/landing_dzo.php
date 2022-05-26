<style> 
@font-face {
   font-family: Tsuig_04;
   src: url(sansation_light.woff);
}
* {
   font-family: Tsuig_04;
   font-size: 20px;
}
</style>
<style>
.fbtn {
  background-color: #545454;
  padding: 10px;

  border: none;
  cursor: pointer;
}
.dropbtn {
  background-color: #545454;
  color: white;
  padding: 10px;
  font-size: 30px;
  border: none;
  cursor: pointer;
}
.dropdown {
  position: relative;
  display: inline-block;background-color: #545454;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #edecec;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown-content a:hover {background-color: #c4c4c4}
.dropdown:hover .dropdown-content {
  display: block;
}
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>

<br><br><br><div class="container py-4">
<div class="col-md-10 mx-auto" style="background-color: #545454;">
<div class="dropdown">
  <button class="dropbtn"><i class="fas fa-money-bill-alt"></i>&nbsp;&nbsp;ཡོངས་འབྲེལ་གྱི་དངུལ་སྤྲོད།</button>
  <div class="dropdown-content">
  <a href="#">Link 1</a>
  <a href="#">Link 2</a>
  <a href="#">Link 3</a>
  </div>
</div>
<button class="fbtn"><a href="#home" style="color: white;font-size: 31px;"><i class="fas fa-comment"></i>&nbsp;&nbsp;བསམ་ལན།</a></button>
</div></br>
<div class="col-md-10 mx-auto">
 <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title text-center">རྩོད་གཞི་གནས་སྡུད་མདོར་བསྡུས། &nbsp;&nbsp;<i class="fas fa-chart-bar"></i></h3>
        <p class="card-text"><h3>ཞི་རྩོད་ཐོ་བཀོད་བསྡོམས། </h3></p>
        <p class="card-text"><h3>ཉེས་རྩོད་ཐོ་བཀོད་བསྡོམས།</h3></p>
        <p class="card-text"><h3>འཁྲུན་ཆོད་གྲུབ་མི་རྩོད་གཞི་བསྡོམས།</h3></p>
        <p class="card-text"><h3>མཐོ་གཏུགས་རྩོད་གཞི་བསྡོམས།</h3></p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <br>
        <div class="col">        
         <button type="button" class="btn btn-warning btn-lg btn-block"><a href="<?php echo site_url('welcome/cmis')?>" target = "_blank" class="btn btn-warning btn-block"><b><h3>རྩོད་གཞི་འཛིན་སྐྱོང་རིམ་ལུགས།</h3></b>(For Court Officials Only)</a>
         </button>
        </div>
        <br>       
        <div class="col">
        <button type="button" class="btn btn-warning btn-lg btn-block"><a href="<?php echo site_url('welcome/elitigation_dzo')?>" class="btn btn-warning btn-block"><b><h3><i class="far fa-hand-point-right"></i>&nbsp;&nbsp;གློག་ཐོག་རྩོད་བཤེར་གློག་ལུགས།</h3></b></a>
         </button>
        </div>
        <br>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

<div class="container py-3">
<div class="row">
 <div class="col-sm-12">
<div class="card">
<div class="card-header text-center" style="background-color:  #ffc107;"><img src="<?php echo base_url('images/logo.png')?>" class="img-fluid" alt="Responsive image" style="height:32px;width:38px;"><a href="http://www.judiciary.gov.bt"><b style="color: black">&nbsp;&nbsp;&nbsp;Click Here to Visit the Judiciary Website</b></a></div>
    </div>
</div>
</div>
</div>
