<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Passenger'), ['action' => 'edit', $passenger->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Passenger'), ['action' => 'delete', $passenger->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passenger->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Passengers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passenger'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passengers view large-9 medium-8 columns content">
    <h3><?= h($passenger->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($passenger->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($passenger->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($passenger->surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PassportID') ?></th>
            <td><?= h($passenger->passportID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($passenger->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Trips') ?></h4>
        <?php if (!empty($passenger->trips)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Departure') ?></th>
                <th scope="col"><?= __('Destination') ?></th>
                <th scope="col"><?= __('DepartTime') ?></th>
                <th scope="col"><?= __('DestinTime') ?></th>
                <th scope="col"><?= __('Passenger Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($passenger->trips as $trips): ?>
            <tr>
                <td><?= h($trips->id) ?></td>
                <td><?= h($trips->departure) ?></td>
                <td><?= h($trips->destination) ?></td>
                <td><?= h($trips->departTime) ?></td>
                <td><?= h($trips->destinTime) ?></td>
                <td><?= h($trips->passenger_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Trips', 'action' => 'view', $trips->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Trips', 'action' => 'edit', $trips->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Trips', 'action' => 'delete', $trips->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trips->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
