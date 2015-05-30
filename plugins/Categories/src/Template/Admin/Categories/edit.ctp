<ul class="nav nav-pills row">
    <?php if ($category->id): ?>
    <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $category->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]
            )
    ?></li>
    <?php endif; ?>
    <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']) ?></li>
</ul>
<div class="categories form row">
    <fieldset class="col-lg-6">
        <?= $this->Form->create($category); ?>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('pos');
        ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </fieldset>
    <fieldset class="col-lg-6">
        <?php if ($category->id): ?>
            <div class="form-group">
                <label class="row col-lg-12"><?= __('Image') ?></label>
                <div class="row col-lg-12">
                <?php if ($category->category_images): ?>
                    <?php foreach ($category->category_images as $img): ?>
                        <div class="img-thumbnail">
                            <?= $this->Image->display($img, 'small'); ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'CategoryImages', 'action' => 'delete', $img->id]) ?>
                        </div>
                    <?php endforeach; ?>
                <?php else :?>
                    <?= $this->Form->create(null, ['type' => 'file', 'url' => ['controller' => 'CategoryImages', 'action' => 'add', $category->id]]); ?>
                    <div style="margin: 15px 0">
                        <div style="margin-top: 5px;" class="pull-left"><?= $this->Form->file('file'); ?></div>
                        <?= $this->Form->button(__('Upload'), ['class' => 'btn-primary btn-sm pull-left']); ?>
                    </div>
                    <?= $this->Form->end(); ?>
                <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </fieldset>
</div>
