<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">   
    
<?= $this->Html->css(['normalize','style'])?>
    
  </head>

  <body>

    <div class="login">
  <h2>Login</h2>
  <?= $this->Form->create() ?>
  <fieldset>
  <?php
     echo $this->Form->input('full_name',['placeholder'=>'Nome','label'=>false]);
     echo $this->Form->input('password',['placeholder'=>'Senha','label'=>false]);
     ?>
  </fieldset>
 <?= $this->Form->button('Login',['controller'=>'travels','action'=>'index'])?>
 <?= $this->Form->end() ?>
  <div class="utilities">
  <?= $this->Html->link('Recuperar credencias',['controller'=>'null','action'=>'null']) ?>
  <?= $this->Html->link('Registar-se',['controller'=>'users','action'=>'add']) ?>
  </div>
</div>
    
    
    
    
    
  </body>
</html>