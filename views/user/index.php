<?php ob_start() ?>
<section class="content-header">
    
</section>
<?php $_CONTENT_FOR_HEADER = ob_get_clean(); ?>

<div class="row">
    <div class="col-xs-12">
        <div class="box" style="width:30%">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Administrator</th>
                        <th class="col-sm-1 text-right">
                            <!-- <a href="?c=user&m=edit" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a> -->
                        </th>
                    </tr>
                    <?php if (!$data) : ?>
                        <tr>
                            <td colspan="100" class="text-center">Tidak Ada Data</td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($data as $v) : ?>
                        <tr>
                            <td>
                                <a href="?c=user&m=view&id=<?= $v->id ?>" style="color:black">
                                    <?php echo $v->username ?>
                                </a>
                            </td>
                            <td class="nowrap text-right">
                                <a href="?c=user&m=edit&id=<?php echo $v->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                <?php if($v->id != $_SESSION['admin']->id ): ?>
                                <a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" href="?c=user&m=delete&id=<?php echo $v->id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>