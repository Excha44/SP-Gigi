<?php ob_start() ?>
<section class="content-header">
    <h1>
        User
        <small>detail</small>
    </h1>
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
    <div class="box box-default">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <dl class="dl-horizontal">
                        <dt>Username</dt>
                        <dd><?php echo $data->username ?></dd>
                    </dl>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-2">
                    <a href="?c=user&m=index" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>