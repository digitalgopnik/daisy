<div class="col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-hand-o-left', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Apps auflisten', ['action' => 'index'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>

<div class="col-lg-9 col-md-9 col-xs-9">
    <?= $this->Form->create($item, ['enctype' => 'multipart/form-data']) ?>
    <br>
    <legend><?= __('App bearbeiten') ?></legend>
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
    <?php $i_class_save = $this->Html->tag('i', '', ['class' => 'fa fa-floppy-o', 'escape' => false]); ?>
    <?= $this->Form->button($i_class_save . ' Speichern', ['class' => 'btn btn-danger', 'escape' => false]) ?>
    <?= $this->Form->end() ?>
</div>
<?php
$words_array = array();
foreach ($words as $word) {
    $words_array[$word->id] = $word->name;
}
$selected_words_array = array();
foreach ($selected_words as $selected_word) {
    $selected_words_array[$selected_word->id] = $selected_word->name;
}
?>
<div class="col-lg-12 col-md-12 col-xs-12">
    <?= $this->Form->create('WordsItem', ['action' => 'save_words']) ?>
    <?= $this->Form->hidden('item_id', ['value' => $item->id]) ?>
    <legend><?= __('Schlagworte auswählen') ?></legend>
    <?php
    if (!empty($words_array)) {
        ?>
        <div class="row">
            <div class="col-xs-3">
                <label for="words">Wörter auswählen</label>
            </div>
            <div class="col-xs-9">
                <?php
                echo $this->Form->select('words.', $words_array, ['multiple' => true, 'label' => false, 'id' => 'words', 'class' => 'form-control']);
                ?>
            </div>
        </div>
        <br>
    <?php
    }
    ?>
    <div class="row">
        <div class="col-xs-3">
            Bereits ausgewählte Wörter
        </div>
        <div class="col-xs-9">
    <?php
    foreach ($selected_words_array as $selected_word) {
        echo $selected_word;
        echo "<br>";
    }
    ?>
        </div>
    </div>
    <?php if (!empty($words_array)) {?>
    <?php $i_class_save = $this->Html->tag('i', '', ['class' => 'fa fa-floppy-o', 'escape' => false]); ?>
    <?= $this->Form->button($i_class_save . ' Speichern', ['class' => 'btn btn-danger', 'escape' => false]) ?>
    <?php }?>
    <?= $this->Form->end() ?>
</div>





