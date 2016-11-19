<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Travels User'), ['action' => 'edit', $travelsUser->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Travels User'), ['action' => 'delete', $travelsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelsUser->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Travels Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travels User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="travelsUsers view large-9 medium-8 columns content">
    <h3><?= h($travelsUser->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Travel') ?></th>
            <td><?= $travelsUser->has('travel') ? $this->Html->link($travelsUser->travel->id, ['controller' => 'Travels', 'action' => 'view', $travelsUser->travel->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $travelsUser->has('user') ? $this->Html->link($travelsUser->user->id, ['controller' => 'Users', 'action' => 'view', $travelsUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($travelsUser->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Space Number') ?></th>
            <td><?= $this->Number->format($travelsUser->space_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Volume') ?></th>
            <td><?= $this->Number->format($travelsUser->volume) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= $this->Number->format($travelsUser->weight) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Price') ?></th>
            <td><?= $this->Number->format($travelsUser->total_price) ?></td>
        </tr>
    </table>
</div>
