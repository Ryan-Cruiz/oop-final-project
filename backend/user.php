<?php
session_start();
$_SESSION['site-title'] = 'List User';
require_once('../connection.php');
require_once('header.php');
$query = "SELECT * FROM users WHERE id = ? ";
$user = fetch_record($query, $_GET['id']);
// var_dump($user);
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="listusers.php" class="btn btn-danger"><i class='fa fa-reply'></i></a>
            <div class="box">
                <div class="box-header with-border">
                    <p>
                        Full Name: <?= $user['full_name'] ?>
                    </p>
                    <p>Email: <?= $user['email']?></p>
                    <p>
                        Date Created: <?= date_format(date_create($user['created_at']), 'F d,Y @ g:i A') ?>
                    </p>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>


<?php require_once('footer.php'); ?>