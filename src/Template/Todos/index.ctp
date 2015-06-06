<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Neue Aufgabe anlegen', ['action' => 'add'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>
<div class="col-lg-9 col-md-9 col-xs-9">
    <br>
    <table id="data_table" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
    <thead>
            <th>#</th>
            <th>Aufgabe</th>
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
            <td><?php
                if ($todo->done==1) {
                    echo '<span class="label label-success">Erledigt</span>';
                } else {
                    echo '<span class="label label-danger">In Bearbeitung</span>';
                } ?></td>
            <td><?= h($todo->due_date) ?></td>
            <td><?= h($todo->created) ?></td>
            <td><?= h($todo->extra) ?></td>
            <td class="actions">
                <?php $edit_class = $this->Html->tag('i', '', ['class' => 'fa fa-pencil', 'escape' => false]); ?>
                <?php $delete_class = $this->Html->tag('i', '', ['class' => 'fa fa-trash-o', 'escape' => false]); ?>
                <?= $this->Html->link($edit_class . ' Bearbeiten', ['action' => 'edit', $todo->id], ['class' => 'btn btn-danger', 'escape' => false]) ?>
                <?= $this->Form->postLink($delete_class . ' Löschen', ['action' => 'delete', $todo->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Bist du sicher?')]) ?>
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
