<div class="col-xs-2">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Löschen'),
                ['action' => 'delete', $note->id],
                ['confirm' => __('Bist du sicher?')]
            )
            ?></li>
        <li><?= $this->Html->link(__('Notizen auflisten'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="col-xs-10">
    <?= $this->Form->create($note) ?>
    <legend><?= __('ToDo bearbeiten') ?></legend>
    <?= $this->Form->hidden('user_id', ['value' => $note->user_id]) ?>
    <?= $this->Form->hidden('item_id', ['value' => $note->item_id]) ?>
    <div class="row">
        <div class="col-xs-3">
            <label for="name">Name</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->input('content', ['label' => false, 'id' => 'name', 'class' => 'form-control', 'rows' => '10']);
            ?>
        </div>
    </div>
    <?= $this->Form->button(__('Speichern'), ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>


