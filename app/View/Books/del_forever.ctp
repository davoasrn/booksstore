<script type="text/javascript">
    $(document).ready(function(){
        var totalprice = 0;
        $('.bookprice').each(function(){
            var price = parseFloat($(this).val());
            totalprice = totalprice + price; 
        });
        $('#totalprice').html('<h3>Total Price: $'+ totalprice +'</h3>');
    });
</script>
<?php  if(isset($userBasket) && is_array($userBasket) && count($userBasket) > 0){ ?>
    <?php foreach ($userBasket as $basketBook){ ?>
        <div class="post">
            <div class="met"><?php echo $basketBook['Basket']['title']; ?></div><div class="text">
            <p class="basketcontent"><?php echo "<b>Author: </b>".$basketBook['Basket']['author']; ?>
            <br />
            <?php echo "<b>Year: </b>".$basketBook['Basket']['year']; ?>
            <br />
            <?php echo "<b>Print: </b>".$basketBook['Basket']['print']; ?>
            <br />
            <?php echo "<b>Price: </b>$".$basketBook['Basket']['price']; ?>
            </p>
            </div>
            <?php
                $delete = 'Delete';
                $delPath = 'delForever/'.$basketBook['Basket']['id'];
            ?>
            <?php echo  $this->Js->link($delete,$delPath,array('update'=>'#basket')); ?>
            <?php echo $this->form->hidden('price'.$basketBook['Basket']['id'],array('value'=>$basketBook['Basket']['price'],'class'=>'bookprice')); ?>
        </div>
<br /><br />
    <?php } ?>
<?php } ?>
<?php
echo $this->Js->writeBuffer(); ?>
<div id="totalprice">
    
</div>
<?php echo  $this->Html->link('Pay','pay'); ?>