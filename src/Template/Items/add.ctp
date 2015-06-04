<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Apps auflisten'), ['action' => 'index'], ['class' => 'btn btn-danger']) ?></li>
    </ul>
</div>

<div class="col-lg-6 col-md-6 col-xs-6">
    <?= $this->Form->create($item, ['enctype' => 'multipart/form-data']) ?>
    <?= $this->Form->hidden('image_url') ?>
    <legend><?= __('App hinzufügen') ?></legend>
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
    <br>
    <?= $this->Form->button(__('Anlegen'), ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>


