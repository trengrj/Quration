<ul class="nav nav-pills row">
    <li><?= $this->Html->link(__('New Place'), ['action' => 'add']) ?></li>
</ul>
<div class="places index">
    <table cellpadding="0" cellspacing="0" class="table table-striped">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('category_id') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($places as $place): ?>
        <tr>
            <td><?= $this->Number->format($place->id) ?></td>
            <td>
                <?= $place->has('category') ? $this->Html->link($place->category->title, ['controller' => 'Categories', 'action' => 'view', $place->category->id]) : '' ?>
            </td>
            <td><?= h($place->title) ?></td>
            <td><?= h($place->created) ?></td>
            <td><?= h($place->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $place->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $place->id], ['confirm' => __('Are you sure you want to delete # {0}?', $place->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <li><?= $this->Paginator->numbers() ?></li>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </div>
</div>
