<div id="scene"></div>
<div id="shade"></div>
<?php
foreach ($places as $p) {
    $p->image_url = $p->place_images
        ? $this->Image->imageUrl($p->place_images[0], 'small')
        : 'static/img/paper-bag.svg';
}
?>
<?php $this->append('script'); ?>
<script>
    var places = <?= json_encode($places) ?>;

    BACK = null;

    var DEMOS = [];
    for (var i in places) {
        DEMOS.push({
            'slug': 'slug' + i,
            'href': $('base').attr('href') + 'places/places/view/' + places[i]['id'],
            'preview': $('base').attr('href') + places[i]['image_url']
        });
    }

    var SCENE = 'static/photospheres/hangar.jpg';
</script>
<?php $this->end(); ?>
