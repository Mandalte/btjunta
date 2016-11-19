<div class="row">
    <div class="col-md-12">
        <div class="page-header">
        <h2>Lista de Usuarios</h2>

<div class="membros index large-9 medium-8 columns content">



    <fieldset>
        <legend><?= __('') ?></legend>
            <?php
        echo $this->Form->create(null, ['type' => 'get']);
        
        echo $this->Form->input('lpartida', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Local de partida', 'value' => $this->request->query('lpartida')]);
        echo $this->Form->input('destino', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Destino', 'value' => $this->request->query('destino')]);
        echo $this->Form->input('hora', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Hora', 'value' => $this->request->query('hora')]);
        
        echo $this->Form->button('Pesquisar');
        echo $this->Form->end();
    ?>
        
    </fieldset>

</div>



        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Nome Completo') ?></th>
                <th><?= $this->Paginator->sort('Nº Documento') ?></th>
                <th><?= $this->Paginator->sort('Nº De Telfone') ?></th>
                <th><?= $this->Paginator->sort('Nº De Telfone de Familiar') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="actions"><?= __('Acções') ?></th>
            </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->full_name) ?></td>
                <td><?= h($user->document_namber) ?></td>
                <td><?= $this->Number->format($user->phone_nember) ?></td>
                <td><?= $this->Number->format($user->family_phone_namber) ?></td>
                <td><?= h($user->email) ?></td>                       
                            <td class="actions">
                                    <?= $this->Html->link('ver', ['action' => 'view', $user->id],['class'=>'btn btn-sm btn-info']) ?>
                                    <?= $this->Html->link('Editar', ['action' => 'edit', $user->id],['class'=>'btn btn-sm btn-primary']) ?>
                                    <?= $this->Form->postLink('Apagar', ['action' => 'delete', $user->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Tens certeza qu queres apagar essa Viagem ')]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers(['before'=>'','Proximo'=>'']) ?>
            <?= $this->Paginator->prev('< ' . __('next')) ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
