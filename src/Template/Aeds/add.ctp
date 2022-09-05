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
    <fieldset>
        <h2>一括追加</h2>
        <?= $this->Form->create('', ['name' => 'upload_form', 'type' => 'file']); ?>
        <div>
            <?= $this->Form->label(__('読み込むファイルを選択してください。')) ?>
        </div>
        <div>
            <?= $this->Form->file('upload_file', ['id' => 'upload_file']) ?>
            <?= $this->Form->button(__("upload"), ['onClick' => 'upload()', 'type' => 'button']); ?>
        </div>
        <?= $this->Form->end() ?>
        <?php if (isset($errors)) : ?>
            <div>
                <?php foreach ($errors as $error) : ?>
                    <div><?= empty($error['LINE_NO']) ? $error['DESCRIPTION'] : 'L' . $error['LINE_NO'] . ' : ' . $error['DESCRIPTION'] ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
    </fieldset>

</div>
<?= $this->Html->script('/js/upload') ?>
