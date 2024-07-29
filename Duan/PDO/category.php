<!-- category -->

<?php
function add_cate ($cate_name){
    $sql = "INSERT INTO CATEGORY (CATE_NAME) VALUES ('$cate_name')";
    pdo_execute($sql);
}
function load_all_cate(){
    $sql = "SELECT * FROM CATEGORY WHERE ID_CATE != 1";
    $cate = pdo_query($sql);
    return $cate;
}
function load_one_cate ($id_cate){
    $sql = "SELECT * FROM CATEGORY WHERE ID_CATE = '$id_cate'";
    $cate = pdo_query_one($sql);
    return $cate;
}
function update_cate ($id_cate,$cate_name){
    $sql = "UPDATE CATEGORY SET CATE_NAME = '$cate_name' WHERE ID_CATE = '$id_cate'";
    $cate = pdo_execute($sql);
}
function delete_cate ($id_cate){
    $sql = "SELECT * FROM PRODUCT WHERE ID_CATE = $id_cate";
    $pro = pdo_query($sql);
    if(is_array($pro)){
        $sql = "UPDATE PRODUCT SET ID_CATE = 1 WHERE ID_CATE = $id_cate";
        pdo_execute($sql);
        $delete = "DELETE FROM CATEGORY WHERE ID_CATE= $id_cate";
        pdo_execute($delete);
    }else {
        $delete = "DELETE FROM CATEGORY WHERE ID_CATE= $id_cate";
        pdo_execute($delete);
    }
     
}
function count_cate(){
    $sql = "SELECT * FROM CATEGORY WHERE ID_CATE != 1";
    $cate = pdo_query($sql);
    $i=0;
    foreach ($cate as $key => $value) {
        $i++;
    }
    $number =ceil($i / 5);
    return $number;
}
function load_limit_5_cate ($start,$limit){
    $sql = "SELECT * FROM CATEGORY 
    WHERE ID_CATE != 1 ORDER BY ID_CATE DESC LIMIT $start,$limit "; 
    $cate = pdo_query($sql);
    return $cate;
}
// lấy tên loại
function get_name_cate($id_pro){
    $sql = "SELECT * FROM PRODUCT JOIN CATEGORY ON PRODUCT.ID_CATE = CATEGORY.ID_CATE WHERE ID_PRO = $id_pro";
    $cate = pdo_query_one($sql);
    extract ($cate);
    return $cate_name;
}
function check_cate ($cate_name){
    $sql = "SELECT * FROM CATEGORY WHERE CATE_NAME = '$cate_name'";
    $cate = pdo_query_one($sql);
    return $cate;
}
?>

<!-- color -->

<?php
function add_color ($color_name){
    $sql = "INSERT INTO COLOR (color_name) values('$color_name')";
    $color = pdo_execute($sql);
}

function load_all_color (){
    $sql = "SELECT * FROM COLOR WHERE ID_COLOR != 1";
    $color = pdo_query($sql);
    return $color;
}
function delete_color ($id_color){
    $sql = "SELECT * FROM COLOR_PRO WHERE ID_COLOR = $id_color";
    $clp = pdo_query($sql);
    if(is_array($clp)){
        foreach ($clp as $cl) {
            extract($cl);
            $sql = "UPDATE COLOR_PRO SET ID_COLOR = 1 WHERE ID_CLP = $id_clp";
            pdo_execute($sql);
        }
        $delete = "DELETE FROM COLOR WHERE ID_COLOR= $id_color";
        pdo_execute($delete);
    }else {
        $delete = "DELETE FROM COLOR WHERE ID_COLOR= $id_color";
        pdo_execute($delete); 
    }
}
function load_one_color ($id_color){
    $sql = "SELECT * FROM COLOR WHERE ID_COLOR = '$id_color'";
    $color = pdo_query_one($sql);
    return $color;
}
function update_color ($id_color,$color_name){
    $sql = "UPDATE COLOR SET COLOR_NAME = '$color_name' WHERE ID_COLOR = '$id_color'";
    $color = pdo_execute($sql);
}
function count_color(){
    $sql = "SELECT * FROM COLOR WHERE ID_COLOR != 1";
    $color = pdo_query($sql);
    $i=0;
    foreach ($color as $key => $value) {
        $i++;
    }
    $number =ceil($i / 5);
    return $number;
}
function load_limit_5_color ($start,$limit){
    $sql = "SELECT * FROM COLOR 
    WHERE ID_COLOR != 1 ORDER BY ID_COLOR DESC LIMIT $start,$limit "; 
    $color = pdo_query($sql);
    return $color;
}
function check_color($color_name){
    $sql = "SELECT * FROM COLOR WHERE COLOR_NAME = '$color_name'";
    $color = pdo_query_one($sql);
    return $color;
}
?>


<!-- brand -->

<?php
function add_brand ($brand_name){
    $sql = "INSERT INTO BRAND (BRAND_NAME) VALUES ('$brand_name')";
    pdo_execute($sql);
}
function load_all_brand(){
    $sql = "SELECT * FROM BRAND WHERE ID_BRAND != 1";
    $brand = pdo_query($sql);
    return $brand;
}
function load_one_brand ($id_brand){
    $sql = "SELECT * FROM BRAND WHERE ID_BRAND = '$id_brand'";
    $brand = pdo_query_one($sql);
    return $brand;
}
function update_brand ($id_brand,$brand_name){
    $sql = "UPDATE BRAND SET BRAND_NAME = '$brand_name' WHERE ID_BRAND = '$id_brand'";
    $brand = pdo_execute($sql);
}

function delete_brand ($id_brand){
    $sql = "SELECT * FROM PRODUCT WHERE ID_BRAND = $id_brand";
    $pro = pdo_query($sql);
    if(is_array($pro)){
        $sql = "UPDATE PRODUCT SET ID_BRAND = 1 WHERE ID_BRAND = $id_brand";
        pdo_execute($sql);
        $delete = "DELETE FROM BRAND WHERE ID_BRAND= $id_brand";
        pdo_execute($delete);
    }else { 
        $delete = "DELETE FROM BRAND WHERE ID_BRAND= $id_brand";
        pdo_execute($delete);
    }
     
}
// đếm số lượng bản ghi của hãng
function count_brand(){
    $sql = "SELECT * FROM BRAND WHERE ID_BRAND!= 1";
    $color = pdo_query($sql);
    $i=0;
    foreach ($color as $key => $value) {
        $i++;
    }
    $number =ceil($i / 5);
    return $number;
}
// lấy bản ghi của hãng theo $start và $limit
function load_limit_5_brand ($start,$limit){
    $sql = "SELECT * FROM BRAND 
    WHERE ID_BRAND != 1 ORDER BY ID_BRAND DESC LIMIT $start,$limit "; 
    $color = pdo_query($sql);
    return $color;
}
// lấy tên hãng
function get_name_brand($id_pro){
    $sql = "SELECT * FROM PRODUCT JOIN BRAND ON PRODUCT.ID_BRAND = BRAND.ID_BRAND WHERE ID_PRO = $id_pro";
    $brand = pdo_query_one($sql);
    extract ($brand);
    return $brand_name;
}
function check_brand($brand_name){
    $sql = "SELECT * FROM BRAND WHERE BRAND_NAME = '$brand_name'";
    $brand = pdo_query_one($sql);
    return $brand;
}
?>