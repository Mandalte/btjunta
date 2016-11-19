<div class="row">
    <div class="col-md-6 col-md-offset-3">
            <div class="page-header">
                <h2>Criar Viagem</h2>
            </div>
        <?= $this->Form->create($travel) ?>
            <?php
                echo $this->Form->input('time_to_go',['label'=>'Hora de partida']);
                echo $this->Form->input('local_to_start',['label'=>'Local de partida']);
                echo $this->Form->input('destination',['label'=>'Destino']);
                echo $this->Form->input('space',['label'=>'Lugares']);
                echo $this->Form->input('space_cost',['label'=>'Preço por lugar']);
                echo $this->Form->input('volume',['label'=>'Volume Maximo']);
                echo $this->Form->input('volume_cost',['label'=>'preço por volume']);
                echo $this->Form->input('weight',['label'=>'Peso Maximo']);
                echo $this->Form->input('weight_cost',['label'=>'preço por volume']);
                $this->request->session()->write('id', $usuario_corrente['id']);
            ?>
        <?= $this->Form->button(__('Criar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>