<?= $this->Html->css(['indextravel.css']) ?>
<div class="row">

    <?php if($this->request->session()->read('if')): ?>
    <div class="col-md-6 col-md-offset-3">
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
            <?= $this->Form->button(__('Submeter')) ?>
        <?= $this->Form->end() ?>
    </div>
    </div>
    <?php $this->request->session()->write('pagamento',false);?>
    <?php endif ?>

    <?php if(!($this->request->session()->read('if'))): ?>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                    
                        <?php if (true): ?>
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
                                        <th><h4 class='pagar'>1</h4></th>
                                        <th><h4 class='pagar'>500MT</h4></th>
                                         <th><h4 class='pagar'>500Mt</h4></th>
                                    </tr>
                                     <tr class='pagarr'>
                                        <th><h4 class='pagar'><b>Volume de bagagem</b></h4></th>
                                        <th><h4 class='pagar'>100</h4></th>
                                        <th><h4 class='pagar'>60Mt</h4></th>
                                         <th><h4 class='pagar'>6000Mt</h4></th>
                                    </tr>
                                    <tr class='pagarr'>
                                        <th><h4 class='pagar'><b>Peso de bagagem</b></h4></th>
                                        <th><h4 class='pagar'>50Mt</h4></th>
                                        <th><h4 class='pagar'>50Mt</h4></th>
                                        <th><h4 class='pagar'>250Mt</h4></th>
                                    </tr>
                                    <tr class='pagarr'>
                                        <th></h4></th>
                                        <th></th>
                                        <th><h4 class='pagar'><b>Total</b></h4></th>
                                        <th><h4 class='pagar'>6750Mt</h4></th>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="page-header">
                        <h2></h2>
                    </div>
                    <div class="page-header">
                        <h2>Informações de Pagamento</h2>
                    </div>
                    <?= $this->Form->create() ?>
                        <?php
                        
                            echo $this->Form->input('space_number',['label'=>'Codigo']);
                     
                         
                            $this->request->session()->write('id', $usuario_corrente['id']);                          
                        ?>
                        <?= $this->Form->button(__('Submeter')) ?>
                    <?= $this->Form->end() ?>
            </div>
        </div>
    <?php $this->request->session()->write('pagamento',true);?>
    <?php endif ?>
    <?php $this->request->session()->write('if',false);?>

</div>