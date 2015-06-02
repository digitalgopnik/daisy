<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Word'), ['action' => 'edit', $word->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Word'), ['action' => 'delete', $word->id], ['confirm' => __('Are you sure you want to delete # {0}?', $word->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Word'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="words view large-10 medium-9 columns">
    <h2><?= h($word->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Word') ?></h6>
            <p><?= h($word->word) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($word->id) ?></p>
            <h6 class="subheader"><?= __('Item Id') ?></h6>
            <p><?= $this->Number->format($word->item_id) ?></p>
        </div>
    </div>
</div>
