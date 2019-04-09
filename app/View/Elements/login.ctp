<?php 
if($logined === false){
    echo $this->Html->css('admin_style');
    echo $this->Form->create('Books',array('action' => 'index'));
    echo $this->Form->input('username',array('class'=>'conf_form_inp'));
    echo $this->Form->input('password',array('class'=>'conf_form_inp'));
    echo $this->Form->submit('Login');
    echo $this->Form->end(); 
}  else {
    echo $this->Html->link('Logout', 'logout', array('class' => 'button'));
}
?>