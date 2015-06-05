<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-hand-o-left', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Dateien auflisten', ['action' => 'index'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>
<?php
$groups_array = [];
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
}
?>
<div class="col-lg-9 col-md-9 col-xs-9">
    <?= $this->Form->create($file_upload, ['enctype' => 'multipart/form-data']) ?>
    <?= $this->Form->hidden('user_id') ?>
    <?= $this->Form->hidden('group_id') ?>
    <?= $this->Form->hidden('type') ?>
    <?= $this->Form->hidden('name') ?>
    <br>
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
            echo $this->Form->select('group_id', $groups_array, ['label' => false, 'id' => 'group', 'class' => 'form-control', 'empty' => 'Gruppe auswählen']);
            ?>
        </div>
    </div>
    <br>

    <?php $i_class_submit = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
    <?= $this->Form->button($i_class_submit . ' Anlegen', ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>




