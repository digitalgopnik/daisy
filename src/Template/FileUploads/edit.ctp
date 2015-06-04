<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fileUpload->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fileUpload->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List File Uploads'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="fileUploads form large-10 medium-9 columns">
    <?= $this->Form->create($fileUpload) ?>
    <fieldset>
        <legend><?= __('Edit File Upload') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('group_id', ['options' => $groups]);
            echo $this->Form->input('src');
            echo $this->Form->input('filename');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
