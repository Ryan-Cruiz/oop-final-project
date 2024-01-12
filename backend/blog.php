<?php
session_start();
$_SESSION['site-title'] = 'List Blog';
require_once('../connection.php');
require_once('header.php');
$query = "SELECT blogs.id,img_url,full_name,title,description,blogs.created_at 
FROM blogs 
INNER JOIN users ON users.id = user_id WHERE blogs.id = ?";
$blog = fetch_record($query, $_GET['id']);
// var_dump($blog);
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="listblogs.php" class="btn btn-danger"><i class='fa fa-reply'></i></a>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <?= $blog['title'] ?>
                    </h3>
                    <p>Author: <span class="text-muted">
                            <?= $blog['full_name'] ?>
                        </span>|<span class="text-muted">
                            <?= date_format(date_create($blog['created_at']), 'F d,Y @ g:i A') ?>
                        </span></p>
                </div>
                <div class="box-body">
                    <?php if(!is_null($blog['img_url'])) {?>
                    <div class="text-center">
                        <img src="<?= $blog['img_url'] ?>" alt="image header" style="width: 300px; height:300px;">
                    </div>
                    <?php }?>
                    <p class='text-start'>
                        <?= $blog['description'] ?>
                    </p>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>


<?php require_once('footer.php'); ?>