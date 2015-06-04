<br>
<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Neue App'), ['action' => 'add'], ['class' => 'btn btn-danger']) ?></li>
    </ul>
</div>
<div class="col-lg-6 col-md-6 col-xs-6">
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
                <?= $this->Html->link(__('Bearbeiten'), ['action' => 'edit', $item->id], ['class' => 'btn btn-danger']) ?>
                <?= $this->Form->postLink(__('Löschen'), ['action' => 'delete', $item->id], ['class' => 'btn btn-danger'], ['confirm' => __('Bist du sicher?')]) ?>
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
