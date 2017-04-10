<?php ob_start() ?>
<section class="content-header">
    <h1>
        Login Admin
    </h1>
    
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
    <div class="containerw3layouts-agileits">
			
			<form role="form" method="post" id="mainForm" action="?c=auth&m=login" enctype="multipart/form-data">
			<!--<form action="#" method="post" id="demo" novalidate>-->
				<div class="form-group agileits-w3layouts">
					<input type="text" class="form-control agileinfo textbox" name="data[username]" required placeholder="Email">
				</div>
				<div class="form-group w3-agile password">
					<input type="password" class="form-control w3-agileits textbox" name="data[password]" required placeholder="Password">
				</div>
				<div class="form-group w3-agile submit">
					<button class="btn btn-default btn-osx w3-agileits btn-lg" disabled type="submit"><i class="fa agileinfo fa-arrow-circle-right">Login</i></button>
				</div>
				<div class="alert agileits-w3layouts alert-success hidden" role="alert">Login Successful!</div>
			</form>

		</div>
</section>

<script>
	$("#demo").validify({
		onSubmit: function (e, $this) {
			$this.find('.alert').removeClass('hidden')
		},
		onFormSuccess: function (form) {
			console.log("Form is valid now!")
		},
		onFormFail: function (form) {
			console.log("Form is not valid :(")
		}
	});
</script>
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