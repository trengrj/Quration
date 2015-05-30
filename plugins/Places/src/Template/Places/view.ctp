<?php
use Cake\Routing\Router;
?>
<div id="scene"></div>
<div id="shade"></div>
<div class="info">
    <h3><?= h($place['title']) ?></h3>
    <p>
        <?= h($place['address']) ?>
        <?php if ($place['price']): ?><br /><strong>$<?= $this->Number->format($place['price']) ?></strong><?php endif; ?>
    </p>
</div>
<?php $this->append('script'); ?>
<script>
    var place = <?= json_encode($place) ?>;
    //var SCENE = '';
    BACK.href = '<?= Router::url(['action' => 'index', $place->category_id], true) ?>';
    var SCENE = $('base').attr('href') + '<?= $this->Image->imageUrl($place->place_scenes[0]) ?>';
</script>
<?php $this->end(); ?>
