<?php session_start();
$_SESSION['site-title'] = 'Create User';
require_once('header.php');
?>
<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- DTO KAYO MAGLALAGAY NG CONTENT DPENDE SA COLUMN N ILALAGAY NIU KAYO NA MAGHATI-->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create User</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="events.php">
                    <div class="box-body">
                    <p class='text-danger'><?= empty($_SESSION['error_msg']) ? "" : $_SESSION['error_msg']?></p>
                        <input type="hidden" name="event" value="create_user">
                        <div class="form-group has-feedback">
                            <input type="text" name="full_name" class="form-control" placeholder="Full name" value="<?= empty($_GET['full_name']) ? "" : $_GET['full_name']?>">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?= empty($_GET['email']) ? "" : $_GET['email']?>">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password"  name="confirm_password" class="form-control" placeholder="Retype password">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- DTO KAYO MAGLALAGAY NG CONTENT DPENDE SA COLUMN N ILALAGAY NIU KAYO NA MAGHATI-->
    </div>

</section>
<!-- /.content -->
<?php require_once('footer.php') ?>