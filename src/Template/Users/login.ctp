<br>
<?= $this->Form->create('Login') ?>
<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="row">
    <div class="col-lg-3">
        <label>Y-Nummer</label>
    </div>
    <div class="col-lg-6">
        <?= $this->Form->input('username', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Bitte gib deine Y-Nummer ein']) ?>
    </div>
</div>
    <br>
<div class="row">
    <div class="col-lg-3">
        <label>Passwort</label>
    </div>
    <div class="col-lg-6">
        <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Bitte gib dein Passwort ein']) ?>
    </div>
</div>
    <br>
<div class="row">
    <div class="col-lg-3">
        &nbsp;
    </div>
    <div class="col-lg-6">
        <?= $this->Form->submit('Einloggen', ['label' => false, 'class' => 'btn btn-danger']) ?>
    </div>
</div>
</div>
<?= $this->Form->end() ?>