<?php 
if(isset($NoteError)){
?>  
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            jQuery.jGrowl("<?php echo $NoteError; ?>",{position: 'center', theme:'sub_inval'});
        });              
    </script>
      
<?php
}elseif(isset($NoteOk)){
?>  
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            jQuery.jGrowl("<?php echo $NoteOk; ?>",{position: 'center', theme:'sub_val'});
        });              
    </script>
<?php
}
?>