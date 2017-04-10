<?php ob_start() ?>
<section class="content-header">
		
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<section class="content">
    <div class="box box-default" style="margin-left:auto;margin-right:auto;width:40%">
        <form role="form" method="post" id="mainForm" action="" enctype="multipart/form-data" style="margin-left:10%">
            <input type="hidden" name="id" value="<?= @$data->id ?>" />
			<div class="box-header">
				<h2 > Change Password </h2>				
			</div>
			<div class="box-body">				
				<div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password Sekarang</label>
                            <input type="password" name="data[password]" class="form-control" value="" placeholder="Password sekarang"/>
                        </div>
                    </div>                                       
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password baru</label>
                            <input type="password" name="data[password_baru]" class="form-control" value=""  placeholder="Password baru"/>
                        </div>
                    </div>                                        
                </div> 				
                <div class="row">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        <a class="btn btn-info" href="?c=customer&m=index"><i class="fa fa-reply"></i> Kembali</a>
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