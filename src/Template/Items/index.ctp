<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Neue App anlegen', ['action' => 'add'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>
<div class="col-lg-9 col-md-9 col-xs-9">
    <br>
    <table id="data_table" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Auth_KEY</th>
            <th>Auth_TOKEN</th>
            <th>Bild</th>
            <th class="actions"><?= __('Aktionen') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $this->Number->format($item->id) ?></td>
            <td><?= h($item->name) ?></td>
            <td><?= h($item->auth_key) ?></td>
            <td><?= h($item->auth_token) ?></td>
            <td><?= h($item->url) ?></td>
            <td class="actions">
                <?php $edit_class = $this->Html->tag('i', '', ['class' => 'fa fa-pencil', 'escape' => false]); ?>
                <?php $delete_class = $this->Html->tag('i', '', ['class' => 'fa fa-trash-o', 'escape' => false]); ?>
                <?= $this->Html->link($edit_class . ' Bearbeiten', ['action' => 'edit', $item->id], ['class' => 'btn btn-danger', 'escape' => false]) ?>
                <?= $this->Form->postLink($delete_class . ' Löschen', ['action' => 'delete', $item->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Bist du sicher?')]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
