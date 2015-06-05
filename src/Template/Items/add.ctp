<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-hand-o-left', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Apps auflisten', ['action' => 'index'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>

<div class="col-lg-9 col-md-9 col-xs-9">
    <?= $this->Form->create($item, ['enctype' => 'multipart/form-data']) ?>
    <br>
    <legend><?= __('App hinzufügen') ?></legend>
    <div class="row">
        <div class="col-xs-3">
            <label for="file">App-Image</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->file('file', ['label' => false, 'id' => 'file', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <br>
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
    <div class="row">
        <div class="col-xs-3">
            <label for="url">URL</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->input('url', ['label' => false, 'id' => 'url', 'class' => 'form-control']);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-3">
            <label for="help_text">Help-Text</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->input('help_text', ['label' => false, 'id' => 'help', 'class' => 'form-control', 'rows' => '20']);
            ?>
        </div>
    </div>
    <br>
    <?php $i_class_submit = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
    <?= $this->Form->button($i_class_submit . ' Anlegen', ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>


