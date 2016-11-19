<nav class="navbar navbar-inverse nav-users">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-taggle="collapse" data-target="bs-example-navbar-colapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link('BILHETERIA DA JUNTA',['controller'=>'travels','action'=>'index'],['class'=>'navbar-brand']) ?>
        </div>

       

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <?php if(isset($usuario_corrente)): ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">                       
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Usuarios<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <?= $this->Html->link('Adicionar',['controller'=>'users','action'=>"add"]) ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('Listar',['controller'=>'users','action'=>"index"]) ?>
                                    </li>
                                </ul>                        
                        </li>                
                        <li class="dropdown">                        
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Viagens<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <?= $this->Html->link('Adicionar',['Controller'=>'travels','action'=>'add']) ?>
                                    </li>
                                    <li>
                                        <?= $this->Html->link('Listar',['controller'=>'travels','action'=>'index']) ?>
                                    </li>
                                </ul>                        
                        </li>
                    </ul>

                
                    <ul class="nav navbar-nav navbar-right">                        
                        <li> <?= $this->Html->link('Sair',['controller'=>'users','action'=>'logout']) ?> </li>
                    </ul>
                <?php endif ?>

                <ul class="nav navbar-nav navbar-right">                        
                    <li> <?= $this->Html->link('Regista-se',['controller'=>'users','action'=>'add']) ?> </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">                        
                    <li> <?= $this->Html->link('Logar',['controller'=>'users','action'=>'login']) ?> </li>
                </ul>

            </div>
    </div>
</nav>
