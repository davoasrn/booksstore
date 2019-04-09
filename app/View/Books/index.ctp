<?php if(isset($books) && is_array($books) && count($books) > 0){ ?>
    <?php foreach($books as $book){ ?>
    <div class="post">
        <div class="met"><?php echo $book['Book']['title']; ?></div><div class="text">
        <?php  echo $this->Html->image("books/small/".$book['Book']['picture'], array("alt" => $book['Book']['title'],'class'=> 'bookimage')); ?>
        <p class="bookcontent"><?php echo "<b>Author: </b>".$book['Book']['author']; ?>
        <br />
        <?php echo "<b>Year: </b>".$book['Book']['year']; ?>
        <br />
        <?php echo "<b>Print: </b>".$book['Book']['print']; ?>
        <br />
        <?php echo "<b>Price: </b>".$book['Book']['price']; ?>
        </p>
        <?php if($logined === true){ ?>
            <div class="read2">
                <?php echo  $this->Js->link('Add to Basket','addToBasket/'.$book['Book']['id'],array('update'=>'#basket')); ?>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php } ?>
<?php } ?>
<?php
echo $this->Js->writeBuffer(); ?>