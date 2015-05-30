<style>
    .grow {
        transition: all 2.5s ease-in-out;
        -webkit-transition: all 2.5s ease-in-out;
    }
    .grow-big {
        transform: scale(4.0);
        -webkit-transform: scale(4.0);
        pointer-events: none;
    }
</style>
<div id="scene"></div>
<div id="shade"></div>

<?php
foreach ($categories as $c) {
    $c->image_url = $c->category_images
        ? $this->Image->imageUrl($c->category_images[0])
        : 'static/img/paper-bag.svg';
}
?>

<img class="grow" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:1000;" src="img/CabinInterior.png">

<?php $this->append('script'); ?>
<script>
    var categories = <?= json_encode($categories) ?>;

    BACK = null;

    var DEMOS = [];
    for (var i in categories) {
        DEMOS.push({
            'slug': 'slug' + i,
            'href': $('base').attr('href') + 'places/Places/index/' + categories[i]['id'],
            'preview': $('base').attr('href') + categories[i]['image_url']
        });
    }

    var SCENE = 'static/photospheres/hangar.jpg';

    $('.grow').click(function(){
        $(".grow").toggleClass("grow-big");
    });
</script>
<?php $this->end(); ?>
