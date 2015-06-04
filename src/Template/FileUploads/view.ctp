<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit File Upload'), ['action' => 'edit', $fileUpload->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete File Upload'), ['action' => 'delete', $fileUpload->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fileUpload->id)]) ?> </li>
        <li><?= $this->Html->link(__('List File Uploads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File Upload'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="fileUploads view large-10 medium-9 columns">
    <h2><?= h($fileUpload->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $fileUpload->has('user') ? $this->Html->link($fileUpload->user->id, ['controller' => 'Users', 'action' => 'view', $fileUpload->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Group') ?></h6>
            <p><?= $fileUpload->has('group') ? $this->Html->link($fileUpload->group->name, ['controller' => 'Groups', 'action' => 'view', $fileUpload->group->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Src') ?></h6>
            <p><?= h($fileUpload->src) ?></p>
            <h6 class="subheader"><?= __('Filename') ?></h6>
            <p><?= h($fileUpload->filename) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($fileUpload->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($fileUpload->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($fileUpload->modified) ?></p>
        </div>
    </div>
</div>
