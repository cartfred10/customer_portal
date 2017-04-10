<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips index large-9 medium-8 columns content">
    <h3><?= __('Trips') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('departure') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('departTime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destinTime') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passenger_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trips as $trip): ?>
            <tr>
                <td><?= $this->Number->format($trip->id) ?></td>
                <td><?= h($trip->departure) ?></td>
                <td><?= h($trip->destination) ?></td>
                <td><?= h($trip->departTime) ?></td>
                <td><?= h($trip->destinTime) ?></td>
                <td><?= $this->Number->format($trip->passenger_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trip->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trip->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
