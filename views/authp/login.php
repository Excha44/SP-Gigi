<?php ob_start() ?>
<section class="content-header">
    
    
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
    <div class="box box-danger" style="margin-left:auto;margin-right:auto;width:40%">
        <form role="form" method="post" id="mainForm" action="" enctype="multipart/form-data" style="margin-left:5%">
            <input type="hidden" name="id" value="<?php echo @$data->id ?>" />
			<div class="box-header">
				<h3>Login Customer</h3>
			</div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        Untuk dapat mengajukan kredit, silahkan login terlebih dahulu.
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group has-feedback">
                            <label>Username</label>
                            <input autofocus="" type="text" name="data[username]" class="form-control" value="<?= @$data->username ?>" />
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div><!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group has-feedback">
                            <label>Password</label>
                            <input type="password" class="form-control" name="data[password]" value="<?= @$data->password ?>" />
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div><!-- /.form-group -->
                    </div>
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-danger"><i class="fa fa-lock"></i> Login</button>
                        <a href="?c=authp&m=register" class="btn btn-success"><i class="fa fa-edit"></i> Daftar</a>
                    </div>
                </div><!-- /.row -->
            </div>
        </form>
    </div>
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