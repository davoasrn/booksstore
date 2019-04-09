<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Book Sales Admin Panel');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo $this->Html->css('admin_style'); ?>
        <?php echo $this->Html->script('jquery'); ?>
        <?php echo $this->Html->css('style'); ?>
        <?php echo $this->Html->css('jquery.ui.base'); ?>
        <?php echo $this->Html->css('jquery.dataTables'); ?>
        <?php echo $this->Html->css('jquery.ui.theme'); ?>
        <?php echo $this->Html->css('jquery.jgrowl'); ?>
        <?php echo $this->Html->script('jquery-1.7.2.min'); ?>
        <?php echo $this->Html->script('jquery-ui.min'); ?>
        <?php echo $this->Html->script('jquery.validate.min'); ?>
        <?php echo $this->Html->script('jquery.dataTables.min'); ?>
        <?php echo $this->Html->script('jquery.jgrowl'); ?>
        <?php echo $this->Html->script('maxlength'); ?>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		
		<div id="content">
                    
                    <?php 
                    $ad = $this->Session->read('isAdmin');
                    //var_dump($ad);die;
                    if($ad == true)
                    {?>               
                    <?php echo $this->element('adminTopMenu');?>
                    <?php echo $this->element('adminSubMenu');
                    }?>
         
			<?php echo $this->Session->flash(); ?>
                        

			<?php echo $this->fetch('content'); ?>
		</div>
	
	</div>
	<?php
echo $this->Js->writeBuffer(); ?>
</body>
</html>
