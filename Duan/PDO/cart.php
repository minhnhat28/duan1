<?php
function add_cart_account ($id_user){
    $sql = "INSERT INTO CART (ID_USER) VALUES ($id_user)";
    pdo_execute($sql);
}
function check_cart ($id_user){
    $sql = "SELECT * FROM CART WHERE ID_USER = $id_user";
    $cart = pdo_query_one($sql);
    return $cart;
}
function add_to_cart ($id_cart,$id_clp,$quantity){
    $sql = "INSERT INTO OTHER_CART(ID_CART,ID_CLP,QUANTITY_CART) VALUES ($id_cart,$id_clp,$quantity)";
    pdo_execute($sql);
}
function load_all_cart_for_account($id_user){
    $sql = "SELECT * FROM CART WHERE ID_USER = $id_user";
    $cart = pdo_query_one($sql);
    extract($cart);
    $other_cart = "SELECT * FROM OTHER_CART 
    JOIN COLOR_PRO ON OTHER_CART.ID_CLP = COLOR_PRO.ID_CLP 
    JOIN PRODUCT ON COLOR_PRO.ID_PRO = PRODUCT.ID_PRO
    JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND
    JOIN COLOR ON COLOR_PRO.ID_COLOR = COLOR.ID_COLOR
    WHERE ID_CART = $id_cart";
    $carts = pdo_query($other_cart);
    return $carts;
}
function count_cart($id_user){
    $sql = "SELECT * FROM CART WHERE ID_USER = $id_user";
    $carts = pdo_query_one($sql);
    extract($carts);
    $other_cart = "SELECT * FROM OTHER_CART WHERE ID_CART = $id_cart";
    $cart = pdo_query($other_cart);
    $count=0;
    foreach ($cart as $row) {
        $count++;
    }
    return $count;
}
function check_other_cart($id_cart,$id_clp){
    $sql = "SELECT * FROM OTHER_CART 
    JOIN COLOR_PRO ON OTHER_CART.ID_CLP = COLOR_PRO.ID_CLP
    WHERE OTHER_CART.ID_CLP = $id_clp AND ID_CART = $id_cart";
    $cart = pdo_query_one($sql);
    return $cart;
}
function add_quantity_other_cart($id_cart,$id_clp,$quantity){
    $sql = "UPDATE OTHER_CART SET QUANTITY_CART = QUANTITY_CART + $quantity WHERE ID_CART = $id_cart AND ID_CLP = $id_clp";
    pdo_execute($sql);
}
function delete_all_other_cart($id_cart){
    $sql = "DELETE FROM OTHER_CART WHERE ID_CART = $id_cart";
    pdo_execute($sql);
}
function delete_one_other_cart($id_cart,$id_clp){
    $sql = "DELETE FROM OTHER_CART WHERE ID_CART = $id_cart AND ID_CLP = $id_clp";
    pdo_execute($sql);
}


function change_quantity($id_oc,$quantity_cart){
    $chang_quantity = "UPDATE OTHER_CART SET QUANTITY_CART = $quantity_cart WHERE ID_OC = $id_oc";
    $change = pdo_execute($chang_quantity);
}


function load_all_payment(){
    $sql = "SELECT * FROM PAYMENT";
    $payment = pdo_query($sql);
    return $payment;
}
?>