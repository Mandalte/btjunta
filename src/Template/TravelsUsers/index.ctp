<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Travels User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Travels'), ['controller' => 'Travels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Travel'), ['controller' => 'Travels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="travelsUsers index large-9 medium-8 columns content">
    <h3><?= __('Travels Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('space_number') ?></th>
                <th><?= $this->Paginator->sort('volume') ?></th>
                <th><?= $this->Paginator->sort('weight') ?></th>
                <th><?= $this->Paginator->sort('total_price') ?></th>
                <th><?= $this->Paginator->sort('travel_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($travelsUsers as $travelsUser): ?>
            <tr>
                <td><?= $this->Number->format($travelsUser->id) ?></td>
                <td><?= $this->Number->format($travelsUser->space_number) ?></td>
                <td><?= $this->Number->format($travelsUser->volume) ?></td>
                <td><?= $this->Number->format($travelsUser->weight) ?></td>
                <td><?= $this->Number->format($travelsUser->total_price) ?></td>
                <td><?= $travelsUser->has('travel') ? $this->Html->link($travelsUser->travel->id, ['controller' => 'Travels', 'action' => 'view', $travelsUser->travel->id]) : '' ?></td>
                <td><?= $travelsUser->has('user') ? $this->Html->link($travelsUser->user->id, ['controller' => 'Users', 'action' => 'view', $travelsUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $travelsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $travelsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $travelsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $travelsUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
