<?php
use Cake\Utility\Inflector;
use Cake\Routing\Router;
?>
<div class="col-sm-3 col-xs-6">
    <a href="<?= Router::url(['controller' => 'Studios', 'action' => 'view', $s->id, Inflector::slug($s->title), 'plugin' => false]) ?>">
        <img class="img-responsive img-hover img-related" src="<?php if ($s->studio_images): ?><?=$this->Image->imageUrl($s->studio_images[0], 'large')?><?php else: ?>img/barbell.jpg<?php endif; ?>" style="height: 300px; width: 500px" alt="" />
        <h4><?= h($s->title) ?> (<?=$s->suburb->title?>)</h4>
    </a>
</div>
