<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $appCollection->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $appCollection->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List App Collections'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="appCollections form large-10 medium-9 columns">
    <?= $this->Form->create($appCollection) ?>
    <fieldset>
        <legend><?= __('Edit App Collection') ?></legend>
        <?php
            echo $this->Form->input('user_id');
            echo $this->Form->input('collection');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
