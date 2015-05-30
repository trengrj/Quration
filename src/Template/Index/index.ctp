<style>
.grow { -webkit-transition: all 2.5s ease-in-out; }
.grow-big { -webkit-transform: scale(4.0);pointer-events: none; }
</style>
<div id="scene"></div>
<div id="shade"></div>
<img class="grow" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:1000;" src="img/CabinInterior.png">
<script>
var SCENE = 'static/photospheres/hangar.jpg';
window.setTimeout(function() {
  $(".grow").addClass("grow-big");
},3000);
</script>
<?php $this->end(); ?>
