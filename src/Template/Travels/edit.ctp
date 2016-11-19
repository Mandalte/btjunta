
<div class="travels form large-9 medium-8 columns content">
    <?= $this->Form->create($travel) ?>
    <fieldset>
        <legend><?= __('Edit Travel') ?></legend>
        <?php
            echo $this->Form->input('time_to_go');
            echo $this->Form->input('local_to_start');
            echo $this->Form->input('destination');
            echo $this->Form->input('space');
            echo $this->Form->input('space_cost');
            echo $this->Form->input('volume');
            echo $this->Form->input('volume_cost');
            echo $this->Form->input('weight');
            echo $this->Form->input('weight_cost');
            echo $this->Form->input('user_id');
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
