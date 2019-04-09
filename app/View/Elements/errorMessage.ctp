<script type="text/javascript">
$(document).ready(function() {
	$.jGrowl("<?php echo $message; ?>", {
            position : 'center',
            theme: 'error-msg',
            lifetime: 4000
        });
});
</script>