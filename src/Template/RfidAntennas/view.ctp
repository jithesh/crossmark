<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\RfidAntenna $rfidAntenna
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rfid Antenna'), ['action' => 'edit', $rfidAntenna->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rfid Antenna'), ['action' => 'delete', $rfidAntenna->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rfidAntenna->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rfid Antennas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfid Antenna'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rfid Controllers'), ['controller' => 'RfidControllers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rfid Controller'), ['controller' => 'RfidControllers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rfidAntennas view large-9 medium-8 columns content">
    <h3><?= h($rfidAntenna->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($rfidAntenna->id) ?></td>
        </tr>
         <tr>
            <th scope="row"><?= __('Antenna Number') ?></th>
            <td><?= h($rfidAntenna->antenna_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($rfidAntenna->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($rfidAntenna->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdby') ?></th>
            <td><?= h($rfidAntenna->createdby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modifiedby') ?></th>
            <td><?= h($rfidAntenna->modifiedby) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Createdip') ?></th>
            <td><?= h($rfidAntenna->createdip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modiifedip') ?></th>
            <td><?= h($rfidAntenna->modiifedip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($rfidAntenna->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($rfidAntenna->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer') ?></th>
            <td><?= $rfidAntenna->has('customer') ? $this->Html->link($rfidAntenna->customer->name, ['controller' => 'Customers', 'action' => 'view', $rfidAntenna->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rfid Controller') ?></th>
            <td><?= $rfidAntenna->has('rfid_controller') ? $this->Html->link($rfidAntenna->rfid_controller->name, ['controller' => 'RfidControllers', 'action' => 'view', $rfidAntenna->rfid_controller->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($rfidAntenna->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lon') ?></th>
            <td><?= $this->Number->format($rfidAntenna->lon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($rfidAntenna->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($rfidAntenna->modified) ?></td>
        </tr>
    </table>
</div>
