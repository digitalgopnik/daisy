<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="items view large-10 medium-9 columns">
    <h2><?= h($item->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($item->name) ?></p>
            <h6 class="subheader"><?= __('Auth Key') ?></h6>
            <p><?= h($item->auth_key) ?></p>
            <h6 class="subheader"><?= __('Auth Token') ?></h6>
            <p><?= h($item->auth_token) ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($item->url) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($item->id) ?></p>
        </div>
    </div>
</div>