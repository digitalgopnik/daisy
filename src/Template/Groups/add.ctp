<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-hand-o-left', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Gruppen auflisten', ['action' => 'index'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>
<?php
$users_array = array();
foreach ($users as $user) {
    $users_array[$user->id] = $user->email;
}
?>
<div class="col-lg-9 col-md-9 col-xs-9">
    <?= $this->Form->create('Group', ['action' => 'add']) ?>
    <?= $this->Form->hidden('folder_path') ?>
    <br>
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
            echo $this->Form->select('users.', $users_array, ['tabindex' => '-1', 'label' => false, 'style' => 'height: 300px !important', 'multiple' => true, 'id' => 'users', 'class' => 'multiple-select2 form-control']);
            ?>
        </div>
    </div>
    <?php $i_class_submit = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
    <?= $this->Form->button($i_class_submit . ' Anlegen', ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>

<script>
</script>

