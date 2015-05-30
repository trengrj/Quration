<style>
@font-face {
    font-family: 'Flama-Light';
    src: url('fonts/flama-light-webfont.eot');
    src: url('fonts/flama-light-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/flama-light-webfont.woff') format('woff'),
         url('fonts/flama-light-webfont.ttf') format('truetype'),
         url('fonts/flama-light-webfont.svg#flamalight') format('svg');
    font-weight: normal;
    font-style: normal;
}
.modal {
  font-family: 'Flama-Light';
  margin-top: 100px;
  font-size: 24px;
  border-radius:5px;
}
.modal-dialog {
  box-shadow: 0px 2px 4px 0px rgba(0,0,0,0.27), 0px 6px 16px 0px rgba(0,0,0,0.24);
  border-radius:5px;
}
.modal .modal-content {
  background: -moz-radial-gradient(circle, #FFFFFF, #C0C0C0);
  background: -webkit-radial-gradient(circle, #FFFFFF, #C0C0C0);
}
.modal .btn-primary {
  background-color: #e0001b;
  border: 0px;
  height: 2.5em;
  margin-top:0px;
  margin-bottom:40px;
  font-size:18px;
}
.modal hr {
  max-width: 250px;
}
.modal-header {
 border-bottom: 0px;
 margin-top:5px;
}
</style>

<div id="scene"></div>
<div id="shade"></div>

<div id="mm1" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 style="font-size: 36px;font-weight:bold;" class="modal-title">WELCOME JOHN</h4>
        <hr>
      </div>
      <div class="modal-body text-center" style="padding-top:5px;">
        <p style="font-weight:bold;color: #e0001b;">FF 6243388</p>
        <hr>
        <p>ENJOY YOUR <span style="color:#e0001b;">Q</span>URATED QANTAS EXPERIENCE</p>
        <hr>
      </div>
      <div class="text-center">
        <button type="button" class="btn btn-primary">CONTINUE</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="mm2" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom:0px;">
        <h4 style="font-size: 36px;font-weight:bold;" class="modal-title">IS YOUR TRIP..</h4>
        <hr>
      </div>
      <div class="modal-body text-center">
        <div class="row" style="padding-left:60px;padding-right:60px;">
         <div class="col-sm-5">
<img style="width:140px;" src="img/Business.png">
         </div>
         <div class="col-sm-2">
         </div>
         <div class="col-sm-5">
<img style="width:160px;margin-top:3px;" src="img/Leisure.png">
         </div>
        </div>

<div class="row" style="margin-top:20px;text-align:center;padding-left:80px;padding-right:80px;">

 <div class="col-sm-4">
    <button type="button" class="btn btn-primary">BUSINESS</button>
 </div>
 <div class="col-sm-4">
    OR
 </div>
 <div class="col-sm-4">
   <button type="button" class="btn btn-primary">PLEASURE</button>
 </div>
</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="mm3" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom:0px;">
        <h4 style="font-size: 36px;font-weight:bold;" class="modal-title">HUNGRY FOR..</h4>
        <hr>
      </div>
      <div class="modal-body text-center">
        <div class="row" style="padding-left:60px;padding-right:60px;">
         <div class="col-sm-5">
<img style="width:150px;" src="img/Burger.png">
         </div>
         <div class="col-sm-2">
         </div>
         <div class="col-sm-5">
<img style="width:150px;" src="img/ElegantDinner.png">
         </div>
        </div>

<div class="row" style="margin-top:20px;text-align:center;padding-left:80px;padding-right:80px;">

 <div class="col-sm-5">
    <button style="float:left;margin-left:10px;" type="button" class="btn btn-primary">PUB GRUB</button>
 </div>
 <div class="col-sm-2">
    OR
 </div>
 <div class="col-sm-5">
   <button style="margin-left: 10px;" type="button" class="btn btn-primary">ELEGANT DINNER</button>
 </div>
</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="mm4" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center" style="padding-bottom:0px;">
        <h4 style="font-size: 36px;font-weight:bold;" class="modal-title">READY FOR..</h4>
        <hr>
      </div>
      <div class="modal-body text-center">
        <div class="row" style="padding-left:60px;padding-right:60px;">
         <div class="col-sm-5">
<img style="width:120px;float:left;" src="img/Saxophone.png">
         </div>
         <div class="col-sm-2">
         </div>
         <div class="col-sm-5">
<img style="width:170px;margin-top:20px;" src="img/Turntable.png">
         </div>
        </div>

<div class="row" style="margin-top:30px;text-align:center;padding-left:80px;padding-right:80px;">

 <div class="col-sm-5">
    <button type="button" class="btn btn-primary">JAZZ</button>
 </div>
 <div class="col-sm-2">
    OR
 </div>
 <div class="col-sm-5">
   <button margin-left: 10px;" type="button" class="btn btn-primary">DANCE</button>
 </div>
</div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php $this->append('script'); ?>
<script>
var SCENE = 'static/photospheres/hangar.jpg';
var currentModal = 1;
$("#mm"+currentModal).modal();
$(".modal button").click(function() {
  $("#mm"+currentModal).modal('hide');
  currentModal += 1;
  if (currentModal >= 5) {
    location.href = "http://www.google.com";
    return;
  }
  $("#mm"+currentModal).modal('show');
});
</script>
<?php $this->end(); ?>
