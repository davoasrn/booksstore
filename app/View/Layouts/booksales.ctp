<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Book Sales</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<?php echo $this->Html->css('bookstyles'); ?>
<?php echo $this->Html->css('jquery.jgrowl'); ?>
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('jquery.jgrowl'); ?>
</head>
<body>

<div id="main">
<!-- start header -->
  <div id="menu">
	  <ul>
	   <li><a href="#">Home</a></li>
	   <li><a href="#">Products</a></li>
	   <li><a href="#">Support</a></li>
	   <li><a href="#">About</a></li>
	   <li><a href="#">Contact</a></li>   
	  </ul>
</div>
<div id="header">

    <div id="logo">
        <?php  echo $this->Html->image("images.jpg", array("alt" => "book sales",'width'=>'200','url' => array('controller' => 'Books', 'action' => 'index'))); ?>
    </div>
    <div id="wel">
            <h4>Welcome</h4>
            <a href="#" class="web">To Our Website</a>
            <div id="weltext">
            <p>Donec placerat turpis sed turpis convallis accumsan congue et...lorem. Etiam feugiat   diam sit amet leo imperdiet id dignissim purus interdum. Quisque imperdiet sem sit amet libero iaculis...vitae pulvinar tortor blandit. Ut aliquet varius tempor...  </p>
            <div class="read"><a href="#">read more</a></div>
            </div>
    </div>
<!--Header end -->

</div>


<!-- end header -->
<!-- start page -->
<div id="con_top">
<div id="page">
	<!-- start leftbar -->
	<div id="leftbar" class="sidebar">
	<h2>Login</h2>
            <div class="ulbg">
                    <?php echo $this->element('login'); ?>
            </div>
            <h2>Statistic</h2>
            <div class="ulbg">
                    <ul>
                            <li><?php echo "Popular Author: <b>".$author['baskets']['author']."</b>, He Sold <b>".$author['0']['count']."</b> book(s)" ?></li>
                    </ul>
                    <ul>
                            <li><?php echo "Popular Book: <b>".$favbook['baskets']['title']."</b>, Sold <b>".$favbook['0']['count']."</b> book(s)" ?></li>
                    </ul>
            </div>
</div>
	<!-- end leftbar -->
	<!-- start content -->
	<div id="content">
            <?php echo $this->element('notify'); ?>
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
	</div>
	<!-- end content -->
	<!-- start rightbar -->
	<div id="rightbar" class="sidebar">
		<?php echo $this->element('basket'); ?>
        </div>
	<!-- end rightbar -->
	
</div>
</div><div id="con_bot"></div>
<!-- end page --> 

<div id="footer">
   
</div>
</div>
    <?php echo $this->Js->writeBuffer(); ?>
</body>
</html>
