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

?>