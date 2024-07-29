<?php

function load_all_order()
{
    $sql = "SELECT * FROM bill ORDER BY id_bill DESC";
    $bill_lists = pdo_query($sql);
    return $bill_lists;
}

?>