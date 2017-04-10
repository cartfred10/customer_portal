<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Passengers'), ['controller' => 'Passengers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passenger'), ['controller' => 'Passengers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips form large-9 medium-8 columns content">
    <?= $this->Form->create($trip) ?>
    <fieldset>
        <legend><?= __('Add Trip') ?></legend>
        <?php
            echo $this->Form->control('departure');
            echo $this->Form->control('destination');
            echo $this->Form->control('departTime');
            echo $this->Form->control('destinTime');
            echo $this->Form->control('passenger_id');
            echo $this->Form->control('passengers._ids', ['options' => $passengers]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
