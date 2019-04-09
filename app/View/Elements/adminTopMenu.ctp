
<?php $permissions = $this->Session->read('User');
//var_dump($permissions);die;
?> 
<div class="all">
<div class="adm_menu">
    <ul class="menu1">
        <li><a><?php 
        echo $this->Html->Link('Books', array('controller' => 'admins','action' => 'home')); ?></li></a>
        <li><a><?php
        echo $this->Html->Link('Basket', array('controller' => 'admins','action' => ''));?></li></a>
        <li><a><?php 
        echo $this->Html->Link('Users', array('controller' => 'admins','action' => 'user'));?></li></a>
    </ul> 
    <?php echo $this->Html->link('Logout', array('controller' => 'admins', 'action' => 'logout'), array('class' => 'logout'));?>
</div>
</div>