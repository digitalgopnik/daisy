<div class="col-lg-3 col-md-3 col-xs-3">
    <h3><?= __('Aktionen') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $item->id],
                ['confirm' => __('Bist du sicher')]
            )
        ?></li>
        <li><?= $this->Html->link(__('Apps auflisten'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="col-lg-6 col-md-6 col-xs-6">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Edit Item') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('auth_key');
            echo $this->Form->input('auth_token');
            echo $this->Form->input('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
