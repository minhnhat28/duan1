<?php
function add_bill ($firstname,$lastname,$tel,$address,$date,$payment,$id_user,$totals){
    $full_name = $firstname ." ". $lastname;
    $sql = "INSERT INTO BILL (NAME_USER,TEL_USER,ADDRESS_USER,DATE,TOTAL,PAYMENT,STATUS,ID_USER) 
    VALUES('$full_name','$tel','$address','$date','$totals','$payment',1,'$id_user')";
    pdo_execute($sql);
}
function add_other_bill ($id_clp,$pro_name,$color_name,$brand_name,$price,$quantity_cart){
    $check_bill = "SELECT * FROM BILL WHERE ID_BILL = (SELECT MAX(ID_BILL) FROM BILL)";
    $bill = pdo_query_one($check_bill);
    $add_other_bill = "INSERT INTO OTHER_BILL (ID_BILL,ID_CLP,NAME_PRO,COLOR_PRODUCT,BRAND_PRO,PRICE_PRO,QUANTITY_PRO)
    VALUES(" . $bill['id_bill'] .",'$id_clp','$pro_name','$color_name','$brand_name','$price','$quantity_cart')";
    pdo_execute($add_other_bill);
}
function count_bill ($status,$bill_per_page){
    $sql = "SELECT COUNT(*) AS count FROM BILL WHERE 1";
    if($status != ""){
        $sql.=" AND STATUS = '$status'";
    }
    $count = pdo_query_one($sql);
    if($bill_per_page != 0){
        $number = ceil($count['count'] / $bill_per_page);
    }else {
        $number = $count['count'];
    }
    return $number;
}
function load_bill($status){
    $sql = "SELECT COUNT(*) AS count FROM bill WHERE 1";
    if($status != ""){
        $sql.=" AND STATUS = '$status'";
    }
    $bills = pdo_query_one($sql);
    return $bills;
}
function total_revenue(){
    $sql = "SELECT SUM(total) AS revenue FROM bill WHERE STATUS = 3";
    $bills = pdo_query_one($sql);
    return $bills;
}
function load_new_bill ($date){
    $sql = "SELECT * FROM bill JOIN STATUS ON bill.status = status.id_status WHERE DATE = '$date' ORDER BY id_bill DESC";
    $bills = pdo_query($sql);
    return $bills;
}
function load_all_bill($status,$start,$limit){
    $sql = "SELECT * FROM BILL 
    JOIN PAYMENT ON BILL.PAYMENT = PAYMENT.ID_PAYMENT 
    JOIN STATUS ON BILL.STATUS = STATUS.ID_STATUS WHERE 1";
    if($status != ""){
        $sql.= " AND STATUS = '$status'";
    }
    $sql.= " ORDER BY DATE ASC LIMIT $start,$limit ";
    $bills = pdo_query($sql);
    return $bills;
}
function count_bill_per_user ($id_user,$status,$other_status){
    $sql = "SELECT COUNT(*) AS count FROM BILL WHERE ID_USER = $id_user AND STATUS = '$status' ";
    if($other_status != ""){
        $sql .= " OR STATUS = '$other_status'";
    }
    $count = pdo_query_one($sql);
    $number = $count['count'];
    return $number;
}
function load_all_bill_per_user($id_user,$status,$other_status){
    $sql = "SELECT * FROM BILL 
    JOIN PAYMENT ON BILL.PAYMENT = PAYMENT.ID_PAYMENT 
    JOIN STATUS ON BILL.STATUS = STATUS.ID_STATUS 
    WHERE ID_USER = $id_user 
    AND STATUS = '$status' ";
    if($other_status != ""){
        $sql .= " OR STATUS = '$other_status'";
    }
    $sql .=" ORDER BY STATUS ASC";
    $bills = pdo_query($sql);
    return $bills;
}
function load_other_bill($id_bill){
    $sql = "SELECT * FROM OTHER_BILL WHERE ID_BILL = $id_bill";
    $other_bills = pdo_query($sql);
    return $other_bills;
}
function change_status_bill ($id_bill){
    $check_bill = "SELECT * FROM BILL WHERE ID_BILL = $id_bill";
    $bill = pdo_query_one($check_bill);
    $bill_status = $bill['status'];
    $change_bill = "UPDATE BILL SET STATUS = ($bill_status + 1) WHERE ID_BILL = $id_bill";
    pdo_execute($change_bill);
}
function count_pro_sold ($pro_name,$color_name){
    $sql = "SELECT NAME_PRO,SUM(QUANTITY_PRO) AS sold FROM OTHER_BILL 
    JOIN BILL ON OTHER_BILL.ID_BILL = BILL.ID_BILL
    WHERE NAME_PRO = '$pro_name' AND COLOR_PRODUCT = '$color_name' AND STATUS > 1
    GROUP BY NAME_PRO";
    $sold = pdo_query_one($sql);
    return $sold;
}
function cancel_bill ($id_bill){
    $sql = "UPDATE BILL SET STATUS = 0 WHERE ID_BILL = '$id_bill'";
    pdo_execute($sql);
}
?>