<?php
include 'loader.php';
$date = date('Y-m-d');
$action='';
// $action = $_POST['action'];
if(isset($_POST['action'])){
$action=$_POST['action'];
}

switch (base64_decode($action))
{
    case 'user-register':
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $password = mysqli_real_escape_string($con, md5($_POST['password']));
         $insertData="INSERT INTO `users`(`name`,`phone`,`email`,`gender`,`created_at`,`updated_at`)values('$name','$phone','$email','$gender','$date','$date')";
        if(mysqli_query($con,$insertData)){
             $userId="select max(id) as id from users";
            $result=mysqli_query($con,$userId);
            if(mysqli_num_rows($result)>0){
                $users=mysqli_fetch_assoc($result);
                 $user_id=$users['id'];
            }else{
                $user_id=1;
            }
        insertData('login', 'user_name,password,user_id,is_admin,created_at,updated_at', "'$email','$password','$user_id','0','$date','$date'");
        }
    break;
    case 'view-Data':
        $category=$_POST['category'];
        viewAvailableBooks($category);
        break;
    case 'request-book':
    $bookname=mysqli_real_escape_string($con,$_POST['name']);
    $reason=mysqli_real_escape_string($con,$_POST['reason']);
    $user_id=mysqli_real_escape_string($con,$_SESSION['user_id']);    
    insertData('requests','user_id,book_name,reason,created_at,updated_at',"'$user_id','$bookname','$reason','$date','$date'");
    break;
    default:
    echo json_encode(viewData($_POST['table'],$_POST['id']));

    break;
 }
?>