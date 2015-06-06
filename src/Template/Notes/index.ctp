<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Neue Notiz anlegen', ['action' => 'add'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>

<?php
$items_array = array();
foreach ($items as $item) {
    $items_array[$item->id] = $item->name;
}
?>
<div class="col-lg-9 col-md-9 col-xs-9">
    <br>
    <table id="data_table" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
        <thead>
        <th>#</th>
        <th>Inhalt</th>
        <th>Tool (gegebenenfalls)</th>
        <th class="actions"><?= __('Aktionen') ?></th>
        </thead>
        <tbody>
        <?php foreach ($notes as $note): ?>
            <tr>
                <td><?= $this->Number->format($note->id) ?></td>
                <td><?= h($note->content) ?></td>
                <td><?php if (isset($note->item_id)) { echo $items_array[$note->item_id]; } ?></td>
                <td class="actions">
                    <?php $edit_class = $this->Html->tag('i', '', ['class' => 'fa fa-pencil', 'escape' => false]); ?>
                    <?php $delete_class = $this->Html->tag('i', '', ['class' => 'fa fa-trash-o', 'escape' => false]); ?>
                    <?= $this->Html->link($edit_class . ' Bearbeiten', ['action' => 'edit', $note->id], ['class' => 'btn btn-danger', 'escape' => false]) ?>
                    <?= $this->Form->postLink($delete_class . ' Löschen', ['action' => 'delete', $note->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Bist du sicher?')]) ?>
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

