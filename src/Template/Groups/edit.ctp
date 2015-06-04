<div class="col-xs-2">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Löschen'),
                ['action' => 'delete', $group->id],
                ['confirm' => __('Bist du sicher?')]
            )
            ?></li>
        <li><?= $this->Html->link(__('Gruppen auflisten'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="col-xs-10">
    <?= $this->Form->create($group) ?>
    <legend><?= __('Gruppe bearbeiten') ?></legend>
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
            Mitglieder
        </div>
        <div class="col-xs-9">
            <?php
            foreach ($users as $user) {
                echo $user->email;
                echo "<br>";
            }
            ?>
        </div>
    </div>
    <br>
    <?= $this->Form->button(__('Speichern'), ['class' => 'btn btn-danger']) ?>
    <?= $this->Form->end() ?>
</div>


