<div id="scene"></div>
<div id="shade"></div>

<img class="grow grow-big" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:1000;" src="img/CabinInterior.png">

<?php
use Cake\Routing\Router;

foreach ($places as $p) {
    $p->image_url = $p->place_images
        ? $this->Image->imageUrl($p->place_images[0], 'small')
        : 'static/img/paper-bag.svg';
}
?>
<?php $this->append('script'); ?>
<script>
    var places = <?= json_encode($places) ?>;

    BACK.href = '<?= Router::url(['action' => 'categories'], true) ?>';

    var DEMOS = [];
    for (var i in places) {
        DEMOS.push({
            'slug': 'slug' + i,
            'href': $('base').attr('href') + 'places/Places/view/' + places[i]['id'],
            'preview': $('base').attr('href') + places[i]['image_url']
        });
    }

    var SCENE = 'static/photospheres/sky.jpg';
</script>
<?php $this->end(); ?>
