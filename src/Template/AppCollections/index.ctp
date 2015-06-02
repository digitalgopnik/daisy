<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New App Collection'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="appCollections index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('collection') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($appCollections as $appCollection): ?>
        <tr>
            <td><?= $this->Number->format($appCollection->id) ?></td>
            <td><?= $this->Number->format($appCollection->user_id) ?></td>
            <td><?= h($appCollection->collection) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $appCollection->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $appCollection->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $appCollection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCollection->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
