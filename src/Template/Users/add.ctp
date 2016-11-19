<div class="row">
    <div class="col-md-6 col-md-offset-3">
            <div class="page-header">
                <h2>Adicionar Usuario</h2>
            </div>
        <?= $this->Form->create($user) ?>
            <?php
                echo $this->Form->input('full_name',['label'=>'Nome Completo']);
                echo $this->Form->input('document_namber',['label'=>'Nº Documento']);
                echo $this->Form->input('phone_nember',['label'=>'Nº De Telfone']);
                echo $this->Form->input('family_phone_namber',['label'=>'Nº De Telfone de Familiar']);
                echo $this->Form->input('email',['label'=>'Correio Electonico']);
                echo $this->Form->input('password',['label'=>'Senha']);
                //echo $this->Form->input('role',['label'=>'Papel']);
                //echo $this->Form->input('travels._ids', ['options' => $travels]);
            ?>
        <?= $this->Form->button(__('Criar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>