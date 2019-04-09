<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script  type="text/javascript">
    $(document).ready(function(){
        $('#UserAddUserForm').validate();
    });
</script>
<br />
<div id="content" style="float:left;margin-left: 190px;clear: both;">
    <table>
    <?php 
        echo $this->Form->create('User', array('url' => array('controller' => 'admins','action' => 'addUser'),
                                                'inputDefaults' => array('label' => false,'div' => false),
                                                'type' => 'file'));
    ?>
    <tr>
        <td><label for="First Name">First Name</label></td>
        <td><?php
        echo $this->Form->input('firstName',array('type' => 'text',
                                            'class'=>'required conf_form_inp',
                                            'label' => false));
        ?></td>
    </tr>
    <tr>
        <td><label for="Last Name">Last Name</label></td>
        <td><?php
        echo $this->Form->input('lastName',array('type' => 'text',
                                            'class'=>'required conf_form_inp',
                                            'label' => false));
        ?></td>
    </tr>
    <tr>
        <td><label for="Username">Username</label></td>
       <td><?php
        echo $this->Form->input('username',array('type' => 'text',
                                            'class'=>'required conf_form_inp',
                                            'label' => false));
        ?></td>
    </tr>
    
    <tr style="margin-top: 5px;">
        <td><label for="password">Password</label></td>
       <td><?php
        echo $this->Form->input('password',array('type' => 'password',
                                            'class'=>'required conf_form_inp number',
                                            'label' => false));
        ?></td>
    </tr>
    <tr>
        <td><label for="Confirm Password">Confirm Password</label></td>
       <td><?php
        echo $this->Form->input('confirmPassword',array('type' => 'password',
                                            'class'=>'required conf_form_inp',
                                            'label' => false));
        ?></td>
    </tr>
    
    <tr><td>
    <?php
    echo $this->Form->submit('Submit');
    ?></td></tr>
    <?php echo $this->Form->end();     
        
?>
    </table>
</div>
