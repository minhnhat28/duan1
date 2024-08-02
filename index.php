<?php
ob_start();
session_start();
include "./Duan/View/HTML_PHP/header.php";

include "./Duan/PDO/pdo.php";
include "./Duan/PDO/category.php";
include "./Duan/PDO/product.php";
include "./Duan/PDO/comment.php";
include "./Duan/PDO/account.php";
include "./Duan/PDO/bill.php";
include "./Duan/PDO/cart.php";

if ((isset($_GET['act'])) && ($_GET['act'] != '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'account':
            if (isset($_SESSION['user_name_login'])) {
                extract($_SESSION['user_name_login']);
                include "./Duan/View/HTML_PHP/Account/account_details.php";
            } else {
                include "./Duan/View/HTML_PHP/Account/login_register.php";                                            // Vào Trang Đăng Ký - Đăng Nhập
                if (isset($_POST['register']) && ($_POST['register'])) {                                              // Đăng Ký
                    if ($errorCount == 0) {
                        $user_name_register = $_POST['user_name_register'];
                        $email_register = $_POST['email_register'];
                        $pass_register = $_POST['pass_register'];
                        insert_account($user_name_register, $email_register, $pass_register);

                        echo '<script>alert("Đăng Ký Thành Công!");</script>';
                        include "./Duan/View/HTML_PHP/Account/login_register.php";
                    }
                }

                if (isset($_POST['login']) && ($_POST['login'])) {                                                    // Đăng Nhập
                    if ($errorCount == 0) {
                        $user_name_login = $_POST['user_name_login'];
                        $pass_login = $_POST['pass_login'];
                        $check_user = check_user($user_name_login, $pass_login);

                        if (is_array($check_user)) {
                            $_SESSION['user_name_login'] = $check_user;
                            $check_cart = check_cart($_SESSION['user_name_login']['id_user']);
                            if (!is_array($check_cart)) {
                                add_cart_account($_SESSION['user_name_login']['id_user']);
                            }
                            echo '<script>alert("Đăng Nhập Thành Công!");</script>';
                            echo "<script>window.location.href='index.php';</script>";
                        } else {
                            echo '<script>alert("Sai tài khoản hoặc mật khẩu !!");</script>';
                        }
                    }
                }

            }

            break;

        case 'account_details':
            if (empty($_SESSION['user_name_login'])) {
                echo "<script>window.location.href='index.php';</script>";
            } else {
                extract($_SESSION['user_name_login']);
                include "./Duan/View/HTML_PHP/Account/account_details.php";
            }
            break;

        case 'change_password':
            if (empty($_SESSION['user_name_login'])) {
                echo "<script>window.location.href='index.php';</script>";
            } else {
                extract($_SESSION['user_name_login']);
                include "./Duan/View/HTML_PHP/Account/change_password.php";
            }
            break;

        case 'log_out':
            session_destroy();
            echo "<script>window.location.href='index.php';</script>";
            break;

        case 'admin':
            // Check nếu SESSION trống thì tức là chưa đăng nhập => không vào được admin
            if (empty($_SESSION['user_name_login'])) {
                echo "<script>window.location.href='index.php';</script>";

                // Nếu không trống thì xuất dữ liệu user và check role | role != 1 không vào được admin
            } else if (extract($_SESSION['user_name_login']) && $role != 1) {
                echo "<script>window.location.href='index.php';</script>";

                // Cuối cùng nếu vừa có "SESSION dữ liệu" và "role thỏa mãn = 1" thì vào được admin
            } else {
                extract($_SESSION['user_name_login']);
                include "./Duan/admin/index.php";

            }
            break;

        case 'product_lists':
            $limit = 17;
            if (isset($_POST['btn_search']) && $_POST['btn_search']) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_POST['btn_filter']) && $_POST['btn_filter']) {
                if ($_POST['brand'] != 'all') {
                    $brand = $_POST['brand'];
                } else {
                    $brand = "";
                }
                if ($_POST['cate'] != 'all') {
                    $cate = $_POST['cate'];
                } else {
                    $cate = "";
                }
            } else {
                $brand = "";
                $cate = "";
            }
            if (isset($_GET['load_type'])) {
                if ($_GET['load_type'] == 'price_up') {
                    $load_with = "PRICE";
                    $load_type = "ASC";
                } elseif ($_GET['load_type'] == 'price_down') {
                    $load_with = "PRICE";
                    $load_type = "DESC";
                } elseif ($_GET['load_type'] == 'lastest') {
                    $load_with = "ADD_AT";
                    $load_type = "DESC";
                } elseif ($_GET['load_type'] == 'most_view') {
                    $load_with = "VIEW";
                    $load_type = "DESC";
                }
            } else {
                $load_with = "ID_PRO";
                $load_type = "DESC";
            }
            if (isset($_GET['page'])) {
                $number = $_GET['page'];
                $start = $number * $limit;
            } else {
                $start = 0;
            }
            $count = count_pro_filter($kyw, $brand, $cate);
            $page = ceil($count / $limit);
            $product = load_limit_pro_filter($start, $limit, $kyw, $brand, $cate, $load_with, $load_type);
            $color = load_all_color();
            $cate = load_all_cate();
            $brand = load_all_brand();
            include "./Duan/View/HTML_PHP/Product/product_lists.php";
            break;
        case 'product_details':
                if (isset($_GET['id'])) {
                    $id_pro = $_GET['id'];
                    $other_pro = other_pro($id_pro);
                    $brand_name = get_name_brand($id_pro);
                    $cate_name = get_name_cate($id_pro);
                    $product = load_one_pro($id_pro);
                    $list_color = load_color_for_pro($id_pro);
                    if (isset($_GET['color'])) {
                        $color = $_GET['color'];
                        $color_pro = load_pro_for_color($id_pro, $color);
                    }
                    change_view($id_pro);
                }
                include "./Duan/View/HTML_PHP/Product/product_details.php";
                break;

        case 'cart':
            if (isset($_SESSION['user_name_login'])) {
                if (isset($_POST['id_clp'])) {
                    if (isset($_POST['buy']) && $_POST['buy']) {
                        $id_pro = $_POST['id_pro'];
                        $id_clp = $_POST['id_clp'];
                        $product = load_one_pro_buy($id_clp);
                        $date = date("Y-m-d");
                        $method = "check_out_buy";
                        $quantity_cart = $_POST['quantity'];
                        if (isset($_POST['add']) && $_POST['add']) {
                            $add_code = $_POST['add_code'];
                        } 
                            
                        
                        include "./Duan/View/HTML_PHP/Cart/check_out.php";
                    }
                    if (isset($_POST['add_to_cart']) && $_POST['add_to_cart']) {
                        $id_clp = $_POST['id_clp'];
                        $id_pro = $_POST['id_pro'];
                        $quantity_add = $_POST['quantity'];
                        $cart = check_cart($_SESSION['user_name_login']['id_user']);
                        extract($cart);
                        $check_other_cart = check_other_cart($id_cart, $id_clp);
                        if (!is_array($check_other_cart)) {
                            add_to_cart($id_cart, $id_clp, $quantity_add);
                            echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';
                        } else {
                            extract($check_other_cart);
                            if (($quantity_add + $quantity_cart) > $quantity) {
                                echo '<script>alert("Số lượng trong giỏ hàng quá lớn");</script>';
                            } else {
                                add_quantity_other_cart($id_cart, $id_clp, $quantity_add);
                                echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';
                            }
                        }
                        echo "<script>window.location.href='index.php?act=product_details&id=$id_pro';</script>";
                    }
                } else {
                    $id_pro = $_POST['id_pro'];
                    echo '<script>alert("Vui lòng chọn màu !!");</script>';
                    echo "<script>window.location.href='index.php?act=product_details&id=$id_pro';</script>";
                }
            } else {
                $id_pro = $_POST['id_pro'];
                echo '<script>alert("Bạn cần đăng nhập để thêm vào giỏ hàng !");</script>';
                echo "<script>window.location.href='index.php?act=product_details&id=$id_pro';</script>";
            }
            break;
        case 'delete_cart':
            if (isset($_GET['id_cart'])) {
                $id_cart = $_GET['id_cart'];
                $id_clp = $_GET['id_clp'];
                delete_one_other_cart($id_cart, $id_clp);
            }
            $carts = load_all_cart_for_account($_SESSION['user_name_login']['id_user']);
            echo '<script>location.href="index.php?act=cart_lists"</script>';
            break;
        
        

        //////////////////////////////////////
        default:
            echo '<script>alert("Lỗi!");</script>';
            $limit = 12;
            $count_page_mouse = count_pro($limit, "chuột", 0);
            $product_mouse = load_limit_pro($start, $limit, "chuột", 0);
            if (isset($_GET['page-key-board'])) {
                $number = $_GET['page-key-board'];
                $start = ($number - 1) * $limit;
            } else {
                $start = 0;
            }
            $count_page_key_board = count_pro($limit, "bàn phím", 0);
            $product_key_board = load_limit_pro($start, $limit, "bàn phím", 0);
            if (isset($_GET['page-head-phone'])) {
                $number = $_GET['page-head-phone'];
                $start = ($number - 1) * $limit;
            } else {
                $start = 0;
            }
            $count_page_head_phone = count_pro($limit, "tai nghe", 0);
            $product_head_phone = load_limit_pro($start, $limit, "tai nghe", 0);
            include "./Duan/View/HTML_PHP/home.php";
            break;
    }
} else {
    $limit = 12;
    if (isset($_GET['page-sale'])) {
        $number = $_GET['page-sale'];
        $start = ($number - 1) * $limit;
    } else {
        $start = 0;
    }
    $count_page_mouse = count_pro($limit, "chuột", 0);
    $product_mouse = load_limit_pro($start, $limit, "chuột", 0);
    if (isset($_GET['page-key-board'])) {
        $number = $_GET['page-key-board'];
        $start = ($number - 1) * $limit;
    } else {
        $start = 0;
    }
    $count_page_key_board = count_pro($limit, "bàn phím", 0);
    $product_key_board = load_limit_pro($start, $limit, "bàn phím", 0);
    if (isset($_GET['page-head-phone'])) {
        $number = $_GET['page-head-phone'];
        $start = ($number - 1) * $limit;
    } else {
        $start = 0;
    }
    $count_page_head_phone = count_pro($limit, "tai nghe", 0);
    $product_head_phone = load_limit_pro($start, $limit, "tai nghe", 0);
    include "./Duan/View/HTML_PHP/home.php";
}

include "./Duan/View/HTML_PHP/footer.php";
ob_end_flush();
?>