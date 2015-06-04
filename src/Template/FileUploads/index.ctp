<br>
<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Neue Datei anlegen'), ['action' => 'add']) ?></li>
    </ul>
</div>

<?php /*
$groups_array = array();
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
} */
?>
<div class="col-lg-4 col-md-4 col-xs-4">
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
                    <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $file_upload->id]) ?>
                    <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $file_upload->id], ['confirm' => __('Bist du sicher?')]) ?>
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
<div class="col-lg-4 col-md-4 col-xs-4">
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
                            <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $group_upload->id]) ?>
                            <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $group_upload->id], ['confirm' => __('Bist du sicher?')]) ?>
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