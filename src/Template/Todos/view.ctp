<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Todo'), ['action' => 'edit', $todo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Todo'), ['action' => 'delete', $todo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $todo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Todos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Todo'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="todos view large-10 medium-9 columns">
    <h2><?= h($todo->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($todo->name) ?></p>
            <h6 class="subheader"><?= __('Extra') ?></h6>
            <p><?= h($todo->extra) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($todo->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Due Date') ?></h6>
            <p><?= h($todo->due_date) ?></p>
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($todo->created) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Done') ?></h6>
            <p><?= $todo->done ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
</div>
