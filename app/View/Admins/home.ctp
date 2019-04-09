<?php

/*
 * Getting All books 
 * 
 */
?>
<script type="text/javascript">

$(document).ready(function(){

  $("#datatable").dataTable();
  
  /* box container */
	$(".collapsable").click(function (){
		if ($(this).is('.closed')) {
			$(this).removeClass('closed');
			$(this).addClass('open');
		} else {
			$(this).removeClass('open');
			$(this).addClass('closed');
		}
		$(this).closest('.box-element').find('.box-content').slideToggle();
		return false;
	});	

});

</script>
<div class="c-data" style="margin-left: 191px;margin-right: 191px;" >
    <div class="box-element">
        <div class="box-head">Books<a href="" class="collapsable"></a></div>
            <div class="box-content no-padding grey-bg">
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Print</th>
                            <th>Price</th>
                            <th>Year</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($books && is_array($books) && count($books) > 0){ ?>
                <?php foreach ($books as $book){
                    $editLink = 'editBook/'.$book['Book']['id'];
                    $delLink = 'deleteBook/'.$book['Book']['id'];
                    ?>
                        <tr>
                            <td><?php echo $book['Book']['id']; ?></td>
                            <td><?php echo $book['Book']['title']; ?></td>
                            <td><?php echo $book['Book']['author']; ?></td>
                            <td><?php echo $book['Book']['print']; ?></td>
                            <td><?php echo $book['Book']['price']; ?></td>
                            <td><?php echo $book['Book']['year']; ?></td>
                            <td><a href="<?php echo $editLink; ?>">Edit</a></td>
                            <td><a href="<?php echo $delLink; ?>">Delete</a></td>
                        </tr>
                        <?php } ?>
                <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Print</th>
                            <th>Price</th>
                            <th>Year</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                 </table>
                 <div class="clearfix"></div>
            </div>
        </div>
</div>