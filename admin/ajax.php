<?php
include '../loader.php';
$action = $_POST['action'];
$date = date('Y-m-d');
switch (base64_decode($action))
{
    case 'create-category':
        $name = mysqli_real_escape_string($con, $_POST['name']);
        insertData('category', 'name,created_at,updated_at', "'$name','$date','$date'");
    break;
    case 'update-category':
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $id = mysqli_real_escape_string($con, base64_decode($_POST['id']));
        updateData('category', ['name' => $name], $id);
    break;
    case 'delete-category':
        $id = mysqli_real_escape_string($con, base64_decode($_POST['id']));
        deleteData('category', $id);
    break;
    case 'create-books':
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $category = mysqli_real_escape_string($con, $_POST['category']);
        $image = mysqli_real_escape_string($con, $_FILES['thumnail_image']['name']);
        $book_content = mysqli_real_escape_string($con, $_FILES['content']['name']);
        $author = mysqli_real_escape_string($con, $_POST['author']);
        $published_at = mysqli_real_escape_string($con, $_POST['published_at']);
        $status = 0;
        if (isset($_POST['status']))
        {
            $status = $_POST['status'];
        }
        $temp_name = $_FILES['thumnail_image']["tmp_name"];
        $imgfile = date('Ymd') . "_" . $image;
        $target_file = '../assets/uploads/book_images/' . basename($imgfile);
        if (move_uploaded_file($temp_name, $target_file))
        {
            $pdf_file = date('Ymd') . "_" . $book_content;
            if (move_uploaded_file($_FILES["content"]["tmp_name"], "../assets/uploads/book_contents/" . basename($pdf_file)))
            {
                insertData('books', 'name,category_id,book_thumnail_image,contents,author,published_at,status,created_at,updated_at', "'$name','$category','$imgfile','$pdf_file','$author','$published_at','$status','$date','$date'");
            }
        }
    break;
    case 'update-book':
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $category = mysqli_real_escape_string($con, $_POST['category']);
        $author = mysqli_real_escape_string($con, $_POST['author']);
        $published_at = mysqli_real_escape_string($con, $_POST['published_at']);
        $status = 0;
        $image = mysqli_real_escape_string($con, $_POST['old_image']);
        $book_content = mysqli_real_escape_string($con, $_POST['old_content']);
        $id = mysqli_real_escape_string($con, base64_decode($_POST['id']));

        if (isset($_POST['status']))
        {
            $status = $_POST['status'];
        }
        if (($_FILES['thumnail_image']['name'] != "") && (isset($_FILES['thumnail_image']['name'])))
        {
            @unlink('../assets/uploads/book_images/' . $image);
            $image = mysqli_real_escape_string($con, $_FILES['thumnail_image']['name']);

            $temp_name = $_FILES['thumnail_image']["tmp_name"];
            $image = date('Ymd') . "_" . $image;
            $target_file = '../assets/uploads/book_images/' . basename($image);
            move_uploaded_file($temp_name, $target_file);
        }
        if (($_FILES['content']['name'] != "") && (isset($_FILES['content']['name'])))
        {
            @unlink('../assets/uploads/book_contents/' . $book_content);
            $book_content = mysqli_real_escape_string($con, $_FILES['content']['name']);

            $book_content = date('Ymd') . "_" . $book_content;
            move_uploaded_file($_FILES["content"]["tmp_name"], "../assets/uploads/book_contents/" . basename($book_content));
        }
        updateData('books', ['name' => $name, 'category_id' => $category, 'book_thumnail_image' => $image, 'contents' => $book_content, 'author' => $author, 'status' => $status, 'updated_at' => $date], $id);

    break;
    case 'delete-book':
        $id = mysqli_real_escape_string($con, base64_decode($_POST['id']));
        deleteData('books', $id);
    break;

    default:
        // code...
        
    break;
}
?>
