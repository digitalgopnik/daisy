<br>
<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Neue Datei anlegen', ['action' => 'add'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>

<?php /*
$groups_array = array();
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
} */
?>
<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel">
        <div class="panel-heading">
            <h2>Meine Dateien</h2>
        </div>
        <div class="panel-body">
        <table id="data_table" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th class="actions"><?= __('Aktionen') ?></th>
        </thead>
        <tbody>
        <?php foreach ($file_uploads as $file_upload): ?>
            <tr>
                <td><?= $this->Number->format($file_upload->id) ?></td>
                <td><?= h($file_upload->filename) ?></td>
                <td class="actions">
                    <?php $edit_class = $this->Html->tag('i', '', ['class' => 'fa fa-pencil', 'escape' => false]); ?>
                    <?php $delete_class = $this->Html->tag('i', '', ['class' => 'fa fa-trash-o', 'escape' => false]); ?>
                    <?= $this->Html->link($edit_class . ' Bearbeiten', ['action' => 'edit', $file_upload->id], ['class' => 'btn btn-danger', 'escape' => false]) ?>
                    <?= $this->Form->postLink($delete_class . ' Löschen', ['action' => 'delete', $file_upload->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Bist du sicher?')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="panel-footer">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('vorherige')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('nächste') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    </div>
    </div>
</div>
<?php
$groups_array = [];
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
}
?>
<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel">
        <div class="panel-heading">
            <h2>Gruppen-Dateien</h2>
        </div>
        <div class="panel-body">
            <table id="data_table" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
                <thead>
                <th>#</th>
                <th>Name</th>
                <th>Gruppe</th>
                <th class="actions"><?= __('Aktionen') ?></th>
                </thead>
                <tbody>
                <?php foreach ($group_uploads as $group_upload): ?>
                    <tr>
                        <td><?= $this->Number->format($group_upload->id) ?></td>
                        <td><?= h($group_upload->filename) ?></td>
                        <td><?= $groups_array[$group_upload->group_id] ?></td>
                        <td class="actions">
                            <?php $edit_class = $this->Html->tag('i', '', ['class' => 'fa fa-pencil', 'escape' => false]); ?>
                            <?php $delete_class = $this->Html->tag('i', '', ['class' => 'fa fa-trash-o', 'escape' => false]); ?>
                            <?= $this->Html->link($edit_class . ' Bearbeiten', ['action' => 'edit', $group_upload->id], ['class' => 'btn btn-danger', 'escape' => false]) ?>
                            <?= $this->Form->postLink($delete_class . ' Löschen', ['action' => 'delete', $group_upload->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Bist du sicher?')]) ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('vorherige')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('nächste') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
    </div>
</div>