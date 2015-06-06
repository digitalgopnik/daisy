<br>
<?php echo $this->Form->create('checkUser', ['action' => 'check_user']); ?>
<div class="col-lg-12 col-md-12 col-xs-12">
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-6">
            <p style="color: #333">Dein Passwort wird benötigt, um Gruppenmitglieder einzuladen, die noch kein Konto erstellt haben. Aus Datenschutzgründen wird dein Passwort <b>nicht</b> gespeichert.</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-2">
            <label>Passwort</label>
        </div>
        <div class="col-lg-3">
            <?= $this->Form->input('password', ['label' => false, 'class' => 'form-control', 'placeholder' => 'Bitte gib dein Passwort ein']) ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-2">
            &nbsp;
        </div>
        <div class="col-lg-3">
            <?= $this->Form->submit('Weiterleiten', ['label' => false, 'class' => 'btn btn-danger']) ?>
        </div>
    </div>
</div>
<?php echo $this->Form->end(); ?>

<script>
    jQuery('#get_pass').click(function() {
       var user_pass = jQuery('#pass').val();

        $.ajax({
            url: 'http://localhost/uni/teamproject/groups/add',
            type: 'POST',
            data: user_pass,
            dataType: 'json',
            async: true,
            cache: false
        })
            .always(function(data) {

            })

    });
</script>
