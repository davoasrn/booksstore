<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<script  type="text/javascript">
    $(document).ready(function(){
        $("#BookAddBookForm").validate();
    });
</script>
<br />
<div id="content" style="float:left;margin-left: 190px;clear: both;">
    <table>
    <?php 
        echo $this->Form->create('Book', array('url' => array('controller' => 'admins','action' => 'addBook'),
                                                'inputDefaults' => array('label' => false,'div' => false),
                                                'type' => 'file'));
    ?>
    <tr>
        <td><label for="name">Title</label></td>
        <td><?php
        echo $this->Form->input('title',array('type' => 'text',
                                            'class'=>'required conf_form_inp',
                                            'label' => false));
        ?></td>
    </tr>
    <tr>
        <td><label for="Author">Author</label></td>
        <td><?php
        echo $this->Form->input('author',array('type' => 'text',
                                            'class'=>'required conf_form_inp',
                                            'label' => false));
        ?></td>
    </tr>
    <tr>
        <td><label for="Print">Print</label></td>
       <td><?php
        echo $this->Form->input('print',array('type' => 'text',
                                            'class'=>'required conf_form_inp',
                                            'label' => false));
        ?></td>
    </tr>
    
    <tr style="margin-top: 5px;">
        <td><label for="price">Price</label></td>
       <td><?php
        echo $this->Form->input('price',array('type' => 'text',
                                            'class'=>'required conf_form_inp number',
                                            'label' => false));
        ?></td>
    </tr>
    <tr>
        <td><label for="Year">Year</label></td>
       <td><?php
        echo $this->Form->input('year',array('type' => 'text',
                                            'class'=>'required conf_form_inp',
                                            'label' => false));
        ?></td>
    </tr>
    <tr>
        <td><label for="image">Image</label></td>
        <td>
            <?php
                echo $this->Form->input('Image',array('type' => 'file',
                                                      'label' => false))
            ?>
        </td>
    </tr>
    
    <tr><td>
    <?php
    echo $this->Form->submit('Submit');
    ?></td></tr>
    <?php echo $this->Form->end();     
        
?>
    </table>
</div>
