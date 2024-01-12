<?php
session_start();
$_SESSION['error_msg'] = "";
require_once('../connection.php');
if ($_POST['event'] === "create_blog") {
    // create blog event
    if ($_POST['title'] == "" || $_POST['description'] == "") {
        header("Location: createblog.php");
        $_SESSION['error_msg'] = "Empty fields please fill up";
        $_SESSION['success_msg'] = "";

    } else {
        $file_path = moveImageFile();
        $_SESSION['error_msg'] = "";
        $_SESSION['success_msg'] = "Blog Added";
        $_SESSION['user_id'] = '1'; // make this dynamic
        $query = "INSERT INTO blogs(user_id,title,description,img_url,created_at) VALUES (?,?,?,?,datetime('now'))";
        $data = array($_SESSION['user_id'], $_POST['title'], $_POST['description'], $file_path);
        queryData($query, $data);
        // var_dump($_POST,$data);
        header("Location: listBlogs.php");
    }
} else if ($_POST['event'] === 'update_blog') {
    //update blog event
    if ($_POST['title'] == "" || $_POST['description'] == "") {
        header("Location:" . $_SERVER['HTTP_REFERER']);
        $_SESSION['error_msg'] = "Empty fields please fill up";
        $_SESSION['success_msg'] = "";
    } else {
        $_SESSION['error_msg'] = "";
        $_SESSION['success_msg'] = "Blog Updated";
        $query = "UPDATE blogs SET title=?,description=?,updated_at=datetime('now') WHERE id = ?";
        queryData($query, [$_POST['title'], $_POST['description'], $_POST['id']]);
        header("Location: listBlogs.php");
        $_SESSION['success_msg'] = "Blog Updated";
    }
} else if ($_POST['event'] === 'delete_blog') {
    //delete blog event
    // var_dump($_POST['data_id']);
    $query = "DELETE FROM blogs WHERE id = ?";
    queryData($query, [$_POST['data_id']]);
    header("Location:" . $_SERVER['HTTP_REFERER']);
    $_SESSION['success_msg'] = "Blog Deleted";

} else if ($_POST['event'] === 'update_user') {
    // update user event
    $result = userChecker();
    if($result === true){
        $new_pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_SESSION['error_msg'] = "";
        $_SESSION['success_msg'] = "User Updated";
        $query = "UPDATE users SET full_name=?,email=?,password=?,updated_at=datetime('now') WHERE id = ?";
        queryData($query, [$_POST['full_name'], $_POST['email'], $new_pw, $_POST['id']]);
        header("Location: listUsers.php");
        $_SESSION['success_msg'] = "User Updated";
    }

} else if ($_POST['event'] === "delete_user") {
    //delete user event
    $query = "DELETE FROM users WHERE id = ?";
    queryData($query, [$_POST['data_id']]);
    header("Location:" . $_SERVER['HTTP_REFERER']);
    $_SESSION['success_msg'] = "User Deleted";

} else if ($_POST['event'] === "create_user") {
    //create user event
    $result = userChecker();
    if($result === true){
        $new_pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO users(full_name,email,password,created_at) VALUES (?,?,?,datetime('now'))";
        $data = array($_POST['full_name'], $_POST['email'], $new_pw);
        queryData($query, $data);
        header("Location: listUsers.php");
        $_SESSION['error_msg'] = "";
        $_SESSION['success_msg'] = "User Added";
    }else{
        header("Location: createUser.php?full_name=".$_POST['full_name']."&email=".$_POST['email']);
    }
}

function userChecker()
{
    if ($_POST['full_name'] == "" || $_POST['email'] == "" || $_POST['password'] === "" || $_POST['confirm_password'] === "") {
        if($_POST['event'] ==='update_user') header("Location:" . $_SERVER['HTTP_REFERER']);
        $_SESSION['error_msg'] = "Empty fields please fill up";
        $_SESSION['success_msg'] = "";
    } else if ($_POST['password'] !== $_POST['confirm_password']) {
        if($_POST['event'] ==='update_user') header("Location:" . $_SERVER['HTTP_REFERER']);
        $_SESSION['error_msg'] = "Password and Confirm Password Not the same.";
        $_SESSION['success_msg'] = "";
    }else{
        return true;
    }
}

function moveImageFile()
{
    $target_dir = "../assets/img/uploads/";
    $target_file = $target_dir . basename($_FILES["img_url"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img_url"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["img_url"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img_url"]["tmp_name"], $target_file)) {
            // echo "The file " . htmlspecialchars(basename($_FILES["img_url"]["name"])) . " has been uploaded.";
            return $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}