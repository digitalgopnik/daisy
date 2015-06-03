<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Note'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="notes index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th><?= $this->Paginator->sort('content') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($notes as $note): ?>
        <tr>
            <td><?= $this->Number->format($note->id) ?></td>
            <td><?= $this->Number->format($note->user_id) ?></td>
            <td><?= $this->Number->format($note->item_id) ?></td>
            <td><?= h($note->content) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $note->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $note->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $note->id], ['confirm' => __('Are you sure you want to delete # {0}?', $note->id)]) ?>
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
