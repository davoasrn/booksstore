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
        <div class="box-head">Users<a href="" class="collapsable"></a></div>
            <div class="box-content no-padding grey-bg">
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Created</th>
                            <th>Is Admin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($users && is_array($users) && count($users) > 0){ ?>
                <?php foreach ($users as $user){
                    $editLink = 'editUser/'.$user['User']['id'];
                    $delLink = 'deleteUser/'.$user['User']['id'];
                    ?>
                        <tr>
                            <td><?php echo $user['User']['id']; ?></td>
                            <td><?php echo $user['User']['firstName']." ".$user['User']['lastName']; ?></td>
                            <td><?php echo $user['User']['username']; ?></td>
                            <td><?php echo $user['User']['created']; ?></td>
                            <td><?php echo $user['User']['isAdmin']; ?></td>
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
                            <th>Username</th>
                            <th>Created</th>
                            <th>Is Admin</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                 </table>
                 <div class="clearfix"></div>
            </div>
        </div>
</div>