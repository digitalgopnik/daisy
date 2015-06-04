<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Gruppen auflisten'), ['action' => 'index'], ['class' => 'btn btn-danger']) ?></li>
    </ul>
</div>
<?php
$users_array = array();
foreach ($users as $user) {
    $users_array[$user->id] = $user->email;
}
?>
<div class="col-lg-6 col-md-6 col-xs-6">
    <?= $this->Form->create('Group', ['action' => 'add']) ?>
    <?= $this->Form->hidden('folder_path') ?>
    <legend><?= __('Gruppe hinzufügen') ?></legend>
    <div class="row">
        <div class="col-xs-3">
            <label for="name">Name</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->input('name', ['label' => false, 'id' => 'name', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-3">
            <label for="users">Mitglieder einladen</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->select('users.', $users_array, ['multiple' => 'multiple', 'id' => 'users']);
            ?>
        </div>
    </div>
    <?= $this->Form->button(__('Anlegen'), ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>

