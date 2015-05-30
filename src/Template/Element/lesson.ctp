<?php
use Cake\Utility\Inflector;
?>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><?=$l->activity->title?></h4>
        </div>
        <div class="panel-body fill index-classes" style="background:url('<?php if ($l->studio->studio_images): ?><?=$this->Image->imageUrl($l->studio->studio_images[0], 'large')?><?php else: ?>img/barbell.jpg<?php endif; ?>') center;">
            <h3><?= $this->Html->link("{$l->studio->title}<br />({$l->studio->suburb->title})", ['controller' => 'Studios', 'action' => 'view', $l->studio_id, Inflector::slug($l->studio->title), '?' => ['lesson_id' => $l->id], 'plugin' => 'Studios'], ['escape' => false]) ?></h3>
        </div>
    </div>
</div>
