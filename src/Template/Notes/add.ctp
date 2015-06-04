<div class="col-xs-2">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Notizen auflisten'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="col-xs-10">
    <?= $this->Form->create($note) ?>
    <?= $this->Form->hidden('user_id') ?>
    <?= $this->Form->hidden('item_id') ?>
    <legend><?= __('Notiz hinzufügen') ?></legend>
    <div class="row">
        <div class="col-xs-3">
            <label for="name">Inhalt</label>
        </div>
        <div class="col-xs-6">
            <?php
            echo $this->Form->input('content', ['label' => false, 'id' => 'name', 'class' => 'form-control', 'rows' => '10']);
            ?>
        </div>
    </div>
    <br>
    <?= $this->Form->button(__('Anlegen'), ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
