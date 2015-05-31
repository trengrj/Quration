<div id="scene"></div>
<div id="shade"></div>

<img class="grow grow-big" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:1000;" src="img/CabinInterior.png">

<?php
foreach ($categories as $c) {
    $c->image_url = $c->category_images
        ? $this->Image->imageUrl($c->category_images[0])
        : 'static/img/paper-bag.svg';
}
?>
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

    var SCENE = 'static/photospheres/sky.jpg';
</script>
<?php $this->end(); ?>
