<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
} else {
    $_SESSION['site-title'] = 'List Blog';
    require_once('../connection.php');
    require_once('header.php');
    $query = "SELECT blogs.id,full_name,title,description,blogs.created_at 
    FROM blogs 
    INNER JOIN users ON users.id = user_id 
    ORDER BY blogs.created_at DESC";
    $blogs = fetch_all($query);
}
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Blogs</h3>
                    <p class='text-success'>
                        <?= !isset($_SESSION['success_msg']) || empty($_SESSION['success_msg']) ? "" : $_SESSION['success_msg'] ?>
                    </p>
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
    </div>
</section>

<?php require_once('footer.php'); ?>