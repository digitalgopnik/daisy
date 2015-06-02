<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Words'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="words form large-10 medium-9 columns">
    <?= $this->Form->create($word) ?>
    <fieldset>
        <legend><?= __('Add Word') ?></legend>
        <?php
            echo $this->Form->input('word');
            echo $this->Form->input('item_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
