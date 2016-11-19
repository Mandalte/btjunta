<?= $this->Flash->render('auth') ?>
<?= $this->Html->css(['indextravel.css']) ?>
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
        <h2>Lista de Viagens</h2>

<div class="membros index large-9 medium-8 columns content">



    <fieldset>
        <legend><?= __('') ?></legend>
        <?php
            $usuario_corrente['id'];
            echo $this->Form->create(null,['class'=>'navbar-form navbar-right','type' => 'post']);
            
            echo $this->Form->input('lpartida', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Local de partida', 'value' => $this->request->query('lpartida')]);
            echo $this->Form->input('destino', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Destino', 'value' => $this->request->query('destino')]);
            echo $this->Form->input('hora', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Hora', 'value' => $this->request->query('hora')]);
            
            
            echo $this->Form->button('Pesquisar',['class'=>'btn btn-primary']);
            echo $this->Form->end();
        ?>        
    </fieldset>

    <fieldset>
        <legend><?= __('') ?></legend>
    <?php

    ?>
        
    </fieldset>


<ul class="nav navbar-nav"> 

    <?php foreach ($travels as $travel): ?>

        <li class="tabelabody">
        <div class="table-responsive">
                <div class="panel panel-primary">
                    <div class="panel-heading"><?= h($travel->local_to_start) ?>-<?= h($travel->destination) ?>  <?= h($travel->tim------------------------------------------------------e_to_go) ?></div>
                        <div class="panel-body">
                            <table>
                                <thead><h4 class="text-primary">Desposicao</h4></thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <h4></h4>
                                        </th>
                                        <th class="col-span">
                                        <h4 class="agost">Bagagem</h4>
                                        </th>
                                    </tr>
                                    <tr >
                                        <th>
                                            <h4 class="agosti"><b>Lugares</b></h4>
                                        </th>
                                        <th>
                                            <h4 class="agost"><b>Volume</b></h4>
                                        </th>
                                        <th>
                                            <h4 class="agost"><b>Peso</b></h4>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <h4 class="agosti"><?= $this->Number->format($travel->space) ?></</h4>
                                        </th>
                                         <th>
                                            <h4 class="agost"><b></b><?= h($travel->volume) ?></h4>
                                        </th>
                                        <th><h4 class="agosti"><?= h($travel->weight) ?></h4></th>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="text">
                                <thead><h4 class="text-primary">Custo</h4></thead>
                                  <tbody>
                                    <tr class="tr">
                                        <th>
                                            <h4 class="agosti"><b>Lugares</b></h4>
                                        </th>
                                        <th>
                                            <h4 class="agost"><b>Volume</b></h4>
                                        </th>
                                        <th>
                                            <h4 class="agost"><b>Peso</b></h4>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <h4 class="agosti"><?= h($travel->space_cost) ?></h4>
                                        </th>
                                         <th>
                                            <h4 class="agost"><b></b> 500 </h4>
                                        </th>
                                        <th><h4 class="agost"><?= h($travel->weight_cost) ?></h4></th>
                                    </tr>
                                <tr>
                                    <th>
                                    </th>
                                    <th class="text-success">
                                    </th>
                                    
                                    <th>
                                    <?php $this->request->session()->write('if', true); ?>
                                    
                                    <?= $this->Html->link('Escolher', ['controller'=>'travelsUsers', 'action' => 'add',$travel->space, $travel->id,$travel->space_cost,$travel->volume,$travel->volume_cost,$travel->weight,$travel->weight_cost],['class'=>'btn btn-sm btn-primary']) ?> 


                                    </th>
                                </tr>
                                </tbody>
                            </table>
                             
                        </div>
                </div>
        </div>   
    </li>
    <?php endforeach ?>
</ul>
