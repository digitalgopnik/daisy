<div class="col-lg-3 col-md-3 xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-hand-o-left', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Notizen auflisten', ['action' => 'index'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>
<div class="col-lg-9 col-md-9 col-xs-9">
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
    <?php $i_class_submit = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
    <?= $this->Form->button($i_class_submit . ' Anlegen', ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>
