<?php
function add_bill ($firstname,$lastname,$tel,$address,$date,$payment,$id_user,$totals,){
    $full_name = $firstname ." ". $lastname;
    $sql = "INSERT INTO BILL (NAME_USER,TEL_USER,ADDRESS_USER,DATE,TOTAL,PAYMENT,STATUS,ID_USER) 
    VALUES('$full_name','$tel','$address','$date','$totals','$payment',1,'$id_user')";
    pdo_execute($sql);
}
?>