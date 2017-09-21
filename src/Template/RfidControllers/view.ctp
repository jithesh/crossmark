<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\RfidController $rfidController
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rfid Controller'), ['action' => 'edit', $rfidController->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rfid Controller'), ['action' => 'delete', $rfidController->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfidController->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rfid Controllers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfid Controller'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rfidControllers view large-9 medium-8 columns content">
    <h3><?= h($rfidController->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($rfidController->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zone') ?></th>
            <td><?= $rfidController->has('zone') ? $this->Html->link($rfidController->zone->name, ['controller' => 'Zones', 'action' => 'view', $rfidController->zone->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($rfidController->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($rfidController->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($rfidController->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($rfidController->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdip') ?></th>
            <td><?= h($rfidController->createdip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modiifedip') ?></th>
            <td><?= h($rfidController->modiifedip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($rfidController->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($rfidController->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $rfidController->has('customer') ? $this->Html->link($rfidController->customer->name, ['controller' => 'Customers', 'action' => 'view', $rfidController->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($rfidController->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lon') ?></th>
            <td><?= $this->Number->format($rfidController->lon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rfidController->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($rfidController->modified) ?></td>
        </tr>
    </table>
</div>
