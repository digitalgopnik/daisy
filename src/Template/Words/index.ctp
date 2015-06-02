<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Word'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="words index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('word') ?></th>
            <th><?= $this->Paginator->sort('item_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($words as $word): ?>
        <tr>
            <td><?= $this->Number->format($word->id) ?></td>
            <td><?= h($word->word) ?></td>
            <td><?= $this->Number->format($word->item_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $word->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $word->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $word->id], ['confirm' => __('Are you sure you want to delete # {0}?', $word->id)]) ?>
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
