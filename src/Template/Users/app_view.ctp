<?php
$groups_array = [];
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
}
?>

<div id="frame_src" style="border: 1px solid #ddd">
    <iframe id="iframe_src" src="" width="95%" height="600px"> <!-- größe eingeben! -->

        <p>Ihr Browser kann leider keine eingebetteten Frames anzeigen:
            Sie können die eingebettete Seite über den folgenden
            Verweis aufrufen:
        </p>

    </iframe>
    <div id="div_src" style="color: #fff; margin-top: -130px; position: absolute; z-index: 9999; width: 50px; height: 50px; background-color: transparent; border-radius: 3px"><a id="show_touch_companion" ><button type="button" class="btn btn-danger"><i class="fa fa-plus fa-2x"></i></button></a><a id="hide_touch_companion" style="display: none"><button type="button" class="btn btn-danger" style="margin-top:135px";><i class="fa fa-minus fa-2x"></i></button></a>
        <?php $i_class_home = $this->Html->tag('i', '', ['class' => 'fa fa-home fa-3x', 'escape' => false]); ?>
        <?= $this->Html->link($i_class_home, ['controller' => 'Users', 'action' => 'dashboard'], ['style' => 'display:none', 'class' => 'iframebutton1', 'escape' => false]) ?>
        <a data-toggle="modal" href="#notes_modal" style="display: none" class="iframebutton2">
            <i class="fa fa-file-text-o fa-3x"></i>
        </a>
        <a data-toggle="modal" href="#search_modal" style="display: none" class="iframebutton3">
            <i class="fa fa-google fa-3x" data-toggle="modal"></i>
        </a>
        <a data-toggle="modal" href="#upload_modal" style="display: none" class="iframebutton4">
            <i class="fa fa-files-o fa-3x" data-toggle="modal"></i>
        </a></div>
</div>

<div id="upload_modal" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #fff">
            <div class="col-lg-9 col-md-9 col-xs-9" style="background-color: #fff; margin-top: 30%">
                <?= $this->Form->create('file_upload', ['controller' => 'Users', 'action' => 'upload_file'], ['enctype' => 'multipart/form-data']) ?>
                <?= $this->Form->hidden('user_id') ?>
                <?= $this->Form->hidden('group_id') ?>
                <?= $this->Form->hidden('type') ?>
                <?= $this->Form->hidden('name') ?>
                <?= $this->Form->hidden('url', ['value' => $this->request->params['pass']['0']]) ?>
                <br>
                <legend><?= __('Datei hochladen') ?></legend>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="file">Datei hochladen</label>
                    </div>
                    <div class="col-xs-9">
                        <?php
                        echo $this->Form->file('file', ['type' => 'file', 'label' => false, 'id' => 'file', 'class' => 'form-control']);
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="group">Gruppe auswählen (gegebenfalls)</label>
                    </div>
                    <div class="col-xs-9">
                        <?php
                        echo $this->Form->select('group_id', $groups_array, ['label' => false, 'id' => 'group', 'class' => 'form-control', 'empty' => 'Gruppe auswählen']);
                        ?>
                    </div>
                </div>
                <br>

                <?php $i_class_submit = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
                <?= $this->Form->button($i_class_submit . ' Anlegen', ['class' => 'btn btn-danger']) ?>
                <?= $this->Form->end() ?>
                <br>
            </div>
        </div>

    </div>
</div>

<div id="notes_modal" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #fff">
            <div class="col-lg-9 col-md-9 col-xs-9" style="background-color: #fff; margin-top: 30%">
                <?= $this->Form->create('note', ['controller' => 'Users', 'action' => 'add_note']) ?>
                <?= $this->Form->hidden('user_id') ?>
                <?= $this->Form->hidden('item_id') ?>
                <?= $this->Form->hidden('url', ['value' => $this->request->params['pass']['0']]) ?>
                <br>
                <legend><?= __('Notiz anlegen') ?></legend>
                <div class="row">
                    <div class="col-xs-3">
                        <label for="note">Inhalt</label>
                    </div>
                    <div class="col-xs-9">
                        <?php
                        echo $this->Form->input('note', ['label' => false, 'id' => 'note', 'class' => 'form-control', 'rows' => '10']);
                        ?>
                    </div>
                </div>
                <br>

                <?php $i_class_submit = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
                <?= $this->Form->button($i_class_submit . ' Anlegen', ['class' => 'btn btn-danger']) ?>
                <?= $this->Form->end() ?>
                <br>
            </div>
        </div>
    </div>
</div>

<div id="search_modal" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: none !important; background-color: transparent !important; margin-top: 30%">
            <form class="navbar-form navbar-left" role="search">
                <div>
                    <form class="bs-example bs-example-form" role="form">
                        <div class="input-group">
                            <input placeholder="Google Suche..." id="google_text" type="text" class="form-control">
		        		<span class="input-group-btn">
		                  <button class="btn btn-danger" id="google_search" type="button">
                              <i class="fa fa-search"></i>
                          </button>
		        		</span>
                        </div>
                    </form>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    jQuery('#google_search').click(function() {
        var q = jQuery('#google_text').val();
        if (q==null) {
            alert("Suchfeld ist leer");
            die();
        }
        var url = "http://google.com/search?q="+q;
        window.open(url, '_blank');

    });
</script>

<script>
    var item_offline = "<?php echo $item->offline; ?>";
    if (item_offline==1) {
        var url = "<?php echo $url; ?>";
    } else {
        var url = "http://<?php echo $url; ?>";
    }
    $('#iframe_src').attr('src', url);
</script>