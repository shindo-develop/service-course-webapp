<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aed $aed
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aed'), ['action' => 'edit', $aed->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aed'), ['action' => 'delete', $aed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aed->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aeds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aed'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aeds view large-9 medium-8 columns content">
    <h3><?= h($aed->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Location Name') ?></th>
            <td><?= h($aed->location_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($aed->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($aed->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usable Time') ?></th>
            <td><?= h($aed->usable_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($aed->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($aed->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($aed->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($aed->longitude) ?></td>
        </tr>
    </table>
</div>
