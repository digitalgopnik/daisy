<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List App Collections'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="appCollections form large-10 medium-9 columns">
    <?= $this->Form->create($appCollection) ?>
    <fieldset>
        <legend><?= __('Add App Collection') ?></legend>
        <?php
            echo $this->Form->input('user_id');
            echo $this->Form->input('collection');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<?php // $this->Form->select('items', $items, ['multiple' => true]) ?>