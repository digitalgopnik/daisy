<div class="col-lg-12 col-md-12 col-xs-12">
<div class="checkbox">
    <div class="custom-check goleft mt">
        <?php echo $this->Form->create('Filter', ['controller' => 'Users', 'action' => 'show_filter']) ?>
        <table id="todo" cellspacing="12" cellpadding="12">
            <tbody>
            <?php $counter = 1; ?>
            <tr>
                <?php foreach ($words as $word) {
                    if ($counter % 3 == 0) {
                        echo '</tr>';
                        echo '<tr>';
                    }
                    echo '<td width="200px"><div class="checkbox"><label>';
                    echo $this->Form->checkbox('filter.', ['multiple' => true, 'label' => false, 'value' => $word->id]);
                    echo $word->name;
                    echo '</div></td>';
                    $counter += 1;
                }
                ?>
            </tr>
            </tbody>
        </table>
        <br>
        <?php echo $this->Form->button(__('Absenden'), ['class' => 'btn btn-danger']); ?>
        <?php echo $this->Form->end(); ?>

    </div>
</div>
    </div>