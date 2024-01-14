<?php session_start();
// var_dump($_SESSION);
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
} else {
    $_SESSION['site-title'] = 'Dashboard';
    require_once('header.php');
    require_once('../connection.php');
    $queryBlog = "SELECT blogs.id,full_name,title,description,blogs.created_at 
    FROM blogs 
    INNER JOIN users ON users.id = user_id 
    ORDER BY blogs.created_at DESC";
    $blogs = fetch_all($queryBlog);
    $queryUsers = "SELECT * FROM users";
    $users = fetch_all($queryUsers);
    $countUsers = $connection->query("SELECT count(*) FROM users")->fetch();
    var_dump($countUsers);
}
?>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        <?= $countUsers[0] ?>
                    </h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="listUsers.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">

        <!-- DTO KAYO MAGLALAGAY NG CONTENT DPENDE SA COLUMN N ILALAGAY NIU KAYO NA MAGHATI-->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Blogs</h3>
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
                                    <a href="blog.php?id=<?= $blog['id'] ?>">
                                        <?= $blog['title'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $blog['full_name'] ?>
                                </td>
                                <td>
                                    <?= date_format(date_create($blog['created_at']), "F d, Y @ g:i A") ?>
                                </td>
                                <td><a href="updateblog.php?id=<?= $blog['id'] ?>" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                                        data-id="<?= $blog['id'] ?>">
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
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
                <div class="modal-dialog" role="document">
                    <form action="events.php" method='post' class="modal-content">
                        <input type="hidden" name="data_id" value="">
                        <input type="hidden" name="event" value="delete_blog">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="deleteModalLabel">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            <h3 class='fw-bold'>Do you want to delete this item?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-danger" value="Yes, Delete this Record">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td>
                                    <?= $user['id'] ?>
                                </td>
                                <td>
                                    <a href="user.php?id=<?= $user['id'] ?>">
                                        <?= $user['full_name'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $user['email'] ?>
                                </td>
                                <td>
                                    <?= date_format(date_create($user['created_at']), "F d, Y @ g:i A") ?>
                                </td>
                                <td><a href="updateUser.php?id=<?= $user['id'] ?>" class="btn btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                                        data-id="<?= $user['id'] ?>">
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
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
                <div class="modal-dialog" role="document">
                    <form action="events.php" method='post' class="modal-content">
                        <input type="hidden" name="data_id" value="">
                        <input type="hidden" name="event" value="delete_user">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="deleteModalLabel">Delete Record</h4>
                        </div>
                        <div class="modal-body">
                            <h3 class='fw-bold'>Do you want to delete this item?</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-danger" value="Yes, Delete this Record">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
<?php require_once('footer.php'); ?>