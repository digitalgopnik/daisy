<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Todos'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="todos form large-10 medium-9 columns">
    <?= $this->Form->create($todo) ?>
    <fieldset>
        <legend><?= __('Add Todo') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('done');
            echo $this->Form->input('due_date');
            echo $this->Form->input('extra');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
