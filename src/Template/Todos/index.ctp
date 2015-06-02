<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Todo'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="todos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('done') ?></th>
            <th><?= $this->Paginator->sort('due_date') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('extra') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($todos as $todo): ?>
        <tr>
            <td><?= $this->Number->format($todo->id) ?></td>
            <td><?= h($todo->name) ?></td>
            <td><?= h($todo->done) ?></td>
            <td><?= h($todo->due_date) ?></td>
            <td><?= h($todo->created) ?></td>
            <td><?= h($todo->extra) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $todo->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $todo->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $todo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todo->id)]) ?>
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
