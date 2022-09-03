<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aed $aed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Aeds'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="aeds form large-9 medium-8 columns content">
    <?= $this->Form->create($aed) ?>
    <fieldset>
        <legend><?= __('Add Aed') ?></legend>
        <?php
            echo $this->Form->control('location_name');
            echo $this->Form->control('address');
            echo $this->Form->control('latitude');
            echo $this->Form->control('longitude');
            echo $this->Form->control('phone');
            echo $this->Form->control('usable_time');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
