<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-hand-o-left', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Gruppen auflisten', ['action' => 'index'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>
<div class="col-lg-9 col-md-9 col-xs-9">
    <?= $this->Form->create('Group', ['action' => 'add']) ?>
    <?= $this->Form->hidden('folder_path') ?>
    <br>
    <legend><?= __('Gruppe hinzufügen') ?></legend>
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
            <label for="users">Vorhandene Benutzer einladen</label>
        </div>
        <div class="col-xs-9">
            <?php
            echo $this->Form->select('users.', $users_array, ['tabindex' => '-1', 'label' => false, 'style' => 'height: 300px !important', 'multiple' => true, 'id' => 'users', 'class' => 'multiple-select2 form-control']);
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-3">
            <label for="users">Neue Benutzer einladen</label>
        </div>
        <div class="col-xs-3">
            <a id="new_user_input" class="btn btn-danger">Weiteres Eingabefeld&nbsp;</a>
        </div>
    </div>
    <br>
    <div id="new_user_inputs">
        <div class="row">
            <div class="col-xs-3">
                &nbsp;
            </div>
            <div class="col-xs-6">
                <input type="text" name="new_user[]" class="form-control" /><br>
            </div>
        </div>
    </div>
    <br><br>
    <?php $i_class_submit = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
    <?= $this->Form->button($i_class_submit . ' Gruppe anlegen', ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    jQuery(document).ready(function() {
        var max = 10;
        var wrapper = $('#new_user_inputs');
        var add_button = $('#new_user_input');

        var x = 1;
        jQuery(add_button).click(function(e){
            e.preventDefault();
            if(x < max){
                x++;
                jQuery(wrapper).append('<div class="row"><div class="col-xs-3"><a href="#" id="remove_user_input" class="btn btn-danger">Entfernen&nbsp;<i class="fa fa-minus"></i></a></div><div class="col-xs-6"><input type="text" name="new_user[]" class="form-control" /></div></div><br>');
            }
        });

        jQuery(wrapper).on("click","#remove_user_input", function(e){
            e.preventDefault(); jQuery(this).parent('<div>').remove(); x--;
        })
    });
</script>

