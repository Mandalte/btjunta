<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Full Name') ?></th>
            <td><?= h($user->full_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Document Namber') ?></th>
            <td><?= h($user->document_namber) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone Nember') ?></th>
            <td><?= $this->Number->format($user->phone_nember) ?></td>
        </tr>
        <tr>
            <th><?= __('Family Phone Namber') ?></th>
            <td><?= $this->Number->format($user->family_phone_namber) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Role') ?></h4>
        <?= $this->Text->autoParagraph(h($user->role)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Travels') ?></h4>
        <?php if (!empty($user->travels)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Time To Go') ?></th>
                <th><?= __('Local To Start') ?></th>
                <th><?= __('Destination') ?></th>
                <th><?= __('Space') ?></th>
                <th><?= __('Space Cost') ?></th>
                <th><?= __('Volume') ?></th>
                <th><?= __('Volume Cost') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Weight Cost') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->travels as $travels): ?>
            <tr>
                <td><?= h($travels->id) ?></td>
                <td><?= h($travels->time_to_go) ?></td>
                <td><?= h($travels->local_to_start) ?></td>
                <td><?= h($travels->destination) ?></td>
                <td><?= h($travels->space) ?></td>
                <td><?= h($travels->space_cost) ?></td>
                <td><?= h($travels->volume) ?></td>
                <td><?= h($travels->volume_cost) ?></td>
                <td><?= h($travels->weight) ?></td>
                <td><?= h($travels->weight_cost) ?></td>
                <td><?= h($travels->created) ?></td>
                <td><?= h($travels->modified) ?></td>
                <td><?= h($travels->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Travels', 'action' => 'view', $travels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Travels', 'action' => 'edit', $travels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Travels', 'action' => 'delete', $travels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
