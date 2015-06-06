<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php if (isset($is_admin) && $is_admin==true) { ?>
            <li><?= $this->Form->postLink(
                    __('Löschen'),
                    ['action' => 'delete', $todo->id],
                    ['confirm' => __('Bist du sicher?')]
                )
                ?></li>
        <?php } ?>
        <?php $i_class_index = $this->Html->tag('i', '', ['class' => 'fa fa-hand-o-left', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class_index . ' Aufgaben auflisten', ['action' => 'index'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>
<div class="col-lg-9 col-md-9 col-xs-9">
    <?= $this->Form->create($todo) ?>
    <br>
    <legend><?= __('Aufgabe bearbeiten') ?></legend>
    <div class="row">
        <div class="col-xs-3">
            <label for="name">Aufgabe</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->input('name', ['label' => false, 'id' => 'name', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-3">
            <label for="done">Status</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->checkbox('done', ['label' => false, 'id' => 'done', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <br>
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
    <br>
    <?php $i_class_save = $this->Html->tag('i', '', ['class' => 'fa fa-floppy-o', 'escape' => false]); ?>
    <?= $this->Form->button($i_class_save . ' Speichern', ['class' => 'btn btn-danger', 'escape' => false]) ?>
    <?= $this->Form->end() ?>
</div>

