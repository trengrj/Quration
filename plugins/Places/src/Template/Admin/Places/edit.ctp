<ul class="nav nav-pills row">
    <?php if ($place->id): ?>
    <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $place->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $place->id)]
            )
    ?></li>
    <?php endif; ?>
    <li><?= $this->Html->link(__('List Places'), ['action' => 'index']) ?></li>
</ul>
<div class="places form row">
    <fieldset class="col-lg-6">
        <?= $this->Form->create($place); ?>
        <?php
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('title');
            echo $this->Form->input('address');
            echo $this->Form->input('description', ['type' => 'textarea']);
            echo $this->Form->input('image_url');
            echo $this->Form->input('rating', ['type' => 'numeric']);
            echo $this->Form->input('price', ['type' => 'numeric']);
            echo $this->Form->hidden('lat');
            echo $this->Form->hidden('lng');
        ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </fieldset>
    <?php if ($place->id): ?>
    <fieldset class="col-lg-6">
        <div class="form-group">
            <label class="row col-lg-12"><?= __('Image') ?></label>
            <div class="row col-lg-12">
                <?php if ($place->place_images): ?>
                    <?php foreach ($place->place_images as $img): ?>
                        <div class="img-thumbnail">
                            <?= $this->Image->display($img, 'small'); ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'PlaceImages', 'action' => 'delete', $img->id]) ?>
                        </div>
                    <?php endforeach; ?>
                <?php else :?>
                    <?= $this->Form->create(null, ['type' => 'file', 'url' => ['controller' => 'PlaceImages', 'action' => 'add', $place->id]]); ?>
                    <div style="margin: 15px 0">
                        <div style="margin-top: 5px;" class="pull-left"><?= $this->Form->file('file'); ?></div>
                        <?= $this->Form->button(__('Upload'), ['class' => 'btn-primary btn-sm pull-left']); ?>
                    </div>
                    <?= $this->Form->end(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label class="row col-lg-12"><?= __('Scene') ?></label>
            <div class="row col-lg-12">
                <?php if ($place->place_scenes): ?>
                    <?php foreach ($place->place_scenes as $img): ?>
                        <div class="img-thumbnail">
                            <?= $this->Image->display($img, 'small'); ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'PlaceScenes', 'action' => 'delete', $img->id]) ?>
                        </div>
                    <?php endforeach; ?>
                <?php else :?>
                    <?= $this->Form->create(null, ['type' => 'file', 'url' => ['controller' => 'PlaceScenes', 'action' => 'add', $place->id]]); ?>
                    <div style="margin: 15px 0">
                        <div style="margin-top: 5px;" class="pull-left"><?= $this->Form->file('file'); ?></div>
                        <?= $this->Form->button(__('Upload'), ['class' => 'btn-primary btn-sm pull-left']); ?>
                    </div>
                    <?= $this->Form->end(); ?>
                <?php endif; ?>
            </div>
        </div>
    </fieldset>
    <?php endif; ?>
</div>
