<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aed[]|\Cake\Collection\CollectionInterface $aeds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Aed'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="aeds index large-9 medium-8 columns content">
    <h3><?= __('Aeds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usable_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aeds as $aed): ?>
            <tr>
                <td><?= $this->Number->format($aed->id) ?></td>
                <td><?= h($aed->location_name) ?></td>
                <td><?= h($aed->address) ?></td>
                <td><?= $this->Number->format($aed->latitude) ?></td>
                <td><?= $this->Number->format($aed->longitude) ?></td>
                <td><?= h($aed->phone) ?></td>
                <td><?= h($aed->usable_time) ?></td>
                <td><?= h($aed->url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $aed->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aed->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $aed->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aed->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        test
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
