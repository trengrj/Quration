<div id="scene"></div>
<div id="shade"></div>

<img class="grow" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:1000;" src="img/CabinInterior.png">

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
                        <button style="margin-left: 10px;" type="button" class="btn btn-primary">DANCE</button>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
use Cake\Core\Configure;

foreach ($categories as $c) {
    $c->image_url = $c->category_images
        ? $this->Image->imageUrl($c->category_images[0])
        : 'static/img/paper-bag.svg';
}
?>


<?php $this->append('script'); ?>
<script>
    var categories = <?= json_encode($categories) ?>;
    var placesIds = {
        '1': 3,
        '2': 16,
        '3': 23
    };

    BACK = null;

    var DEMOS = [];
    for (var i in categories) {
        DEMOS.push({
            'slug': 'slug' + i,
            'href': $('base').attr('href') + 'places/Places/view/' + placesIds[categories[i]['id']],
            'preview': $('base').attr('href') + categories[i]['image_url']
        });
    }

    var SCENE = 'static/photospheres/sky.jpg';

    <?php if (Configure::read('debug') || isset($this->request->query['demo'])): ?>
    $(function(){
        var currentModal = 1;
        $("#mm"+currentModal).modal();
        $(".modal button").click(function() {
            $("#mm"+currentModal).modal('hide');
            currentModal += 1;
            if (currentModal >= 5) {
                return;
            }
            $("#mm"+currentModal).modal('show');
        });
    });
    <?php endif; ?>

    $('.grow').click(function(){
        $(".grow").toggleClass("grow-big");
    });
</script>
<?php $this->end(); ?>
