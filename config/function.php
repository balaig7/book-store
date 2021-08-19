<?php
function sessionExpire($loginTime) {
    if (time() - $loginTime > 1800) //session expiry after 30 minutes
    {
        echo "<script>
        window.location.href='logout.php'
      </script>";
    }
}
function viewCategoriesWise($category) {
    global $con;
    $sql = "select category.id,books.id as book_id,category.name as cat_name,books.name as book_name,books.book_thumnail_image,books.contents,books.author,books.published_at,books.status from `category` INNER JOIN books on category.id=books.category_id where category.name='" . $category . "'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        echo json_encode($datas);
    } else {
        echo $data = json_encode(['data' => "0"]);
    }
}
function viewAvailableBooks($category) {
    global $con;
    $sql = "select category.id,books.id as book_id,category.name as cat_name,books.name as book_name,books.book_thumnail_image,books.contents,books.author,books.published_at,books.status from `category` INNER JOIN books on category.id=books.category_id where category.name='" . $category . "'&& status='1'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        echo json_encode($datas);
    } else {
        echo $data = json_encode(['data' => "0"]);
    }
}
function viewAllData($table) {
    global $con;
    $sql = "select * from `" . $table . "`";
    $result = mysqli_query($con, $sql);
    $datas = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        return $datas;
    }
}
//insert data
function insertData($table, $cols, $values) {
    global $con;
    $insert = "INSERT INTO `" . $table . "` (" . $cols . ") VALUES (" . $values . ")";
    if (mysqli_query($con, $insert)) {
        echo json_encode(array('status' => '1', 'message' => 'Data Inserted'));
    } else {
        echo mysqli_error($con);
    }
}
//select data
function viewData($table, $id) {
    global $con;
    $view = 'Select * from `' . $table . '` where id="' . $id . '"';
    $result = mysqli_query($con, $view);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    }
}
// update data
function updateData($table, $data, $id) {
    global $con;
    foreach ($data as $key => $value) {
        $datas[] = $key . "=" . "'" . $value . "'";
    }
    $update = "Update `" . $table . "` set " . implode(',', $datas) . " where id='$id' ";
    if (mysqli_query($con, $update)) {
        echo json_encode(array('status' => '1', 'message' => 'Data Updated'));
    } else {
        return mysqli_error($con);
    }
}
//delete data
function deleteData($table, $id) {
    global $con;
    $delete = "DELETE FROM `" . $table . "` where id='$id'";
    if (mysqli_query($con, $delete)) {
        echo json_encode(array('status' => '1', 'message' => 'Data Deleted'));
    }
}
function books() {
    global $con;
    $sql = "select category.id,books.id as book_id,category.name as cat_name,books.name as book_name,books.book_thumnail_image,books.contents,books.author,books.published_at,books.status from `category` INNER JOIN books on category.id=books.category_id";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        return $datas;
    }
}
function allBooks() {
    global $con;
    $sql = "select category.id,books.id as book_id,category.name as cat_name,books.name as book_name,books.book_thumnail_image,books.contents,books.author,books.published_at,books.status from `category` INNER JOIN books on category.id=books.category_id ";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        return $datas;
    }
}
function indexPage() {
    global $con;
    $sql = "select category.id,books.id as book_id,category.name as cat_name,books.name as book_name,books.book_thumnail_image,books.contents,books.author,books.published_at,books.status from `category` INNER JOIN books on category.id=books.category_id && books.status='1' limit 4";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
        return $datas;
    }
}
?>