<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css">

<br>
<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <?php $i_class = $this->Html->tag('i', '', ['class' => 'fa fa-plus', 'escape' => false]); ?>
        <li><?= $this->Html->link($i_class . ' Neue Datei anlegen', ['action' => 'add'], ['class' => 'btn btn-danger', 'escape' => false]) ?></li>
    </ul>
</div>

<?php /*
$groups_array = array();
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
} */
?>
<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel">
        <div class="panel-heading">
            <h2>Meine Dateien</h2>
        </div>
        <div class="panel-body">
        <table id="own_uploads" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
        <thead>
        <th>#</th>
        <th>App</th>
        <th>Name</th>
        <th>Erstellt</th>
        <th>Geändert</th>
        <th class="actions"><?= __('Aktionen') ?></th>
        </thead>
        <tbody>
        <?php foreach ($file_uploads as $file_upload): ?>
            <tr>
                <td><?= $this->Number->format($file_upload->id) ?></td>
                <td><?php
                if (isset($file_upload->app_name) && strlen($file_upload->app_name)>0) {
                    echo h($file_upload->app_name);
                }
                    ?></td>
                <td><?= h($file_upload->filename) ?></td>
                <td><?= $file_upload->created->i18nFormat('dd.MM.YYYY HH:mm') ?></td>
                <td><?= $file_upload->modified->i18nFormat('dd.MM.YYYY HH:mm') ?></td>
                <td class="actions">
                    <?php $delete_class = $this->Html->tag('i', '', ['class' => 'fa fa-trash-o', 'escape' => false]); ?>
                    <a href="#share_modal" data-toggle="modal" class="btn btn-danger" data-url="/FileUploads/share/<?php echo $file_upload->id;?>"><i class="fa fa-share-alt"></i>&nbsp;Freigeben</a>
                    <?= $this->Form->postLink($delete_class . ' Löschen', ['action' => 'delete', $file_upload->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Bist du sicher?')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>
</div>
<?php
$groups_array = [];
foreach ($groups as $group) {
    $groups_array[$group->id] = $group->name;
}
?>
<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="panel">
        <div class="panel-heading">
            <h2>Gruppen-Dateien</h2>
        </div>
        <div class="panel-body">
            <table id="group_uploads" class="table table-striped table-bordered dataTable no-footer" cellpadding="0" cellspacing="0">
                <thead>
                <th>#</th>
                <th>App</th>
                <th>Name</th>
                <th>Gruppe</th>
                <th>Erstellt</th>
                <th>Geändert</th>
                <th class="actions"><?= __('Aktionen') ?></th>
                </thead>
                <tbody>
                <?php foreach ($group_uploads as $group_upload): ?>
                    <tr>
                        <td><?= $this->Number->format($group_upload->id) ?></td>
                        <td><?php
                            if (isset($file_upload->app_name) && strlen($file_upload->app_name)>0) {
                                echo h($file_upload->app_name);
                            }
                            ?></td>
                        <td><?= h($group_upload->filename) ?></td>
                        <td><?= $groups_array[$group_upload->group_id] ?></td>
                        <td><?= $file_upload->created->i18nFormat('dd.MM.YYYY HH:mm') ?></td>
                        <td><?= $file_upload->modified->i18nFormat('dd.MM.YYYY HH:mm') ?></td>
                        <td class="actions">
                            <?php $edit_class = $this->Html->tag('i', '', ['class' => 'fa fa-pencil', 'escape' => false]); ?>
                            <?php $delete_class = $this->Html->tag('i', '', ['class' => 'fa fa-trash-o', 'escape' => false]); ?>
                            <?= $this->Html->link($edit_class . ' Bearbeiten', ['action' => 'edit', $group_upload->id], ['class' => 'btn btn-danger', 'escape' => false]) ?>
                            <?= $this->Form->postLink($delete_class . ' Löschen', ['action' => 'delete', $group_upload->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Bist du sicher?')]) ?>
                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>#
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#own_uploads').DataTable();
        $('#group_uploads').DataTable();
    } );
</script>


<div id="share_modal" style="z-index: 9999" class="modal fade bs-kategorie-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border: none !important; background-color: #fff">
            <div class="col-lg-9 col-md-9 col-xs-9" style="background-color: #fff; margin-top: 30%; height: 180px">
                <?= $this->Form->hidden('user_id') ?>
                <?= $this->Form->hidden('group_id') ?>
                <br>
                <legend><?= __('Datei freigeben') ?></legend>
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
                <?= $this->Form->button($i_class_submit . ' Freigeben', ['class' => 'btn btn-danger datei_freigeben']) ?>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    jQuery('.datei_freigeben').on('click', function() {
        var data_url = jQuery(this).attr('data-url');
        // TODO: Modal schließen
        var group = jQuery('select#group').val();
        var post_data = {
            group_id: group
        };
        $.ajax({
            url: data_url,
            type: 'POST',
            data: post_data,
            dataType: 'json',
            async: true,
            cache: false
        })
            .always(function(data) {
                if (data['status']!=='failed') {
                    // TODO: reload
                } else {
                    // TODO: Fehlermeldung einblenden
                }
            });
    });
</script>