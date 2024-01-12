<?php
session_start();
$_SESSION['site-title'] = 'List Blog';
require_once('../connection.php');
require_once('header.php');
$query = "SELECT blogs.id,full_name,title,description,blogs.created_at 
FROM blogs 
INNER JOIN users ON users.id = user_id 
ORDER BY blogs.created_at DESC";
$blogs = fetch_all($query);
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Blogs</h3>

                    <!-- <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Date Posted</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($blogs as $blog) { ?>
                            <tr>
                                <td>
                                    <?= $blog['id'] ?>
                                </td>
                                <td>
                                    <a href="blog.php?id=<?=$blog['id']?>"><?= $blog['title'] ?></a>
                                </td>
                                <td>
                                    <?= $blog['full_name'] ?>
                                </td>
                                <td>
                                    <?= date_format(date_create($blog['created_at']), "F d, Y @ g:i A") ?>
                                </td>
                                <td><a class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<?php require_once('footer.php'); ?>