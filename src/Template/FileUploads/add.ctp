<div class="col-xs-2">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Dateien auflisten'), ['action' => 'index']) ?></li>
    </ul>
</div>
<?php
$groups_array = [];
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
}
?>
<div class="col-xs-10">
    <?= $this->Form->create($file_upload, ['enctype' => 'multipart/form-data']) ?>
    <?= $this->Form->hidden('user_id') ?>
    <?= $this->Form->hidden('group_id') ?>
    <?= $this->Form->hidden('type') ?>
    <?= $this->Form->hidden('name') ?>
    <legend><?= __('Datei hochladen') ?></legend>
    <div class="row">
        <div class="col-xs-3">
            <label for="file">Datei hochladen</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->file('file', ['label' => false, 'id' => 'file', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-3">
            <label for="group">Gruppe auswählen (gegebenfalls)</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->select('group_id', $groups_array, ['label' => false, 'id' => 'group', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <br>

    <?= $this->Form->button(__('Anlegen'), ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>




