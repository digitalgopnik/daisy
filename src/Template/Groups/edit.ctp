<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Löschen'),
                ['action' => 'delete', $group->id],
                ['confirm' => __('Bist du sicher?')]
            )
            ?></li>
        <li><?= $this->Html->link(__('Gruppen auflisten'), ['action' => 'index'], ['class' => 'btn btn-danger']) ?></li>
    </ul>
</div>
<?php
$groups_users_array = array();
foreach ($groups_users as $group_user) {
    $groups_users_array[$group_user->user_id] = $group_user->accepted;
}
?>
<div class="col-lg-6 col-md-6 col-xs-6">
    <?= $this->Form->create($group) ?>
    <br>
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
                if ($groups_users_array[$user->id]=='0') {
                    continue;
                }
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


