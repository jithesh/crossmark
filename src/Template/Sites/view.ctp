<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Site $site
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Site'), ['action' => 'edit', $site->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Site'), ['action' => 'delete', $site->id], ['confirm' => __('Are you sure you want to delete # {0}?', $site->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Terminals'), ['controller' => 'Terminals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Terminal'), ['controller' => 'Terminals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sites view large-9 medium-8 columns content">
    <h3><?= h($site->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($site->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($site->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($site->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($site->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($site->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdip') ?></th>
            <td><?= h($site->createdip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modiifedip') ?></th>
            <td><?= h($site->modiifedip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $site->has('customer') ? $this->Html->link($site->customer->name, ['controller' => 'Customers', 'action' => 'view', $site->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Site Id') ?></th>
            <td><?= h($site->siteid) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($site->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lon') ?></th>
            <td><?= $this->Number->format($site->lon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($site->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($site->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Terminals') ?></h4>
        <?php if (!empty($site->terminals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Terminalid') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Lon') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Createdby') ?></th>
                <th scope="col"><?= __('Modifiedby') ?></th>
                <th scope="col"><?= __('Createdip') ?></th>
                <th scope="col"><?= __('Modiifedip') ?></th>
                <th scope="col"><?= __('Site Id') ?></th>
                <th scope="col"><?= __('Customer Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($site->terminals as $terminals): ?>
            <tr>
                <td><?= h($terminals->id) ?></td>
                <td><?= h($terminals->terminalid) ?></td>
                <td><?= h($terminals->name) ?></td>
                <td><?= h($terminals->description) ?></td>
                <td><?= h($terminals->lat) ?></td>
                <td><?= h($terminals->lon) ?></td>
                <td><?= h($terminals->created) ?></td>
                <td><?= h($terminals->modified) ?></td>
                <td><?= h($terminals->createdby) ?></td>
                <td><?= h($terminals->modifiedby) ?></td>
                <td><?= h($terminals->createdip) ?></td>
                <td><?= h($terminals->modiifedip) ?></td>
                <td><?= h($terminals->site_id) ?></td>
                <td><?= h($terminals->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Terminals', 'action' => 'view', $terminals->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Terminals', 'action' => 'edit', $terminals->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Terminals', 'action' => 'delete', $terminals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $terminals->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
