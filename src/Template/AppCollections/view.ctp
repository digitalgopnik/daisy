<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit App Collection'), ['action' => 'edit', $appCollection->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Collection'), ['action' => 'delete', $appCollection->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appCollection->id)]) ?> </li>
        <li><?= $this->Html->link(__('List App Collections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Collection'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="appCollections view large-10 medium-9 columns">
    <h2><?= h($appCollection->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Collection') ?></h6>
            <p><?= h($appCollection->collection) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($appCollection->id) ?></p>
            <h6 class="subheader"><?= __('User Id') ?></h6>
            <p><?= $this->Number->format($appCollection->user_id) ?></p>
        </div>
    </div>
</div>
