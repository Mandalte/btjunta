<?= $this->Html->css(['indextravel.css']) ?>
<div class="row">
    <?php if(!$this->request->session()->read('if')): ?>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                  
                    <table>
                        <thead>

                            <div class="page-header">
                                <h2>Informações de Bilhete</h2>
                            </div>

                        </thead>
                        <tbody class='pagart'>
                             <tr class='pagarr'>
                             <th></th>
                                <th><h4 class='pagar'><b>Quantidade</b></h4></th>
                                <th><h4 class='pagar'><b>Preco Unidade</b></h4></th>
                                <th><h4 class='pagar'> <b>preco Total</b></h4></th>
                            </tr>
                              <tr class='pagarr'>
                                <th><h4 class='pagar'><b>Passageiro</b></h4></th>
                                <th><h4 class='pagar'>Unidade</h4></th>
                                <th><h4 class='pagar'>Total</h4></th>
                                 <th><h4 class='pagar'>6Mt</h4></th>
                            </tr>
                             <tr class='pagarr'>
                                <th><h4 class='pagar'><b>Volume de bagagem</b></h4></th>
                                <th><h4 class='pagar'>5Mt</h4></th>
                                <th><h4 class='pagar'>6Mt</h4></th>
                                 <th><h4 class='pagar'>6Mt</h4></th>
                            </tr>
                            <tr class='pagarr'>
                                <th><h4 class='pagar'><b>Peso de bagagem</b></h4></th>
                                <th><h4 class='pagar'>5Mt</h4></th>
                                <th><h4 class='pagar'>6Mt</h4></th>
                                <th><h4 class='pagar'>6Mt</h4></th>
                            </tr>
                            <tr class='pagarr'>
                                <th></h4></th>
                                <th></th>
                                <th><h4 class='pagar'><b>Total</b></h4></th>
                                <th><h4 class='pagar'>6Mt</h4></th>
                            </tr>
                        </tbody>
                    </table>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="page-header">
                        <h2></h2>
                    </div>
                    <div class="page-header">
                        <h2>Informações de Bilhete</h2>
                    </div>
                    <?= $this->Form->create($travelsUser) ?>
                        <?php
                        
                            echo $this->Form->input('space_number',['label'=>'Quantidade de bilhetes']);
                            echo $this->Form->input('volume',['label'=>'Volume de bagagem']);
                            echo $this->Form->input('weight',['label'=>'Peso de bagagem']);
                         
                            $this->request->session()->write('id', $usuario_corrente['id']);                          
                        ?>
                        <?= $this->Form->button(__('Submeter',['controller'=>'TravelsUsersController','action'=>'add'])) ?>
                    <?= $this->Form->end() ?>
            </div>
        </div>
    <?php endif ?>
</div>