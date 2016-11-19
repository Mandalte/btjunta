<div div class="table-responsive">
    <h3><?= h($travel->id) ?></h3>
    <table class="table table-striped table-hover">
        <tr>
            <th><?= __('Local To Start') ?></th>
            <td><?= h($travel->local_to_start) ?></td>
        </tr>
        <tr>
            <th><?= __('Destination') ?></th>
            <td><?= h($travel->destination) ?></td>
        </tr>
        <tr>
            <th><?= __('Space Cost') ?></th>
            <td><?= h($travel->space_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Volume') ?></th>
            <td><?= h($travel->volume) ?></td>
        </tr>
        <tr>
            <th><?= __('Volume Cost') ?></th>
            <td><?= h($travel->volume_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight') ?></th>
            <td><?= h($travel->weight) ?></td>
        </tr>
        <tr>
            <th><?= __('Weight Cost') ?></th>
            <td><?= h($travel->weight_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($travel->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Space') ?></th>
            <td><?= $this->Number->format($travel->space) ?></td>
        </tr>
        <tr>
            <th><?= __('User Id') ?></th>
            <td><?= $this->Number->format($travel->user_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Time To Go') ?></th>
            <td><?= h($travel->time_to_go) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($travel->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($travel->modified) ?></td>
        </tr>
    </table>
    <div div class="table-responsive">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($travel->users)): ?>
        <table table class="table table-striped table-hover">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Full Name') ?></th>
                <th><?= __('Document Namber') ?></th>
                <th><?= __('Phone Nember') ?></th>
                <th><?= __('Family Phone Namber') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Role') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($travel->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->full_name) ?></td>
                <td><?= h($users->document_namber) ?></td>
                <td><?= h($users->phone_nember) ?></td>
                <td><?= h($users->family_phone_namber) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
