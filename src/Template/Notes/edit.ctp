<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $note->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $note->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Notes'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="notes form large-10 medium-9 columns">
    <?= $this->Form->create($note) ?>
    <fieldset>
        <legend><?= __('Edit Note') ?></legend>
        <?php
            echo $this->Form->input('user_id');
            echo $this->Form->input('item_id');
            echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
