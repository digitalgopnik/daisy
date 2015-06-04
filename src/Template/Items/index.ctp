<br>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="items index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('auth_key') ?></th>
            <th><?= $this->Paginator->sort('auth_token') ?></th>
            <th><?= $this->Paginator->sort('url') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $this->Number->format($item->id) ?></td>
            <td><?= h($item->name) ?></td>
            <td><?= h($item->auth_key) ?></td>
            <td><?= h($item->auth_token) ?></td>
            <td><?= h($item->url) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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
