<?php ob_start() ?>
<section class="content-header">
    <h1>
        Login Admin
    </h1>
    
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
    <?php
		header( "refresh:2;url=index.php" );
	?>
</section>

<script type="text/javascript">
    $(function(){
        $('[type=password]').next().mousedown(function(){
            $(this).prev().attr('type', 'text');
        });
        $('[type=password]').next().mouseup(function(){
            $(this).prev().attr('type', 'password');
        });
    });
</script>