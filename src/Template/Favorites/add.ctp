<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Favorites'), ['action' => 'index', 'class' => 'btn btn-danger']) ?></li>
    </ul>
</div>
<div class="favorites form large-10 medium-9 columns">
    <?= $this->Form->create($favorite) ?>
    <fieldset>
        <legend><?= __('Add Favorite') ?></legend>
        <?php
            echo $this->Form->input('user_id');
            echo $this->Form->input('item_id');
            echo $this->Form->input('order');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
