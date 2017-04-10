<?php ob_start() ?>
<section class="content-header">
    <h1>
        User
        <small>edit</small>
    </h1>
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
    <div class="box box-default">
        <form role="form" method="post" id="mainForm" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo @$data->id ?>" />
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Username</label>
                            <input autofocus="" type="text" name="data[username]" class="form-control" value="<?= @$data->username ?>" />
                        </div><!-- /.form-group -->
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="data[password]" value="" />
                                <span class="input-group-addon"><i class="fa fa-eye clickable"></i></span>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a class="btn btn-info" href="?c=user&m=index"><i class="fa fa-reply"></i> Kembali</a>
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