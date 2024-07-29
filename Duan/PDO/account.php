<?php

function insert_account($user_name_register, $email_register, $pass_register)                                        // Tạo tài khoản
{
    $sql = "INSERT INTO user(user_name, email, pass) VALUES('$user_name_register', '$email_register', '$pass_register')";
    pdo_execute($sql);
}

function check_user($user_name_login, $pass_login)                                       // Đăng Nhập: Nếu đúng pass thì sẽ đăng nhập được
{
    $sql = "SELECT * FROM user WHERE user_name='" . $user_name_login . "' AND pass='" . $pass_login . "'";
    $login = pdo_query_one($sql);
    return $login;
}

function update_account($id_user, $user_name,$pass, $email, $address, $tel, $avatar)            // Update: Chỉnh sửa thông tin tài khoản
{
    if($avatar != ""){
        $sql = "UPDATE USER SET USER_NAME = '$user_name' ,PASS = '$pass', EMAIL = '$email' , ADDRESS = '$address' , TEL = '$tel' ,AVATAR = '$avatar' WHERE ID_USER = $id_user";
    }else{
        $sql = "UPDATE USER SET USER_NAME = '$user_name' ,PASS = '$pass', EMAIL = '$email' , ADDRESS = '$address' , TEL = '$tel' WHERE ID_USER = $id_user";
    }
    // echo $sql;die;
    pdo_execute($sql);
}

function load_all_account()                                                             // Load danh sách tài khoản người dùng ở Admin
{
    $sql = "SELECT * FROM user ORDER BY id_user DESC";
    $list_account = pdo_query($sql);
    return $list_account;
}

function delete_account($id_user)                                                       // Xóa tài khoản người dùng ở Admin
{   
    $update_bill = "UPDATE bill SET ID_USER = 1 WHERE ID_USER = $id_user";
    pdo_execute($update_bill);
    $delete_comment = "DELETE FROM COMMNENT WHERE ID_USER = $id_user";
    pdo_execute($delete_comment);
    $delete_cart = "DELETE FROM CART WHERE ID_USER = $id_user";
    pdo_execute($delete_cart);
    $sql = "DELETE FROM user WHERE id_user=" . $id_user;
    pdo_execute($sql);
}
function count_account(){
    $sql = "SELECT * FROM USER";
    $color = pdo_query($sql);
    $i=0;
    foreach ($color as $key => $value) {
        $i++;
    }
    $number =ceil($i / 5);
    return $number;
}
function load_limit_5_account ($start,$limit){
    $sql = "SELECT * FROM USER 
    ORDER BY ROLE DESC LIMIT $start,$limit "; 
    $color = pdo_query($sql);
    return $color;
}
function load_one_account($id_user){
    $sql = "SELECT * FROM USER WHERE ID_USER = $id_user";
    $acc = pdo_query_one($sql);
    return $acc;
}
function check_exists_user_name($user_name){
    $sql = "SELECT * FROM USER WHERE USER_NAME = '$user_name'";
    $acc = pdo_query_one($sql);
    return $acc;
}
function check_exists_email($email){
    $sql = "SELECT * FROM USER WHERE EMAIL = '$email'";
    $acc = pdo_query_one($sql);
    return $acc;
}
?>