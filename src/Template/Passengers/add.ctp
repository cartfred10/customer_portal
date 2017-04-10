<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Passengers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passengers form large-9 medium-8 columns content">
    <?= $this->Form->create($passenger) ?>
    <fieldset>
        <legend><?= __('Add Passenger') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('name');
            echo $this->Form->control('surname');
            echo $this->Form->control('passportID');
            echo $this->Form->control('trips._ids', ['options' => $trips]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
