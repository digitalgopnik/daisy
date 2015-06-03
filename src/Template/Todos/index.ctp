<div class="col-lg-2 col-md-2 col-xs-2">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Neue Aufgabe anlegen'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="col-lg-10 col-md-10 col-xs-10">
    <table id="data_table" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
    <thead>
            <th>#</th>
            <th>Name</th>
            <th>Abgeschlossen</th>
            <th>Frist</th>
            <th>Erstellt</th>
            <th>Zusatz</th>
            <th class="actions"><?= __('Aktionen') ?></th>
    </thead>
    <tbody>
    <?php foreach ($todos as $todo): ?>
        <tr>
            <td><?= $this->Number->format($todo->id) ?></td>
            <td><?= h($todo->name) ?></td>
            <td><?= h($todo->done) ?></td>
            <td><?= h($todo->due_date) ?></td>
            <td><?= h($todo->created) ?></td>
            <td><?= h($todo->extra) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $todo->id]) ?>
                <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $todo->id], ['confirm' => __('Bist du sicher?')]) ?>
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
