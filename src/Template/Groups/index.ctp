<br>
<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Neue Gruppe anlegen'), ['action' => 'add']) ?></li>
    </ul>
</div>

<?php /*
$items_array = array();
foreach ($items as $item) {
    $items_array[$item->id] = $item->name;
} */
?>
<div class="col-lg-6 col-md-6 col-xs-6">
    <table id="data_table" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
        <thead>
        <th>#</th>
        <th>Name</th>
        <th class="actions"><?= __('Aktionen') ?></th>
        </thead>
        <tbody>
        <?php foreach ($groups as $group): ?>
            <tr>
                <td><?= $this->Number->format($group->id) ?></td>
                <td><?= h($group->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $group->id]) ?>
                    <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $group->id], ['confirm' => __('Bist du sicher?')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('vorherige')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('nächste') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>


