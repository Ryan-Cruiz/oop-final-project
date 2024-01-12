<?php
session_start();
$_SESSION['error_msg'] = "";
require_once('../connection.php');
if ($_POST['event'] === "create_blog") {
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
        header("Location: listblogs.php");
    }
} else if ($_POST['event'] === 'update_blog') {
    if ($_POST['title'] == "" || $_POST['description'] == "") {
        header("Location: createblog.php");
        $_SESSION['error_msg'] = "Empty fields please fill up";
        $_SESSION['success_msg'] = "";
    } else {
        $_SESSION['error_msg'] = "";
        $_SESSION['success_msg'] = "Record Updated";
        $query = "UPDATE blogs SET title=?,description=?,updated_at=datetime('now') WHERE id = ?";
        // $data = array();
        // queryData($query,);
    }
}


function moveImageFile() {
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
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
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