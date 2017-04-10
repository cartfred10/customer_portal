<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trips view large-9 medium-8 columns content">
    <h3><?= h($trip->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Departure') ?></th>
            <td><?= h($trip->departure) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= h($trip->destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Passenger Id') ?></th>
            <td><?= $this->Number->format($trip->passenger_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DepartTime') ?></th>
            <td><?= h($trip->departTime) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DestinTime') ?></th>
            <td><?= h($trip->destinTime) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Passengers') ?></h4>
        <?php if (!empty($trip->passengers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Surname') ?></th>
                <th scope="col"><?= __('PassportID') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($trip->passengers as $passengers): ?>
            <tr>
                <td><?= h($passengers->id) ?></td>
                <td><?= h($passengers->title) ?></td>
                <td><?= h($passengers->name) ?></td>
                <td><?= h($passengers->surname) ?></td>
                <td><?= h($passengers->passportID) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Passengers', 'action' => 'view', $passengers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Passengers', 'action' => 'edit', $passengers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Passengers', 'action' => 'delete', $passengers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passengers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
