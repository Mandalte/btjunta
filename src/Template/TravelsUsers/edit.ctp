<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $travelsUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $travelsUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Travels Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="travelsUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($travelsUser) ?>
    <fieldset>
        <legend><?= __('Edit Travels User') ?></legend>
        <?php
            echo $this->Form->input('space_number');
            echo $this->Form->input('volume');
            echo $this->Form->input('weight');
            echo $this->Form->input('total_price');
            echo $this->Form->input('travel_id', ['options' => $travels]);
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
