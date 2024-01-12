<?php
session_start();
$_SESSION['site-title'] = 'Create Blog';
require_once('header.php') ?>
<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
        <!-- DTO KAYO MAGLALAGAY NG CONTENT DPENDE SA COLUMN N ILALAGAY NIU KAYO NA MAGHATI-->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Blog</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="events.php" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="event" value="create_blog">
                    <div class="box-body">
                        <p class='text-danger'>
                            <?= !isset($_SESSION['error_msg']) || empty($_SESSION['error_msg']) ? "" : $_SESSION['error_msg'] ?>
                        </p>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="imgFile">Image</label>
                            <input type="file" id="imgFile" name='img_url'>

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
<?php require_once('footer.php'); ?>