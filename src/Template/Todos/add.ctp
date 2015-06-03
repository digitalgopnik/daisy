<div class="col-xs-2">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('ToDos auflisten'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="col-xs-10">
    <?= $this->Form->create($todo) ?>
    <legend><?= __('ToDo hinzufügen') ?></legend>
    <div class="row">
        <div class="col-xs-3">
            <label for="name">Name</label>
        </div>
        <div class="col-xs-9">
            <?php
                echo $this->Form->input('name', ['label' => false, 'id' => 'name', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <label for="due_date">Frist</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->input('due_date', ['label' => false, 'id' => 'due_date', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <?= $this->Form->button(__('Anlegen'), ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
