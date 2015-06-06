<?php
$groups_array = [];
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
}
?>

<style>
    .circle
    {
        width:150px;
        height:150px;
        border-radius:1000px;
        color:#fff;
        text-align:center;
        background: #fff;
        position: absolute;
        left: 45%;
        top: 20%;
        z-index: 9998
    }
    #layer_div {
        opacity: 0.8;
        position: absolute;
        background: #ddd;
        z-index: 9997;
        width: 1920px;
        height: 1080px;
    }
    .iframebutton1 {
        margin-left:-13px;
    }
    .iframebutton1 i {
        background-color: #fff;
        padding: 10px;
        border-radius: 30px;
        opacity: 0.8;
    }

    .iframebutton2 {
        margin-left:50px;
    }
    .iframebutton2 i {
        background-color: #fff;
        padding: 10px;
        border-radius: 30px;
        opacity: 0.8;
    }

    .iframebutton3 {
        margin-left: 8px;
    }
    .iframebutton3 i {
        background-color: #fff;
        padding: 10px;
        border-radius: 30px;
        opacity: 0.8;
    }

    .iframebutton4 {
        margin-left: -185px;
    }
    .iframebutton4 i {
        background-color: #fff;
        padding: 10px;
        border-radius: 30px;
        opacity: 0.8;
    }

    #hide_touch_companion {
        margin-top: -85px;
        position: absolute;
        margin-left: 60px;
    }
    .iframebutton5 {
        position: absolute;
        margin-top: 72px;
        margin-left: 37px;
    }
    .iframebutton5 i {
        background-color: #fff;
        padding: 10px;
        border-radius: 30px;
        opacity: 0.8;
    }
</style>
<div id="layer_div" style="display: none"></div>
<div id="frame_src" style="border: 1px solid #ddd">
    <iframe id="iframe_src" src="" width="95%" height="600px"> <!-- größe eingeben! -->

        <p>Ihr Browser kann leider keine eingebetteten Frames anzeigen:
            Sie können die eingebettete Seite über den folgenden
            Verweis aufrufen:
        </p>

    </iframe>
    <a id="show_touch_companion" style="position: absolute; left: 5px; top: 20px; width: 175px; height: 100px"><button type="button" class="btn btn-danger btn-lg btn-block" style="font-size: 30px">MENU <i class="fa fa-gear fa-2x"></i></button></a>
    <div id="div_src" class="circle" style="display: none">
        <?php $i_class_home = $this->Html->tag('i', '', ['class' => 'fa fa-home fa-3x', 'escape' => false]); ?>
        <?= $this->Html->link($i_class_home, ['controller' => 'Users', 'action' => 'dashboard'], ['class' => 'iframebutton1', 'escape' => false]) ?>
        <a data-toggle="modal" href="#notes_modal" class="iframebutton2">
            <i class="fa fa-file-text-o fa-3x"></i>
        </a>
        <br><br>
        <a data-toggle="modal" href="#search_modal" class="iframebutton3">
            <i class="fa fa-google fa-3x" data-toggle="modal"></i>
        </a>
        <a data-toggle="modal" href="#upload_modal" class="iframebutton4">
            <i class="fa fa-files-o fa-3x" data-toggle="modal"></i>
        </a>
        <a id="hide_touch_companion" style="display: none">
            <i class="fa fa-times-circle fa-3x"></i>
        </a>
        <?php if (isset($item->app_help) && $item->app_help!='') { ?>
        <a data-toggle="modal" href="#help_modal" class="iframebutton5">
            <i class="fa fa-question-circle fa-3x"></i>
        </a>
        <?php } ?>
    </div>
</div>

<div id="upload_modal" style="z-index: 9999" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: none !important; background-color: #fff">
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

<div id="notes_modal" style="z-index: 9999" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: none !important; background-color: #fff">
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

<div id="search_modal" style="z-index: 9999" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: none !important; background-color: transparent !important; margin-top: 30%">
            <div>
                <div class="input-group">
                    <input placeholder="Google Suche..." id="google_text" type="text" class="form-control">
		        	<span class="input-group-btn">
                        <button class="btn btn-danger" id="google_search" type="button">
                            <i class="fa fa-search"></i>
                        </button>
		        	</span>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="help_modal" style="z-index: 9999" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: none !important; background-color: transparent !important; margin-top: 30%">
            <div>
                <?php // TODO: app-spezifische Hilfe ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Falls per Klick bestätigt wurde
    jQuery('#google_search').click(function() {
        var q = jQuery('#google_text').val();
        if (q=='') {
            jQuery('#div_src').append('<div style=\"margin-left: -50px; margin-top: -180px; font-weight: bold !important\" class=\"message error\">Suchfeld ist leer</div>');
            jQuery('div.message.error').delay('1000').fadeOut('5000');
        } else {
            var url = "http://google.com/search?q=" + q;
            window.open(url, '_blank');
        }

    });

    // Falls mit Enter bestätigt wurde
    jQuery(document).keypress(function(e) {
        var is_focus = $('#google_text').is(":focus");
        if (e.which == 13 && is_focus == true) {
            var q = jQuery('#google_text').val();
            if (q == '') {
                jQuery('#div_src').append('<div style=\"margin-left: -50px; margin-top: -180px; font-weight: bold !important;\" class=\"message error\">Suchfeld ist leer.</div>');
                jQuery('div.message.error').delay('1000').fadeOut('5000');
            } else {
                var url = "http://google.com/search?q="+q;
                window.open(url, '_blank');
            }
        }
    });
</script>

<script>
    var item_offline = 0;

    if (item_offline==1) {
        var url = "<?php echo $url; ?>";
    } else {
        var url = "http://<?php echo $url; ?>";
    }
    $('#iframe_src').attr('src', url);
</script>